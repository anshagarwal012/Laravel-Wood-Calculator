@extends('main')
@section('title', 'List Invoices')
@section('content')
    <div class="nk-block nk-block-lg">
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                <div class="preview-block"><span class="preview-title-lg overline-title">List Invoice</span>
                    <table class="table table-striped m-0 nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                        <thead>
                            <tr class="nk-tb-item nk-tb-head">
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Sr. No</span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Date</span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">CompanyName </span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Address </span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">MobileNumber </span></th>
                                <th class="nk-tb-col tb -col-mb"><span class="sub-text">type</span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">DriverName </span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Residences </span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">VehicleNumber </span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">LicenseNumber </span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">RTO</span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">VehicleName </span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Action </span></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
