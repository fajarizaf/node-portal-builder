@extends('layout-1')
@section('container')

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

<style>
    a:hover {
        text-decoration: none
    }

</style>


<div class="row g-0 flex-fill">
    <div class="col-12 col-lg-6 col-xl-3 d-none d-lg-block p-5" style="background:#fff">

        <h2 class="page-title">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-freeze-row">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M3 5a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-14z" />
                <path d="M21 9h-18" />
                <path d="M15 3l-6 6" />
                <path d="M9.5 3l-6 6" />
                <path d="M20 3.5l-5.5 5.5" />
            </svg>
            Landing
        </h2>
        <br />

        <div class="form-selectgroup form-selectgroup-boxes d-flex flex-column">

            @forelse($sites as $ste)
            <a href="{{url('/manage/product?site='.$ste->id.'')}}" class="form-selectgroup-item flex-fill">
                <input type="radio" name="form-payment" value="visa" class="form-selectgroup-input" @if($site_active==$ste->id) checked @endif>
                <div class="form-selectgroup-label d-flex align-items-center p-3" style="justify-content:space-between">
                    <div class="me-3">
                        <span class="form-selectgroup-check"></span>
                    </div>
                    <div>
                        <b>{{$ste->domain_name}}</b>
                    </div>
                </div>
            </a>
            @empty
            <p>Saat ini anda belum memiliki situs yang telah dibangun, pergi ke halaman "Site" untuk memulai.</p>
            @endforelse
            <br />
            <a href="{{url('/manage/site')}}" class="btn" style="border-style:dashed;color:#666;height:60px;width:98%">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 5l0 14"></path>
                    <path d="M5 12l14 0"></path>
                </svg>
                Tambahkan Situs
            </a>

        </div>

    </div>
    <div class="col-12 col-lg-6 col-xl-9 d-none d-lg-block p-5" style="background:#f4f7fc">

        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <h2 class="page-title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-codepen">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M3 15l9 6l9 -6l-9 -6l-9 6"></path>
                        <path d="M3 9l9 6l9 -6l-9 -6l-9 6"></path>
                        <path d="M3 9l0 6"></path>
                        <path d="M21 9l0 6"></path>
                        <path d="M12 3l0 6"></path>
                        <path d="M12 15l0 6"></path>
                    </svg>

                    Produk
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <span class="d-none d-sm-inline">
                        <a href="#" class="btn">
                            Group
                        </a>
                    </span>
                    <a href="#" class="btn btn-primary d-none d-sm-inline-block disabled" data-bs-toggle="modal" data-bs-target="#product-add-berlangganan">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 5l0 14"></path>
                            <path d="M5 12l14 0"></path>
                        </svg>
                        Produk Berlangganan
                    </a>
                    <a href="#" class="btn btn-primary d-none d-sm-inline-block disabled" data-bs-toggle="modal" data-bs-target="#product-add-fisik">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 5l0 14"></path>
                            <path d="M5 12l14 0"></path>
                        </svg>
                        Produk Fisik
                    </a>
                    <a href="#" class="btn btn-primary d-none d-sm-inline-block @if($site_active) @else disabled @endif" data-bs-toggle="modal" data-bs-target="#product-add-digital">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 5l0 14"></path>
                            <path d="M5 12l14 0"></path>
                        </svg>
                        Produk Digital
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
        <br />

        @forelse($product as $row)
        <div class="card">
            <div class="row g-0">
                <div class="col-auto">
                    <div class="card-body">
                        <div class="img-result rounded" style="overflow:hidden;">
                            <img style="width:120px" src='{{Storage::url("uploads/".ProdukHelper::get_url_photo($row->id))}}' />



                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card-body ps-0">
                        <div class="row">
                            <div class="col">
                                <h4 class="mb-0"><a href="#">{{$row->product_plan_name}}
                                        <span class="badge bg-blue-lt">Group : {{$row->product_group_name}}</span></a></h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="mt-3 list-inline list-inline-dots mb-0 text-secondary d-sm-block d-none">

                                    <div class="list-inline-item">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/building-community -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-chart-bar">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M3 13a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                                            <path d="M15 9a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v10a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                                            <path d="M9 5a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                                            <path d="M4 20h14" />
                                        </svg>
                                        12 - Lihat Statistik
                                    </div>
                                    <div class="list-inline-item">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/building-community -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-basket">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M10 14a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                            <path d="M5.001 8h13.999a2 2 0 0 1 1.977 2.304l-1.255 7.152a3 3 0 0 1 -2.966 2.544h-9.512a3 3 0 0 1 -2.965 -2.544l-1.255 -7.152a2 2 0 0 1 1.977 -2.304z" />
                                            <path d="M17 10l-2 -6" />
                                            <path d="M7 10l2 -6" />
                                        </svg>
                                        0 - Barang terjual
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-auto">
                                <div class="mt-3 badges">
                                    <a target="_blank" href="{{ url('/order'.'/'.$row->product_plan_link) }}" class="badge badge-outline text-azure badge-pill">Copy Link Produk</a>
                                    <a href="{{url('/manage/product/detail/'.urlencode(base64_encode($row->id)))}}" class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-settings">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                                            <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br />
        @empty
        <div class="card" style="border: 2px dashed #0054a6">
            <div class="empty">

                <div class="empty-action" style="margin-top:0px !important" data-bs-toggle="modal" data-bs-target="#modal-report">
                    <a href="#" class="btn btn-secondary" style="background:#ccc;">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 5l0 14"></path>
                            <path d="M5 12l14 0"></path>
                        </svg>
                        Buat Produk Pertama Anda
                    </a>
                </div>
            </div>
        </div>
        @endforelse


        <br />
        <br />
        <ul class="pagination m-0 ms-auto">
            {{ $product->appends(request()->query())->links() }}
        </ul>
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />


    </div>

</div>
<br />


@include('component.modal.product-add-digital')

<script type="text/javascript">
    $(document).ready(function() {



    })

</script>

@endsection
