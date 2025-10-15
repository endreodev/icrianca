<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Classes\DataBase;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Newsletter
 * 
 * @property int $id
 * @property string $email
 * @property bool $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Newsletter extends Model
{
	use DataBase;
	protected $table = 'newsletter';

	const NAME 		= 'Newsletter';
	const PREFIX 	= 'newsletter';

	protected $casts = [
		'status' => 'bool'
	];

	protected $fillable = [
		'email',
		'status'
	];
}
