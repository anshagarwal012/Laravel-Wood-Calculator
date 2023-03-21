@extends('main')
@section('title', 'Add Invoice')
@section('content')
    <div class="nk-block nk-block-lg">
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                <div class="preview-block"><span class="preview-title-lg overline-title">Add Invoice</span>
                    <div class="row gy-4">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="CompanyName" class="form-label">Company Name</label>
                                <div class="form-control-wrap">
                                    <input type="text" id="CompanyName" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="Address" class="form-label">Address</label>
                                <div class="form-control-wrap">
                                    <input type="text" id="Address" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="MobileNumber" class="form-label">Mobile Number</label>
                                <div class="form-control-wrap">
                                    <input type="number" id="MobileNumber" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 align-self-center text-center">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    Type :
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" value="cut_size" name="wood"
                                    id="cut_size" checked>
                                <label class="form-check-label" for="cut_size">
                                    Cut Size
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" value="cwood" name="wood" id="cwood">
                                <label class="form-check-label" for="cwood">
                                    Circle Wood
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row cutsize my-4">
                        <div class="col-sm-3"><input type="number" class="form-control width" placeholder="width"></div>
                        <div class="col-sm-3"><input type="number" class="form-control thick" placeholder="thick"></div>
                        <div class="col-sm-3"><input type="number" class="form-control length" placeholder="length"></div>
                        <div class="col-sm-2"><input type="number" class="form-control quantity" placeholder="quantity">
                        </div>
                        <div class="col-sm-1"><button class="btn btn-primary add_more">+</button></div>
                    </div>
                    <div class="row circle_wood my-4">
                        <div class="col-sm-4"><input type="number" class="form-control length" placeholder="length"></div>
                        <div class="col-sm-4"><input type="number" class="form-control perimeter" placeholder="perimeter">
                        </div>
                        <div class="col-sm-3"><input type="number" class="form-control quantity" placeholder="quantity">
                        </div>
                        <div class="col-sm-1"><button class="btn btn-primary add_more">+</button></div>
                    </div>
                    <div class="card my-4 card-bordered card-preview">
                        <div class="card-inner">
                            <table class="table cutsize">
                                <thead>
                                    <tr>
                                        <th scope="col">Width</th>
                                        <th scope="col">Thick</th>
                                        <th scope="col">Length</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Cuft</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                            <table class="table circle_wood">
                                <thead>
                                    <tr>
                                        <th scope="col">Length</th>
                                        <th scope="col">Perimeter</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Cuft</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>

                    <div class="transport mt-5">
                        <span class="preview-title-lg overline-title">Transporter Details</span>
                        <div class="row">
                            <div class="col-md-4 my-2"><input type="text" class="form-control DriverName"
                                    placeholder="DriverName"></div>
                            <div class="col-md-4 my-2"><input type="text"
                                    class="form-control Residences"placeholder="Residences"></div>
                            <div class="col-md-4 my-2"><input type="text"
                                    class="form-control VehicleNumber"placeholder="VehicleNumber"></div>
                            <div class="col-md-4 my-2"><input type="text"
                                    class="form-control LicenseNumber"placeholder="LicenseNumber"></div>
                            <div class="col-md-4 my-2"><input type="text" class="form-control RTO"placeholder="RTO">
                            </div>
                            <div class="col-md-4 my-2"><input type="text"
                                    class="form-control VehicleName"placeholder="VehicleName"></div>
                            <div class="col-12 text-center"><input type="button" value="submit"
                                    class="btn btn-primary submit_value">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection