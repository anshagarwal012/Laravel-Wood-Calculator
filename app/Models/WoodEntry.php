<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WoodEntry extends Model
{
    use HasFactory;
    protected $fillable = [
        "CompanyName", "Address", "MobileNumber", "type", "data", "DriverName", "Residences", "VehicleNumber", "LicenseNumber", "RTO", "VehicleName"
    ];
}
