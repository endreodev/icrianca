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
 * Class PostsInstagram
 * 
 * @property int $id
 * @property string $nickname
 * @property string $image
 * @property string $link
 * @property bool $status
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class PostsInstagram extends Model
{
	use SoftDeletes;
	use DataBase;
	use Files;
	protected $table = 'posts_instagram';

	const NAME 		= 'Post do Instagram';
	const PREFIX 	= 'post_instagram';

	protected $casts = [
		'status' => 'bool'
	];

	protected $fillable = [
		'nickname',
		'image',
		'link',
		'status'
	];

	public static $rules = [
		'image'       	=> 'required',
		'link'      => 'required',
	];
}
