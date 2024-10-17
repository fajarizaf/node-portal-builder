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
    <title>Checkout - app.nodebuilder.id</title>
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

                <div class="col-12 col-lg-6 col-xl-7 d-lg-block" style="background:#fff">
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
                                            <a class="btn" style="margin-right:10px;">
                                                <svg style="margin-right:0px;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-left">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M5 12l14 0" />
                                                    <path d="M5 12l6 6" />
                                                    <path d="M5 12l6 -6" />
                                                </svg>
                                            </a>
                                            <a class="btn btn-primary" @if(!empty($color)) style="background:{{$color->value}}" @else style="background:#503bac" @endif>
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
                                <br />
                                <br />

                                @yield('container')

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6 col-xl-5 border-primary d-flex flex-column" style="background:#f4f7fc">
                    <div class="container px-5 pt-7" style="margin-top:70px">

                        <div class="row g-0 flex-fill">
                            <div class="col-12 col-lg-8 cart-trial">

                                <div class="row g-0 flex-fill">
                                    <div class="col-12 col-lg-12">
                                        <h2 class="h2 text-left mb-3">
                                            Keranjang Pesanan
                                        </h2>
                                    </div>
                                </div>

                                <form method="POST" action="/order-proccess" id="form-product">

                                    <table class="table table-transparent table-responsive">
                                        <thead>
                                            <tr>
                                                <th>Produk Dipilih</th>
                                                <th>Qty</th>
                                                <th class="text-end" style="width: 30%">Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p class="strong mb-1">{{$product_selected->product_plan_name}}</p>
                                                    <input type="hidden" name="product_item_id[]" value="{{ $product_selected->id }}" />
                                                    <input type="hidden" name="product_item_group[]" value="{{ $product_selected->product_group_name }}" />
                                                    <input type="hidden" name="product_item_name[]" value="{{ $product_selected->product_plan_name }}" />
                                                    <div class="text-secondary">Paket berlangganan 3 bulan</div>
                                                </td>
                                                <td class="text-end">
                                                    <input class="form-control product_item_qty" style="width:40px" type="text" name="product_item_qty[]" value="1" />
                                                </td>
                                                <td class="text-end">
                                                    <input type="hidden" class="product_item_price" name="product_item_price[]" value="{{ $product_selected->price }}" />
                                                    <b class="display_item_price">IDR. {{number_format($product_selected->price, 0,'.', '.')}}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="strong text-start">Total</td>
                                                <td class="strong text-start"></td>
                                                <td class="text-end" style="color:#29b662;">
                                                    <h2 class="display_price_total">IDR. {{number_format($product_selected->price, 0,'.', '.')}}</h2>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    <input type="hidden" name="billing_cycle" value="Monthly" />
                                    <input type="hidden" name="product_owner" value="{{ $product_selected->user_id }}" />
                                    <input type="text" style="display:none" name="nama" class="input_nama form-control" value="" required />
                                    <input type="text" style="display:none" name="email" class="input_email form-control" value="" required />
                                    <input type="text" style="display:none" name="no_hp" class="input_no_hp form-control" value="" required />
                                    <input type="hidden" name="total_tagihan" class="input_total_tagihan" value="{{$product_selected->price}}" />
                                    <input type="hidden" name="total_tax_rate" class="input_tax_rate" value="" />
                                    <input type="hidden" name="total_tax" class="input_tax" value="" />
                                    <input type="hidden" name="billing_cycle" class="billing_cycle" value="Onetime" />
                                    <input type="hidden" name="order_type" class="input_order_type" value="paid" />
                                    <input type="hidden" name="order_promo" class="input_order_promo" value="" />
                                    <button type="submit" @if(!empty($color)) style="background:{{$color->value}}" @else style="background:#503bac" @endif class="btn btn-primary w-100 btn-trial btn-order">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-basket">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M10 14a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                            <path d="M5.001 8h13.999a2 2 0 0 1 1.977 2.304l-1.255 7.152a3 3 0 0 1 -2.966 2.544h-9.512a3 3 0 0 1 -2.965 -2.544l-1.255 -7.152a2 2 0 0 1 1.977 -2.304z" />
                                            <path d="M17 10l-2 -6" />
                                            <path d="M7 10l2 -6" />
                                        </svg>
                                        &nbsp;
                                        Pesan Sekarang - IDR. {{number_format($product_selected->price,'0')}}
                                    </button>

                                </form>

                            </div>
                            <div class="col-12 col-lg-4"></div>
                        </div>

                    </div>
                </div>

            </div>


            <div class="modal modal-blur fade" id="product-expand" tabindex="-1" aria-modal="true" role="dialog">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{$product_selected->product_plan_name}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">{!!$product_selected->product_plan_desc!!}</div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {

            $('.product_item_qty').change(function() {

                var item_price = $('.product_item_price').val()
                var sub_total = $(this).val() * item_price
                $('.product_item_price').val(sub_total)
                $('.display_item_price').text('IDR. ' + sub_total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."))


                var tax_rate = $('.total_tax_rate').val()

                if (tax_rate) {
                    var calc = sub_total * tax_rate
                    var pcalc = calc / 100
                    var total = calc + pcalc
                } else {
                    var total = sub_total

                }

                $('.display_price_total').text('IDR. ' + total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."))
                $('.btn-order').val('Pesan Sekarang - IDR. ' + total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."))




            })

        })

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
