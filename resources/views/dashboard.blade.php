@extends('main')
@section('title', 'Home Page')
@section('content')
<div class="nk-block nk-block-lg">
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <div class="preview-block"><span class="preview-title-lg overline-title">Wood</span>
                <div class="row gy-4">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="length" class="form-label">Length</label>
                            <div class="form-control-wrap">
                                <input type="number" id="length" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="breadth" class="form-label">Thick</label>
                            <div class="form-control-wrap">
                                <input type="number" id="breath" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="height" class="form-label">Width</label>
                            <div class="form-control-wrap">
                                <input type="number" id="height" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="qty" class="form-label">Qty</label>
                            <div class="form-control-wrap">
                                <input type="number" id="qty" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col text-center">
                        <button class="add btn btn-primary my-2">Add Record</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="nk-block nk-block-lg circle">
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <div class="preview-block"><span class="preview-title-lg overline-title">Circle Wood</span>
                <div class="row gy-4">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="length" class="form-label">Length</label>
                            <div class="form-control-wrap">
                                <input type="number" id="length" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="perimeter" class="form-label">Perimeter</label>
                            <div class="form-control-wrap">
                                <input type="number" id="perimeter" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="qty" class="form-label">Qty</label>
                            <div class="form-control-wrap">
                                <input type="number" id="qty" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col text-center">
                        <button class="add_circle btn btn-primary my-2">Add Record</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection