<?php

namespace App\Http\Controllers;

use App\Models\WoodCircle;
use Illuminate\Http\Request;

class WoodCircleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return WoodCircle::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $woodcircle = new WoodCircle;
        $woodcircle->length = $request->length;
        $woodcircle->perimeter = $request->perimeter;
        $woodcircle->qty = $request->qty;
        $woodcircle->save();
        return ['success' => true];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WoodCircle  $woodcircle
     * @return \Illuminate\Http\Response
     */
    public function show(WoodCircle $woodcircle)
    {
        return $woodcircle;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WoodCircle  $woodcircle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WoodCircle $woodcircle)
    {
        $woodcircle->length = $request->length;
        $woodcircle->perimeter = $request->perimeter;
        $woodcircle->qty = $request->qty;
        $woodcircle->save();
        return ['success' => true];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WoodCircle  $woodcircle
     * @return \Illuminate\Http\Response
     */
    public function destroy(WoodCircle $woodcircle)
    {
        $woodcircle->delete();
        return ['success' => true];
    }
}
