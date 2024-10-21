@extends('layout-1')
@section('container')

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

<!-- Normalize CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<!-- Cropper CSS -->
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/cropper/2.3.4/cropper.min.css'>



<style>
    .frame-hp {
        width: 300px;
        height: 616px;
        background-image: url("{{ URL::asset('/assets/image/frame-hp.png') }}");

        padding-top: 73px;
        padding-left: 20px;
    }

    .box-hp {
        position: relative;
        background: #000;
        width: 264px;
        left: -2px;
        height: 467px;
        border-radius: 2px;
        padding: 0px;
        margin: 0px;
        overflow: hidden;
    }

    .nav-persona .card {
        background: #f8fbff;
        border: none;
    }

    .nav-persona .card:hover {
        background: #fff;
        border-inline-style: solid;
        border: 1px solid #0054a6;


    }

    .nav-persona .active {
        border-color: #0054a6;
        background-color: #fff;
    }

    a:hover {
        text-decoration: none
    }

    .avatar {
        border-radius: 50px !important;
        overflow: hidden;
    }

</style>



<div class="row g-0 flex-fill">
    <div class="col-12 col-lg-6 col-xl-3 d-none d-lg-block p-5" style="background:#fff">

        <h2 class="page-title">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-freeze-row">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M3 5a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-14z" />
                <path d="M21 9h-18" />
                <path d="M15 3l-6 6" />
                <path d="M9.5 3l-6 6" />
                <path d="M20 3.5l-5.5 5.5" />
            </svg>
            Landing
        </h2>
        <br />

        <div class="form-selectgroup form-selectgroup-boxes d-flex flex-column">

            @forelse($sites as $ste)
            <a href="{{url('/store/settings/'.urlencode(base64_encode($ste->id)).'')}}" class="form-selectgroup-item flex-fill">
                <input type="radio" name="form-payment" value="visa" class="form-selectgroup-input" @if($site_active==$ste->id) checked @endif>
                <div class="form-selectgroup-label d-flex align-items-center p-3" style="justify-content:space-between">
                    <div class="me-3">
                        <span class="form-selectgroup-check"></span>
                    </div>
                    <div>
                        <b>{{$ste->domain_name}}</b>
                    </div>
                </div>
            </a>
            @empty
            <p>Saat ini anda belum memiliki situs yang telah dibangun, pergi ke halaman "Site" untuk memulai.</p>
            @endforelse
            <br />
            <a href="{{url('/manage/site')}}" class="btn" style="border-style:dashed;color:#666;height:60px;width:98%">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 5l0 14"></path>
                    <path d="M5 12l14 0"></path>
                </svg>
                Tambahkan Situs
            </a>

        </div>

    </div>
    <div class="col-12 col-lg-6 col-xl-9 d-none d-lg-block p-5" style="background:#f4f7fc">

        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <h2 class="page-title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-itch">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M2 7v1c0 1.087 1.078 2 2 2c1.107 0 2 -.91 2 -2c0 1.09 .893 2 2 2s2 -.91 2 -2c0 1.09 .893 2 2 2s2 -.91 2 -2c0 1.09 .893 2 2 2s2 -.91 2 -2c0 1.09 .893 2 2 2c.922 0 2 -.913 2 -2v-1c-.009 -.275 -.538 -.964 -1.588 -2.068a3 3 0 0 0 -2.174 -.932h-12.476a3 3 0 0 0 -2.174 .932c-1.05 1.104 -1.58 1.793 -1.588 2.068z" />
                        <path d="M4 10c-.117 6.28 .154 9.765 .814 10.456c1.534 .367 4.355 .535 7.186 .536c2.83 -.001 5.652 -.169 7.186 -.536c.99 -1.037 .898 -9.559 .814 -10.456" />
                        <path d="M10 16l2 -2l2 2" />
                        <path d="M12 14v4" />
                    </svg>

                    Toko -> Personalisasi
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">

            </div>
        </div>
        <br />


        <div class="row g-0 flex-fill">

            <div class="col-12 col-lg-6 col-xl-3 d-none d-lg-block p-2">

                <div class="row row-cards" style="margin-top:50px;">

                    <div class="col-12 nav-persona">
                        <a href="{{url('/manage/store/settings/'.urlencode(base64_encode($site_active)).'')}}" style="text-decoration: none">
                            <div class="card card-sm active">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                Personalisasi
                                            </div>
                                            <div class="text-secondary">
                                                <b>Tampilan</b>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>


                    <div class="col-12 nav-persona">


                        <div class="card card-sm">
                            <a href="{{url('/manage/store/order/'.urlencode(base64_encode($site_active)).'')}}" style="text-decoration: none">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                Personalisasi
                                            </div>
                                            <div class="text-secondary">
                                                <b>Order</b>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-12 nav-persona">
                        <a href="{{url('/manage/store/payment/'.urlencode(base64_encode($site_active)).'')}}" style="text-decoration: none">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                Personalisasi
                                            </div>
                                            <div class="text-secondary">
                                                <b>Pembayaran</b>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>


            </div>
            <div class="col-12 col-lg-6 col-xl-9 d-none d-lg-block p-2">

                <form method="POST" id="form-settings" enctype="multipart/form-data" action="/store/settings">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="text" style="display:none" name="site" class="site_id" value="{{ $site_active }}" />

                    <div class="row g-0 flex-fill">
                        <div class="col p-4">


                            <div class="hr-text hr-text-center hr-text-spaceless">Ubah Logo</div>
                            <div class="card-body row" style="padding-top:40px;padding-bottom:40px;">
                                <div class="col-3">

                                    <div class="img-result hide avatar avatar-xl rounded">

                                        @if($settings_logo->value != '')
                                        <img class="cropped" src="{{url('storage/uploads/avatar/'.$settings_logo->value.'')}}" />
                                        @else
                                        <img class="cropped" src="{{ URL::asset('/assets/static/logo.png') }}" />
                                        @endif

                                    </div>

                                </div>
                                <div class="col-9">
                                    <div class="mb-3">
                                        <input style="display:none" name="file-input" type="file" class="form-control" id="file-input">
                                        <a href="#" class="btn btnd-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#upload-image" style="margin-top:20px">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M12 5l0 14"></path>
                                                <path d="M5 12l14 0"></path>
                                            </svg>
                                            Upload
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="hr-text hr-text-center hr-text-spaceless">Preferensi Warna</div>
                            <div class="card-body row" style="padding-top:40px;padding-bottom:40px;">
                                <div class="col12">
                                    <div class="mb-3">
                                        <label class="form-label">Pilih Warna</label>
                                        <div class="row g-2">
                                            <div class="col-auto">
                                                <label class="form-colorinput">
                                                    <input name="color" type="radio" value="#000" class="form-colorinput-input color" @if($settings_color->value == '#000') checked @endif>
                                                    <span class="form-colorinput-color bg-dark"></span>
                                                </label>
                                            </div>
                                            <div class="col-auto">
                                                <label class="form-colorinput">
                                                    <input name="color" type="radio" value="#0054a6" class="form-colorinput-input color" @if($settings_color->value == '#0054a6') checked @endif>
                                                    <span class="form-colorinput-color bg-blue"></span>
                                                </label>
                                            </div>
                                            <div class="col-auto">
                                                <label class="form-colorinput">
                                                    <input name="color" type="radio" value="#4299e1" class="form-colorinput-input color" @if($settings_color->value == '#4299e1') checked @endif>
                                                    <span class="form-colorinput-color bg-azure"></span>
                                                </label>
                                            </div>
                                            <div class="col-auto">
                                                <label class="form-colorinput">
                                                    <input name="color" type="radio" value="#4263eb" class="form-colorinput-input color" @if($settings_color->value == '#4263eb') checked @endif>
                                                    <span class="form-colorinput-color bg-indigo"></span>
                                                </label>
                                            </div>
                                            <div class="col-auto">
                                                <label class="form-colorinput">
                                                    <input name="color" type="radio" value="purple" class="form-colorinput-input color" @if($settings_color->value == 'purple') checked @endif>
                                                    <span class="form-colorinput-color bg-purple"></span>
                                                </label>
                                            </div>
                                            <div class="col-auto">
                                                <label class="form-colorinput">
                                                    <input name="color" type="radio" value="#d6336c" class="form-colorinput-input color" @if($settings_color->value == '#d6336c') checked @endif>
                                                    <span class="form-colorinput-color bg-pink"></span>
                                                </label>
                                            </div>
                                            <div class="col-auto">
                                                <label class="form-colorinput">
                                                    <input name="color" type="radio" value="#d63939" class="form-colorinput-input color" @if($settings_color->value == '#d63939') checked @endif>
                                                    <span class="form-colorinput-color bg-red"></span>
                                                </label>
                                            </div>
                                            <div class="col-auto">
                                                <label class="form-colorinput">
                                                    <input name="color" type="radio" value="#f76707" class="form-colorinput-input color" @if($settings_color->value == '#f76707') checked @endif>
                                                    <span class="form-colorinput-color bg-orange"></span>
                                                </label>
                                            </div>
                                            <div class="col-auto">
                                                <label class="form-colorinput">
                                                    <input name="color" type="radio" value="#f59f00" class="form-colorinput-input color" @if($settings_color->value == '#f59f00') checked @endif>
                                                    <span class="form-colorinput-color bg-yellow"></span>
                                                </label>
                                            </div>
                                            <div class="col-auto">
                                                <label class="form-colorinput">
                                                    <input name="color" type="radio" value="#74b816" class="form-colorinput-input color" @if($settings_color->value == '#74b816') checked @endif>
                                                    <span class="form-colorinput-color bg-lime"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hr-text hr-text-center hr-text-spaceless">Display Produk</div>
                            <div class="card-body row" style="padding-top:40px;padding-bottom:40px;">
                                <div class="col-12">

                                    <div class="mb-3">
                                        <div class="divide-y">
                                            <div>
                                                <label class="row">
                                                    <span class="col">
                                                        Tampilkan Produk
                                                        <small class="form-hint">
                                                            opsi tampilkan bisa digunakan apabila halaman toko anda ingin di gunakan langsung dari social media, tanpa melalui landing page terlebih dahulu
                                                        </small>

                                                    </span>
                                                    <span class="col-auto">
                                                        <label class="form-check form-check-single form-switch">
                                                            <input class="form-check-input display" value="1" type="checkbox" @if($settings_display->value == '1') checked @endif>

                                                        </label>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col">
                            <div class="frame-hp">
                                <div class="box-hp">
                                    <img class="image_loader_1" src="{{ URL::asset('/assets/image/giffer.webp') }}" style="position:absolute;width:30px;margin:0px auto;margin: auto;position: absolute;top: 0; left: 0; bottom: 0; right: 0" />

                                    <img class="screnshoot-1" src="{{ URL::asset('/assets/image/screenshot.png') }}" />
                                    <img style="display:none" class="screnshoot-2" src="{{ URL::asset('/assets/image/screenshot.png') }}" />

                                </div>
                            </div>

                            <script type="text/javascript">
                                $(document).ready(function() {

                                    var site_id = $("input[name=site]").val();

                                    $.ajax({

                                        type: 'GET'
                                        , url: "{{ route('run_store_mobile_snapshoot') }}"
                                        , data: {
                                            domain_name: '{{StoreHelper::Url_snapshoot_detail($site_active)}}'
                                            , site_active: site_id

                                        , }
                                        , success: function(res) {
                                            $('.image_loader_1').fadeOut('slow')
                                            $('.screnshoot-1').attr("src", res)
                                        }
                                        , error: function(res) {
                                            alert('Terjadi masalah, hubungi layanan pelanggan kami');
                                        }

                                    });

                                })

                            </script>

                        </div>
                    </div>
                </form>
            </div>

        </div>


    </div>

