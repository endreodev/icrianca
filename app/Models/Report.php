<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Classes\DataBase;
use Classes\Files;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

ini_set('memory_limit', '1024M');


/**
 * Class Report
 * 
 * @property int $id
 * @property string $title
 * @property string|null $file
 * @property string|null $image
 * @property bool $status
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Report extends Model
{
	use SoftDeletes;
	use DataBase;
	use Files;
	protected $table = 'reports';

	const NAME 		= 'Relatórios';
	const PREFIX 	= 'report';

	protected $casts = [
		'status' => 'bool'
	];

	protected $fillable = [
		'title',
		'file',
		'image',
		'status'
	];

	public static $rules = [
		'title'       	=> 'required',
	];

	public function getSlug()
	{
		return  Str::slug($this->title, '-');
	}

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

	public function getFile($attr = 'file')
	{
		if (!$this->isFilled() or !$this->{$attr}) return false;

		$delemiters = explode('/', $this->{$attr});

		if (count($delemiters) > 1) {
			return Storage::disk('public')->url($this->{$attr});
		} else {
			$path = 'images/';
			$file = $path . "/" . $this->{$attr};
		}
		return Storage::disk('public')->url($file);
	}
}
