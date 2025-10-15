<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Classes\DataBase;
use Illuminate\Database\Eloquent\Model;

/**
 * Class StudentSchool
 * 
 * @property int $id
 * @property int $student_id
 * @property int|null $teaching
 * @property string|null $academic_year
 * @property int|null $school_id
 * @property string|null $school_year_id
 * @property string|null $classe
 * @property int|null $period
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class StudentSchool extends Model
{
	use DataBase;
	protected $table = 'student_schools';

	protected $casts = [
		'student_id' => 'int',
		'teaching' => 'int',
		'school_id' => 'int',
		'period' => 'int'
	];

	protected $fillable = [
		'student_id',
		'teaching',
		'academic_year',
		'school_id',
		'school_year_id',
		'classe',
		'period'
	];

	public function school()
	{
		return $this->belongsTo(\App\Models\School::class, 'school_id', 'id');
	}

	public function getPeriod()
	{
		switch ($this->period) {
			case 1:
				return 'Matutino';
				break;

			case 2:
				return 'Vespertino';
				break;

			case 3:
				return 'Noturno';
				break;

			default:
				return '--|--';
				break;
		}
	}

	public function getTeaching()
	{
		switch ($this->teaching) {
			case 1:
				return 'Ensino Fundamental';
				break;

			case 2:
				return 'Ensino Médio';
				break;

			default:
				return '--|--';
				break;
		}
	}
	public function school_year()
	{
		return $this->belongsTo(\App\Models\SchoolYear::class, 'school_year_id', 'id');
	}
}
