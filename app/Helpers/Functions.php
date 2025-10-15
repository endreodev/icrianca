<?php

namespace App\Helpers;

class Functions
{

    public static function getNameRoles($role)
    {
        $arr = [
            'admin'         => 'Administrador',
            'educator'      => 'Educador do Instituto',
        ];
        return (string) $arr[$role];
    }

    public static function getNamePermissions($permission)
    {
        $default_actions = [
            'index'     => 'Listagem',
            'create'    => 'Criação',
            'show'      => 'Visualização',
            'delete'    => 'Deletar',
            'update'    => 'Atualizar',
            'status'    => 'Alterar Status',
        ];
        $permission = explode(".", $permission);


        $model = ucfirst($permission[0]);

        if ($model === 'Annotation') {
            $model = "App\\Models\\StudentAnnotation";
        } else if ($model === 'Action_line') {
            $model = "App\\Models\\ActionLine";
        } else if ($model === 'Post_instagram') {
            $model = "App\\Models\\PostsInstagram";
        } else {
            $model = "App\\Models\\" . $model;
        }



        return (string) $default_actions[$permission[1]] . ' | ' . $model::NAME;
    }
    public static function count_characters(string $string)
    {
        return count(preg_split('//u', $string, -1, PREG_SPLIT_NO_EMPTY));
    }

    public static function getMonthName($indice)
    {
        $mes = array('Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');
        return $mes[$indice];
    }

    /**
     * Datetime format
     *
     * @return string
     */
    public static function formatDatetime($value)
    {
        return isset($value) ? \Carbon::parse($value)->format('d/m/Y H:i') : null;
    }

    /**
     * Date format
     *
     * @return string
     */
    public static function formatDate($value)
    {
        return isset($value) ? \Carbon::parse($value)->format('d/m/Y') : null;
    }

    /**
     * Date format
     *
     * @return string
     */
    public static function formatDateMonthYear($value)
    {
        return isset($value) ? \Carbon::parse($value)->format('m/Y') : null;
    }

    /**
     * Time format
     *
     * @return string
     */
    public static function formatTime($value)
    {
        return isset($value) ? \Carbon::parse($value)->format('H:i') : null;
    }

    /**
     * Boolean format
     *
     * @return string
     */
    public static function formatBoolean($value)
    {
        return boolval($value) ? \Lang::get('text.yes') : \Lang::get('text.no');
    }

    /**
     * Percentage format
     *
     * @return string
     */
    public static function formatPercentage($value)
    {
        return isset($value) ? number_format($value, 2, ",", ".") . "%" : null;
    }

    public static function getPerformancePorcentage($value, $value_compare)
    {
        $performance_porcentage = $value - $value_compare;
        if ($value_compare != 0) $performance_porcentage = ($performance_porcentage / $value_compare) * 100;
        return self::formatPercentage(round($performance_porcentage, 2));
    }

    /**
     * Integer format
     *
     * @return string
     */
    public static function formatInteger($value)
    {
        return isset($value) ? number_format($value, 0, ",", ".") : null;
    }

    /**
     * Decimal format
     *
     * @return string
     */
    public static function formatDecimal($value)
    {
        return isset($value) ? number_format($value, 2, ",", ".") : null;
    }

    /**
     * Decimal format only if number has decimal places
     *
     * @return string
     */
    public static function formatOptionalDecimal($value)
    {
        return isset($value) ? ((fmod($value, 1) === 0.00 ? number_format($value, 0, ",", ".") : number_format($value, 2, ",", "."))) : null;
    }

    /**
     * Latitude and longitude format
     *
     * @return string
     */
    public static function formatCoordinate($value)
    {
        return isset($value) ? number_format($value, 8, ",", ".") : null;
    }

    /**
     * Latitude and longitude format
     *
     * @return string
     */
    public static function formatInverseCoordinate($value)
    {
        return isset($value) ? number_format($value, 8, ".", ",") : number_format(0, 1, ".", ",");
    }

    /**
     * BRL currency format
     *
     * @return string
     */
    public static function formatCurrency($value)
    {
        return isset($value) ? (new \NumberFormatter('pt_BR', \NumberFormatter::CURRENCY))->formatCurrency($value, 'BRL') : null;
    }

    /**
     * Sentence format (only first letter capitalized)
     *
     * @return string
     */
    public static function formatSentence($value)
    {
        return isset($value) ? ucfirst(strtolower($value)) : null;
    }


    /**
     *
     * @return string
     */
    public static function limitCharacters($text, $limit, $break = true)
    {
        $tamanho = strlen($text);
        if ($tamanho <= $limit) {
            $newText = $text;
        } else {
            if ($break == true) {
                $newText = trim(substr($text, 0, $limit)) . '...';
            } else {
                $ultimo_espaco = strrpos(substr($text, 0, $limit), ' ');
                $newText = trim(substr($text, 0, $ultimo_espaco)) . '...';
            }
        }
        return $newText;
    }
}
