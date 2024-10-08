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
    .frame-hp {
        width: 300px;
        height: 616px;
        background-image: url("../assets/image/frame-hp.png");
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


        <div class="row g-0 flex-fill">

            <div class="col-12 col-lg-6 col-xl-3 d-none d-lg-block p-2">

                <div class="row row-cards" style="margin-top:50px;">

                    <div class="col-12 nav-persona">
                        <a href="{{url('/store/settings/'.urlencode(base64_encode($site_active)).'')}}">
                            <div class="card card-sm">
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
                            <a href="{{url('/store/order/'.urlencode(base64_encode($site_active)).'')}}">
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
                        <a href="{{url('/store/payment/'.urlencode(base64_encode($site_active)).'')}}">
                            <div class="card card-sm active">
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

                <div class="row g-0 flex-fill">

                    <div class="row flex-fill">
                        <div class="col-6">

                            <h3 class="card-title">Informasi Tujuan Transfer</h3>
                            <p class="text-secondary">Informasi untuk pelanggan apabila memilih metode pembayaran bank transfer</p>
                            @forelse($user_bank as $transfer)

                            <div class="form-selectgroup-label d-flex align-items-center p-3" style="justify-content:space-between;margin-bottom:10px;">
                                <div class="me-3">
                                    <img style="height:30px" src="{{ URL::asset('/assets/image/'.$transfer->bank_logo) }}" />
                                </div>
                                <div>
                                    <small class="form-hint">
                                        {{$transfer->account_name}}
                                    </small>

                                    <b>{{$transfer->account_number}}</b>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 10a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                        <path d="M6 4v4"></path>
                                        <path d="M6 12v8"></path>
                                        <path d="M10 16a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                        <path d="M12 4v10"></path>
                                        <path d="M12 18v2"></path>
                                        <path d="M16 7a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                        <path d="M18 4v1"></path>
                                        <path d="M18 9v11"></path>
                                    </svg>
                                </div>
                            </div>


                            @empty

                            <div class=" p-3" style="justify-content:space-between;background:none;border:2px dashed #adc3e8">
                                <p style="text-secondary">Belum ada informasi tujuan bank transfer</p>
                            </div>


                            @endforelse

                            <br />
                            <div class="btn" data-bs-toggle="modal" data-bs-target="#add-bank-account">Tambah Baru</div>



                        </div>
                        <div class="col-6">

                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Biaya Pembayaran</h3>
                                    <div>
                                        <label class="row">
                                            <span class="col">Biaya pembayaran di bebankan ke pelanggan</span>
                                            <span class="col-auto">
                                                <label class="form-check form-check-single form-switch">
                                                    <input class="form-check-input" type="checkbox">
                                                </label>
                                            </span>
                                        </label>
                                        <br />
                                        <div style="background:#f1f1f1;padding:12px;">

                                            <div class="row flex-fill">
                                                <div class="col-1">
                                                    <h3>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon alert-icon">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path d="M12 9v4"></path>
                                                            <path d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z"></path>
                                                            <path d="M12 16h.01"></path>
                                                        </svg>
                                                    </h3>
                                                </div>
                                                <div class="col-11">
                                                    <p>Membebankan biaya saluran kepada pelanggan dapat mempengaruhi konversi pelanggan untuk menyelesaikan pembayaran</p>
                                                </div>

                                            </div>
                                            <div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="row">
                        <div class="col-12">
                            <br />
                            <h3 class="card-title">Metode Pembayaran digunakan :</h3>
                            <form method="POST" action="/store/payment">

                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <input type="text" style="display:none" name="site" class="site_id" value="{{ $site_active }}" />

                                @forelse($payment_method as $pay)

                                <div class="form-selectgroup-label d-flex align-items-center p-3" style="margin-bottom:10px;">
                                    <div class="me-3">
                                        <input class="form-check-input" name="payment[]" value="{{$pay->id}}" type="checkbox" @if(StoreHelper::User_payment_active($pay->id) != 0) checked="" @endif>
                                    </div>
                                    <div class="form-selectgroup-label-content d-flex align-items-center">
                                        <img class="cropped" style="height:40px;margin-right:20px;" src="{{ URL::asset('/assets/image/'.$pay->payment_method_logo.'') }}" />
                                        <div>
                                            <div class="text-secondary"><b>{{$pay->payment_method_name}}</b></div>
                                        </div>
                                    </div>
                                </div>

                                @empty

                                @endforelse
                                <br />
                                <button class="btn btn-primary" type="Submit">Simpan Perubahan</button>
                            </form>

                        </div>
                        <div>

                        </div>


                    </div>

                </div>
                <br />

                @include('component.modal.add-bank-account')


                <script type="text/javascript">
                    $(document).ready(function() {



                    })

                </script>

                @endsection
