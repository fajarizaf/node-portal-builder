@extends('layout-2')
@section('container')

    @if(session()->has('success'))
        <div class="alert alert-important alert-success alert-dismissible fade show" role="alert" style="border-radius:0px;margin:0px">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"  aria-label="Close"></button>
        </div>
    @endif

    @if(session()->has('failed'))
        <div class="alert alert-important alert-failed alert-dismissible fade show" role="alert" style="border-radius:0px;margin:0px">
            {{ session('faild') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"  aria-label="Close"></button>
        </div>
    @endif

    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Overview
                    </div>
                    <h2 class="page-title">
                        Products
                    </h2>
                    <p style="color:#848d9d;margin-top:5px;"><b style="color:#333">Setiap produk yang anda buat</b> akan
                        memiliki link checkout yang dapat anda share ke para pelanggan anda</p>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <span class="d-none d-sm-inline">
                            <a href="#" class="btn">
                                Dokumentasi
                            </a>
                        </span>
                        <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                            data-bs-target="#modal-report">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 5l0 14"></path>
                                <path d="M5 12l14 0"></path>
                            </svg>
                            Tambah Baru
                        </a>
                        <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                            data-bs-target="#modal-report" aria-label="Create new report">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 5l0 14"></path>
                                <path d="M5 12l14 0"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <br />
    <div class="container">

        <div class="row g-0 flex-fill">

            <div class="col-12 col-lg-12">

                @forelse($product as $row)
                <div class="card">
                    <div class="row g-0">
                        <div class="col-auto">
                            <div class="card-body">
                                <div class="avatar avatar-md" style="background-image: url(./static/jobs/job-1.jpg)"></div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card-body ps-0">
                                <div class="row">
                                    <div class="col">
                                        <h3 class="mb-0"><a href="#">{{$row->product_plan_name}}
                                        <span class="badge bg-blue-lt">Group : {{$row->product_group_name}}</span></a></h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md">
                                        <div
                                            class="mt-3 list-inline list-inline-dots mb-0 text-secondary d-sm-block d-none">
                                            <div class="list-inline-item">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/building-community -->
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-inline">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path
                                                        d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8">
                                                    </path>
                                                    <path d="M13 7l0 .01"></path>
                                                    <path d="M17 7l0 .01"></path>
                                                    <path d="M17 11l0 .01"></path>
                                                    <path d="M17 15l0 .01"></path>
                                                </svg>
                                                CMS Max
                                            </div>
                                            <div class="list-inline-item">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/license -->
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-inline">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path
                                                        d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11">
                                                    </path>
                                                    <path d="M9 7l4 0"></path>
                                                    <path d="M9 11l4 0"></path>
                                                </svg>
                                                Full-time
                                            </div>
                                            <div class="list-inline-item">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/map-pin -->
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-inline">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                                                    <path
                                                        d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z">
                                                    </path>
                                                </svg>
                                                Remote / USA
                                            </div>
                                        </div>
                                        <div class="mt-3 list mb-0 text-secondary d-block d-sm-none">
                                            <div class="list-item">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/building-community -->
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-inline">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path
                                                        d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8">
                                                    </path>
                                                    <path d="M13 7l0 .01"></path>
                                                    <path d="M17 7l0 .01"></path>
                                                    <path d="M17 11l0 .01"></path>
                                                    <path d="M17 15l0 .01"></path>
                                                </svg>
                                                CMS Max
                                            </div>
                                            <div class="list-item">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/license -->
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-inline">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path
                                                        d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11">
                                                    </path>
                                                    <path d="M9 7l4 0"></path>
                                                    <path d="M9 11l4 0"></path>
                                                </svg>
                                                Full-time
                                            </div>
                                            <div class="list-item">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/map-pin -->
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-inline">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                                                    <path
                                                        d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z">
                                                    </path>
                                                </svg>
                                                Remote / USA
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-auto">
                                        <div class="mt-3 badges">
                                            <a href="{{ url('/checkout'.'/'.$row->product_plan_link) }}" class="badge badge-outline text-secondary fw-normal badge-pill">Link Checkout Produk</a>
                                            <a href="#"
                                                class="badge badge-outline text-secondary fw-normal badge-pill">edit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br/>
                @empty
                <div class="card" style="border: 2px dashed #efefef">
                    <div class="empty">

                        <div class="empty-action" style="margin-top:0px !important" data-bs-toggle="modal" data-bs-target="#modal-report">
                            <a href="#" class="btn btn-secondary" style="background:#ccc;">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                            Buat Produk Pertama Anda
                            </a>
                        </div>
                        </div>
                </div>
                @endforelse
            </div>

        </div>
    </div>

@include('component.modal.product-add')

@endsection
