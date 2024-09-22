@extends('layout-1')
@section('container')

<style type="text/css">
    .step-item:after, .step-item:before {
        background: #503bac;
    }
    .btn-primary {
        background: #503bac;
    }
    .ts-wrapper {
        height: 60px !important;
    }
    .step-item.active~.step-item .badge {
        background:#fef5e6 !important;
        color:#f59f00 !important;
    }
    .step-item.active~.step-item .text-secondary {
        color:#efefef !important;
    }
</style>

<div class="row g-0 flex-fill">
        
      <div class="col-12 col-lg-6 col-xl-7 d-none d-lg-block" style="background:#fff">
        <div class="container px-5 pt-4">
            <div class="row g-0 flex-fill">
                <div class="col-12 col-lg-5"></div>
                <div class="col-12 col-lg-7">
                    <div class="row g-0 flex-fill">
                        <div class="col-12 col-lg-4"><img src="{{ URL::asset('/assets/static/logo.png') }}"/></div>
                        <div class="col-12 col-lg-8">
                            <ul class="steps steps-green my-4">
                                <li class="step-item">Isi Data Diri</li>
                                <li class="step-item active">Instalasi web</li>
                                <li class="step-item">Selesai</li>
                            </ul>
                        </div>
                    </div>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <p class="fs-1"><b>Tunggu ya :) </b>website anda sedang dibangun</p>
                    <p><b>Selama proses berlangsung</b> diharapkan tidak menutup browser anda terlebih dahulu. karena ini akan memberhentikan proses instalasi website di tengah jalan.</p>
                    <br/>  
                    <div class="form-label">Produk Subscription :</div>
                    <div class="card"  style="background:#f4f7fc">
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

      <div class="col-12 col-lg-6 col-xl-5 border-primary d-flex flex-column"  style="background:#f4f7fc">
        <div class="container px-5 pt-7" style="margin-top:70px">

                <div class="row g-0 flex-fill">
                    <div class="col-12 col-lg-6">

                        <div class="card-body">
                            <h2 class="h2 text-left mb-3">
                               Proses Setup
                            </h2>
                            <ul class="steps steps-vertical">
                            <li class="step-item active">
                                <div class="h4 m-0"><span class="badge bg-yellow text-yellow-fg ms-2">1</span> - Creating Subdomain</div>
                                <div class="text-secondary" style="padding-left:43px;padding-top:15px;padding-bottom:10px;">Proses penyiapan domain ke server, biar kamu punya link websitenya</div>
                            </li>
                            <li class="step-item ">
                                <div class="h4 m-0"><span class="badge bg-yellow text-yellow-fg ms-2">2</span> - Setup Database</div>
                                <div class="text-secondary" style="padding-left:43px;padding-top:15px;padding-bottom:10px;">Setup dan konfigurasi database</div>
                            </li>
                            <li class="step-item ">
                                <div class="h4 m-0"><span class="badge bg-yellow text-yellow-fg ms-2">3</span> - Generating SSL</div>
                                <div class="text-secondary" style="padding-left:43px;padding-top:15px;padding-bottom:10px;">Sedang instalasi sertifikat web. biar websitemu lebih aman</div>
                            </li>
                            <li class="step-item">
                                <div class="h4 m-0"><span class="badge badge bg-yellow-lt ms-2">4</span> - Installation & Setup Editor</div>
                                <div class="text-secondary" style="padding-left:43px;padding-top:15px;padding-bottom:10px;">Instalasi tools buat desain websitemu nanti</div>
                            </li>
                            </ul>
                        </div>
                        
                    </div>
                    <div class="col-12 col-lg-6"></div>
                </div>

                
                
        </div>
      </div>

</div>

@endsection
