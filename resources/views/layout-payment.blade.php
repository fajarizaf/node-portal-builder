<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta20
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Payment - app.nodebuilder.id</title>
    <link rel="icon" href="{{ URL::asset('assets/static/logo-uninet-white.svg') }}" type="image/x-icon">
    <!-- CSS files -->
    <link href="{{ URL::asset('assets/dist/css/tabler.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/dist/css/tabler-flags.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/dist/css/tabler-payments.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/dist/css/tabler-vendors.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/dist/css/demo.min.css?1692870487') }}" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }

        .layout-boxed {
            background: #fff !important;
        }

        .page-wrapper {
            background: #fff;
        }

        .avatar {
            border-radius: 50px !important;
            overflow: hidden;
        }

        @media (max-width: 480px) {
            .header-order {
                height: auto;
            }
        }

    </style>

    @php
    $logo = StoreHelper::Display_logo($site_id);
    $color = StoreHelper::Display_color($site_id);
    $display = StoreHelper::Display_product($site_id);
    @endphp


</head>

<body>
    <script src="{{ URL::asset('assets/dist/js/demo-theme.min.js?1692870487') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <div class="page">



        <div class="page-wrapper" style="background:#f4f7fc">

            <div class="row g-0 flex-fill">

                <div class="col-12 col-lg-6 col-xl-7 d-lg-block header-order" style="background:#fff">
                    <div class="container px-5 pt-4">
                        <div class="row g-0 flex-fill">
                            <div class="col-12 col-lg-5"></div>
                            <div class="col-12 col-lg-7">
                                <div class="row g-0 d-flex">
                                    <div class="col-4">
                                        <div class="img-result hide avatar avatar-xl rounded">
                                            @if(!empty($logo->value))
                                            <img src="{{url('storage/uploads/avatar/'.$logo->value.'')}}" />
                                            @else
                                            <img src="{{ URL::asset('/assets/static/logo.png') }}" />
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <br />
                                        <div style="display:flex;justify-content:flex-end">
                                            <a id="shareBtn" class="btn btn-primary" @if(!empty($color)) style="background:{{$color->value}}" @else style="background:#503bac" @endif>
                                                <svg style="margin-right:0px;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M6 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                                                    <path d="M18 6m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                                                    <path d="M18 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                                                    <path d="M8.7 10.7l6.6 -3.4"></path>
                                                    <path d="M8.7 13.3l6.6 3.4"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <br />
                                @yield('container')

                            </div>
                        </div>
                    </div>
                </div>




                <div class="col-12 col-lg-6 col-xl-5 border-primary d-flex flex-column" style="background:#f4f7fc">
                    <form method="POST" action="/order/payment" id="form-pay">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    </form>
                    <form method="POST" action="/order/payment" id="form-product">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                        <input type="text" style="display:none" name="invoices_id" value="{{$invoices->id}}" />
                        <input type="text" style="display:none" name="site" class="site" value="{{$site_id}}" />
                        <input type="text" style="display:none" name="fee" class="fee" value="0" />
                        <input type="text" style="display:none" name="total" class="total" value="{{$total}}" />

                        <div class="container px-5 pt-4" style="margin-top:0px">

                            <div class="row g-0 flex-fill">

                                <div class="col-12 col-lg-8 cart-trial">
                                    <div class="row g-0 flex-fill">
                                        <div class="col-12 col-lg-12">
                                            <h3 class="h3 text-left mb-3">
                                                Pilih Metode Pembayaran
                                            </h3>
                                            <br />

                                            @forelse($payment_options as $options)
                                            <label class="form-selectgroup-item flex-fill" style="margin-bottom:10px;">
                                                <input type="radio" name="payment_method" value="{{$options->method_id}}" class="form-selectgroup-input payment_method">

                                                <div class="form-selectgroup-label d-flex align-items-center p-2">
                                                    <div class="row" style="width:100%;">
                                                        <div class="col-1">
                                                            <span class="form-selectgroup-check"></span>
                                                        </div>
                                                        <div class="col-3">
                                                            <img src="{{ URL::asset('/assets/image/channel/'.$options->payment_method_logo) }}" style="width:40px;height:40px;" />&nbsp;
                                                        </div>
                                                        <div class="col-8">
                                                            <small>{{$options->payment_method_group}}</small><br />
                                                            <b>{{$options->payment_method_name}}</b>
                                                        </div>
                                                    </div>
                                                </div>
                                            </label>
                                            @empty
                                            <label class="form-selectgroup-item flex-fill" style="margin-bottom:10px;">
                                                <input type="radio" name="payment_method" value="1" class="form-selectgroup-input" checked="">
                                                <div class="form-selectgroup-label d-flex align-items-center p-2">
                                                    <div class="me-3">
                                                        <span class="form-selectgroup-check"></span>
                                                    </div>
                                                    <div>
                                                        <img src="{{ URL::asset('/assets/image/bank_transfer.png') }}" style="height:40px;" />
                                                        <b>Tidak ada metode pembayaran</b>
                                                    </div>
                                                </div>
                                            </label>
                                            @endforelse


                                            <button disabled type="submit" @if(!empty($color)) style="background:{{$color->value}};z-index:999;margin-top:20px" @else style="background:#503bac;z-index:999;margin-top:20px" @endif class="btn btn-primary w-100 btn-trial btn-order">

                                                Bayar Sekarang &nbsp;
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-narrow-right">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M5 12l14 0" />
                                                    <path d="M15 16l4 -4" />
                                                    <path d="M15 8l4 4" />
                                                </svg>

                                            </button>

                                        </div>
                                    </div>

                                    <div class="card" style="background:none;border:none;width:85%;margin:0px auto;z-index:1">
                                        <div class="row row-0">
                                            <div class="col-3">
                                                <!-- Photo -->
                                                <img style="margin-top:12px" src="{{URL::asset('assets/image/secure_payment.png')}}" class="w-100 object-cover card-img-start" alt="Beautiful blonde woman relaxing with a can of coke on a tree stump by the beach">

                                            </div>
                                            <div class="col">
                                                <div class="card-body">
                                                    <h3 class="card-title">Secure Payment</h3>
                                                    <p class="text-secondary" style="margin-top:-10px;font-size:12px">RSA Security Encryption<br />secure all of your payment</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="col-12 col-lg-4">

                                </div>

                            </div>

                        </div>
                </div>
            </div>

        </div>


    </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('#form-pay').find('input[name="_token"]').first().val()
                }
            });


            $('.payment_method').click(function() {

                method_id = $(this).val()

                site = $('.site').val()

                $.ajax({
                    type: "GET"
                    , dataType: "json"
                    , url: "{{ route('get_payment_fee') }}"
                    , data: {
                        'method_id': method_id
                        , 'site': site
                    }
                    , success: function(data) {

                        $('.btn-order').removeAttr("disabled")

                        var total = Number($('.total').val())
                        var fee = Number(data['fee'])

                        var calc_fee = total + fee
                        $('.fees').html('IDR. ' + fee)
                        $('.calc_fee').html('IDR. ' + calc_fee)

                        $('.fee').val(fee);
                        $('.total').val(calc_fee);


                    }
                });

            })


        })

        const shareBtnRef = document.querySelector('#shareBtn');
        shareBtnRef.onclick = async () => {
            //check if native sharing is available
            if (navigator.share) {
                try {
                    const shareData = {
                        title: 'app.landingi.id - Pilih Metode Pembayaran'
                        , text: 'Pilih metode pembayaran dari pesanan anda'
                        , url: window.location.href
                    , }
                    await navigator.share(shareData);
                    console.log('Share successfull');
                } catch (err) {
                    console.log('Error: ', err);
                }
            } else {
                console.warn('Native Web Sharing not supported');
            }
        }

    </script>

    <!-- Libs JS -->
    <script src="{{ URL::asset('assets/dist/libs/nouislider/dist/nouislider.min.js?1692870487') }}" defer></script>
    <script src="{{ URL::asset('assets/dist/libs/litepicker/dist/litepicker.js?1692870487') }}" defer></script>
    <script src="{{ URL::asset('assets/dist/libs/tom-select/dist/js/tom-select.base.min.js?1692870487') }}" defer></script>

    <!-- Tabler Core -->
    <script src="{{ URL::asset('assets/dist/js/tabler.min.js?1692870487') }}" defer></script>
    <script src="{{ URL::asset('assets/dist/js/demo.min.js?1692870487') }}" defer></script>

</body>

</html>
