<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Classes\DataBase;
use Illuminate\Database\Eloquent\Model;

/**
 * Class StudentRegistration
 * 
 * @property int $id
 * @property int $student_id
 * @property int|null $unit_id
 * @property int|null $program_id
 * @property int|null $classe_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class StudentRegistration extends Model
{
	use DataBase;
	protected $table = 'student_registrations';

	protected $casts = [
		'student_id' => 'int',
		'unit_id' => 'int',
		'program_id' => 'int',
		'classe_id' => 'int',
		'status' => 'boolean',
	];

	protected $fillable = [
		'student_id',
		'unit_id',
		'program_id',
		'classe_id',
		'status',
	];

	public function classe()
	{
		return $this->hasOne(\App\Models\Classe::class, 'id', 'classe_id');
	}

	public function unit()
	{
		return $this->hasOne(\App\Models\Unit::class, 'id', 'unit_id');
	}

	public function program()
	{
		return $this->hasOne(\App\Models\Program::class, 'id', 'program_id');
	}
}
