<?php

namespace Sysvale;

use Sysvale\Helpers\Dates;
use Sysvale\Helpers\Mask;
use Sysvale\Helpers\Validate;

class Helpers
{
    /**
     * @param string $value
     * @return string
     */
    public static function maskBank($value)
    {
        return Mask::bank($value);
    }

    /**
     * @param string $value
     * @return string|null
     */
    public static function maskCpf($value)
    {
        return Mask::cpf($value);
    }

    /**
     * @param string  $value
     * @return string|string[]|null
     */
    public static function unMaskCpf($value)
    {
        return Mask::unMaskCpf($value);
    }

    /**
     * @param string  $value
     * @param bool $field
     * @return string|null
     */
    public static function maskPhone($value, $field = false)
    {
        return Mask::phone($value, $field);
    }

    /**
     * @param float $value
     * @return string
     */
    public static function maskMoney($value)
    {
        return Mask::money($value);
    }

    /**
     * @param string $value
     * @return string|null
     */
    public static function maskCep($value)
    {
        return Mask::cep($value);
    }

    /**
     * @param string $value
     * @return string|null
     */
    public static function maskCnpj($value)
    {
        return Mask::cnpj($value);
    }

    /**
     * @param string $str
     * @return string|string[]|null
     */
    public static function trimpp($str)
    {
        return preg_replace('/\s+/', ' ', trim($str));
    }

    /**
     * Exceptions in lower case are words you don't want converted
     * Exceptions all in upper case are any words you don't want converted to title case
     * but should be converted to upper case, e.g.:
     * king henry viii or king henry Viii should be King Henry VIII
     *
     * @param string $string
     * @param string[] $delimiters
     * @param string[] $exceptions
     * @return string
     */
    public static function titleCase(
        $string,
        $delimiters = [' ', '-', '.', '\'', 'O\'', 'Mc'],
        $exceptions = [
            'da',
            'das',
            'de',
            'do',
            'dos',
            'e',
            'o',
            'and',
            'to',
            'of',
            'ou',
            'no',
            'com',
            'em',
            'sem',
            'I',
            'II',
            'III',
            'IV',
            'V',
            'VI',
        ]
    ) {
        $string = mb_convert_case($string, MB_CASE_TITLE, "UTF-8");
        foreach ($delimiters as $dlnr => $delimiter) {
            $words = explode($delimiter, $string);

            $newwords = array();

            foreach ($words as $wordnr => $word) {
                if (in_array(mb_strtoupper($word, "UTF-8"), $exceptions)) {
                    // check exceptions list for any words that should be in upper case
                    $word = mb_strtoupper($word, "UTF-8");
                } elseif (in_array(mb_strtolower($word, "UTF-8"), $exceptions)) {
                    // check exceptions list for any words that should be in upper case
                    $word = mb_strtolower($word, "UTF-8");
                } elseif (!in_array($word, $exceptions)) {
                    // convert to uppercase (non-utf8 only)
                    $word = ucfirst($word);
                }

                array_push($newwords, $word);
            }

            $string = join($delimiter, $newwords);
        }//foreach

        return $string;
    }

    /**
     * @param string $str
     * @return string
     */
    public static function firstUpper($str)
    {
        return titleCase($str);
    }

    /**
     * @param string $url
     * @return string string
     */
    public static function urlNoCache($url)
    {
        return "$url?_=". time();
    }

    /**
     * @param string $date
     * @return array|string
     * @throws \Exception
     */
    public static function ptDate2IsoDate($date)
    {
        return Dates::parsePtDateToIsoDateFormat($date);
    }

