<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Classes\DataBase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;


/**
 * Class Archive
 * 
 * @property int $id
 * @property string $entity
 * @property string $entity_id
 * @property string $path
 * @property string|null $extension
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Archive extends Model
{
	// use SoftDeletes;
	use DataBase;
	protected $table = 'archives';

	protected $fillable = [
		'entity',
		'entity_id',
		'path',
		'extension'
	];

	public function getImage($size = '_thumbs', $attr = 'path')
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

					

					$resize = Image::make(storage_path('app/public/'. $file))->resize(null, $size[1], function ($constraint) {
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

	public function deleteImage($attr = 'path')
	{

		$delemiters = explode('/', $this->{$attr});
		if (count($delemiters) > 1) {
			return Storage::delete($this->{$attr});
		} else {

			$path = 'images/';
			$sizes = ['_thumbs', '_resizes', 'originals'];

			foreach ($sizes as $key => $value) {
				$file = $path . $value . "/" . $this->{$attr};
				return Storage::delete($file);
			}
		}
	}
}
