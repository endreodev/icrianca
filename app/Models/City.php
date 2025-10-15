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
 * Class City 
 * 
 * @property int $id
 * @property string $name
 * @property int $status
 * @property int $state_id
 * @property int $cd_ibge
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class City extends Model
{
	use DataBase, SoftDeletes;
	protected $table = 'cities';


	const NAME 		= 'Cidades';
	const PREFIX 	= 'city';

	protected $casts = [
		'status' => 'int',
		'state_id' => 'int',
		'cd_ibge' => 'int'
	];

	protected $fillable = [
		'name',
		'status',
		'state_id',
		'cd_ibge'
	];

	public static $rules = [
		'name'       	=> 'required',
		'state_id'     	=> 'required',
	];

	protected $appends = [
		'country',
	];


	public function state()
	{
		return $this->hasOne(\App\Models\State::class, 'id', 'state_id');
	}

	public function getCountryAttribute()
	{
		return $this->state->country->id;
	}
}