    /**
     * @param string $value
     * @return mixed|string
     */
    public static function regexAccents($value)
    {
        $value = mb_strtolower($value, 'UTF-8');
        // letras àáâãäåæ
        $value = str_replace(['a', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ'], 'X', $value);
        $value = str_replace('X', '[a|à|á|â|ã|ä|å|æ]', $value);

        // letras èéêëẽ
        $value = str_replace(['e', 'è', 'é', 'ê', 'ẽ'], 'X', $value);
        $value = str_replace('X', '[e|è|é|ê|ẽ]', $value);

        // letras ìíîïĩ
        $value = str_replace(['i', 'ì', 'í', 'î', 'ï', 'ĩ'], 'X', $value);
        $value = str_replace('X', '[i|ì|í|î|ï|ĩ]', $value);

        // letras ðòóôõöø
        $value = str_replace(['o', 'ð', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø'], 'X', $value);
        $value = str_replace('X', '[o|ð|ò|ó|ô|õ|ö|ø]', $value);

        // letras ùúûü
        $value = str_replace(['u', 'ù', 'ú', 'û', 'ü'], 'X', $value);
        $value = str_replace('X', '[u|ù|ú|û|ü]', $value);

        // letras ñ
        $value = str_replace(['n', 'ñ'], 'X', $value);
        $value = str_replace('X', '[n|ñ]', $value);

        // letras ç
        $value = str_replace(['c', 'ç'], 'X', $value);
        $value = str_replace('X', '[c|ç]', $value);

        // letras ýÿ
        $value = str_replace(['y', 'ý', 'ÿ'], 'X', $value);
        $value = str_replace('X', '[y|ý|ÿ]', $value);

        return $value;
    }

    /**
     * @param string|string[] $data
     * @return int|null
     */
    public static function toInt($data)
    {
        if (is_array($data)) {
            $data = count($data) ? $data[0] : '';
        }

        return (isset($data) && strlen(strval($data))) ? intval($data) : null;
    }

    /**
     * @param string|string[] $data
     * @return float|null
     */
    public static function toFloat($data)
    {
        if (is_array($data)) {
            $data = count($data) ? $data[0] : '';
        }

        return (isset($data) && strlen(strval($data))) ? floatval(str_replace(',', '.', $data)) : null;
    }

    /**
     * @param string $d
     * @param string $t
     * @return int
     */
    public static function toTime($d, $t)
    {
        if (strpos($d, '00') === 0) {
            $d = '19' . substr($d, 2);
        }

        if (strlen($t) == 5) {
            $t = "$t:00";
        }

        $time = strlen($d)*strlen($t) ? strtotime("$d $t") : null;

        if ($time > time()) {
            $time = time();
        } elseif ($time < time()-130*365*24*60*60) {
            $time = time()-129*365*24*60*60;
        }

        return $time * 1000;
    }

    /**
     * @param mixed $r
     * @return array|null
     */
    public static function toArray($r)
    {
        return isset($r) ? (array)$r : null;
    }

    /**
     * @param mixed[] $arr
     * @return int[]|null
     */
    public static function toArrayInt($arr)
    {
        $arr = to_array($arr);

        if (!$arr) {
            return null;
        }

        foreach ($arr as $key => $value) {
            $arr[$key] = intval($value);
        }
        return $arr;
    }

    /**
     * @param array|string|bool $d
     * @return bool|mixed|null
     */
    public static function toData($d)
    {
        if (is_array($d)) {
            $d = count($d) ? $d[0] : null;
        }

        $d = ((isset($d) && strlen((string) $d)) || $d === false) ? $d : null;

        $d = ($d === 'true' ? true : $d);

        $d = ($d === 'false' ? false : $d);

        return $d;
    }

    /**
     * @param string|bool $d
     * @return bool|null
     */
    public static function toBool($d)
    {
        if ($d === 'true' || $d === true) {
            return true;
        }

        if ($d === 'false' || $d === false) {
            return false;
        }

        return null;
    }

    /**
     * @param string|bool $d
     * @return bool
     */
    public static function toBoolNotNull($d)
    {
        if ($d === 'true' || $d === true) {
            return true;
        }

        return false;
    }

    /**
     * @param string $name
     * @return string
     */
    public static function removeAccents($name)
    {
        return strtr(
            utf8_decode($name),
            utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'),
            'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY'
        );
    }

    /**
     * @param string $v1
     * @param string $signal
     * @param string $v2
     * @return bool
     */
    public static function compareVersion($v1, $signal, $v2 = '')
    {
        if (empty($v2)) {
            $v2 = $signal;
            $signal = '=';
        }

        $v1 = explode('.', $v1);

        $v2 = explode('.', $v2);

        for ($i=0; $i < 3; $i++) {
            $n1 = (int) preg_replace('/\D/', '', isset($v1[$i]) && !empty($v1[$i]) ? $v1[$i] : 0);
            $n2 = (int) preg_replace('/\D/', '', isset($v2[$i]) && !empty($v2[$i]) ? $v2[$i] : 0);

            switch ($signal) {
                case '=':
                case '==':
                    if ($n1 != $n2) {
                        return false;
                    }

                    break;
                case '<':
                    if ($n1 < $n2) {
                        return true;
                    }

                    if ($i < 2 && $n1 == $n2) {
                        break;
                    } elseif ($n1 >= $n2) {
                        return false;
                    }

                    break;
                case '>':
                    if ($n1 > $n2) {
                        return true;
                    }

                    if ($i < 2 && $n1 == $n2) {
                        break;
                    } elseif ($n1 <= $n2) {
                        return false;
                    }

                    break;
            }
        }
        return true;
    }

    /**
     * @param int $value
     * @return string
     */
    public static function monthPt($value)
    {
        return Dates::getMonthNamePtBr($value);
    }

    /**
     * @param string $str
     * @return string
     */
    public static function removeCrassLetters($str)
    {
        $search = ['à', 'è', 'ì', 'ò', 'ù', 'À', 'È', 'Ì', 'Ò', 'Ù'];
        $replace = ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'];
        return str_replace($search, $replace, $str);
    }

    /**
     * @param string $cpf
     * @return bool
     */
    public static function validateCpf($cpf)
    {
        return Validate::isValidCpf($cpf);
    }

    /**
     * @param string $cnpj
     * @return bool
     */
    public function validateCNPJ($cnpj)
    {
        return Validate::isValidCnpj($cnpj);
    }

    /**
     * @param string $phone
     * @return bool
     */
    public function validatePhone($phone)
    {
        return Validate::isValidPhone($phone);
    }

    /**
     * @param string $phone
     * @return bool
     */
    public function validateResidentialPhone($phone)
    {
        return Validate::isValidResidentialPhone($phone);
    }

    /**
     * @param string $phone
     * @return bool
     */
    public function validateMobilePhone($phone)
    {
        return Validate::isValidMobilePhone($phone);
    }

    /**
     * @param int $week_day_number
     * @return string
     */
    public static function weekDay($week_day_number)
    {
        return Dates::getWeekDayNamePtBr($week_day_number);
    }

    /**
     * @param string $str
     * @param string $separator
     * @param int $n
     * @return string
     */
    public static function getNFirstWords($str, $separator, $n)
    {
        $statement = explode($separator, $str);

        $out_str = '';

        if (count($statement) == 1) {
            return $statement[0];
        }

        for ($i = 0; $i < $n; $i++) {
            if ($i == $n - 1) {
                $out_str .= $statement[$i];
            } else {
                $out_str .= $statement[$i] . ' ';
            }
        }

        return $out_str;
    }
}
