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

use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

ini_set('memory_limit', '1024M');



/**
 * Class Action
 * 
 * @property int $id
 * @property string|null $type
 * @property string $title
 * @property string|null $text
 * @property string|null $embed_video
 * @property string $image
 * @property bool $status
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Action extends Model
{
	use SoftDeletes;
	use DataBase;
	protected $table = 'actions';

	const NAME 		= 'Ações';
	const PREFIX 	= 'action';

	protected $casts = [
		'status' => 'bool'
	];

	protected $fillable = [
		'type',
		'title',
		'text',
		'embed_video',
		'image',
		'status'
	];

	public static $rules = [
		'type'     	=> 'required',
		'title'     	=> 'required',
		'image'     	=> 'required',
		'status'     	=> 'required',
	];

	public function getType()
	{
		switch ($this->type) {
			case 'news':
				return 'Notícias';
				break;
			case 'photos':
				return 'Fotos';
				break;
			case 'video':
				return 'Vídeos';
				break;

			default:
				return 'Sem Categoria';
				break;
		}
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

	public function photos($entity = 'photos')
	{
		return $this->hasMany(\App\Models\Archive::class, 'entity_id', 'id')->where('entity', $entity);
	}

	public function getVideo()
	{
		if ($this->type === 'video') {
			if (filter_var($this->embed_video, FILTER_VALIDATE_URL)) {
				return preg_replace(
					"/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
					"<iframe src=\"//www.youtube.com/embed/$2\" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>",
					$this->embed_video
				);
			} else {
				return "<iframe src=\"//www.youtube.com/embed/$this->embed_video\" frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
			}
		}
		return false;
	}

	public function getSlug()
	{
		return  Str::slug($this->title, '-');
	}
}
