@extends('layouts.vertical',['title' => 'File Uploads'])

@section('css')
@vite(['node_modules/dropify/dist/css/dropify.min.css'])
@endsection

@section('content')
@include('layouts.partials.page-title', ['subtitle' => 'Forms', 'title' => 'File Uploads'])
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5 class="header-title">Default</h5>
            </div>
            <div class="card-body pt-2">
                <input type="file" class="dropify" data-height="300" />
            </div>
        </div>
    </div><!-- end col -->
</div>
<!-- end row -->


<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5 class="header-title">Default File</h5>
            </div>
            <div class="card-body pt-2">
                <input type="file" class="dropify" data-default-file="/images/small/img-1.jpg" />
            </div>
        </div>
    </div><!-- end col -->

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5 class="header-title">Disabled the input</h5>
            </div>
            <div class="card-body pt-2">
                <input type="file" class="dropify" disabled="disabled" />
            </div>
        </div>
    </div><!-- end col -->

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5 class="header-title">Max File size</h5>
            </div>
            <div class="card-body pt-2">
                <input type="file" class="dropify" data-max-file-size="1M" />
            </div>
        </div>
    </div><!-- end col -->
</div>
<!-- end row -->
@endsection

@section('scripts')
@vite(['resources/js/pages/form-fileupload.js'])
@endsection