<?php

namespace App\Http\Controllers;

use App\Models\Wood;
use Illuminate\Http\Request;

class WoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Wood::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $wood = new Wood;
        $wood->length = $request->length;
        $wood->breath = $request->breath;
        $wood->height = $request->height;
        $wood->qty = $request->qty;
        $wood->save();
        return ['success' => true];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wood  $wood
     * @return \Illuminate\Http\Response
     */
    public function show(Wood $wood)
    {
        return $wood;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wood  $wood
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wood $wood)
    {
        $wood->length = $request->length;
        $wood->breath = $request->breath;
        $wood->height = $request->height;
        $wood->qty = $request->qty;
        $wood->save();
        return ['success' => true];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wood  $wood
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wood $wood)
    {
        $wood->delete();
        return ['success' => true];
    }
}
