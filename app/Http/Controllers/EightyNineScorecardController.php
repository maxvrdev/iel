<?php

namespace App\Http\Controllers;

use App\Services\NumberChain;
use Illuminate\Http\Request;

class EightyNineScorecardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(NumberChain $numberChain)
    {
        return view('89-score.index', [
            'obj' => $numberChain,
            'default' => 1000
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, NumberChain $numberChain)
    {

        return view('89-score.index', [
            'obj' => $numberChain,
            'default' => 1000,
            'answer' => $numberChain->numChainScore($request->input('custom_start_number'))
        ]);
    }


}
