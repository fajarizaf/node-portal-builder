@extends('index')
@section('container')

<style type="text/css">
    .step-item:after, .step-item:before {
        background: #503bac;
    }
    .btn-primary {
        background: #503bac;
    }
    .avatar-xs {
        width:100px;
        height:50px;
    }
    .ts-wrapper {
        height: 60px !important;
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
                    <p class="fs-1">Mulai uji coba<b> gratis 7 hari Anda</b></p>    
                    <p><b>Uji coba Anda sepenuhnya gratis.</b>Kami meminta Anda untuk memberikan informasi pembayaran sekarang untuk menghindari gangguan layanan setelah masa uji coba berakhir.</p>
                    
                    <div class="form-label">Tema pilihan anda :</div>
                    <select type="text" class="form-select" id="select-product" value="">
                        <option value="1" data-custom-properties="&lt;span class=&quot;avatar avatar-xs&quot; style=&quot;background-image: url(./static/avatars/000m.jpg)&quot;&gt;&lt;/span&gt;">Influencer Themes - Pilihan Bulanan</option>
                        <option value="3" data-custom-properties="&lt;span class=&quot;avatar avatar-xs&quot; style=&quot;background-image: url(./static/avatars/002m.jpg)&quot;&gt;&lt;/span&gt;">Landing 01 Themes - Pilihan Bulanan</option>
                        <option value="4" data-custom-properties="&lt;span class=&quot;avatar avatar-xs&quot; style=&quot;background-image: url(./static/avatars/003m.jpg)&quot;&gt;&lt;/span&gt;">Beribenka Themes - Pilihan Bulanan</option>
                    </select>
                    <br/>
                    <div class="form-label">Tentukan nama domain :</div>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" placeholder="subdomain" autocomplete="off">
                        <span class="input-group-text">.nodebuilder.id</span>
                    </div>
                    <br/>
                    <div class="mb-3">
                                <label class="form-label required">Nama</label>
                                <div>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="name" placeholder="Masukan Nama Lengkap">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Email</label>
                                <div>
                                <input type="email" class="form-control" aria-describedby="emailHelp" name="email" placeholder="Enter email">
                                <small class="form-hint">alamat email ini nantinya digunakan untuk login ke area pelanggan.</small>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Nomor HP</label>
                                <div>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>
                            </div>
                </div>
            </div>
        </div>
      </div>

      <div class="col-12 col-lg-6 col-xl-5 border-primary d-flex flex-column"  style="background:#f4f7fc">
        <div class="container px-5 pt-7">

                <div class="row g-0 flex-fill">
                    <div class="col-12 col-lg-6">

                        <div class="row g-0 flex-fill">
                            <div class="col-12 col-lg-6">
                                <h2 class="h2 text-left mb-3">
                                    Ringkasan Pesanan
                                </h2>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                <select class="form-select">
                                    <option value="1">Perbulan</option>
                                    <option value="2">Per 3 Bulan</option>
                                    <option value="3">Per 6 Bulan</option>
                                    <option value="3">Per 12 Bulan</option>
                                </select>
                                </div>
                            </div>
                        </div>

                        <table class="table table-transparent table-responsive">
                            <thead>
                                <tr>
                                    <th>Produk Dipilih</th>
                                    <th class="text-end" style="width: 1%">Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <td>
                                    <p class="strong mb-1">Logo Creation</p>
                                    <div class="text-secondary">Logo and business cards design</div>
                                </td>
                                <td class="text-end">IDR. 250.000</td>
                                </tr>
                            <tr>
                                <td>
                                    <p class="strong mb-1">App Design</p>
                                    <div class="text-secondary">Promotional mobile application</div>
                                </td>
                                <td class="text-end">IDR. 250.000</td>
                            </tr>
                            <tr >
                                <td style="border-bottom:none" class="strong text-start">Total Tagihan</td>
                                <td class="text-end" style="color:#29b662;border-bottom:none"><h2>IDR. 250.000</h2></td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="btn btn-primary w-100">Mulai Uji Coba Gratis 7 Hari</div>

                    </div>
                    <div class="col-12 col-lg-6"></div>
                </div>

               

        </div>
      </div>

</div>

<!-- Libs JS -->
<script src="{{ URL::asset('assets/dist/libs/tom-select/dist/js/tom-select.base.min.js?1692870487') }}" defer></script>

<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
    	var el;
    	window.TomSelect && (new TomSelect(el = document.getElementById('select-product'), {
    		copyClassesToDropdown: false,
    		dropdownParent: 'body',
    		controlInput: '<input>',
    		render:{
    			item: function(data,escape) {
    				if( data.customProperties ){
    					return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
    				}
    				return '<div>' + escape(data.text) + '</div>';
    			},
    			option: function(data,escape){
    				if( data.customProperties ){
    					return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
    				}
    				return '<div>' + escape(data.text) + '</div>';
    			},
    		},
    	}));
    });
    // @formatter:on
</script>

@endsection
