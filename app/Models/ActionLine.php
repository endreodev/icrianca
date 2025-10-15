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
 * Class ActionLine
 * 
 * @property int $id
 * @property string $title
 * @property string $image
 * @property string $description
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class ActionLine extends Model
{
	use SoftDeletes;
	use DataBase;
	use Files;
	protected $table = 'action_lines';

	const NAME 		= 'Linhas de Ações';
	const PREFIX 	= 'action_line';

	protected $fillable = [
		'title',
		'image',
		'description',
		'status',
	];


	protected $casts = [
		'status' => 'boolean'
	];

	public static $rules = [
		'title'     	=> 'required',
		// 'image'     	=> 'required',
		'description'   => 'required',
	];
}
