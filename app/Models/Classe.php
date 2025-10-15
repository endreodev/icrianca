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
 * Class Class
 * 
 * @property int $id
 * @property string $name
 * @property int $period
 * @property int $unit_id
 * @property int $program_id
 * @property bool $status
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Classe extends Model
{
	use SoftDeletes;
	use DataBase;
	protected $table = 'classes';

	const NAME 		= 'Turmas';
	const PREFIX 	= 'classe';

	protected $casts = [
		'period' => 'int',
		'unit_id' => 'int',
		'program_id' => 'int',
		'status' => 'bool'
	];

	protected $fillable = [
		'name',
		'period',
		'unit_id',
		'program_id',
		'status'
	];


	public static $rules = [
		'name'       	=> 'required',
		'period'     	=> 'required',
		'unit_id'     	=> 'required',
		// 'program_id'     	=> 'required',
		'status'     	=> 'required',
	];

	public function trainers()
	{
		return $this->belongsToMany(\App\Models\User::class, 'classe_educator', 'classe_id', 'user_id')->withTimestamps();
	}


	public function students()
	{
		return $this->belongsToMany(\App\Models\Student::class, 'student_registrations', 'classe_id', 'student_id')
			->withTimestamps();
	}

	public function unit()
	{
		return $this->belongsTo(\App\Models\Unit::class, 'unit_id', 'id');
	}

	public function program()
	{
		return $this->belongsTo(\App\Models\Program::class, 'program_id', 'id');
	}
}
