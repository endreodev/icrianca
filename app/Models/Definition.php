<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Classes\DataBase;
use Classes\Files;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Definition
 * 
 * @property int $id
 * @property string|null $address
 * @property string|null $email_site
 * @property string|null $email_form_contact
 * @property string|null $email_form_helped_institute
 * @property string|null $bg_programs
 * @property string|null $bg_actions
 * @property string|null $bg_partners
 * @property string|null $bg_contacts
 * @property string|null $bg_reports
 * @property string|null $image_1_partner
 * @property string|null $image_2_partner
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Definition extends Model
{
	use DataBase;
	use Files;
	protected $table = 'definitions';

	
	const NAME 		= 'Definições globais do Site';
	const PREFIX 	= 'definition';


	protected $fillable = [
		'address',
		'phone',
		'email_site',
		'email_form_contact',
		'email_form_helped_institute',
		'bg_programs',
		'bg_units',
		'bg_actions_line',
		'bg_actions',
		'bg_partners',
		'bg_contacts',
		'bg_reports',
		'image_1_partner',
		'image_2_partner'
	];

	
	public static $rules = [
		'address'     		=> 'required',
	];
}
