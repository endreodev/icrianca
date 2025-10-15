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
 * Class Sex
 * 
 * @property int $id
 * @property string $name
 * @property int $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Sex extends Model
{
	use DataBase, SoftDeletes;
	protected $table = 'sexes';

	const NAME 		= 'Sexos';
	const PREFIX 	= 'sex';

	protected $casts = [
		'status' => 'int'
	];

	protected $fillable = [
		'name',
		'status'
	];

	public static $rules = [
		'name'       	=> 'required',
	];
}
