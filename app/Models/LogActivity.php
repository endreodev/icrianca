<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Classes\DataBase;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LogActivity
 * 
 * @property int $id
 * @property string $subject
 * @property array|null $json
 * @property string $url
 * @property string $method
 * @property string $ip
 * @property string|null $agent
 * @property int|null $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class LogActivity extends Model
{
	use DataBase;
	protected $table = 'log_activity';

	protected $casts = [
		'json' => 'json',
		'user_id' => 'int'
	];

	protected $fillable = [
		'subject',
		'json',
		'url',
		'method',
		'ip',
		'agent',
		'user_id'
	];
}
