<?php

namespace App\Http\Controllers;

use App\Models\WoodEntry;


use Illuminate\Http\Request;

class WoodEntryController extends Controller
{
    public function index()
    {
        return WoodEntry::get();
    }
    public function store(Request $request)
    {
        $d = $request->json()->all();
        $d['data'] = json_encode($d['data']);
        WoodEntry::create($d);
    }
    public function show(WoodEntry $id)
    {
        return view('print_invoice', ['data' => $id->toArray()]);
    }
    public function delete(WoodEntry $id)
    {
        WoodEntry::destroy($id->toArray()['id']);
        return redirect()->back();
    }
    public function update(WoodEntry $id)
    {
        return view('update', ['data' => $id->toArray()]);
    }
    public function update_invoice(Request $res, WoodEntry $id)
    {
        $d = $res->json()->all();
        $data = WoodEntry::find($id->toArray()['id']);
        $data->CompanyName = $d['CompanyName'];
        $data->Address = $d['Address'];
        $data->MobileNumber = $d['MobileNumber'];
        $data->type = $d['type'];
        $data->data = $d['data'];
        $data->DriverName = $d['DriverName'];
        $data->Residences = $d['Residences'];
        $data->VehicleNumber = $d['VehicleNumber'];
        $data->LicenseNumber = $d['LicenseNumber'];
        $data->RTO = $d['RTO'];
        $data->VehicleName = $d['VehicleName'];
        $data->save();
    }
}
