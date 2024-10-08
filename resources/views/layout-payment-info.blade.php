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
                    <div class="container px-5 pt-7" style="margin-top:0px">

                        <div class="row g-0 flex-fill">

                            <div class="col-12 col-lg-8 cart-trial">

                                <div class="card-body" style="background:#fff">
                                    <div class="accordion" id="accordion-example">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="heading-1">
                                                <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapse-1" aria-expanded="true">
                                                    Ringkasan Tagihan
                                                </button>
                                            </h2>
                                            <div id="collapse-1" class="accordion-collapse collapse show" data-bs-parent="#accordion-example">
                                                <div class="">


                                                    <table class="table table-transparent table-responsive">
                                                        <thead>
                                                            <tr>
                                                                <th style="width:70%;border:none">Item</th>
                                                                <th style="border:none">Harga</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php $total = 0; @endphp
                                                            @forelse($invoices_item as $item)
                                                            <tr>
                                                                <td style="border:none">{{$item->item_name}}</td>
                                                                <td style="border:none">
                                                                    @php
                                                                    $sub = $item->amount * $item->qty;
                                                                    $total = $total + $sub;
                                                                    @endphp
                                                                    IDR. {{number_format($sub)}}

                                                                </td>
                                                            </tr>
                                                            @empty

                                                            @endforelse

                                                            <tr>
                                                                <td style="border:none">Sub Total</td>
                                                                <td style="border:none">IDR. {{number_format($total)}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="border:none">Discount</td>
                                                                <td style="border:none">-</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="border:none">Biaya Transaksi</td>
                                                                <td style="border:none">-</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="border:none;border-top:1px solid #ccc;"><b>Total harus dibayar</b></td>
                                                                <td style="border:none;border-top:1px solid #ccc;">
                                                                    <h3>IDR. {{number_format($total)}}</h3>

                                                                </td>

                                                            </tr>

                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="col-12 col-lg-8 cart-trial">

                            </div>



                        </div>

                    </div>
                </div>

            </div>


        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {



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
