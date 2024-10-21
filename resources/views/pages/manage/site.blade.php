@extends('layout-1')
@section('container')

<style type="text/css">
    .tab-link .active {
        border-top: 1px solid #0054a6 !important;
        border-left: 1px solid #0054a6 !important;
        border-right: 1px solid #0054a6 !important;
        border-radius: 0px;
    }

    .tab-link a {
        padding-left: 40px;
        padding-right: 40px;
    }

</style>

@if(session()->has('success'))
<div class="alert alert-important alert-success alert-dismissible fade show" role="alert" style="border-radius:0px;margin:0px">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session()->has('failed'))
<div class="alert alert-important alert-danger alert-dismissible fade show" role="alert" style="border-radius:0px;margin:0px">

    {{ session('failed') }}

    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="page-header d-print-none" style="border-bottom:1px solid #0054a6">
    <div class="container-xl" style="padding-bottom:30px;">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <h2 class="page-title">
                    Site - Funnel
                </h2>
                <p style="color:#848d9d;margin-top:5px;">Setiap halaman yang anda buat anda dapat melakukan personalisasikan tampilan dan konten melalui editor</p>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <span class="d-none d-sm-inline">
                        <a href="#" class="btn bg-indigo-lt" style="border-color:#7f65f1">
                            Dokumentasi
                        </a>
                    </span>
                    <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report" style="background:rgb(47 24 147)">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 5l0 14"></path>
                            <path d="M5 12l14 0"></path>
                        </svg>
                        Tambah Baru
                    </a>
                    <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
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

