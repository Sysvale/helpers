<?php

namespace Sysvale\Helpers;

use Carbon\Carbon;

class Dates
{
    /**
     * @param int $week_day_number
     * @return string
     */
    public static function getWeekDayNamePtBr($week_day_number)
    {
        return ucfirst(
            Carbon::now()
                ->startOfWeek(Carbon::MONDAY)
                ->addDays($week_day_number - 1)
                ->locale('pt_BR')
                ->translatedFormat('l')
        );
    }

    /**
     * @param int $value
     * @return string
     */
    public static function getMonthNamePtBr($value)
    {
        $value = (int) $value;

        return 1 <= $value && $value <= 12
            ? ucfirst(Carbon::create(2023, $value, 1)->locale('pt_BR')->translatedFormat('F'))
            : '';
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
        }

        if (strlen($fDate[2]) < 4) {
            if (intval($fDate[2]) > 30) {
                $fDate[2] = '19' . $fDate[2];
            } else {
                $fDate[2] = '20' . $fDate[2];
            }
        }

        try {
            return Carbon::createFromFormat('Y-m-d', $fDate[2] . '-' . $fDate[1] . '-' . $fDate[0])->format('Y-m-d');
        } catch (\Exception $e) {
            return null;
        }
    }
}
