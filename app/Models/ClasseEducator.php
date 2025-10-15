<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Classes\DataBase;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ClasseEducator
 * 
 * @property int $id
 * @property int $user_id
 * @property int $classe_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class ClasseEducator extends Model
{
	use DataBase;
	protected $table = 'classe_educator';

	protected $casts = [
		'user_id' => 'int',
		'classe_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'classe_id'
	];
}
