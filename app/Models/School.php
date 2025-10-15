<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Classes\DataBase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class School
 * 
 * @property int $id
 * @property string|null $name
 * @property bool $status
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class School extends Model
{
	use SoftDeletes;
	use DataBase;
	protected $table = 'schools';

	const NAME 		= 'Escolas';
	const PREFIX 	= 'school';


	protected $casts = [
		'status' => 'bool'
	];

	protected $fillable = [
		'name',
		'status'
	];

	public static $rules = [
		'name'       	=> 'required',
	];
}
