<?php
namespace App\Helpers;

class DateHelper
{

    /**
     * Melakukan pengecekan tanggal, apakah tanggal yang dimasukkan merupakan salah satu
     * tanggal pada sebuah interval tanggal.
     *
     * @param String $date, $dateFrom, $dateTo
     * @return boolean $result
     */
    public static function isDateFromTheInterval($date, $dateFrom, $dateTo){
        $from = date_create($dateFrom);
        $to = date_create($dateTo);

        $dateDiff = $to->diff($from)->format("%a")+1;

        $result = false;

        for($i = 0; $i < $dateDiff; $i++){
            $currDate = date_format($from, 'Y-m-d');

            if($currDate == $date){
                return true;
                break;
            }

            date_add($from, date_interval_create_from_date_string('1 days'));
        }
    }

    public static function now_without_hours(){
        return date('Y-m-d');
    }

    public static function now_with_hours(){
        return date('Y-m-d H:i:s');
    }

    public static function is_valid_start_time_booking($start_time_booking){
        $start_time_booking_time = strtotime($start_time_booking);
        $now_time = strtotime(date('H:i'));
        return $start_time_booking_time <= $now_time;
    }

    public static function is_valid_end_time_booking($end_time_booking){
        $end_time_booking_time = strtotime($end_time_booking);
        $now_time = strtotime(date('H:i'));
        return $end_time_booking_time > $now_time;
    }

    public static function now_hours(){
        return date('H:i');
    }
}
