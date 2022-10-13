<?php

namespace Sysvale\Helpers;

class Dates
{
    /**
     * @param int $week_day_number
     * @return string
     */
    public static function getWeekDayNamePtBr($week_day_number)
    {
        $days = [
            1 => "Segunda-feira",
            2 => "Terça-feira",
            3 => "Quarta-feira",
            4 => "Quinta-feira",
            5 => "Sexta-feira",
            6 => "Sábado",
            7 => "Domingo",
        ];

        return $days[$week_day_number];
    }

    /**
     * @param int $value
     * @return string
     */
    public static function getMonthNamePtBr($value)
    {
        $months = [
            1 => 'Janeiro',
            2 => 'Fevereiro',
            3 => 'Março',
            4 => 'Abril',
            5 => 'Maio',
            6 => 'Junho',
            7 => 'Julho',
            8 => 'Agosto',
            9 => 'Setembro',
            10 => 'Outubro',
            11 => 'Novembro',
            12 => 'Dezembro',
        ];

        $value = (int) $value;

        return 1 <= $value && $value <= 12 ? $months[$value] : '';
    }

    /**
     * @param string $date
     * @return array|string
     * @throws \Exception
     */
    public static function parsePtDateToIsoDateFormat($date)
    {
        $fDate = explode('/', $date);

        if (count($fDate) < 3) {
            return null;
        } else {
            if (strlen($fDate[2]) < 4) {
                if (intval($fDate[2]) > 30) {
                    $fDate[2] = '19' . $fDate[2];
                } else {
                    $fDate[2] = '20' . $fDate[2];
                }
            }

            $fDate = (new \DateTime($fDate[2] . '-' . $fDate[1] . '-' . $fDate[0]))->format('Y-m-d');
        }

        return $fDate;
    }
}