<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Classes\DataBase;
use Classes\Files;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Partner
 * 
 * @property int $id
 * @property string $nickname
 * @property int $type
 * @property string|null $url
 * @property string|null $image
 * @property int $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Partner extends Model
{
	use DataBase;
	use Files;
	protected $table = 'partners';

	const NAME 		= 'Parceiros';
	const PREFIX 	= 'partner';


	protected $casts = [
		'type' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'nickname',
		'type',
		'url',
		'image',
		'status'
	];


	public static $rules = [
		'nickname'      => 'required',
		'type'     		=> 'required',
		'image'     	=> 'required',
	];

	public function getImage($size = '_thumbs', $attr = 'image')
	{

		$delemiters = explode('/', $this->{$attr});

		if (count($delemiters) > 1) {
			return Storage::disk('public')->url($this->{$attr});
		} else {
			$path = 'images/';
			$file = $path . $size . "/" . $this->{$attr};
		}


		return Storage::disk('public')->url($file);
	}

	public function getType()
	{
		switch ($this->type) {
			case 1:
				$return = 'Mantenedores';
				break;
			case 2:
				$return = 'Institucionais';
				break;
			default:
				$return = '--';
				break;
		}
		return $return;
	}
}
