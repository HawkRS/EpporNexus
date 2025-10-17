@extends('layouts.vertical', ['title' => 'Chartjs Charts'])

@section('content')
@include('layouts.partials.page-title', ['subtitle' => 'C3', 'title' => 'Chartjs Charts'])
<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header">
                <h5 class="header-title">Line Chart</h5>
            </div>
            <div class="card-body pt-0">
                <div class="text-center">
                    <div class="row">
                        <div class="col-4">
                            <div class="mb-4">
                                <p class="text-uppercase font-13 fw-medium">Lifetime total sales</p>
                                <h3 class="mb-0 text-danger"><i class="mdi mdi-arrow-down"></i> 95221</h3>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-4">
                                <p class="text-uppercase font-13 fw-medium">Income amounts</p>
                                <h3 class="mb-0 text-success"><i class="mdi mdi-arrow-up"></i> 4894</h3>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-4">
                                <p class="text-uppercase font-13 fw-medium">Total visits</p>
                                <h3 class="mb-0 text-warning"><i class="mdi mdi-arrow-up"></i> 48</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <canvas id="lineChart" height="300"></canvas>
            </div>
            <!-- end card body-->
        </div>
        <!-- end card -->
    </div>
    <!-- end col-->

    <div class="col-xl-6">
        <div class="card">
            <div class="card-header">
                <h5 class="header-title">Bar Chart</h5>
            </div>
            <div class="card-body pt-0">
                <div class="text-center">
                    <div class="row">
                        <div class="col-4">
                            <div class="mb-4">
                                <p class="text-uppercase font-13 fw-medium">Lifetime total sales</p>
                                <h3 class="mb-0 text-danger"><i class="mdi mdi-arrow-down"></i> 256</h3>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-4">
                                <p class="text-uppercase font-13 fw-medium">Income amounts</p>
                                <h3 class="mb-0 text-success"><i class="mdi mdi-arrow-up"></i> 39652</h3>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-4">
                                <p class="text-uppercase font-13 fw-medium">Total visits</p>
                                <h3 class="mb-0 text-warning"><i class="mdi mdi-arrow-up"></i> 7852</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <canvas id="bar" height="300"></canvas>
            </div>
            <!-- end card body-->
        </div>
        <!-- end card -->
    </div>
    <!-- end col-->
</div>
<!-- end row-->

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header">
                <h5 class="header-title">Pie Chart</h5>
            </div>
            <div class="card-body pt-0">

                <div class="text-center">
                    <div class="row">
                        <div class="col-4">
                            <div class="mb-4">
                                <p class="text-uppercase font-13 fw-medium">Lifetime total sales</p>
                                <h3 class="mb-0 text-danger"><i class="mdi mdi-arrow-down"></i> 8563</h3>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-4">
                                <p class="text-uppercase font-13 fw-medium">Income amounts</p>
                                <h3 class="mb-0 text-success"><i class="mdi mdi-arrow-up"></i> 12365</h3>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-4">
                                <p class="text-uppercase font-13 fw-medium">Total visits</p>
                                <h3 class="mb-0 text-warning"><i class="mdi mdi-arrow-up"></i> 2850</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <canvas id="pie" height="260"></canvas>
            </div>
            <!-- end card body-->
        </div>
        <!-- end card -->
    </div>
    <!-- end col-->

    <div class="col-xl-6">
        <div class="card">
            <div class="card-header">
                <h5 class="header-title">Donut Chart</h5>
            </div>
            <div class="card-body pt-0">
                <div class="text-center">
                    <div class="row">
                        <div class="col-4">
                            <div class="mb-4">
                                <p class="text-uppercase font-13 fw-medium">Lifetime total sales</p>
                                <h3 class="mb-0 text-danger"><i class="mdi mdi-arrow-down"></i> 5362</h3>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-4">
                                <p class="text-uppercase font-13 fw-medium">Income amounts</p>
                                <h3 class="mb-0 text-success"><i class="mdi mdi-arrow-up"></i> 1002</h3>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-4">
                                <p class="text-uppercase font-13 fw-medium">Total visits</p>
                                <h3 class="mb-0 text-warning"><i class="mdi mdi-arrow-up"></i> 25600</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <canvas id="doughnut" height="260"></canvas>
            </div>
            <!-- end card body-->
        </div>
        <!-- end card -->
    </div>
    <!-- end col-->
</div>
<!-- end row-->

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header">
                <h5 class="header-title">Polar area Chart</h5>
            </div>
            <div class="card-body pt-0">
                <div class="text-center">
                    <div class="row">
                        <div class="col-4">
                            <div class="mb-4">
                                <p class="text-uppercase font-13 fw-medium">Lifetime total sales</p>
                                <h3 class="mb-0 text-danger"><i class="mdi mdi-arrow-down"></i> 8695</h3>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-4">
                                <p class="text-uppercase font-13 fw-medium">Income amounts</p>
                                <h3 class="mb-0 text-success"><i class="mdi mdi-arrow-up"></i> 4521</h3>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-4">
                                <p class="text-uppercase font-13 fw-medium">Total visits</p>
                                <h3 class="mb-0 text-warning"><i class="mdi mdi-arrow-up"></i> 7854</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <canvas id="polarArea" height="300"> </canvas>
            </div>
            <!-- end card body-->
        </div>
        <!-- end card -->
    </div>
    <!-- end col-->

    <div class="col-xl-6">
        <div class="card">
            <div class="card-header">
                <h5 class="header-title">Radar Chart</h5>
            </div>
            <div class="card-body pt-0">
                <div class="text-center">
                    <div class="row">
                        <div class="col-4">
                            <div class="mb-4">
                                <p class="text-uppercase font-13 fw-medium">Lifetime total sales</p>
                                <h3 class="mb-0 text-danger"><i class="mdi mdi-arrow-down"></i> 256</h3>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-4">
                                <p class="text-uppercase font-13 fw-medium">Income amounts</p>
                                <h3 class="mb-0 text-success"><i class="mdi mdi-arrow-up"></i> 39652</h3>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-4">
                                <p class="text-uppercase font-13 fw-medium">Total visits</p>
                                <h3 class="mb-0 text-warning"><i class="mdi mdi-arrow-up"></i> 7852</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <canvas id="radar" height="300"></canvas>
            </div>
            <!-- end card body-->
        </div>
        <!-- end card -->
    </div>
    <!-- end col-->
</div>
<!-- end row-->
@endsection

@section('scripts')
@vite(['resources/js/pages/chartjs.js'])
@endsection