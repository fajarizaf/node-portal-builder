@extends('layout-1')
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

</style>

<div class="row g-0 flex-fill">

    <div class="col-12 col-lg-6 col-xl-7 d-lg-block" style="background:#fff">
        <div class="container px-5 pt-4">
            <div class="row g-0 flex-fill">
                <div class="col-12 col-lg-5"></div>
                <div class="col-12 col-lg-7">
                    <div class="row g-0 flex-fill">
                        <div class="col-12 col-lg-4">
                            @if(empty(auth()->user()->id))
                            <img src="{{ URL::asset('/assets/static/logo.png') }}" />
                            @endif
                        </div>
                        <div class="col-12 col-lg-8">
                            <ul class="steps steps-green my-4">
                                <li class="step-item active">Isi Data Diri</li>
                                <li class="step-item ">Instalasi web</li>
                                <li class="step-item">Selesai</li>
                            </ul>
                        </div>
                    </div>
                    <br />
                    <br />
                    <br />
                    <p class="fs-1">Mulai uji coba<b> gratis 7 hari Anda</b></p>
                    <p><b>Uji coba Anda sepenuhnya gratis.</b>Kami meminta Anda untuk memberikan informasi pembayaran sekarang untuk menghindari gangguan layanan setelah masa uji coba berakhir.</p>

                    <div class="form-label">Produk dipilih :</div>

                    <form method="POST" action="/switch" id="form-product">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <select type="text" class="form-select" id="select-product" name="product_plan">
                            <option value="{{$product_selected->id}}" data-custom-properties="&lt;span class=&quot;badge bg-primary-lt&quot;&gt;{{$product_selected->product_plan_name}}&lt;/span&gt;">{{$product_selected->product_group_name}}</option>
                            @forelse($product_owner as $p_owner)
                            <option value="{{$p_owner->id}}" data-custom-properties="&lt;span class=&quot;badge bg-primary-lt&quot;&gt;{{$p_owner->product_plan_name}}&lt;/span&gt;">{{$p_owner->product_group_name}}</option>
                            @empty
                            <option value="" data-custom-properties="&lt;span class=&quot;avatar avatar-xs&quot; style=&quot;background-image: url(./static/avatars/000m.jpg)&quot;&gt;&lt;/span&gt;">Produk tidak tersedia</option>
                            @endforelse
                        </select>
                        </select>
                    </form>


                    <br />
                    <div class="form-label">Tentukan nama domain :</div>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control subdomain" placeholder="subdomain" autocomplete="off">
                        <span class="input-group-text">.nodebuilder.id</span>
                    </div>
                    <br />
                    <div class="mb-3">
                        <label class="form-label required">Nama</label>
                        <div>
                            <input type="text" class="form-control nama" aria-describedby="emailHelp" name="name" placeholder="Masukan Nama Lengkap">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Email</label>
                        <div>
                            <input type="email" class="form-control email" aria-describedby="emailHelp" name="email" placeholder="Enter email">
                            <small class="form-hint">alamat email ini nantinya digunakan untuk login ke area pelanggan.</small>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Nomor HP</label>
                        <div>
                            <input type="password" class="form-control no_hp" name="password" placeholder="Password">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-6 col-xl-5 border-primary d-flex flex-column" style="background:#f4f7fc">
        <div class="container px-5 pt-7" style="margin-top:70px">

            <div class="row g-0 flex-fill">
                <div class="col-12 col-lg-8 cart-trial">

                    <div class="row g-0 flex-fill">
                        <div class="col-12 col-lg-6">
                            <h2 class="h2 text-left mb-3">
                                Ringkasan Pesanan
                            </h2>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <form method="GET" action="/checkout/{{ urlencode(request()->product_id) }}" id="form-product">
                                    <select class="form-select" name="billing_cycle" id="billing_cycle">
                                        <option value="{{$billing_cycle_selected}}">{{$billing_cycle_selected}}</option>
                                        @forelse($product_cycle as $cycle)
                                        <option value="{{$cycle->billing_cycle}}">{{$cycle->billing_cycle}}</option>
                                        @empty
                                        <option value="1">Monthly</option>
                                        @endforelse
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>

                    <form method="POST" action="/checkout-proccess" id="form-product">

                        <table class="table table-transparent table-responsive">
                            <thead>
                                <tr>
                                    <th>Produk Dipilih</th>
                                    <th class="text-end" style="width: 30%">Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <p class="strong mb-1">{{$product_selected->product_plan_name}}</p>
                                        <input type="hidden" name="product_item_group[]" value="{{ $product_selected->product_group_name }}" />
                                        <input type="hidden" name="product_item_name[]" value="{{ $product_selected->product_plan_name }}" />
                                        <input type="hidden" name="product_item_qty[]" value="1" />
                                        <div class="text-secondary">Paket berlangganan 3 bulan</div>
                                    </td>
                                    <td class="text-end">
                                        <input type="hidden" name="product_item_price[]" value="{{ $product_selected->price }}" />
                                        <b>IDR. {{number_format($product_selected->price, 0,'.', '.')}}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="strong text-start">Total Tagihan</td>
                                    <td class="text-end" style="color:#29b662;">
                                        <h2>IDR. 0</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border-bottom:none" class="strong text-start">Tagihan berikutnya<br /><small class="form-hint">Apabila ingin berlangganan</small></td>
                                    <td class="text-end" style="border-bottom:none"><b>IDR. {{number_format($product_selected->price, 0,'.', '.')}}</b></td>
                                </tr>
                            </tbody>
                        </table>

                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="product_id" value="{{ $product_selected->id }}" />
                        <input type="hidden" name="billing_cycle" value="{{ $billing_cycle_selected }}" />
                        <input type="hidden" name="product_owner" value="{{ $product_selected->user_id }}" />
                        <input type="hidden" name="subdomain" class="input_subdomain" value="" />
                        <input type="hidden" name="nama" class="input_nama" value="" />
                        <input type="hidden" name="email" class="input_email" value="" />
                        <input type="hidden" name="no_hp" class="input_no_hp" value="" />
                        <input type="hidden" name="total_tagihan" class="input_total_tagihan" value="{{$product_selected->price}}" />
                        <input type="hidden" name="total_tax_rate" class="input_tax_rate" value="0" />
                        <input type="hidden" name="total_tax" class="input_tax" value="0" />
                        <input type="hidden" name="order_type" class="input_order_type" value="trial" />
                        <input type="hidden" name="order_promo" class="input_order_promo" value="Free Trial 7 Hari" />
                        <input type="submit" class="btn btn-primary w-100 btn-trial" value="Mulai Uji Coba Gratis 7 Hari" />
                    </form>

                </div>
                <div class="col-12 col-lg-4"></div>
            </div>



        </div>
    </div>

