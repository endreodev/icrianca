<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Classes\DataBase;
use Classes\Files;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Slide
 * 
 * @property int $id
 * @property string|null $nickname
 * @property string|null $link
 * @property string $image
 * @property int $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Slide extends Model
{
	use DataBase;
	use Files;

	protected $table = 'slides';

	const NAME 		= 'Slides';
	const PREFIX 	= 'slide';

	protected $casts = [
		'status' => 'int'
	];

	protected $fillable = [
		'nickname',
		'link',
		'image',
		'status'
	];


	public static $rules = [
		'nickname'     	=> 'required',
		'image'     	=> 'required',
		'status'     	=> 'required',
	];
}
