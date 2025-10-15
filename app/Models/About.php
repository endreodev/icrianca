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
 * Class About
 * 
 * @property int $id
 * @property string $summary_home
 * @property string $image_background
 * @property string $image_featured
 * @property string $image
 * @property string $the_institute
 * @property string $about_mission
 * @property string $about_vision
 * @property string $about_values
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class About extends Model
{
	use DataBase;
	use Files;
	protected $table = 'abouts';

	const NAME 		= 'Sobre o Instituto';
	const PREFIX 	= 'about';

	protected $casts = [
		'status' => 'bool'
	];

	protected $fillable = [
		'title_home',
		'hat_home',
		'summary_home',
		'image_the_institute',
		'image_background',
		'hat_the_institute',
		'title_the_institute',
		'image_featured',
		'image',
		'the_institute',
		'about_mission',
		'about_vision',
		'about_values',
		'about_image_secondary',
		'url_social_status',
	];

	public static $rules = [
		'title_home'     		=> 'required',
		// 'hat_home'     		=> 'required',
		// 'summary_home'     		=> 'required',
		// 'image_the_institute'     		=> 'required',
		// 'image_background'     	=> 'required',
		// 'hat_the_institute'     		=> 'required',
		// 'title_the_institute'     		=> 'required',
		// 'image_featured'     	=> 'required',
		// 'image'     			=> 'required',
		// 'the_institute'     	=> 'required',
		// 'about_mission'     	=> 'required',
		// 'about_vision'     		=> 'required',
		// 'about_values'     		=> 'required',
		// 'about_image_secondary'     		=> 'required',
	];
}
