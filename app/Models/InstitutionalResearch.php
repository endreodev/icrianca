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
 * Class InstitutionalResearch
 * 
 * @property int $id
 * @property int $research_id
 * @property int|null $interest_in_studying
 * @property int|null $behavior
 * @property int|null $responsibility
 * @property int|null $respect
 * @property int|null $self_esteem
 * @property int|null $habits
 * @property int|null $care
 * @property int|null $filled_by
 * @property string|null $filled_by_other
 * @property string|null $text
 * @property Carbon|null $date
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class InstitutionalResearch extends Model
{
	use SoftDeletes;
	use DataBase;
	protected $table = 'institutional_research';


	protected $casts = [
		'research_id' => 'int',
		'interest_in_studying' => 'int',
		'behavior' => 'int',
		'responsibility' => 'int',
		'respect' => 'int',
		'self_esteem' => 'int',
		'habits' => 'int',
		'care' => 'int',
		'filled_by' => 'int'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'research_id',
		'interest_in_studying',
		'behavior',
		'responsibility',
		'respect',
		'self_esteem',
		'habits',
		'care',
		'filled_by',
		'filled_by_other',
		'text',
		'date'
	];

	public function questionText($key)
	{
		switch ($key) {
			case 0:
				return 'Como o programa pode ajudar seu filho?';
				break;
			case 1:
				return 'Observou alguma mudança no seu filho(a)? Pode compartilhar?';
				break;
			case 2:
				return 'Qual foi a principal mudança que observou no seu filho(a) com a participação no programa?';
				break;
			default:
				return '--';
				break;
		}
	}

	public function research()
	{
		return $this->belongsTo(\App\Models\Research::class, 'research_id', 'id');
	}

	public function filled_by()
	{
		switch ($this->filled_by) {
			case '1':
				return "Pai";
				break;
			case '2':
				return "Mãe";
				break;
			case '3':
				return "Avó(ô)";
				break;
			case '4':
				return $this->filled_by_other;
				break;
		}
	}
}
