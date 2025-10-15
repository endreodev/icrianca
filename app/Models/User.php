<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Classes\DataBase;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

use Classes\Files;

use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $image
 * @property int|null $gender_id
 * @property int|null $country_id
 * @property int|null $state_id
 * @property int|null $city_id
 * @property bool $status
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class User extends Authenticatable
{
	use DataBase, HasFactory, Notifiable, HasRoles, Files, SoftDeletes;


	protected $table = 'users';



	const NAME 		= 'Usuários';
	const PREFIX 	= 'user';

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $casts = [
		'office_id' => 'int',
		'sexe_id' => 'int',
		'status' => 'int',
		'children' => 'json',
	];

	protected $dates = [
		'email_verified_at',
		'admission_date',
		'rg_issue_date',
		'work_card_issuing_date',
		'voters_title_issue_date',
		'reservist_certificate_issue_date',
		'birth_date'
	];
	

	protected $fillable = [
		'name',
		'surname',
		'office_id',
		'sexe_id',
		'email',
		'birth_date',
		'email_verified_at',
		'password',
		'zipcode',
		'address',
		'number',
		'district',
		'country_id',
		'state_id',
		'city_id',
		'cellphone',
		'phone',
		'image',
		'status',
		'remember_token',
		'admission_date',
		'parentage',
		'naturalness',
		'declared_color',
		'marital_status',
		'spouse_name',
		'children',
		'document',
		'rg',
		'rg_place_of_issue',
		'rg_issue_date',
		'work_card',
		'work_card_series',
		'work_card_issuing_state',
		'work_card_issuing_date',
		'voters_title',
		'voters_title_zone',
		'voters_title_section',
		'voters_title_state',
		'voters_title_issue_date',
		'reservist_certificate',
		'reservist_certificate_series',
		'reservist_certificate_category',
		'reservist_certificate_rm',
		'reservist_certificate_issue_date',
		'pis_pasep',
		'cnh',
		'cnh_category',
		'class_body_registration',
		'class_body_registration_issuing_body',
		'class_body_registration_validaty',
		'bank',
		'bank_ag',
		'bank_ac',
		'bank_type',
		'education_level',
		'education_course',
		'education_establishment',
		'know_other_languages',
		'comments'
	];


	public static $rules = [
		'name'       	=> 'required',
		'surname'       => 'required',
		'document'      => 'required|unique:users,document,NULL,id,deleted_at,NULL|max:14',
		// 'admission_date'=> 'required|date',
		'email'      	=> 'required|string|email|unique:users,email,NULL,id,deleted_at,NULL|max:255',
		'password'   	=> 'nullable|required_without:keep_password||string|min:6',
	];

	protected $append = [
		'full_name',
	];


	public function sex()
	{
		return $this->hasOne(\App\Models\Sex::class, 'id', 'sexe_id');
	}


	public function setPasswordAttribute($password)
	{
		$this->attributes['password'] = bcrypt($password);
	}

	public function classes()
	{
		return $this->belongsToMany(\App\Models\Classe::class, 'classe_educator', 'user_id', 'classe_id')->withTimestamps();
	}

	public function units()
	{

		$units = [];
		$ids = [];
		$this->classes()
			->each(function ($classe, $key) use (&$units, &$ids) {

				if (!in_array($classe->unit->getId(), $ids)) {
					$units[] = $classe->unit;
				}
				$ids[$key] = $classe->unit->getId();
			});

		return collect($units);
	}


	public function office()
	{
		return $this->hasOne(\App\Models\Office::class, 'id', 'office_id');
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
					'text' => 'Pendente',
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
	public function getFullNameAttribute()
	{
		return ($this->name) ? $this->name . ' ' . $this->surname : null;
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
}
