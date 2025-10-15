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
 * Class Research
 * 
 * @property int $id
 * @property int|null $student_id
 * @property string|null $year
 * @property string|null $when_did_you_start_program
 * @property int|null $how_did_you_program
 * @property string|null $how_did_you_program_other
 * @property int|null $what_led_to_program
 * @property string|null $what_led_to_program_other
 * @property int|null $have_you_ever_stopped_studying
 * @property string|null $in_what_year
 * @property int|null $did_you_need_tutoring
 * @property int|null $had_difficulty_learning
 * @property int|null $what_is_the_family_situation
 * @property int|null $with_currently_lives
 * @property string|null $with_currently_lives_other
 * @property int|null $how_many_people_same_household
 * @property int|null $when_you_child_stay
 * @property string|null $when_you_child_stay_other
 * @property int|null $what_living_conditions
 * @property string|null $what_living_conditions_other
 * @property int|null $your_child_has_social_network
 * @property int|null $what_is_accessing_the_internet
 * @property int|null $what_family_means_of_transportation
 * @property int|null $level_of_education
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Research extends Model
{
	use SoftDeletes;
	use DataBase;
	protected $table = 'researches';

	const NAME 		= 'Pesquisas';
	const PREFIX 	= 'research';

	protected $casts = [
		'student_id' => 'int',
		'how_did_you_program' => 'int',
		'what_led_to_program' => 'int',
		'have_you_ever_stopped_studying' => 'int',
		'did_you_need_tutoring' => 'int',
		'had_difficulty_learning' => 'int',
		'what_is_the_family_situation' => 'int',
		'with_currently_lives' => 'int',
		'how_many_people_same_household' => 'int',
		'when_you_child_stay' => 'int',
		'what_living_conditions' => 'int',
		'your_child_has_social_network' => 'int',
		'what_is_accessing_the_internet' => 'int',
		'what_family_means_of_transportation' => 'int',
		'level_of_education' => 'int'
	];

	protected $fillable = [
		'student_id',
		'year',
		'when_did_you_start_program',
		'how_did_you_program',
		'how_did_you_program_other',
		'what_led_to_program',
		'what_led_to_program_other',
		'have_you_ever_stopped_studying',
		'in_what_year',
		'did_you_need_tutoring',
		'had_difficulty_learning',
		'what_is_the_family_situation',
		'with_currently_lives',
		'with_currently_lives_other',
		'how_many_people_same_household',
		'when_you_child_stay',
		'when_you_child_stay_other',
		'what_living_conditions',
		'what_living_conditions_other',
		'your_child_has_social_network',
		'what_is_accessing_the_internet',
		'what_family_means_of_transportation',
		'level_of_education'
	];


	public static $rules = [
		// 'year'     	=> 'required',
	];

	public function students()
	{
		return $this->belongsTo(\App\Models\Student::class, 'student_id', 'id');
	}

	public function instutional()
	{
		return $this->hasMany(\App\Models\InstitutionalResearch::class, 'research_id', 'id');
	}

	public function how_did_you_program()
	{
		switch ($this->how_did_you_program) {
			case '1':
				return "Escola";
				break;
			case '2':
				return "Mídias (TV, Jornal, internet)";
				break;
			case '3':
				return $this->how_did_you_program_other;
				break;
		}
	}

	public function what_led_to_program()
	{
		switch ($this->what_led_to_program) {
			case '1':
				return "Satisfeito com o ano anterior";
				break;
			case '2':
				return "Ocupação do tempo livre";
				break;
			case '3':
				return "Interesse por atividade educativa";
				break;
			case '4':
				return "Recomendação da escola";
				break;
			case '5':
				return $this->what_led_to_program_other;
				break;
		}
	}

	public function have_you_ever_stopped_studying()
	{
		switch ($this->have_you_ever_stopped_studying) {
			case '1':
				return "Sim";
				break;
			case '2':
				return "Não";
				break;
		}
	}

	public function did_you_need_tutoring()
	{
		switch ($this->did_you_need_tutoring) {
			case '1':
				return "Sim";
				break;
			case '2':
				return "Não";
				break;
		}
	}

	public function had_difficulty_learning()
	{
		switch ($this->had_difficulty_learning) {
			case '1':
				return "Sim";
				break;
			case '2':
				return "Não";
				break;
		}
	}


	public function what_is_the_family_situation()
	{
		switch ($this->what_is_the_family_situation) {
			case '1':
				return "Pais casados";
				break;
			case '2':
				return "Pais separados";
				break;
		}
	}

	public function with_currently_lives()
	{
		switch ($this->with_currently_lives) {
			case '1':
				return "Com os Pais biológicos";
				break;
			case '2':
				return "Com os Avós";
				break;
			case '3':
				return "Só com o Pai";
				break;
			case '4':
				return "Só com a Mãe";
				break;
			case '5':
				return "Pai com companheira";
				break;
			case '6':
				return "Pai com companheira";
				break;
			case '7':
				return $this->with_currently_lives_other;
				break;
		}
	}

	public function how_many_people_same_household()
	{
		switch ($this->how_many_people_same_household) {
			case '1':
				return "2";
				break;
			case '2':
				return "3";
				break;
			case '3':
				return "4";
				break;
			case '4':
				return "5";
				break;
			case '5':
				return "6";
				break;
			case '6':
				return "7 ou Mais";
				break;
		}
	}

	public function when_you_child_stay()
	{
		switch ($this->when_you_child_stay) {
			case '1':
				return "Familiares";
				break;
			case '2':
				return "Sozinho";
				break;
			case '3':
				return $this->when_you_child_stay_other;
				break;
		}
	}

	public function what_living_conditions()
	{
		switch ($this->what_living_conditions) {
			case '1':
				return "Casa própria";
				break;
			case '2':
				return "Alugada";
				break;
			case '3':
				return $this->what_living_conditions_other;
				break;
		}
	}

	public function your_child_has_social_network()
	{
		switch ($this->your_child_has_social_network) {
			case '1':
				return "Sim";
				break;
			case '2':
				return "Não";
				break;
		}
	}

	public function what_is_accessing_the_internet()
	{
		switch ($this->what_is_accessing_the_internet) {
			case '1':
				return "Particular (casa ou celular)";
				break;
			case '2':
				return "Público (escola, comunidade...)";
				break;
		}
	}

	public function what_family_means_of_transportation()
	{
		switch ($this->what_family_means_of_transportation) {
			case '1':
				return "Particular (carro, moto, bicicleta)";
				break;
			case '2':
				return "Público";
				break;
		}
	}


	public function level_of_education()
	{
		switch ($this->level_of_education) {
			case '1':
				return "Não frequentou escola";
				break;
			case '2':
				return "Ensino Fundamental (1ª a 4ª série)";
				break;
			case '3':
				return "Ensino Fundamental (5ª a 8ª série)";
				break;
			case '4':
				return "Ensino Médio (1º ao 3º Ano)";
				break;
			case '5':
				return "Ensino Superior Incompleto";
				break;
			case '6':
				return "Ensino Superior Completo";
				break;
		}
	}
}
