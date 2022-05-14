<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SlotsConfigModel;
use App\Models\UnavailableDatesModel;
use App\Models\BookingModel;
use App\Helpers\CustomHelper;
use Validator;

class SlotsManageController extends Controller
{

    public function index()
    {
        $slotsConfigData = SlotsConfigModel::select(['no_of_day', 'available_start_time', 'available_end_time', 'unavailable_start_time',
             'unavailable_end_time'])
            ->get();

        if (!empty($slotsConfigData)) {
            $slotsConfigData = $slotsConfigData->toArray();
            $slotsConfigData = array_column($slotsConfigData, null, 'no_of_day');
        }

        return view('available-slot', compact('slotsConfigData'));
    }

    public function unavailbleSlots()
    {
        $slotsConfigData = SlotsConfigModel::select(['no_of_day', 'available_start_time', 'available_end_time', 'unavailable_start_time', 
            'unavailable_end_time'])
            ->get();
        if (!empty($slotsConfigData)) {
            $slotsConfigData = $slotsConfigData->toArray();
            $slotsConfigData = array_column($slotsConfigData, null, 'no_of_day');
        }

        return view('unavailable-slot', compact('slotsConfigData'));
    }

    public function unavailbleDates()
    {
        $unavailableDatesData = UnavailableDatesModel::pluck('unavailable_date');

        return view('unavailable-date', compact('unavailableDatesData'));
    }

    /**
     * save available slots.
     *
     * @param  obj  $request
     * @return json
     */
    public function saveAvailableSlots(Request $request)
    {
        try {
            $params = $request->all();
            unset($params['_token']);
            if (empty($params)) {
                return $this->responseError("Error: Invalid Request");
            }

            foreach ($params as $dayNo => $detail) {
                $startTime = (isset($detail['start']) && !empty($detail['start'])) ? date("H:i", strtotime($detail['start'])) : null;
                $endTime   = (isset($detail['end']) && !empty($detail['end'])) ? date("H:i", strtotime($detail['end'])) : null;
                SlotsConfigModel::updateOrInsert(
                    ['no_of_day' => $dayNo],
                    ['available_start_time' => $startTime, 'available_end_time' => $endTime],
                );
            }

            return $this->responseSuccess([], 'Record Save Successfully');
        } catch(\Exception $e) {
            return $this->responseError("Error: ".$e->getMessage());
        }
    }

    /**
     * save unavailable slots.
     *
     * @param  obj  $request
     * @return json
     */
    public function saveUnavailableSlots(Request $request)
    {
        try {
            $params = $request->all();
            unset($params['_token']);
            if (empty($params)) {
                return $this->responseError("Error: Invalid Request");
            }

            foreach ($params as $dayNo => $detail) {
                $startTime = (isset($detail['start']) && !empty($detail['start'])) ? date("H:i", strtotime($detail['start'])) : null;
                $endTime   = (isset($detail['end']) && !empty($detail['end'])) ? date("H:i", strtotime($detail['end'])) : null;
                SlotsConfigModel::updateOrInsert(
                    ['no_of_day' => $dayNo],
                    ['unavailable_start_time' => $startTime, 'unavailable_end_time' => $endTime],
                );
            }

            return $this->responseSuccess([], 'Record Save Successfully');
        } catch(\Exception $e) {
            return $this->responseError("Error: ".$e->getMessage());
        }
    }

    /**
     * save unavailable date.
     *
     * @param  obj  $request
     * @return json
     */
    public function saveUnavailableDates(Request $request)
    {
        try {
            $params          = $request->all();
            $unavailbleDates = isset($params['unvailable_date']) ? $params['unvailable_date'] : [];
            $unavailbleDates = array_unique($unavailbleDates);
            $unavailbleDates = array_filter($unavailbleDates);
            UnavailableDatesModel::getQuery()->delete();

            $unavailableDatesData = [];
            if (!empty($unavailbleDates)) {
                foreach ($unavailbleDates as $date) {
                    $date = str_replace('/', '-', $date);
                    $unavailableDatesData[]['unavailable_date'] = date("Y-m-d", strtotime($date));
                }
            }
            !empty($unavailableDatesData) && UnavailableDatesModel::insert($unavailableDatesData);

            return $this->responseSuccess([], 'Record Save Successfully');
        } catch(\Exception $e) {
            return $this->responseError("Error: ".$e->getMessage());
        }
    }

