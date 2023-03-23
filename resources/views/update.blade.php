@extends('main')
@section('title', 'Update Invoice')
@section('content')
    {{-- {{ dd($data) }} --}}
    <div class="nk-block nk-block-lg">
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                <div class="preview-block"><span class="preview-title-lg overline-title">Add Invoice</span>
                    <input type="hidden" id="id" class="form-control" value="{{ $data['id'] }}" required>
                    <div class="row gy-4">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="CompanyName" class="form-label">Company Name</label>
                                <div class="form-control-wrap">
                                    <input type="text" id="CompanyName" class="form-control"
                                        value="{{ $data['CompanyName'] }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="Address" class="form-label">Address</label>
                                <div class="form-control-wrap">
                                    <input type="text" id="Address" class="form-control" value="{{ $data['Address'] }}"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="MobileNumber" class="form-label">Mobile Number</label>
                                <div class="form-control-wrap">
                                    <input type="number" id="MobileNumber" class="form-control"
                                        value="{{ $data['MobileNumber'] }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 align-self-center text-center">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">Type :</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" value="cut_size" name="wood"
                                    id="cut_size" {{ $data['type'] == 'cut_size' ? 'checked' : '' }}>
                                <label class="form-check-label" for="cut_size">Cut Size</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" value="cwood" name="wood"
                                    {{ $data['type'] == 'cwood' ? 'checked' : '' }} id="cwood">
                                <label class="form-check-label" for="cwood">
                                    Circle Wood
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row cutsize my-4 align-items-end">
                        <div class="col-sm-3"><input type="checkbox" class="fixed"><input type="number"
                                class="form-control width" placeholder="width"></div>
                        <div class="col-sm-3"><input type="checkbox" class="fixed"><input type="number"
                                class="form-control thick" placeholder="thick"></div>
                        <div class="col-sm-3"><input type="checkbox" class="fixed"><input type="number"
                                class="form-control length" placeholder="length"></div>
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
                            <table class="table">
                                <thead class="cutsize">
                                    <tr>
                                        <th scope="col">Width</th>
                                        <th scope="col">Thick</th>
                                        <th scope="col">Length</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Cuft</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <thead class="circle_wood">
                                    <tr>
                                        <th scope="col">Length</th>
                                        <th scope="col">Perimeter</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Cuft</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($class = $data['type'] == 'cwood' ? ['length', 'perimeter', 'quantity', 'cuft'] : ['width', 'thick', 'length', 'quantity', 'cuft'])
                                    @php($l = 0)
                                    @php($q = 0)
                                    @foreach (json_decode($data['data'], true) as $key => $val)
                                        <tr>
                                            @php($l += end($val))
                                            @php($q += prev($val))
                                            @foreach ($val as $k => $e)
                                                {!! "<td class=\"$class[$k]\">$e</td>" !!}
                                            @endforeach
                                            <td><button class="btn delete btn-danger">Delete</button></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="row justify-content-end mt-5">
                                <div class="col-md-2">Total Qty.<input type="text" class="tqty"
                                        value="{{ $q }}" disabled></div>
                                <div class="col-md-2">Total Cuft<input type="text" class="tcuft"
                                        value="{{ $l }}" disabled></div>
                            </div>
                        </div>
                    </div>

                    <div class="transport mt-5">
                        <span class="preview-title-lg overline-title">Transporter Details</span>
                        <div class="row">
                            <div class="col-md-4 my-2"><input type="text" class="form-control DriverName"
                                    value="{{ $data['DriverName'] }}" placeholder="DriverName"></div>
                            <div class="col-md-4 my-2"><input type="text" class="form-control Residences"
                                    value="{{ $data['Residences'] }}" placeholder="Residences"></div>
                            <div class="col-md-4 my-2"><input type="text" class="form-control VehicleNumber"
                                    value="{{ $data['VehicleNumber'] }}" placeholder="VehicleNumber"></div>
                            <div class="col-md-4 my-2"><input type="text" class="form-control LicenseNumber"
                                    value="{{ $data['LicenseNumber'] }}" placeholder="LicenseNumber"></div>
                            <div class="col-md-4 my-2"><input type="text" class="form-control RTO"
                                    value="{{ $data['RTO'] }}" placeholder="RTO">
                            </div>
                            <div class="col-md-4 my-2"><input type="text" class="form-control VehicleName"
                                    value="{{ $data['VehicleName'] }}" placeholder="VehicleName"></div>
                            <div class="col-12 text-center"><input type="button" value="Update"
                                    class="btn btn-primary update_value">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