<section style="background:#fff;height:100vh">

    <div class="container">


        <div class="card" style="border:0px;margin-top:-48px;background:none">
            <div class="card-header" style="border-bottom:0px;">
                <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs" role="tablist" style="background:none">
                    <li class="nav-item tab-link" role="presentation">
                        <a href="#tabs-home-3" class="nav-link active" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">
                            <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon me-2">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M5 12l-2 0l9 -9l9 9l-2 0"></path>
                                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                            </svg>
                            Funnel Anda
                        </a>
                    </li>
                    <li class="nav-item tab-link" role="presentation">
                        <a href="#tabs-profile-3" class="nav-link " data-bs-toggle="tab" aria-selected="true" role="tab">
                            <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon me-2">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                            </svg>
                            Templates
                        </a>
                    </li>
                </ul>
            </div>


            <div class="card-body" style="padding:0px;">
                <div class="tab-content">
                    <div class="tab-pane active show" id="tabs-home-3" role="tabpanel">

                        <br />
                        <br />
                        @forelse ( $sites as $site )
                        <div class="card" style="border-radius:0px;">
                            <div class="card-header" style="background:#2f1893;color:#fff">
                                <h3 class="card-title">ID Funnel : <span class="badge bg-indigo text-indigo-fg">{{$site->id}}</span></h3>
                                <a style="font-size:16px;margin-left:10px;color:#fff" href="https://{{$site->domain_name}}" target="_blank">{{$site->domain_name}} <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-external-link">

                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M12 6h-6a2 2 0 0 0 -2 2v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-6"></path>
                                        <path d="M11 13l9 -9"></path>
                                        <path d="M15 4h5v5"></path>
                                    </svg></a>
                                <div class="card-actions btn-actions">
                                    <a href="#" class="btn-action" style="color:#fff">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/refresh -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4"></path>
                                            <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4"></path>
                                        </svg>
                                    </a>
                                    <a href="#" class="btn-action" style="color:#fff">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M6 15l6 -6l6 6"></path>
                                        </svg>
                                    </a>
                                    <a href="#" class="btn-action" style="color:#fff">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/dots-vertical -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                            <path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                            <path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                        </svg>
                                    </a>
                                    <a href="#" class="btn-action" style="color:#fff">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/x -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M18 6l-12 12"></path>
                                            <path d="M6 6l12 12"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body p-5">

                                <div class="row g-0 flex-fill">

                                    <div class="col-12 col-lg-4 p-2">

                                        <div class="card">
                                            <div class="ribbon ribbon-top bg-yellow">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path>
                                                </svg>
                                            </div>
                                            <div class="card-body" style="padding:0px;">
                                                <div class="image_loader_{{$site->id}}" style="width:100%;height:275px;background:#000;position:absolute">
                                                    <img src="{{ URL::asset('/assets/image/giffer.webp') }}" style="position:absolute;width:60px;left:40%;top:40%" />
                                                </div>
                                                <img class="screnshoot-{{$site->id}}" src="{{ URL::asset('/assets/image/screenshot.png') }}" />
                                                <span class="badge bg-blue text-blue-fg" style="position:absolute;left:5px;top:5px;">snapshot</span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12 col-lg-6 px-4">
                                        <div class="badge">Funnel Name :</div><br />
                                        <br />
                                        <p class="h2">Transformasikan bisnis anda dengan digital marketing</p>

                                        <div class="datagrid">
                                            <div class="datagrid-item">
                                                <div class="datagrid-title">Template digunakan</div>
                                                <div class="datagrid-content"><a href="#">Digiencer <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-external-link">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path d="M12 6h-6a2 2 0 0 0 -2 2v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-6"></path>
                                                            <path d="M11 13l9 -9"></path>
                                                            <path d="M15 4h5v5"></path>
                                                        </svg></a></div>
                                            </div>
                                            <div class="datagrid-item">
                                                <div class="datagrid-title">Product Linked</div>
                                                <div class="datagrid-content">
                                                    <div class="d-flex align-items-center fw-bold">
                                                        <span class="badge bg-azure-lt">{{SiteHelper::Product_asign_count($site->id)}} Produk</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="datagrid-item">
                                                <div class="datagrid-title">Status Build</div>
                                                <div class="datagrid-content">
                                                    <div class="d-flex align-items-center fw-bold">
                                                        @php
                                                        $status = SiteHelper::Last_status_build($site->domain_name)
                                                        @endphp
                                                        @if($status->step_status == 1)
                                                        <span class="badge bg-azure-lt">Step {{$status->step}}</span>&nbsp; Completed
                                                        @endif
                                                        @if($status->step_status == 0)
                                                        <span class="badge bg-red text-red-fg">Step {{$status->step}}</span>&nbsp; Failed
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="datagrid-item">
                                                <div class="datagrid-title">Layout Checkout</div>
                                                <div class="datagrid-content">
                                                    <div class="d-flex align-items-center fw-bold">
                                                        <a href="#">{{LayoutHelper::Layout_asign_name($site->id)}} <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-external-link">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                <path d="M12 6h-6a2 2 0 0 0 -2 2v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-6"></path>
                                                                <path d="M11 13l9 -9"></path>
                                                                <path d="M15 4h5v5"></path>
                                                            </svg></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <br /><br /><br />
                                        <div class="row g-0 flex-fill">
                                            <div class="col-auto">
                                                <a href="#" class="btn d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-world-share">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M20.94 13.045a9 9 0 1 0 -8.953 7.955"></path>
                                                        <path d="M3.6 9h16.8"></path>
                                                        <path d="M3.6 15h9.4"></path>
                                                        <path d="M11.5 3a17 17 0 0 0 0 18"></path>
                                                        <path d="M12.5 3a16.991 16.991 0 0 1 2.529 10.294"></path>
                                                        <path d="M16 22l5 -5"></path>
                                                        <path d="M21 21.5v-4.5h-4.5"></path>
                                                    </svg>
                                                    Pakai Domain Sendiri
                                                </a>
                                            </div>
                                            &nbsp; &nbsp;&nbsp;
                                            <div class="col-auto">
                                                <a href="#" class="btn d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-receipt">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2m4 -14h6m-6 4h6m-2 4h2" />
                                                    </svg>
                                                    Open Ticket
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12 col-lg-2 p-2">
                                        <H3>Informasi Login :</H3>
                                    </div>

                                </div>

                            </div>
                            <div class="card-footer" style="background:#f4f7fc">
                                <div class="d-flex">
                                    <a href="#" class="btn btn-danger ms-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-image-in-picture">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M13 15c-2 0 -5 1 -5 5" />
                                            <path d="M4 11m0 2a2 2 0 0 1 2 -2h5a2 2 0 0 1 2 2v5a2 2 0 0 1 -2 2h-5a2 2 0 0 1 -2 -2z" />
                                            <path d="M4 7v-2a1 1 0 0 1 1 -1h2" />
                                            <path d="M11 4h2" />
                                            <path d="M17 4h2a1 1 0 0 1 1 1v2" />
                                            <path d="M20 11v2" />
                                            <path d="M20 17v2a1 1 0 0 1 -1 1h-2" />
                                        </svg>
                                        Pergi ke Editor
                                    </a>
                                </div>
                            </div>
                        </div>

                        <script type="text/javascript">
                            $(document).ready(function() {

                                $.ajax({

                                    type: 'GET'
                                    , url: "{{ route('run_snapshoot') }}"
                                    , data: {
                                        domain_name: '{{$site->domain_name}}'
                                    , }
                                    , success: function(res) {
                                        $('.image_loader_{{$site->id}}').fadeOut('slow')
                                        $('.screnshoot-{{$site->id}}').attr("src", res)
                                    }
                                    , error: function(res) {
                                        alert('Terjadi masalah, hubungi layanan pelanggan kami');
                                    }

                                });

                            })

                        </script>

                        @empty

                        @endforelse

                    </div>
                    <div class="tab-pane hide" id="tabs-profile-3" role="tabpanel">
                        <h4>Profile tab</h4>
                        <div>Fringilla egestas nunc quis tellus diam rhoncus ultricies tristique enim at diam, sem nunc amet, pellentesque id egestas velit sed</div>
                    </div>
                </div>
            </div>
        </div>





    </div>

</section>




@endsection
