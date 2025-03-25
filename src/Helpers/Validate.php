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
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        if ($cnpj[12] != ($resto < 2 ? 0 : 11 - $resto)) {
            return false;
        }

        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;
        return $cnpj[13] == ($resto < 2 ? 0 : 11 - $resto);
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

    /**
     * @param string $cns only string
     * @return bool
     */
    public static function isValidCns($cns)
    {
        $cns = preg_replace('/\D/', '', $cns);

        if (strlen($cns) != 15) {
            return false;
        }

        $first = (int) $cns[0];

        if (in_array($first, [7, 8, 9])) {
            return Validate::validate_cns_tmp($cns);
        }

        if (in_array($first, [1, 2])) {
            return Validate::validate_cns_fixed($cns);
        }
        return false;
    }

    private static function validate_cns_fixed($cns)
    {
        $pis = substr($cns, 0, 11);

        $soma = (((substr($pis, 0, 1)) * 15) +
            ((substr($pis, 1, 1)) * 14) +
            ((substr($pis, 2, 1)) * 13) +
            ((substr($pis, 3, 1)) * 12) +
            ((substr($pis, 4, 1)) * 11) +
            ((substr($pis, 5, 1)) * 10) +
            ((substr($pis, 6, 1)) * 9) +
            ((substr($pis, 7, 1)) * 8) +
            ((substr($pis, 8, 1)) * 7) +
            ((substr($pis, 9, 1)) * 6) +
            ((substr($pis, 10, 1)) * 5));

        $resto = fmod($soma, 11);
        $dv = 11 - $resto;
        if ($dv == 11) {
            $dv = 0;
        }
        if ($dv == 10) {
            $soma = ((((substr($pis, 0, 1)) * 15) +
                ((substr($pis, 1, 1)) * 14) +
                ((substr($pis, 2, 1)) * 13) +
                ((substr($pis, 3, 1)) * 12) +
                ((substr($pis, 4, 1)) * 11) +
                ((substr($pis, 5, 1)) * 10) +
                ((substr($pis, 6, 1)) * 9) +
                ((substr($pis, 7, 1)) * 8) +
                ((substr($pis, 8, 1)) * 7) +
                ((substr($pis, 9, 1)) * 6) +
                ((substr($pis, 10, 1)) * 5)) + 2);

            $resto = fmod($soma, 11);
            $dv = 11 - $resto;
            $resultado = $pis . '001' . $dv;
        } else {
            $resultado = $pis . '000' . $dv;
        }

        return $cns === $resultado;
    }

    private static function validate_cns_tmp($cns)
    {
        $soma = (((substr($cns, 0, 1)) * 15) +
            ((substr($cns, 1, 1)) * 14) +
            ((substr($cns, 2, 1)) * 13) +
            ((substr($cns, 3, 1)) * 12) +
            ((substr($cns, 4, 1)) * 11) +
            ((substr($cns, 5, 1)) * 10) +
            ((substr($cns, 6, 1)) * 9) +
            ((substr($cns, 7, 1)) * 8) +
            ((substr($cns, 8, 1)) * 7) +
            ((substr($cns, 9, 1)) * 6) +
            ((substr($cns, 10, 1)) * 5) +
            ((substr($cns, 11, 1)) * 4) +
            ((substr($cns, 12, 1)) * 3) +
            ((substr($cns, 13, 1)) * 2) +
            ((substr($cns, 14, 1)) * 1));
        $resto = fmod($soma, 11);

        return $resto == 0;
    }

    public static function isValidPisPasep(string $value): bool
    {
        $number = preg_replace('/\D/', '', $value);

        if (strlen($number) !== 11 || preg_match('/^(\d)\1{10}$/', $number)) {
            return false;
        }

        $digits = str_split($number);
        $weights = [3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
        $sum = array_sum(array_map(fn($d, $w) => $d * $w, array_slice($digits, 0, 10), $weights));

        $calculated_verification_digit =  ($sum % 11) < 2 ? 0 : (11 - $sum % 11);

        $given_verification_digit = (int) $digits[10];

        return $given_verification_digit === $calculated_verification_digit;
    }
}
