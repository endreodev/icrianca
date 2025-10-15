<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Classes\DataBase;
use Illuminate\Database\Eloquent\Model;

/**
 * Class StudentMeasurement
 * 
 * @property int $id
 * @property int $student_id
 * @property Carbon|null $date
 * @property string|null $weight
 * @property string|null $height
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class StudentMeasurement extends Model
{
	use DataBase;
	protected $table = 'student_measurements';

	protected $casts = [
		'student_id' => 'int'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'student_id',
		'date',
		'weight',
		'height'
	];
}
