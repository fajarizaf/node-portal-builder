@extends('layout-single-order')
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

@php
$logo = StoreHelper::Display_logo($site_id);
$color = StoreHelper::Display_color($site_id);
$display = StoreHelper::Display_product($site_id);
@endphp



<div class="form-label">Produk dipilih :</div>

<form method="POST" action="/order/switch" id="form-product">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <select type="text" id="select-product" class="form-select" id="" name="product_plan">
        <option value="{{$product_selected->id}}" data-custom-properties="&lt;span class=&quot;badge bg-primary-lt&quot;&gt;{{$product_selected->product_group_name}}&lt;/span&gt;">{{$product_selected->product_plan_name}}</option>
        @forelse($product_owner as $p_owner)
        <option value="{{$p_owner->id}}" data-custom-properties="&lt;span class=&quot;badge bg-primary-lt&quot;&gt;{{$p_owner->product_group_name}}&lt;/span&gt;">{{$p_owner->product_plan_name}}</option>
        @empty
        <option value="" data-custom-properties="&lt;span class=&quot;avatar avatar-xs&quot; style=&quot;background-image: url(./static/avatars/000m.jpg)&quot;&gt;&lt;/span&gt;">Produk tidak tersedia</option>
        @endforelse
    </select>
    </select>
</form>

<br />
<div class="mb-3">

    @if(!empty($display->value))
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
    @endif

</div>


<br />
<div class="mb-3">
    <label class="form-label required">Nama</label>
    <div>
        <input type="text" class="form-control nama" aria-describedby="emailHelp" name="name" placeholder="Masukan Nama Lengkap" required autofocus>

    </div>
</div>
<div class="mb-3">
    <label class="form-label required">Email</label>
    <div>
        <input type="email" class="form-control email" aria-describedby="emailHelp" name="email" placeholder="Email Anda" required>

        <small class="form-hint">alamat email ini nantinya digunakan untuk login ke area pelanggan.</small>
    </div>
</div>
<div class="mb-3">
    <label class="form-label required">Nomor HP</label>
    <div>
        <input type="text" class="form-control no_hp" name="no_hp" placeholder="Nomor Handphone" required>
    </div>
</div>

<script>
    $('document').ready(function() {

        $(".carousel-indicators button").first().addClass("active");
        $(".carousel-inner div").first().addClass("active");

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

</script>

@endsection
