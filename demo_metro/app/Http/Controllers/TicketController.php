<?php

namespace App\Http\Controllers;

use App\Http\Resources\TicketResource;
use App\Models\TicketModel;
use Illuminate\Http\Request;

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
}
