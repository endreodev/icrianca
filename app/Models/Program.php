<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Classes\DataBase;
use Classes\Files;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;
use Intervention\Image\ImageManagerStatic as Image;
ini_set('memory_limit', '1024M');


/**
 * Class Program
 * 
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string|null $image
 * @property bool $status
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Program extends Model
{
	use SoftDeletes;
	use DataBase;
	use Files;
	protected $table = 'programs';

	const NAME 		= 'Programas';
	const PREFIX 	= 'program';

	protected $casts = [
		'status' => 'bool'
	];

	protected $fillable = [
		'name',
		'description',
		'image',
		'institutional_image',
		'status'
	];

	public static $rules = [
		'name'       	=> 'required',
		'description'   => 'required',
		// 'status'     	=> 'required',
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

	public function getSlug()
	{
		return  Str::slug($this->name, '-');
	}
}