</div>
<br />


@include('component.modal.upload-image')

<!-- Image Cropper JS -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/cropperjs/0.8.1/cropper.min.js'></script>


<script type="text/javascript">
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('#form-settings ').find('input[name="_token"]').first().val()
            }
        });

        var site_id = $("input[name=site]").val();

        $('.color').click(function() {

            color = $(this).val()

            $.ajax({
                type: "POST"
                , dataType: "json"
                , url: "{{ route('set_color') }}"
                , data: {
                    'color': color
                    , 'site': site_id
                }
                , success: function(data) {

                    src = $('.screnshoot-2').attr('src')
                    $('.screnshoot-1').attr("src", src)
                    $('.image_loader_1').fadeIn('slow')

                    $.ajax({

                        type: 'GET'
                        , url: "{{ route('run_store_mobile_snapshoot') }}"
                        , data: {
                            domain_name: '{{StoreHelper::Url_snapshoot_detail($site_active)}}'
                            , site_active: site_id
                        , }
                        , success: function(res) {
                            $('.image_loader_1').fadeOut('slow')
                            $('.screnshoot-1').attr("src", res)
                        }
                        , error: function(res) {
                            alert('Terjadi masalah, hubungi layanan pelanggan kami');
                        }

                    });


                }
            });

        })

        $('.display').click(function() {

            display = $(this).val()

            if ($(this).is(":checked")) {
                display = 1
            } else {
                display = 0
            }

            $.ajax({
                type: "POST"
                , dataType: "json"
                , url: "{{ route('set_display') }}"
                , data: {
                    'display': display
                    , 'site': site_id
                }
                , success: function(data) {

                    src = $('.screnshoot-2').attr('src')
                    $('.screnshoot-1').attr("src", src)
                    $('.image_loader_1').fadeIn('slow')

                    $.ajax({

                        type: 'GET'
                        , url: "{{ route('run_store_mobile_snapshoot') }}"
                        , data: {
                            domain_name: '{{StoreHelper::Url_snapshoot_detail($site_active)}}'
                            , site_active: site_id
                        , }
                        , success: function(res) {
                            $('.image_loader_1').fadeOut('slow')
                            $('.screnshoot-1').attr("src", res)
                        }
                        , error: function(res) {
                            alert('Terjadi masalah, hubungi layanan pelanggan kami');
                        }

                    });


                }
            });

        })


        // vars
        let result = document.querySelector('.result')
            , img_result = document.querySelector('.img-result')
            , img_w = document.querySelector('.img-w')
            , img_h = document.querySelector('.img-h')
            , options = document.querySelector('.options')
            , save = document.querySelector('.save')
            , cropped = document.querySelector('.cropped')
            , upload = document.querySelector('#file-input')
            , cropper = '';

        // on change show image with crop options
        upload.addEventListener('change', e => {
            if (e.target.files.length) {
                // start file reader
                const reader = new FileReader();
                reader.onload = e => {
                    if (e.target.result) {
                        // create new image
                        let img = document.createElement('img');
                        img.id = 'image';
                        img.src = e.target.result;
                        // clean result before
                        result.innerHTML = '';
                        // append new image
                        result.appendChild(img);
                        // show save btn and options
                        save.classList.remove('hide');
                        options.classList.remove('hide');
                        // init cropper
                        cropper = new Cropper(img, {
                            aspectRatio: 1 / 1
                        , });
                    }
                };
                reader.readAsDataURL(e.target.files[0]);

            }
        });

        // save on click
        save.addEventListener('click', e => {
            e.preventDefault();
            // get result to data uri
            let imgSrc = cropper.getCroppedCanvas({
                width: img_w.value // input value
            }).toDataURL();
            // remove hide class of img
            cropped.classList.remove('hide');
            img_result.classList.remove('hide');
            // show image cropped
            cropped.src = imgSrc;

            var base64data = imgSrc;

            $.ajax({
                type: "POST"
                , dataType: "json"
                , url: "{{ route('uploadlogo') }}"
                , data: {
                    'image': base64data
                    , 'site': site_id
                }
                , success: function(data) {

                    src = $('.screnshoot-2').attr('src')
                    $('.screnshoot-1').attr("src", src)
                    $('.image_loader_1').fadeIn('slow')

                    $.ajax({

                        type: 'GET'
                        , url: "{{ route('run_store_mobile_snapshoot') }}"
                        , data: {
                            domain_name: '{{StoreHelper::Url_snapshoot_detail($site_active)}}'
                            , site_active: site_id
                        , }
                        , success: function(res) {
                            $('.image_loader_1').fadeOut('slow')
                            $('.screnshoot-1').attr("src", res)
                        }
                        , error: function(res) {
                            alert('Terjadi masalah, hubungi layanan pelanggan kami');
                        }

                    });

                }
            });

        });

    })

</script>

@endsection
