<?php
namespace App\Helpers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class CustomHelper {

    public function __construct() {
    }

    /**
     * Get time between start and end time.
     *
     * @param  time  $StartTime (format:G:i)
     * @param  time  $EndTime (format:G:i)
     * @param  int  $Duration (format:Y-m-d)
     * @return array
     */
    public static function SplitTime($StartTime, $EndTime, $Duration="60"){
        $ReturnArray  = [];
        $StartTime    = strtotime ($StartTime); //Get Timestamp
        $EndTime      = strtotime ($EndTime); //Get Timestamp

        $AddMins  = $Duration * 60;

        while ($StartTime < $EndTime) //Run loop
        {
            $ReturnArray[] = date ("G:i", $StartTime);
            $StartTime += $AddMins; //Endtime check
        }

        return $ReturnArray;
    }

    /**
     * Get day no from date.
     *
     * @param  date  $date (format:Y-m-d)
     * @return int
     */
    public static function getDayNo($date)
    {
        $day   = date('D', strtotime($date));
        $dayNo = null;

        switch ($day) {
            case 'Mon':
                $dayNo = 1;
                break;
            case 'Tue':
                $dayNo = 2;
                break;
            case 'Wed':
                $dayNo = 3;
                break;
            case 'Thu':
                $dayNo = 4;
                break;
            case 'Fri':
                $dayNo = 5;
                break;
            case 'Sat':
                $dayNo = 6;
                break;
            case 'Sun':
                $dayNo = 7;
                break;
        }

        return $dayNo;
    }

}
