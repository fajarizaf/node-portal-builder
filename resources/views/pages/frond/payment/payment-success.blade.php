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
    <div class="card-body text-center py-4 p-sm-5">
        <img src="{{ URL::asset('/assets/image/payment-success.png') }}" style="width:100px" />
        <h2 class="mt-5">Pembayaran Sukses</h2>
        <p class="text-secondary" style="font-size:12px;">Terimakasih pembayaran anda dengan rincian tagihan sebagai berikut : </p>


        <table class="table table-transparent table-responsive">
            <tbody>
                <tr>
                    <td class="text-left">Nomor Tagihan</td>
                    <td>:</td>
                    <td class="text-left"><a href="#"><b>INV-{{$invoices->id}}</b></a></td>
                </tr>
                <tr>
                    <td class="text-left">Total Tagihan</td>
                    <td>:</td>
                    <td class="text-left"><b>IDR. {{number_format($invoices_payment->payment_amount,0)}}</b></td>
                </tr>
                <tr>
                    <td class="text-left">Total Dibayar</td>
                    <td>:</td>
                    <td class="text-left">IDR. {{number_format($user_transaction->amount_in,0)}}</td>
                </tr>
            </tbody>
        </table>

        <p class="text-secondary" style="font-size:12px;">Telah berhasil kami terima.</p>

        <div class="form-selectgroup-label d-flex align-items-center p-3" style="justify-content:space-between;margin-bottom:10px;margin-top:10px;">

            <div class="me-3">
                <img style="height:50px" src="{{ URL::asset('/assets/image/channel/'.$user_transaction->payment_method_logo) }}" />
            </div>
            <div>

                <small class="form-hint">
                    No referensi pembayaran :
                </small>

                <b id="myText">{{$user_transaction->txnid}}</b>

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
        <p class="text-secondary" style="font-size:14px;">Link download produk telah kami kirimkan ke alamat email anda.</p>
        <a href="mailto: name@email.com" class="btn">Cek Email</a>


    </div>
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
