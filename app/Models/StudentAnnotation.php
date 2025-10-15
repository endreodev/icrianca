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
 * Class StudentAnnotation
 * 
 * @property int $id
 * @property int $student_id
 * @property string|null $title
 * @property string|null $text
 * @property Carbon|null $date
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class StudentAnnotation extends Model
{
	use DataBase;
	use SoftDeletes;

	protected $table = 'student_annotations';

	protected $casts = [
		'student_id' => 'int',
		'type' => 'int'
	];

	const NAME 		= 'Anotações';
	const PREFIX 	= 'annotation';

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'student_id',
		'type',
		'title',
		'text',
		'date'
	];

	public static $rules = [
		// 'type'     	=> 'required',
		'title'     => 'required',
		'text'     	=> 'required',
		'date'     	=> 'required',
	];

	public function student()
	{
		return $this->belongsTo(\App\Models\Student::class, 'student_id', 'id')->withTrashed();
	}
}
