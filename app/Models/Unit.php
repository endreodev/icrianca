<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Classes\DataBase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Classes\Files;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use Intervention\Image\ImageManagerStatic as Image;

ini_set('memory_limit', '1024M');

/**
 * Class Unit
 * 
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string|null $locate
 * @property string|null $lat
 * @property string|null $lng
 * @property string $zipcode
 * @property string $address
 * @property string|null $number
 * @property string|null $district
 * @property int $country_id 
 * @property int $state_id
 * @property int $city_id
 * @property string|null $phone
 * @property bool $is_visible
 * @property string|null $image
 * @property bool $status
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Unit extends Model
{
	use SoftDeletes;
	use DataBase;
	use Files;
	protected $table = 'units';


	const NAME 		= 'Polos';
	const PREFIX 	= 'unit';


	protected $casts = [
		'country_id' => 'int',
		'state_id' => 'int',
		'city_id' => 'int',
		'is_visible' => 'bool',
		'status' => 'bool'
	];

	protected $fillable = [
		'name',
		'description',
		'locate',
		'lat',
		'lng',
		'zipcode',
		'address',
		'number',
		'district',
		'country_id',
		'state_id',
		'city_id',
		'phone',
		'is_visible',
		'image',
		'status'
	];


	public static $rules = [
		'name'       	=> 'required',
		'description'     	=> 'required',
		'zipcode'     	=> 'required',
		'address'     	=> 'required',
		'country_id'     	=> 'required',
		'state_id'     	=> 'required',
		'city_id'     	=> 'required',
	];



	public function getImage($size = '_thumbs', $attr = 'image')
	{

		$delemiters = explode('/', $this->{$attr});

		if (count($delemiters) > 1) {
			return Storage::disk('public')->url($this->{$attr});
		} else {
			$path = 'images/';

			if (is_array($size) && !is_string($size)) {

				$file =  $path .  $size[0] . '-' . $size[1] .  "/" . $this->{$attr};

				if (!Storage::disk('public')->exists($file)) {

					$file =  $path . 'originals' . "/" . $this->{$attr};

					$resize = Image::make(storage_path('app/public/' . $file))->resize(null, $size[1], function ($constraint) {
						$constraint->aspectRatio();
						$constraint->upsize();
					})->fit($size[0], $size[1])->stream('jpg', 80);

					Storage::disk('public')->put('images/' . $size[0] . '-' . $size[1] . '/' . $this->{$attr}, $resize->__toString());

					$file =  $path .  $size[0] . '-' . $size[1] .  "/" . $this->{$attr};

					return Storage::disk('public')->url($file);
				} else {
					return Storage::disk('public')->url($file);
				}
			} else {
				$file = $path . $size . "/" . $this->{$attr};
			}
		}


		return Storage::disk('public')->url($file);
	}

	public function city()
	{
		return $this->hasOne(\App\Models\City::class, 'id', 'city_id');
	}
	public function state()
	{
		return $this->hasOne(\App\Models\State::class, 'id', 'state_id');
	}


	public function getSlug()
	{
		return  Str::slug($this->name . ' ' . $this->city->name . ' ' . $this->state->name, '-');
	}

	public function students()
	{
		return $this->belongsToMany(\App\Models\Student::class, 'student_registrations', 'unit_id', 'student_id')
			->withTimestamps();
	}

	public function programs()
	{
		return $this->belongsToMany(\App\Models\Program::class, 'unit_programs', 'unit_id', 'program_id');
	}

	public function getLinkMap()
	{
		// return 'https://www.google.com/maps/preview/@' . $this->lng . ',' . $this->lat . 'z';
		return 'https://maps.google.com/maps?q=' . $this->lng . ',' . $this->lat . '&hl=es&z=14&amp;output=embed';
	}

	public function getIsVisible()
	{
	  switch ($this->is_visible) {
		case 1:
		  $return =  (object) [
			'badge' => 'success',
			'text' => 'Visível no Site',
		  ];
		  break;
		case 0:
		  $return = (object) [
			'badge' => 'danger',
			'text' => 'Invisível no SIte',
		  ];
		  break;
	  }
	  return $return;
	}
}
