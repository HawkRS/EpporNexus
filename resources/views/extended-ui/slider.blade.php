@extends('layouts.vertical',['title' => 'Slider'])

@section('css')
@vite(['node_modules/slick-carousel/slick/slick.css' , 'node_modules/slick-carousel/slick/slick-theme.css'])
@endsection

@section('content')
@include('layouts.partials.page-title', ['subtitle' => 'Extended UI', 'title' => 'Slider'])
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title mb-0">Single Item</h4>
            </div>
            <div class="card-body pt-2">
                <div class="single-item slider" dir="ltr">
                    <div>
                        <img src="/images/big/img-2.jpg" alt="slider-img" class="img-fluid">
                    </div>
                    <div>
                        <img src="/images/big/img-1.jpg" alt="slider-img" class="img-fluid">
                    </div>
                    <div>
                        <img src="/images/big/img-3.jpg" alt="slider-img" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end col -->
</div>
<!-- end row -->


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title mb-0">Multiple Items</h4>
            </div>
            <div class="card-body pt-2">
                <div class="multiple-items slider-padding" dir="ltr">
                    <div>
                        <img src="/images/small/img-2.jpg" alt="slider-img" class="img-fluid">
                    </div>
                    <div>
                        <img src="/images/small/img-1.jpg" alt="slider-img" class="img-fluid">
                    </div>
                    <div>
                        <img src="/images/small/img-3.jpg" alt="slider-img" class="img-fluid">
                    </div>
                    <div>
                        <img src="/images/small/img-4.jpg" alt="slider-img" class="img-fluid">
                    </div>
                    <div>
                        <img src="/images/small/img-5.jpg" alt="slider-img" class="img-fluid">
                    </div>
                    <div>
                        <img src="/images/small/img-6.jpg" alt="slider-img" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end col -->
</div>
<!-- end row -->


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title mb-0">Responsive Display</h4>
            </div>
            <div class="card-body pt-2">
                <div class="responsive-slider slider-padding" dir="ltr">
                    <div>
                        <img src="/images/small/img-2.jpg" alt="slider-img" class="img-fluid">
                    </div>
                    <div>
                        <img src="/images/small/img-1.jpg" alt="slider-img" class="img-fluid">
                    </div>
                    <div>
                        <img src="/images/small/img-3.jpg" alt="slider-img" class="img-fluid">
                    </div>
                    <div>
                        <img src="/images/small/img-4.jpg" alt="slider-img" class="img-fluid">
                    </div>
                    <div>
                        <img src="/images/small/img-5.jpg" alt="slider-img" class="img-fluid">
                    </div>
                    <div>
                        <img src="/images/small/img-6.jpg" alt="slider-img" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end col -->
</div>
<!-- end row -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title mb-0">Center Mode</h4>
            </div>
            <div class="card-body pt-2">
                <div class="center-item-slider slider-padding" dir="ltr">
                    <div>
                        <img src="/images/small/img-2.jpg" alt="slider-img" class="img-fluid">
                    </div>
                    <div>
                        <img src="/images/small/img-1.jpg" alt="slider-img" class="img-fluid">
                    </div>
                    <div>
                        <img src="/images/small/img-3.jpg" alt="slider-img" class="img-fluid">
                    </div>
                    <div>
                        <img src="/images/small/img-4.jpg" alt="slider-img" class="img-fluid">
                    </div>
                    <div>
                        <img src="/images/small/img-5.jpg" alt="slider-img" class="img-fluid">
                    </div>
                    <div>
                        <img src="/images/small/img-6.jpg" alt="slider-img" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end col -->
</div>
<!-- end row -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title mb-0">Lazy Loading</h4>
            </div>
            <div class="card-body pt-2">
                <div class="lazy-load-slider slider-padding" dir="ltr">
                    <div>
                        <img src="" data-lazy="/images/small/img-6.jpg" alt="slider-img" class="img-fluid">
                    </div>
                    <div>
                        <img src="" data-lazy="/images/small/img-5.jpg" alt="slider-img" class="img-fluid">
                    </div>
                    <div>
                        <img src="" data-lazy="/images/small/img-4.jpg" alt="slider-img" class="img-fluid">
                    </div>
                    <div>
                        <img src="" data-lazy="/images/small/img-3.jpg" alt="slider-img" class="img-fluid">
                    </div>
                    <div>
                        <img src="" data-lazy="/images/small/img-2.jpg" alt="slider-img" class="img-fluid">
                    </div>
                    <div>
                        <img src="" data-lazy="/images/small/img-1.jpg" alt="slider-img" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end col -->
</div>
<!-- end row -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title mb-0">Fade</h4>
            </div>
            <div class="card-body pt-2">
                <div class="fade-slider slider " dir="ltr">
                    <div>
                        <img src="/images/big/img-2.jpg" alt="slider-img" class="img-fluid">
                    </div>
                    <div>
                        <img src="/images/big/img-1.jpg" alt="slider-img" class="img-fluid">
                    </div>
                    <div>
                        <img src="/images/big/img-3.jpg" alt="slider-img" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end col -->
</div>
<!-- end row -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title mb-0">Slider Syncing</h4>
            </div>
            <div class="card-body pt-2">
                <div class="slider-syncing-for" dir="ltr">
                    <div>
                        <img src="/images/big/img-2.jpg" alt="slider-img" class="img-fluid">
                    </div>
                    <div>
                        <img src="/images/big/img-1.jpg" alt="slider-img" class="img-fluid">
                    </div>
                    <div>
                        <img src="/images/big/img-3.jpg" alt="slider-img" class="img-fluid">
                    </div>
                    <div>
                        <img src="/images/big/img-2.jpg" alt="slider-img" class="img-fluid">
                    </div>
                    <div>
                        <img src="/images/big/img-1.jpg" alt="slider-img" class="img-fluid">
                    </div>
                    <div>
                        <img src="/images/big/img-3.jpg" alt="slider-img" class="img-fluid">
                    </div>
                </div>

                <div class="slider-syncing-nav" dir="ltr">
                    <div>
                        <img src="/images/big/img-2.jpg" alt="slider-img" class="img-fluid">
                    </div>
                    <div>
                        <img src="/images/big/img-1.jpg" alt="slider-img" class="img-fluid">
                    </div>
                    <div>
                        <img src="/images/big/img-3.jpg" alt="slider-img" class="img-fluid">
                    </div>
                    <div>
                        <img src="/images/big/img-2.jpg" alt="slider-img" class="img-fluid">
                    </div>
                    <div>
                        <img src="/images/big/img-1.jpg" alt="slider-img" class="img-fluid">
                    </div>
                    <div>
                        <img src="/images/big/img-3.jpg" alt="slider-img" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end col -->
</div>
<!-- end row -->
@endsection


@section('scripts')
@vite(['resources/js/pages/slick-slider.js'])
@endsection