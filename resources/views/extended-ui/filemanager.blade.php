@extends('layouts.vertical', ['title' => 'File Manager'])

@section('content')
@include('layouts.partials.page-title', ['subtitle' => 'Extended UI', 'title' => 'File Manager'])
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <button type="button"
                    class="btn btn-sm btn-primary width-lg rounded-pill width-md waves-effect waves-light float-end">Add
                    Files</button>
                <h4 class="header-title mb-0 pb-2">My Files</h4>

                <div class="row">
                    <div class="col-xl-2 col-lg-3 col-md-6">
                        <div class="file-man-box rounded mt-3">
                            <a href="" class="file-close"><i class="mdi mdi-close-circle"></i></a>
                            <div class="file-img-box">
                                <img src="/images/file_icons/pdf.svg" alt="icon">
                            </div>
                            <a href="#" class="file-download"><i class="mdi mdi-download"></i> </a>
                            <div class="file-man-title">
                                <h5 class="mb-0 text-overflow mt-2 fw-semibold">invoice_project.pdf</h5>
                                <p class="mb-0"><small>568.8 kb</small></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-lg-3 col-md-6">
                        <div class="file-man-box rounded mt-3">
                            <a href="" class="file-close"><i class="mdi mdi-close-circle"></i></a>
                            <div class="file-img-box">
                                <img src="/images/file_icons/bmp.svg" alt="icon">
                            </div>
                            <a href="#" class="file-download"><i class="mdi mdi-download"></i> </a>
                            <div class="file-man-title">
                                <h5 class="mb-0 text-overflow mt-2 fw-semibold">invoice_project.pdf</h5>
                                <p class="mb-0"><small>568.8 kb</small></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-lg-3 col-md-6">
                        <div class="file-man-box rounded mt-3">
                            <a href="" class="file-close"><i class="mdi mdi-close-circle"></i></a>
                            <div class="file-img-box">
                                <img src="/images/file_icons/psd.svg" alt="icon">
                            </div>
                            <a href="#" class="file-download"><i class="mdi mdi-download"></i> </a>
                            <div class="file-man-title">
                                <h5 class="mb-0 text-overflow mt-2 fw-semibold">invoice_project.pdf</h5>
                                <p class="mb-0"><small>568.8 kb</small></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-lg-3 col-md-6">
                        <div class="file-man-box rounded mt-3">
                            <a href="" class="file-close"><i class="mdi mdi-close-circle"></i></a>
                            <div class="file-img-box">
                                <img src="/images/file_icons/avi.svg" alt="icon">
                            </div>
                            <a href="#" class="file-download"><i class="mdi mdi-download"></i> </a>
                            <div class="file-man-title">
                                <h5 class="mb-0 text-overflow mt-2 fw-semibold">invoice_project.pdf</h5>
                                <p class="mb-0"><small>568.8 kb</small></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-lg-3 col-md-6">
                        <div class="file-man-box rounded mt-3">
                            <a href="" class="file-close"><i class="mdi mdi-close-circle"></i></a>
                            <div class="file-img-box">
                                <img src="/images/file_icons/cad.svg" alt="icon">
                            </div>
                            <a href="#" class="file-download"><i class="mdi mdi-download"></i> </a>
                            <div class="file-man-title">
                                <h5 class="mb-0 text-overflow mt-2 fw-semibold">invoice_project.pdf</h5>
                                <p class="mb-0"><small>568.8 kb</small></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-lg-3 col-md-6">
                        <div class="file-man-box rounded mt-3">
                            <a href="" class="file-close"><i class="mdi mdi-close-circle"></i></a>
                            <div class="file-img-box">
                                <img src="/images/file_icons/txt.svg" alt="icon">
                            </div>
                            <a href="#" class="file-download"><i class="mdi mdi-download"></i> </a>
                            <div class="file-man-title">
                                <h5 class="mb-0 text-overflow mt-2 fw-semibold">invoice_project.pdf</h5>
                                <p class="mb-0"><small>568.8 kb</small></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-lg-3 col-md-6">
                        <div class="file-man-box rounded mt-3">
                            <a href="" class="file-close"><i class="mdi mdi-close-circle"></i></a>
                            <div class="file-img-box">
                                <img src="/images/file_icons/eps.svg" alt="icon">
                            </div>
                            <a href="#" class="file-download"><i class="mdi mdi-download"></i> </a>
                            <div class="file-man-title">
                                <h5 class="mb-0 text-overflow mt-2 fw-semibold">invoice_project.pdf</h5>
                                <p class="mb-0"><small>568.8 kb</small></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-lg-3 col-md-6">
                        <div class="file-man-box rounded mt-3">
                            <a href="" class="file-close"><i class="mdi mdi-close-circle"></i></a>
                            <div class="file-img-box">
                                <img src="/images/file_icons/dll.svg" alt="icon">
                            </div>
                            <a href="#" class="file-download"><i class="mdi mdi-download"></i> </a>
                            <div class="file-man-title">
                                <h5 class="mb-0 text-overflow mt-2 fw-semibold">invoice_project.pdf</h5>
                                <p class="mb-0"><small>568.8 kb</small></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-lg-3 col-md-6">
                        <div class="file-man-box rounded mt-3">
                            <a href="" class="file-close"><i class="mdi mdi-close-circle"></i></a>
                            <div class="file-img-box">
                                <img src="/images/file_icons/sql.svg" alt="icon">
                            </div>
                            <a href="#" class="file-download"><i class="mdi mdi-download"></i> </a>
                            <div class="file-man-title">
                                <h5 class="mb-0 text-overflow mt-2 fw-semibold">invoice_project.pdf</h5>
                                <p class="mb-0"><small>568.8 kb</small></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-lg-3 col-md-6">
                        <div class="file-man-box rounded mt-3">
                            <a href="" class="file-close"><i class="mdi mdi-close-circle"></i></a>
                            <div class="file-img-box">
                                <img src="/images/file_icons/zip.svg" alt="icon">
                            </div>
                            <a href="#" class="file-download"><i class="mdi mdi-download"></i> </a>
                            <div class="file-man-title">
                                <h5 class="mb-0 text-overflow mt-2 fw-semibold">invoice_project.pdf</h5>
                                <p class="mb-0"><small>568.8 kb</small></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-lg-3 col-md-6">
                        <div class="file-man-box rounded mt-3">
                            <a href="" class="file-close"><i class="mdi mdi-close-circle"></i></a>
                            <div class="file-img-box">
                                <img src="/images/file_icons/ps.svg" alt="icon">
                            </div>
                            <a href="#" class="file-download"><i class="mdi mdi-download"></i> </a>
                            <div class="file-man-title">
                                <h5 class="mb-0 text-overflow mt-2 fw-semibold">invoice_project.pdf</h5>
                                <p class="mb-0"><small>568.8 kb</small></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-lg-3 col-md-6">
                        <div class="file-man-box rounded mt-3">
                            <a href="" class="file-close"><i class="mdi mdi-close-circle"></i></a>
                            <div class="file-img-box">
                                <img src="/images/file_icons/png.svg" alt="icon">
                            </div>
                            <a href="#" class="file-download"><i class="mdi mdi-download"></i> </a>
                            <div class="file-man-title">
                                <h5 class="mb-0 text-overflow mt-2 fw-semibold">invoice_project.pdf</h5>
                                <p class="mb-0"><small>568.8 kb</small></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div><!-- end col -->
</div>
@endsection