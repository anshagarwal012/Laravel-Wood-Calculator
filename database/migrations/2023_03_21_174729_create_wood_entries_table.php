<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wood_entries', function (Blueprint $table) {
            $table->id();
            $table->string('CompanyName')->nullable();
            $table->string('Address')->nullable();
            $table->string('MobileNumber')->nullable();
            $table->string('type')->nullable();
            $table->string('data')->nullable();
            $table->string('DriverName')->nullable();
            $table->string('Residences')->nullable();
            $table->string('VehicleNumber')->nullable();
            $table->string('LicenseNumber')->nullable();
            $table->string('RTO')->nullable();
            $table->string('VehicleName')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wood_entries');
    }
};
