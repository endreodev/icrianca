<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Classes\DataBase;
use Classes\Files;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Team
 * 
 * @property int $id
 * @property string $name
 * @property string $image
 * @property string $office
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Team extends Model
{
	use SoftDeletes;
	use DataBase;
	use Files;
	protected $table = 'teams';

	const NAME 		= 'Equipe';
	const PREFIX 	= 'team';

	protected $casts = [
		'status' => 'bool'
	];

	protected $fillable = [
		'name',
		'image',
		'office',
		'status',
	];

	public static $rules = [
		'name'     	=> 'required',
		'image'     	=> 'required',
		'office'     	=> 'required',
		'status'		=> 'required',
	];
}
