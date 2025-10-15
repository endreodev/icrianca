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
 * Class SchoolYear
 * 
 * @property int $id
 * @property int $teaching
 * @property string|null $name
 * @property bool $status
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class SchoolYear extends Model
{
	use SoftDeletes;
	use DataBase;
	protected $table = 'school_years';

	protected $casts = [
		'teaching' => 'int',
		'status' => 'bool'
	];

	protected $fillable = [
		'teaching',
		'name',
		'status'
	];
}
