@extends('layout-1')
@section('container')

@if(session()->has('success'))
<div class="alert alert-important alert-success alert-dismissible fade show" role="alert" style="border-radius:0px;margin:0px">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session()->has('failed'))
<div class="alert alert-important alert-failed alert-dismissible fade show" role="alert" style="border-radius:0px;margin:0px">
    {{ session('faild') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


<style>
    .frame-laptop {
        width: 816px;
        height: 500px;
        background-image: url("../assets/image/laptop-display.png");
        padding-top: 73px;
    }

    .box-laptop {
        position: relative;
        background: #000;
        width: 632px;
        height: 400px;
        left: 92px;
        top: -23px;
        border-radius: 2px;
        padding: 0px;
        margin: 0px;
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
            <a href="{{url('/manage/product?site='.$ste->id.'')}}" class="form-selectgroup-item flex-fill">
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-chart-funnel">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M4.387 3h15.226a1 1 0 0 1 .948 1.316l-5.105 15.316a2 2 0 0 1 -1.898 1.368h-3.116a2 2 0 0 1 -1.898 -1.368l-5.104 -15.316a1 1 0 0 1 .947 -1.316" />
                        <path d="M5 9h14" />
                        <path d="M7 15h10" />
                    </svg>
                    Toko -> Personalisasi
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">

            </div>
        </div>


        <br />


        <div class="container" style="display: flex;justify-content: center;align-items: center">

            <div class="col-4">
                <h1 data-aos="zoom-y-out h1" style="font-size:30px">Personalisasi Halaman Pemesanan</h1>
                <p class="hero-description mt-4 aos-init aos-animate" data-aos="zoom-y-out" data-aos-delay="150" style="font-size:16px;color:#666">Ganti logo usahamu, sesuaikan warna, tentukan metode pembayaran, tambahkan informasi pembayaran dan lain lain</p>
                <br />
                <div class="btn-list">
                    <a href="{{url('/store/settings/'.urlencode(base64_encode($site_active)).'')}}" class="btn btn-primary d-none d-sm-inline-block @if($site_active) @else disabled @endif">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 5l0 14"></path>
                            <path d="M5 12l14 0"></path>
                        </svg>
                        Personalisasikan
                    </a>
                </div>
            </div>

            <div class="col-8">
                <div class="frame-laptop">

                    <div class="box-laptop">
                        <img class="image_loader_1" src="{{ URL::asset('/assets/image/giffer.webp') }}" style="position:absolute;width:30px;margin:0px auto;margin: auto;position: absolute;top: 0; left: 0; bottom: 0; right: 0" />
                        <img class="screnshoot-1" src="{{ URL::asset('/assets/image/screenshot.png') }}" />
                        <img style="display:none" class="screnshoot-2" src="{{ URL::asset('/assets/image/screenshot.png') }}" />
                    </div>

                </div>
            </div>

        </div>


        <script type="text/javascript">
            $(document).ready(function() {

                $.ajax({

                    type: 'GET'
                    , url: "{{ route('run_store_laptop_snapshoot') }}"
                    , data: {
                        domain_name: 'adadsa'
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
<br />


@include('component.modal.product-add-digital')

<script type="text/javascript">
    $(document).ready(function() {



    })

</script>

@endsection