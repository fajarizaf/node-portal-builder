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

    .ts-wrapper {
        height: 60px !important;
    }

    .step-item.active~.step-item .badge {
        background: #fef5e6 !important;
        color: #f59f00 !important;
    }

    .step-item.active~.step-item .text-secondary {
        color: #efefef !important;
    }

    .load {
        display: none;
    }

    .step-item.active {
        color: #503bac !important;
        font-weight: 600 !important;
    }

</style>

<div class="row g-0 flex-fill">

    <div class="col-12 col-lg-6 col-xl-7 d-none d-lg-block" style="background:#fff">
        <div class="container px-5 pt-4">
            <div class="row g-0 flex-fill">
                <div class="col-12 col-lg-5"></div>
                <div class="col-12 col-lg-7">
                    <div class="row g-0 flex-fill">
                        <div class="col-12 col-lg-4"><img src="{{ URL::asset('/assets/static/logo.png') }}" /></div>
                        <div class="col-12 col-lg-8">
                            <ul class="steps steps-green my-4">
                                <li class="step-item">Isi Data Diri</li>
                                <li class="step-item active">Instalasi web</li>
                                <li class="step-item">Selesai</li>
                            </ul>
                        </div>
                    </div>
                    <br />
                    <br />
                    <br />
                    <br />
                    <p class="fs-1"><b class="com1">Tunggu ya :) </b><span class="com2">website anda sedang dibangun</span></p>
                    <p><b class="com3">Selama proses berlangsung</b><span class="com4"> diharapkan tidak menutup browser anda terlebih dahulu. karena ini akan memberhentikan proses instalasi website di tengah jalan.</span></p>
                    <br />
                    <div class="card card-stacked result-build" style="display:none">
                        <div class="card-body">
                            <div class="row g-0 flex-fill">
                                <div class="col-12 col-lg-8">
                                    <label>Pratinjau Web :</label><br />
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-world-share">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M20.94 13.045a9 9 0 1 0 -8.953 7.955" />
                                            <path d="M3.6 9h16.8" />
                                            <path d="M3.6 15h9.4" />
                                            <path d="M11.5 3a17 17 0 0 0 0 18" />
                                            <path d="M12.5 3a16.991 16.991 0 0 1 2.529 10.294" />
                                            <path d="M16 22l5 -5" />
                                            <path d="M21 21.5v-4.5h-4.5" /></svg>
                                        Lihat website
                                    </a>
                                </div>
                                <div class="col-12 col-lg-4">
                                    @if(session('user_id'))
                                    <div class="btn btn-outline-info w-100">Kelola Website</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="form-label">Produk Subscription :</div>
                    <div class="card" style="background:#f4f7fc">
                        <div class="ribbon bg-red">Uji coba gratis</div>
                        <div class="card-body">
                            <h3 class="card-title">Node Starter <span class="badge bg-green text-green-fg">Uji coba gratis</span></h3>
                            <p class="text-secondary">Cocok buat yang baru ingin coba2 dan mulai punya website untuk bisnis anda</p>
                            <p class="text-secondary">site: coba.nodebuilder.id</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-6 col-xl-5 border-primary d-flex flex-column" style="background:#f4f7fc">
        <div class="container px-5 pt-7" style="margin-top:70px">

            <div class="row g-0 flex-fill">
                <div class="col-12 col-lg-6">

                    <div class="card-body">
                        <h2 class="h2 text-left mb-3">
                            Proses Setup
                        </h2>
                        <ul class="steps steps-vertical">
                            <li class="step-item step-item-1 active">
                                <div class="h4 m-0"><span class="badge bg-yellow text-yellow-fg ms-2">1</span> - Creating Subdomain <img width="20px" class="load loading-1" src="{{ URL::asset('/assets/image/loading-2.gif') }}" /></div>
                                <div class="text-secondary" style="padding-left:43px;padding-top:15px;padding-bottom:10px;">Proses penyiapan domain ke server, biar kamu punya link websitenya</div>
                            </li>
                            <li class="step-item step-item-2 ">
                                <div class="h4 m-0"><span class="badge bg-yellow text-yellow-fg ms-2">2</span> - Setup Database <img width="20px" class="load loading-2" src="{{ URL::asset('/assets/image/loading-2.gif') }}" /></div>
                                <div class="text-secondary" style="padding-left:43px;padding-top:15px;padding-bottom:10px;">Setup dan konfigurasi database</div>
                            </li>
                            <li class="step-item step-item-3">
                                <div class="h4 m-0"><span class="badge bg-yellow text-yellow-fg ms-2">3</span> - Generating SSL <img width="20px" class="load loading-3" src="{{ URL::asset('/assets/image/loading-2.gif') }}" /></div>
                                <div class="text-secondary" style="padding-left:43px;padding-top:15px;padding-bottom:10px;">Sedang instalasi sertifikat web. biar websitemu lebih aman</div>
                            </li>
                            <li class="step-item step-item-4">
                                <div class="h4 m-0"><span class="badge bg-yellow text-yellow-fg ms-2">4</span> - Installation Editor <img width="20px" class="load loading-4" src="{{ URL::asset('/assets/image/loading-2.gif') }}" /></div>
                                <div class="text-secondary" style="padding-left:43px;padding-top:15px;padding-bottom:10px;">Instalasi tools buat desain websitemu nanti</div>
                            </li>
                            <li class="step-item step-item-5">
                                <div class="h4 m-0"><span class="badge bg-yellow text-yellow-fg ms-2">5</span> - Setup Editor <img width="20px" class="load loading-5" src="{{ URL::asset('/assets/image/loading-2.gif') }}" /></div>
                                <div class="text-secondary" style="padding-left:43px;padding-top:15px;padding-bottom:10px;">Buat akun kelola websitemu nanti</div>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="col-12 col-lg-6"></div>
            </div>

        </div>
    </div>

