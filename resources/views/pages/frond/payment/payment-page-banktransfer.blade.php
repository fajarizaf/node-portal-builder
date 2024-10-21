@extends('layout-payment-info')
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

@php $total = 0; @endphp
@forelse($invoices_item as $item)
@php
$sub = $item->amount * $item->qty;
$total = $total + $sub;
@endphp
@empty

@endforelse

@php
$color = StoreHelper::Display_color($site_id);
@endphp



<div class="card card-md">

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


    <div class="card-body text-center py-4 p-sm-5">
        <img src="{{ URL::asset('/assets/image/thanks_payment.png') }}" style="width:100px" />
        <h2 class="mt-5">Informasi Pembayaran</h2>
        <p class="text-secondary" style="font-size:12px;">Selesaikan pembayaran anda dengan informasi berikut : </p>


        <table class="table table-transparent table-responsive">
            <tbody>
                <tr>
                    <td class="text-left">Total Tagihan</td>
                    <td>:</td>
                    <td class="text-left"><b>IDR. {{number_format($total,0)}}</b></td>
                </tr>
                <tr>
                    <td class="text-left">Batas Pembayaran</td>
                    <td>:</td>
                    <td class="text-left">{{\Carbon\Carbon::parse($invoices->invoices_duedate)->format('Y/M/d')}}</td>
                </tr>
            </tbody>
        </table>

        <p class="text-secondary" style="font-size:12px;">Silahkan transfer ke salah satu rekening dibawah ini</p>

        @forelse($user_bank as $bank)
        <div class="form-selectgroup-label d-flex align-items-center p-3" style="justify-content:space-between;margin-bottom:10px;margin-top:10px;">

            <div class="me-3">
                <img style="height:30px" src="{{ URL::asset('/assets/image/'.$bank->bank_logo) }}" />
            </div>
            <div>
                <small class="form-hint">
                    {{$bank->account_name}}
                </small>

                <b id="myText">{{$bank->account_number}}</b>

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
        <div class="row">
            <div class="col-12">
                <small class="text-left">Notes :</small>
                <small class="text-left">{{$bank->notes}}</small>
            </div>
        </div>
        @empty
        <div class="form-selectgroup-label d-flex align-items-center p-3" style="justify-content:space-between;margin-bottom:10px;">
            <div>
                <small class="form-hint">
                    Informasi rekening belum tersedia.
                </small>
            </div>
        </div>

        @endforelse


        <p class="text-secondary" style="font-size:12px;">Setelah melakukan transfer silahkan lakukan konfirmasi pembayaran</p>


    </div>
    <div class="hr-text hr-text-center hr-text-spaceless">Konfirmasi Pembayaran</div>
    <form method="POST" enctype="multipart/form-data" action="/order/add_bukti_transfer">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="text" style="display:none" name="invoices_id" value="{{ $invoices->id }}" />

        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">Nama Pemilik Rekening</label>
                <div class="input-group input-group-flat">
                    <input type="text" name="pemilik_rekening" class="form-control ps-1" autocomplete="off" required>
                </div>
            </div>
            <div class="mb-3">

                <label class="form-label">Nomor Rekening</label>
                <input type="number" name="nomor_rekening" class="form-control" required>
            </div>

            <div class="mb-3">

                <label class="form-label">Bukti Transfer</label>
                <input type="file" name="bukti_transfer" class="form-control" required>
            </div>
            <div>
                <br /><br />
                <button type="submit" class="btn" @if(!empty($color)) style="background:{{$color->value}};width:100%;color:#fff" @else style="background:#503bac;width:100%;color:#fff" @endif>Submit</button>
            </div>
        </div>
    </form>
</div>

<br />
<br />
<br />





<script>
    $('document').ready(function() {


    })

    let text = document.getElementById('myText').innerHTML;
    const copyContent = async () => {
        try {
            await navigator.clipboard.writeText(text);
            console.log('Content copied to clipboard');
        } catch (err) {
            console.error('Failed to copy: ', err);
        }
    }

</script>

@endsection
