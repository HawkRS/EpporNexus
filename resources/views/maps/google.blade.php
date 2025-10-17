@extends('layouts.vertical',['title' => 'Google Maps'])

@section('content')
@include('layouts.partials.page-title', ['subtitle' => 'Maps', 'title' => 'Google Maps'])
<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Basic Google Map</h4>
                <div id="gmaps-basic" class="gmaps"></div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Markers Google Map</h4>
                <div id="gmaps-markers" class="gmaps"></div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<!-- end row-->

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Street View Panoramas Google Map</h4>
                <div id="panorama" class="gmaps"></div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Google Map Types</h4>
                <div id="gmaps-types" class="gmaps"></div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<!-- end row-->

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Ultra Light with Labels</h4>
                <div id="ultra-light" class="gmaps"></div>
            </div>
            <!-- end card-body-->
        </div>
        <!-- end card-->
    </div>
    <!-- end col-->
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Dark</h4>
                <div id="dark" class="gmaps"></div>
            </div>
            <!-- end card-body-->
        </div>
        <!-- end card-->
    </div>
    <!-- end col-->
</div>
<!-- end row-->

@endsection

@section('scripts')
<!-- Google Maps API -->
<script src="https://maps.google.com/maps/api/js"></script>
@vite(['resources/js/pages/maps-google.js'])
@endsection