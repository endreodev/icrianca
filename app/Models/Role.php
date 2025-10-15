<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Classes\DataBase;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

use Spatie\Permission\Models\Role as RoleSpatie;


/**
 * Class Role
 * 
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|ModelHasRole[] $model_has_roles
 * @property Collection|Permission[] $permissions
 *
 * @package App\Models
 */
class Role extends RoleSpatie
{
	use DataBase;

	const NAME 		= 'Grupo de Usuários';
	const PREFIX 	= 'role';

	public static $rules = [
		'name'       	=> 'required',
	];

}
