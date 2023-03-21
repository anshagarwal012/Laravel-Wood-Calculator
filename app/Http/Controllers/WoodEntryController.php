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
}
