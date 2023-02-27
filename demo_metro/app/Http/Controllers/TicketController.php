<?php

namespace App\Http\Controllers;

use App\Http\Resources\TicketResource;
use App\Models\RouteModel;
use App\Models\StationModel;
use App\Models\TicketModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class TicketController extends Controller
{
    function findByPhoneAPI(Request $request)
    {
        if ($request->has('phone')) {
            $phone = $request->input('phone');
            if (preg_match("/(84|0[3|5|7|8|9])([0-9]{8})/", $phone)) {
                $result = TicketModel::wherePhoneNumber($phone);
                if (count($result)) {
                    return TicketResource::collection($result);
                } else {
                    return response(null, 204);
                }
            }
        }
        return response(null, 400);
    }

    function bookTicket(Request $request)
    {
        if ($this->validateRequestBookTicket($request)) {
            return response(null, 400);
        }

        /**
         * kiểm tra số lượng ghế đặt và số lượng ghế còn trống
         */
        $route  = RouteModel::find($request->route);
        $count = $request->count;
        if (!$route && $route->blank < $count) {
            return response(null, 400);
        }

        /**
         * kiểm tra ga tồn tại và không trùng
         */
        $station_start = StationModel::find($request->station_start);
        $station_end = StationModel::find($request->station_end);
        if (!$station_end && !$station_start) {
            return response(null, 400);
        }

        if(!$this->checkStionsInRoute($station_start ,$route) || !$this->checkStionsInRoute($station_end ,$route)){
            return response(null,400);

        }

        $total = $this->getTotal($station_start,$station_end,$route);

        $route->blank -= $count;
        $route->save();
        try {
            TicketModel::create([
                'phone' => $request->phone,
                'station_id_start' => $request->station_start,
                'station_id_end' => $request->station_end,
                'total' => $total,
                'route_id' => $request->route,
                'count' => $count
            ]);
            return  response("Success",201);
        } catch (Exception $e) {
            return  response($e->getMessage(),417);
        }
    }

    /**
     * kiểm tra request hợp lệ
     */
    private function validateRequestBookTicket(Request $request)
    {
        $result = ($request->has('phone') && $request->phone != '' && preg_match("/(84|0[3|5|7|8|9])([0-9]{8})/", $request->phone) &&
        $request->has('station_start') && $request->station_start != '' &&
        $request->has('station_end') && $request->station_end != '' &&
        $request->has('route') && $request->route != '' &&
        $request->has('count')) && $request->count != '';
        return !$result;
    }

    /***
     * kiểm tra ga trong tuyến
     */
    private function checkStionsInRoute(StationModel $station, RouteModel $route)
    {
        $result = false;
        foreach ($route->stations()  as $stationInRoute) {
            if ($stationInRoute->station_id == $station->station_id) {
                $result = true;
                break;
            }
        }
        return $result;
    }

    /**
     * tính tổng tiền
     */
    private function getTotal(StationModel $station_start,StationModel $station_end,RouteModel $route){
        $length = $station_end->orderRoute($route->route_id) - $station_start->orderRoute($route->route_id) + 1;
        $total = $route->min_cost;
        if ($length > ceil($route->length / 2)) {
            $total += ($length - ceil($route->length / 2)) * $route->cost;
        }
        return $total;
    }
}
