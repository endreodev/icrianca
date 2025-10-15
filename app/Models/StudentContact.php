<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Classes\DataBase;
use Illuminate\Database\Eloquent\Model;

/**
 * Class StudentContact
 * 
 * @property int $id
 * @property int $student_id
 * @property string $name
 * @property string|null $degree_of_kinship
 * @property string|null $phone
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class StudentContact extends Model
{
	use DataBase;
	protected $table = 'student_contacts';

	protected $casts = [
		'student_id' => 'int'
	];

	protected $fillable = [
		'student_id',
		'name',
		'degree_of_kinship',
		'phone'
	];
}
