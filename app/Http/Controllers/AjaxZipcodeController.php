<?php

namespace App\Http\Controllers;

use App\Services\CalculateDistance;
use Illuminate\Http\Request;

class AjaxZipcodeController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, CalculateDistance $calculateDistance)
    {
        $latitude1 = $request->post('start_latitude');
        $longitude1 = $request->post('start_longitude');
        $latitude2 = $request->post('dest_latitude');
        $longitude2 = $request->post('dest_longitude');

        $distance_km = $calculateDistance->getDistance($latitude1, $longitude1, $latitude2, $longitude2, 'km');
        $distance_mi = $calculateDistance->getDistance($latitude1, $longitude1, $latitude2, $longitude2, 'mi');

        return response()->json([
            'distance_km' => $distance_km,
            'distance_mi' => $distance_mi,
        ]);

    }
}
