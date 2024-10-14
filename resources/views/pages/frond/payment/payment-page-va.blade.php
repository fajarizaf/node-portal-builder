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

    <div class="card-header" style="background:#f4f7fc;padding:0px">

        <table class="table table-transparent table-responsive">
            <tbody>
                <tr>
                    <td class="text-left">Waktu Tersedia</td>
                    <td>:</td>
                    <td class="text-right h2" id="countdown">

                    </td>
                </tr>
                <tr>
                    <td class="text-left" style="border-bottom:0px">Batas waktu pembayaran</td>
                    <td style="border-bottom:0px">:</td>
                    <td class="text-right" style="border-bottom:0px">{{\Carbon\Carbon::parse($user_payment[0]->payment_expired)->format('d M Y - H:i:s')}}</td>
                </tr>
            </tbody>
        </table>


    </div>


    <div class="card-body text-center py-4 p-sm-5">

        @forelse($user_payment as $payment)

        <div class="me-3">
            <img style="height:70px" src="{{ URL::asset('/assets/image/channel/'.$payment->payment_method_logo) }}" />
        </div>

        <h2 class="mt-5">Informasi Pembayaran</h2>
        <p class="text-secondary" style="font-size:12px;">Selesaikan pembayaran anda dengan informasi sebagai berikut : </p>


        <table class="table table-transparent table-responsive">
            <tbody>
                <tr>
                    <td class="text-left" style="border-bottom:0px">
                        <span>Metode pembayaran dipilih :</span><br />
                        <form method="GET" action="/order/payment/{{ urlencode(base64_encode(request()->invoices_id)) }}" id="form-product">
                            <select class="form-select" style="margin-top:5px;">
                                <option value="">Permata VA</option>
                            </select>
                        </form>
                    </td>
                </tr>

                <tr>
                    <td class="text-left">
                        Nomor Virtual Account : <br />
                        <h2>
                            {{$payment->payment_virtualaccount}} &nbsp;
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-library">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M7 3m0 2.667a2.667 2.667 0 0 1 2.667 -2.667h8.666a2.667 2.667 0 0 1 2.667 2.667v8.666a2.667 2.667 0 0 1 -2.667 2.667h-8.666a2.667 2.667 0 0 1 -2.667 -2.667z" />
                                <path d="M4.012 7.26a2.005 2.005 0 0 0 -1.012 1.737v10c0 1.1 .9 2 2 2h10c.75 0 1.158 -.385 1.5 -1" />
                                <path d="M11 7h5" />
                                <path d="M11 10h6" />
                                <path d="M11 13h3" />
                            </svg>

                        </h2>
                    </td>
                </tr>
                <tr>
                    <td class="text-left" style="border-bottom:0px">
                        Total yang harus dibayar : <br />
                        <h2>IDR. {{number_format($total,0)}}</h2>
                    </td>
                </tr>
            </tbody>
        </table>

        @empty

        <div class="form-selectgroup-label d-flex align-items-center p-3" style="justify-content:space-between;margin-bottom:10px;">
            <div>
                <small class="form-hint">
                    Informasi metode pembayaran belum tersedia
                </small>
            </div>
        </div>

        @endforelse

        <div class="form-selectgroup-label d-flex align-items-center p-3" style="justify-content:space-between;margin-bottom:10px;margin-top:10px;">
            <div>
                <small class="form-hint">
                    Nomor Tagihan :
                </small>
                <b id="myText">INV-{{$invoices->id}}</b>
            </div>
            <div>
                <div class="badge badge-outline text-red">Unpaid</div>
            </div>
        </div>


        <p class="text-secondary" style="font-size:12px;">Silahkan lakukan pembayaran sebelum lewat batas waktu pembayaran</p>


    </div>

</div>

<br />
<br />
<br />





<script>
    $('document').ready(function() {

        $('#change-pg').on('change', function() {
            this.form.submit();
        });

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


<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

<script>
    // Set the date we're counting down to
    var countDownDate = moment("{{$user_payment[0]->payment_expired}}");

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get todays date and time
        var now = moment();

        // Find the distance between now and the count down date
        var distance = countDownDate.diff(now);

        // Time calculations for days, hours, minutes and seconds
        var hours = moment.duration(distance).hours();
        var minutes = moment.duration(distance).minutes();
        var seconds = moment.duration(distance).seconds();

        // Display the result in the element with id="countdown"
        document.getElementById("countdown").innerHTML = hours + " : " +
            minutes + " : " + seconds;

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            location.reload('http:127.0.0.1:443/order/payment/{{urlencode(base64_encode($invoices->id))}}');
        }

    }, 1000);

</script>



@endsection
