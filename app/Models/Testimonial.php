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

/**
 * Class Testimonial
 * 
 * @property int $id
 * @property string $title
 * @property string $text
 * @property string $name
 * @property string $office
 * @property string $photo
 * @property int $status
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Testimonial extends Model
{
	use SoftDeletes;
	use DataBase;
	use Files;
	protected $table = 'testimonials';

	const NAME 		= 'Depoimentos';
	const PREFIX 	= 'testimonial';

	protected $casts = [
		'status' => 'int'
	];

	protected $fillable = [
		'title',
		'text',
		'name',
		'office',
		'image',
		'status'
	];

	public static $rules = [
		'title'     	=> 'required',
		'text'     		=> 'required',
		'name'     		=> 'required',
		'office'     	=> 'required',
		'image'     	=> 'required',
		'status'     	=> 'required',
	];
}
