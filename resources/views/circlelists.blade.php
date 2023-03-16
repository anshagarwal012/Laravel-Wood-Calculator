@extends('main')
@section('title', 'Circle Lists')
@section('content')
<div class="nk-block nk-block-lg circle_l">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Circle Wood Lists</h4>
        </div>
    </div>
    <div class="card card-preview">
        <div class="card-inner">
            <div class="row d-flex justify-content-center">
                <div class="col-md-3">
                    <select class="custom-select form-control">
                        <option value="Total" selected>Total</option>
                        <option value="Length">Length</option>
                        <option value="Perimeter">Perimeter</option>
                        <option value="Qty">Qty</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control search mx-sm-3" placeholder="Type to search">
                </div>
            </div>
            <table class="table table-striped m-0 nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                <thead>
                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Sr. No</span></th>
                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Date Time</span></th>
                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Length</span></th>
                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Perimeter</span></th>
                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Qty</span></th>
                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Total</span></th>
                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Action</span></th>
                    </tr> 
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div><!-- .card-preview -->
</div>
@endsection