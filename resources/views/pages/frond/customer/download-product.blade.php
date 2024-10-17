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

    <div class="hr-text hr-text-center hr-text-spaceless">Link download produk</div>

    <div class="card-body text-center py-4 p-sm-5">

        <img src="{{ URL::asset('/assets/image/link_download.png') }}" style="width:100px" />
        <h3></h3>
        <p class="text-secondary" style="font-size:14px;"><span class="badge bg-cyan text-cyan-fg">{{$product->product_type}}</span>&nbsp; {{$product->product_plan_name}}</p>

        <a href="{{url('/storage/uploads/product/'.$product->product_source)}}" class="btn">Download Produk</a>

    </div>
</div>

<br />
<br />
<br />





<script>
    $('document').ready(function() {


    })

</script>

@endsection
