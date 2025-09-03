<?php

namespace Sysvale\Helpers;

class Mask
{
    /**
    * @param string $value
    * @return string
    */
    public static function bank($value)
    {
        if (strlen($value) <= 1) {
            return $value;
        }

        $last_digit = $value[strlen($value) - 1];
        $value[strlen($value) - 1] = '-';
        $value .= $last_digit;
        return $value;
    }

    /**
    * @param string $value
    * @return string|null
    */
    public static function cpf($value)
    {
        $value = preg_replace('/\D/', '', $value);
        if (strlen($value) < 11) {
            return null;
        }
        return vsprintf("%s%s%s.%s%s%s.%s%s%s-%s%s", str_split($value));
    }

    /**
    * @param string $value
    * @return string|null
    */
    public static function cns($value)
    {
        $value = preg_replace('/\D/', '', $value);
        if (strlen($value) < 15) {
            return null;
        }
        return vsprintf("%s%s%s %s%s%s%s %s%s%s%s %s%s%s%s", str_split($value));
    }

    /**
    * @param string  $value
    * @return string|string[]|null
    */
    public static function unMaskCpf($value)
    {
        $value = preg_replace('/\D/', '', $value);
        return $value;
    }

    /**
    * @param string  $value
    * @param bool $field
    * @return string|null
    */
    public static function phone($value, $field = false)
    {
        $value = preg_replace('/\D/', '', $value);
        if (strlen($value) == 10) {
            return vsprintf("(%s%s) %s%s%s%s-%s%s%s%s", str_split($value));
        }

        if (strlen($value) == 11) {
            return vsprintf("(%s%s) %s%s%s%s%s-%s%s%s%s", str_split($value));
        }

        if ($field) {
            return "(___) ______-______";
        }

        return null;
    }

    /**
    * @param float $value
    * @return string
    */
    public static function money($value)
    {
        return number_format($value, 2, ',', '.');
    }

    /**
    * @param string $value
    * @return string|null
    */
    public static function cep($value)
    {
        $value = preg_replace('/\D/', '', $value);

        if (strlen($value) == 8) {
            return vsprintf("%s%s%s%s%s-%s%s%s", str_split($value));
        }

        return null;
    }

    /**
    * @param string $value
    * @return string|null
    */
    public static function cnpj($value)
    {
        $value = preg_replace('/\D/', '', $value);

        if (strlen($value) == 14) {
            return vsprintf("%s%s.%s%s%s.%s%s%s/%s%s%s%s-%s%s", str_split($value));
        }

        return null;
    }
}