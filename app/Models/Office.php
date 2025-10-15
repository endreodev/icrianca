<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Classes\DataBase;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Office
 * 
 * @property int $id
 * @property string $name
 * @property bool $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Office extends Model
{
	use DataBase;
	protected $table = 'offices';

	const NAME 		= 'Cargos';
	const PREFIX 	= 'office';

	protected $casts = [
		'status' => 'bool'
	];

	protected $fillable = [
		'name',
		'status'
	];

	public static $rules = [
		'name'     	=> 'required',
	];
}