</div>

<form id="form-build">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <input type="hidden" name="subscription_id" value="{{ $subscription_id }}" />
    <input type="hidden" name="domain" value="{{ $domain }}" />
    <input type="hidden" name="build_link" value="{{ $build_link }}" />
    <input type="hidden" name="subscription_id" value="{{ $subscription_id }}" />
    <input type="hidden" name="customer_email" value="{{ $customer_email }}" />
</form>

<script type="text/javascript">
    $('document').ready(function() {

        $('.load').fadeOut();
        $('.loading-1').fadeIn();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('#form-build  ').find('input[name="_token"]').first().val()
            }
        });

        var subscription_id = $("input[name=subscription_id]").val();
        var domain = $("input[name=domain]").val();
        var build_link = $("input[name=build_link]").val();
        var customer_email = $("input[name=customer_email]").val();

        $.ajax({

            type: 'POST'
            , url: "{{ route('create_subdomain') }}"
            , data: {
                subscription_id: subscription_id
                , build_link: build_link
                , domain: domain
            },

            success: function(response_1) {

                if (response_1['status'] == 'success') {

                    $('.load').fadeOut();
                    $('.step-item-1').removeClass('active');

                    $('.loading-2').fadeIn();
                    $('.step-item-2').addClass('active');

                    $.ajax({

                        type: 'POST'
                        , url: "{{ route('create_database') }}"
                        , data: {
                            build_link: build_link
                            , domain: domain
                        },

                        success: function(response_2) {

                            if (response_2['status'] == 'success') {

                                $('.load').fadeOut();
                                $('.step-item-2').removeClass('active');

                                $('.loading-3').fadeIn();
                                $('.step-item-3').addClass('active');

                                $.ajax({

                                    type: 'POST'
                                    , url: "{{ route('create_ssl') }}"
                                    , data: {
                                        build_link: build_link
                                        , domain_name: domain
                                    },

                                    success: function(response_3) {

                                        if (response_3['status'] == 'success') {

                                            $('.load').fadeOut();
                                            $('.step-item-3').removeClass('active');

                                            $('.loading-4').fadeIn();
                                            $('.step-item-4').addClass('active');

                                            $.ajax({

                                                type: 'POST'
                                                , url: "{{ route('create_cms') }}"
                                                , data: {
                                                    build_link: build_link
                                                    , subscription_id: subscription_id
                                                    , customer_email: customer_email
                                                    , domain_id: response_1['response']['data']['domain_id']
                                                    , domain_name: domain
                                                },

                                                success: function(response_4) {

                                                    if (response_4['status'] == 'success') {

                                                        $('.load').fadeOut();
                                                        $('.step-item-4').removeClass('active');

                                                        $('.loading-5').fadeIn();
                                                        $('.step-item-5').addClass('active');

                                                        $.ajax({

                                                            type: 'POST'
                                                            , url: "{{ route('setup_cms') }}"
                                                            , data: {
                                                                domain_name: domain
                                                                , subscription_id: subscription_id
                                                                , domain_id: response_1['response']['data']['domain_id']
                                                            , },

                                                            success: function(response_5) {

                                                                $('.loading-5').fadeOut();
                                                                $('.step-item-5').removeClass('active');

                                                                $('.result-build').fadeIn()
                                                                $('.com1').text('Hore :)')
                                                                $('.com2').text(' website kamu sudah live')
                                                                $('.com3').text('Dibawah ini tautan website anda.')
                                                                $('.com4').text(' Silahkan klik kelola website dan anda akan di arahkan ke halaman portal pelanggan')

                                                            }

                                                        });
                                                    }

                                                }

                                            });

                                        }

                                    }

                                });
                            }

                        }
                    })

                } else {

                }
            }
            , error: function(response_1) {
                alert('Terjadi masalah, hubungi layanan pelanggan kami');
            }

        });

    });

</script>

@endsection
