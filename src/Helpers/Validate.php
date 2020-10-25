<?php

namespace Sysvale\Helpers;

class Validate
{
    /**
     * @param string $cpf
     * @return bool
     */
    public static function isValidCpf($cpf)
    {
        $invalid_cpf_arr = [
            '00000000000',
            '11111111111',
            '22222222222',
            '33333333333',
            '44444444444',
            '55555555555',
            '66666666666',
            '77777777777',
            '88888888888',
            '99999999999'
        ];

        $cpf = preg_replace('/\D/', '', $cpf);

        if (strlen($cpf) != 11 || in_array($cpf, $invalid_cpf_arr)) {
            return false;
        } else {
            for ($t = 9; $t < 11; $t++) {
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf[$c] * (($t + 1) - $c);
                }

                $d = ((10 * $d) % 11) % 10;

                if ($cpf[$c] != $d) {
                    return false;
                }
            }

            return true;
        }
    }

    /**
     * @param string $cnpj
     * @return bool
     */
    public static function isValidCnpj($cnpj)
    {
        $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);

        if (strlen($cnpj) != 14) {
            return false;
        }

        if (preg_match('/(\d)\1{13}/', $cnpj)) {
            return false;
        }

        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
            $soma += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        if ($cnpj{12} != ($resto < 2 ? 0 : 11 - $resto)) {
            return false;
        }

        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
            $soma += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;
        return $cnpj{13} == ($resto < 2 ? 0 : 11 - $resto);
    }

    /**
     * @param string $phone only numbers
     * @return bool
     */
    public static function isValidPhone($phone)
    {
        return !!preg_match(
            '/^((1[1-9])|([2-9][0-9]))(([2345][0-9]{3}[0-9]{4})|(9[6789][0-9]{3}[0-9]{4}))$/',
            $phone
        );
    }

    /**
     * @param string $phone only numbers
     * @return bool
     */
    public static function isValidResidentialPhone($phone)
    {
        return !!preg_match(
            '/^((1[1-9])|([2-9][0-9]))(([2345][0-9]{3}[0-9]{4}))$/',
            $phone
        );
    }

    /**
     * @param string $phone only numbers
     * @return bool
     */
    public static function isValidMobilePhone($phone)
    {
        return !!preg_match(
            '/^((1[1-9])|([2-9][0-9]))((9[6789][0-9]{3}[0-9]{4}))$/',
            $phone
        );
    }

}
