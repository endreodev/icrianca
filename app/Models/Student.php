<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Classes\DataBase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Classes\Files;
use Illuminate\Support\Facades\Storage;

/**
 * Class Student
 * 
 * @property int $id
 * @property string $name
 * @property int|null $sexe_id
 * @property Carbon|null $birth_date
 * @property int|null $nationality_country_id
 * @property int|null $nationality_state_id
 * @property int|null $nationality_city_id
 * @property int|null $country_id
 * @property int|null $state_id
 * @property int|null $city_id
 * @property string|null $address
 * @property string|null $phone
 * @property string|null $number
 * @property string|null $district
 * @property string|null $zipcode
 * @property string|null $mother_name
 * @property string|null $mother_document
 * @property string|null $mother_office
 * @property string|null $mother_phone
 * @property string|null $father_name
 * @property string|null $father_document
 * @property string|null $father_office
 * @property string|null $father_phone
 * @property string|null $go_classes
 * @property string|null $has_allergy
 * @property string|null $has_controlled_medication
 * @property string|null $had_surgery
 * @property string|null $has_health_plan
 * @property string|null $height
 * @property string|null $weight
 * @property string|null $has_comments_health
 * @property string|null $image
 * @property bool $status
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Student extends Model
{
	use SoftDeletes;
	use DataBase;
	use Files;
	protected $table = 'students';

	const NAME 		= 'Alunos';
	const PREFIX 	= 'student';

	protected $casts = [
		'sexe_id' => 'int',
		'nationality_country_id' => 'int',
		'nationality_state_id' => 'int',
		'nationality_city_id' => 'int',
		'country_id' => 'int',
		'state_id' => 'int',
		'city_id' => 'int',
		'status' => 'int',
		'certificate_birth' => 'boolean',
		'certificate_of_schooling' => 'boolean',
		'certificate_medical' => 'boolean',
		'responsible_document' => 'boolean',
	];

	protected $dates = [
		'birth_date'
	];

	protected $fillable = [
		'name',
		'document',
		'sexe_id',
		'birth_date',
		'certificate_birth',
		'certificate_of_schooling',
		'certificate_medical',
		'responsible_document',
		'nationality_country_id',
		'nationality_state_id',
		'nationality_city_id',
		'country_id',
		'state_id',
		'city_id',
		'lat',
		'lng',
		'address',
		'phone',
		'number',
		'district',
		'zipcode',
		'mother_name',
		'mother_document',
		'mother_office',
		'mother_phone',
		'father_name',
		'father_document',
		'father_office',
		'father_phone',
		'go_classes',
		'has_allergy',
		'has_controlled_medication',
		'had_surgery',
		'has_health_plan',
		'height',
		'weight',
		'has_comments_health',
		'image',
		'status'
	];


	protected $appends = ['age'];


	public static $rules = [
		'name'       				=> 'required',
		'document'					=> 'required|cpf|unique:students,document,NULL,id,deleted_at,NULL|max:14|min:11',
		// 'certificate_birth'     	=> 'required',
		// 'responsible_document'     	=> 'required',
		// 'certificate_of_schooling'  => 'required',
	];

	public function measurements()
	{
		return $this->hasMany(\App\Models\StudentMeasurement::class, 'student_id');
	}

	public function contacts()
	{
		return $this->hasMany(\App\Models\StudentContact::class, 'student_id');
	}

	public function schools()
	{
		return $this->hasMany(\App\Models\StudentSchool::class, 'student_id')->orderBy('academic_year', 'ASC');
	}

	public function registrations()
	{
		return $this->hasMany(\App\Models\StudentRegistration::class, 'student_id');
	}

	public function annotations()
	{
		return $this->hasMany(\App\Models\StudentAnnotation::class, 'student_id')->orderBy('date', 'DESC');
	}

	public function sex()
	{
		return $this->hasOne(\App\Models\Sex::class, 'id', 'sexe_id');
	}

	public function nationality_country()
	{
		return $this->hasOne(\App\Models\Country::class, 'id', 'nationality_country_id');
	}

	public function nationality_state()
	{
		return $this->hasOne(\App\Models\State::class, 'id', 'nationality_state_id');
	}

	public function nationality_city()
	{
		return $this->hasOne(\App\Models\City::class, 'id', 'nationality_city_id');
	}

	public function country()
	{
		return $this->hasOne(\App\Models\Country::class, 'id', 'country_id');
	}

	public function state()
	{
		return $this->hasOne(\App\Models\State::class, 'id', 'state_id');
	}

	public function city()
	{
		return $this->hasOne(\App\Models\City::class, 'id', 'city_id');
	}

	public function researches()
	{
		return $this->hasMany(\App\Models\Research::class, 'id', 'student_id');
	}


	public function units()
	{
		return $this->belongsToMany(\App\Models\Unit::class, 'student_registrations', 'student_id', 'unit_id')
			->withTimestamps();
	}


	public function getYears()
	{
		$birthdate = new \DateTime($this->birth_date);
		$today     = new \DateTime();
		$interval  = $today->diff($birthdate);
		return $interval->format('%y Anos');
	}

	public function getImage($size = '_thumbs', $attr = 'image')
	{

		$delemiters = explode('/', $this->{$attr});

		if (count($delemiters) > 1) {
			return Storage::disk('public')->url($this->{$attr});
		} else {
			$path = 'images/';
			$file = $path . $size . "/" . $this->{$attr};
		}


		return Storage::disk('public')->url($file);
	}


	public function getStatus()
	{
		switch ($this->status) {
			case 1:
				$return =  (object) [
					'badge' => 'success',
					'text' => 'Ativo',
				];
				break;
			case 2:
				$return = (object) [
					'badge' => 'danger',
					'text' => 'Inativo',
				];
				break;
			case 3:
				$return = (object) [
					'badge' => 'warning',
					'text' => 'Em Transferencia',
				];
				break;
			default:
				$return = (object) [
					'badge' => 'primary',
					'text' => 'Sem Status',
				];
				break;
		}
		return $return;
	}

	public function getAgeAttribute()
	{
		return Carbon::parse($this->attributes['birth_date'])->age;
	}
}