</div>

<!-- Libs JS -->
<script src="{{ URL::asset('assets/dist/libs/tom-select/dist/js/tom-select.base.min.js?1692870487') }}" defer></script>

<script>
    $('document').ready(function() {
        $('#billing_cycle').on('change', function() {
            this.form.submit();
        });

        $('#select-product').on('change', function() {
            this.form.submit();
        });
    })


    $(".subdomain").on("change", function() {
        textChange = $(this).val();
        $('.input_subdomain').val(textChange)
    });

    $(".nama").on("change", function() {
        textChange = $(this).val();
        $('.input_nama').val(textChange)
    });

    $(".email").on("change", function() {
        textChange = $(this).val();
        $('.input_email').val(textChange)
    });

    $(".no_hp").on("change", function() {
        textChange = $(this).val();
        $('.input_no_hp').val(textChange)
    });

    // @formatter:off
    document.addEventListener("DOMContentLoaded", function() {
        var el;
        window.TomSelect && (new TomSelect(el = document.getElementById('select-product'), {
            copyClassesToDropdown: false
            , dropdownParent: 'body'
            , controlInput: '<input>'
            , render: {
                item: function(data, escape) {
                    if (data.customProperties) {
                        return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
                    }
                    return '<div>' + escape(data.text) + '</div>';
                }
                , option: function(data, escape) {
                    if (data.customProperties) {
                        return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
                    }
                    return '<div>' + escape(data.text) + '</div>';
                }
            , }
        , }));
    });
    // @formatter:on

</script>

@endsection