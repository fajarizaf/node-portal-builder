@extends('layout-customer')
@section('container')

<style type="text/css">
    .step-item:after,
    .step-item:before {
        background: #503bac;
    }

    .btn-primary {
        background: #503bac;
    }

    .avatar-xs {
        width: 100px;
        height: 50px;
    }

    @media (max-width:500px) {
        .btn-trial {
            position: fixed;
            bottom: 0px;
            margin: 0px;
            padding-top: 15px;
            padding-bottom: 15px;
            left: 0;
            border-radius: 0px;
        }

        .cart-trial {
            margin-bottom: 70px;
        }
    }

    table tr td {
        font-size: 12px;
    }

    .text-left {
        text-align: left !important;
    }

</style>

@php
$color = StoreHelper::Display_color($site_id);
@endphp



<div class="card card-md">

    <div class="card-body text-center py-4 p-sm-5">

        <div class="form-selectgroup-label d-flex align-items-center p-3" style="justify-content:space-between;margin-bottom:10px;margin-top:10px;">

            <div>
                <small class="form-hint">
                    Nomor Pemesanan :
                </small>

                <b id="myText">ODR-{{$product->order_id}}</b>
            </div>
            <div>
                <small class="form-hint">
                    Tanggal Pemesanan :
                </small>

                <b id="myText">{{\Carbon\Carbon::parse($product->invoices_date)->format('d M Y - H:i:s')}}</b>
            </div>

            <div onclick="copyContent()">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-library">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M7 3m0 2.667a2.667 2.667 0 0 1 2.667 -2.667h8.666a2.667 2.667 0 0 1 2.667 2.667v8.666a2.667 2.667 0 0 1 -2.667 2.667h-8.666a2.667 2.667 0 0 1 -2.667 -2.667z" />
                    <path d="M4.012 7.26a2.005 2.005 0 0 0 -1.012 1.737v10c0 1.1 .9 2 2 2h10c.75 0 1.158 -.385 1.5 -1" />
                    <path d="M11 7h5" />
                    <path d="M11 10h6" />
                    <path d="M11 13h3" />
                </svg>
            </div>

        </div>
    </div>


    <div class="hr-text hr-text-center hr-text-spaceless">Link download produk</div>

    <div class="card-body text-center py-4 p-sm-5">

        <img src="{{ URL::asset('/assets/image/link_download.png') }}" style="width:100px" />
        <h3></h3>
        <p class="text-secondary" style="font-size:14px;"><span class="badge bg-cyan text-cyan-fg">{{$product->product_type}}</span>&nbsp; {{$product->product_plan_name}}</p>

        @if($product->product_type == 'produk digital')
        <a href="{{url('/customer/file/'.$product->product_source)}}" class="btn" @if(!empty($color)) style="background:{{$color->value}};width:100%;color:#fff" @else style="background:#503bac;width:100%;color:#fff" @endif>Download Produk</a>
        @else
        <a href="{{$product->product_source}}" class="btn" @if(!empty($color)) style="background:{{$color->value}};width:100%;color:#fff" @else style="background:#503bac;width:100%;color:#fff" @endif>Download Produk</a>
        @endif

    </div>

</div>
<br />
<div class="card">
    <div class="row row-0">
        <div class="col-lg-4">
            <!-- Photo -->
            <div id="carousel-indicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @forelse($product_photo as $photo)
                    <button type="button" data-bs-target="#carousel-indicators" data-bs-slide-to="{{ $loop->index }}"></button>
                    @empty

                    @endforelse
                </div>
                <div class="carousel-inner">
                    @forelse($product_photo as $photo)
                    <div class="carousel-item">
                        <img class="d-block w-100" alt="" src="{{url('storage/uploads/'.$photo->photo.'')}}">
                    </div>
                    @empty

                    @endforelse
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card-body">
                <h3 class="datagrid-title">Deskripsi Produk</h3>
                <p class="text-secondary">{!!$product_excerpt!!}</p>
                <button class="btn btn-sm" style="border-style:dashed;color:#666;width:100%;padding:5px;" data-bs-toggle="modal" data-bs-target="#product-expand">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-down">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M6 9l6 6l6 -6" />
                    </svg>
                    Lebih detail
                </button>
            </div>
        </div>
    </div>
</div>


<br />
<br />
<br />


<div class="modal modal-blur fade" id="product-expand" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{$product->product_plan_name}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">{!!$product->product_plan_desc!!}</div>

        </div>
    </div>
</div>



<script>
    $('document').ready(function() {

        $(".carousel-indicators button").first().addClass("active");
        $(".carousel-inner div").first().addClass("active");


    })

</script>

@endsection