    public function bookingSlots()
    {
        return view('booking-slots');
    }

    /**
     * Get Booking available slots.
     *
     * @param  obj  $request
     * @return json
     */
    public function getBookableSlots(Request $request)
    {
        try {
            $params = $request->all();
            $validator = Validator::make($params, [
                'date' => 'required|date_format:Y-m-d',
            ]);

            if ($validator->fails()) {
                return $this->responseError(implode(",", $validator->errors()->all()), [], 'quality');
            }

            $date                = $params['date'];
            $dateUnailableStatus = UnavailableDatesModel::where('unavailable_date', $date)->exists();
            if ($dateUnailableStatus) {
                return $this->responseSuccess([]);
            }

            $dayNo           = CustomHelper::getDayNo($date);
            $slotsConfigData = SlotsConfigModel::select(['no_of_day', 'available_start_time', 'available_end_time', 'unavailable_start_time', 'unavailable_end_time'])
                ->where('no_of_day', $dayNo)
                ->first();

            if (empty($slotsConfigData) || empty($slotsConfigData->available_start_time) || empty($slotsConfigData->available_end_time)) {
                return $this->responseSuccess([]);
            }

            $availableSlots   = CustomHelper::SplitTime($slotsConfigData->available_start_time, $slotsConfigData->available_end_time);
            $unavailableSlots = CustomHelper::SplitTime($slotsConfigData->unavailable_start_time, $slotsConfigData->unavailable_end_time);
            if(empty($availableSlots)) {
                return $this->responseSuccess([]);
            }

            $bookingData = BookingModel::select('timeSlot')->where('date', $date)->pluck('timeSlot');
            $bookedData  = [];
            if(!empty($bookingData)) {
                foreach ($bookingData as $bookingDetail) {
                    $bookedData[] = date ("G:i", strtotime($bookingDetail));
                }
            }

            $finalAvailableSlots = [];
            foreach ($availableSlots as $availableSlotDetail) {
                if (!in_array($availableSlotDetail, $unavailableSlots) && !in_array($availableSlotDetail, $bookedData)) {
                    $finalAvailableSlots[$availableSlotDetail] = $availableSlotDetail."-".date("G:i", strtotime($availableSlotDetail) + 60*60);
                }

            }

            return $this->responseSuccess($finalAvailableSlots, 'Record fetch Successfully');
        } catch(\Exception $e) {
            return $this->responseError("Error: ".$e->getMessage());
        }
    }

    /**
     * Save Booking slots.
     *
     * @param  obj  $request
     * @return json
     */
    public function saveBookableSlots(Request $request)
    {
        try {
            $params    = $request->all();
            $validator = Validator::make($params, [
                'date' => 'required|date_format:Y-m-d',
                'time_slots' => 'required|array',
            ]);

            if ($validator->fails()) {
                return $this->responseError(implode(",", $validator->errors()->all()), [], 'quality');
            }

            $timeSlots = isset($params['time_slots']) ? $params['time_slots'] : [];
            if (empty($timeSlots)) {
                return $this->responseError("Please select at least one time slots.");
            }

            $bookingSlots = [];
            foreach ($timeSlots as $slot) {
                $bookingSlots[] = [
                    'date'     => $params['date'],
                    'timeSlot' => $slot,
                ];
            }
            BookingModel::insert($bookingSlots);

            return $this->responseSuccess([], 'Record Save Successfully');
        } catch(\Exception $e) {
            return $this->responseError("Error: ".$e->getMessage());
        }
    }


}
