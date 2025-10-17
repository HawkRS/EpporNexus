@extends('layouts.vertical',['title' => 'Email Templates'])

@section('content')
@include('layouts.partials.page-title', ['subtitle' => 'pages', 'title' => 'Email Templates'])
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <h4 class="mt-0 mb-3 header-title"><b>Basic action email</b></h4>
                        <a href="#" target="_blank"> <img src="/images/email/1.png" class="img-fluid" alt=""> </a>
                    </div>
                    <div class="col-md-4">
                        <h4 class="mt-0 mb-3 header-title"><b>Email alert</b> </h4>
                        <a href="#" target="_blank"> <img src="/images/email/2.png" class="img-fluid" alt=""> </a>
                    </div>
                    <div class="col-md-4">
                        <h4 class="mt-0 mb-3 header-title"><b>Billing email</b></h4>
                        <a href="#" target="_blank"> <img src="/images/email/3.png" class="img-fluid" alt=""> </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- end row -->
@endsection

@section('scripts')
@vite(['resources/js/pages/profile.js'])
@endsection