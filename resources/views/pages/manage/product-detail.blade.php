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

<style type="text/css">
    .box-upload {
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden
    }

    .box-upload img {
        height: 100%;
        width: 100%;
        object-fit: cover
    }

    .box-file {
        display: none;
    }

    .box-file.active {
        display: block;
    }

</style>

<div class="row g-0 flex-fill">
    <div class="col-12 col-lg-6 col-xl-4 d-none d-lg-block p-6" style="background:#fff">

        <h2 class="page-title">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-chart-funnel">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M4.387 3h15.226a1 1 0 0 1 .948 1.316l-5.105 15.316a2 2 0 0 1 -1.898 1.368h-3.116a2 2 0 0 1 -1.898 -1.368l-5.104 -15.316a1 1 0 0 1 .947 -1.316" />
                <path d="M5 9h14" />
                <path d="M7 15h10" />
            </svg>
            Daftar Produk <span class="form-hint" style="font-size:14px;padding:10px;"> - coba.nodebuilder.id</span>
        </h2>
        <br />

        <div class="form-selectgroup form-selectgroup-boxes d-flex flex-column">

            @forelse($product_navigation as $nav)
            <a href="{{url('/manage/product/detail/'.urlencode(base64_encode($nav->id)).'')}}" class="form-selectgroup-item flex-fill">
                <input type="radio" name="form-payment" value="visa" class="form-selectgroup-input" @if($product_active==$nav->id) checked @endif>
                <div class="form-selectgroup-label d-flex align-items-center p-3">
                    <div class="me-3">
                        <span class="form-selectgroup-check"></span>
                    </div>
                    <div>
                        <b>{{$nav->product_plan_name}}</b>
                    </div>
                </div>
            </a>
            @empty
            <p>Tidak ada produk yang ditemukan</p>
            @endforelse

        </div>

    </div>
    <div class="col-12 col-lg-6 col-xl-8 d-none d-lg-block p-5" style="background:#f4f7fc">

        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <h2 class="page-title">
                    Detail Produk &nbsp;&nbsp;
                    <a onclick="window.open('{{url('/order/'.urlencode(base64_encode($product->id)))}}', '_blank', 'location=yes,height=970,width=500,scrollbars=yes,status=yes');" class="btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-tabler icons-tabler-outline icon-tabler-eye">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                            <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path>
                        </svg>
                        Preview Halaman Checkout
                    </a>
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="#" class="btn btn-primary d-none d-sm-inline-block @if($product_active) @else disabled @endif" data-bs-toggle="modal" data-bs-target="#product-add-digital">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-device-floppy">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                            <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                            <path d="M14 4l0 4l-6 0l0 -4" />
                        </svg>
                        Save
                    </a>
                    <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 5l0 14"></path>
                            <path d="M5 12l14 0"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <br />

        <div class="row">
            <form method="POST" enctype="multipart/form-data" action="/manage/product/update">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" name="product_id" value="{{$product_id}}" />
                <input type="hidden" name="product_type" value="produk digital" />
                <input type="hidden" name="payment_type" value="onetime" />

                <div class="modal-body">
                    <div class="row mb-3 align-items-end">
                        <label class="form-label required">Foto Produk</label>
                        <input type="file" style="display:none" name="upload-file-1" class="upload-file-1" />
                        <input type="file" style="display:none" name="upload-file-2" class="upload-file-2" />
                        <input type="file" style="display:none" name="upload-file-3" class="upload-file-3" />
                        <input type="file" style="display:none" name="upload-file-4" class="upload-file-4" />
                        <input type="file" style="display:none" name="upload-file-5" class="upload-file-5" />

                        @if($product_photo_1)

                        <div class="col-auto">
                            <a href="#" class="avatar avatar-upload rounded box-upload-{{$product_photo_1->photo_index}} box-upload">
                                <img src='{{url('storage/uploads/'.$product_photo_1->photo)}}' />
                            </a>
                        </div>

                        @else

                        <div class="col-auto">
                            <a href="#" class="avatar avatar-upload rounded box-upload-1 box-upload">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 5l0 14"></path>
                                    <path d="M5 12l14 0"></path>
                                </svg>
                                <span class="avatar-upload-text">Add</span>
                            </a>
                        </div>

                        @endif

                        @if($product_photo_2)

                        <div class="col-auto">
                            <a href="#" class="avatar avatar-upload rounded box-upload-{{$product_photo_2->photo_index}} box-upload">
                                <img src='{{url('storage/uploads/'.$product_photo_2->photo)}}' />
                            </a>
                        </div>

                        @else

                        <div class="col-auto">
                            <a href="#" class="avatar avatar-upload rounded box-upload-2 box-upload">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 5l0 14"></path>
                                    <path d="M5 12l14 0"></path>
                                </svg>
                                <span class="avatar-upload-text">Add</span>
                            </a>
                        </div>

                        @endif

                        @if($product_photo_3)

                        <div class="col-auto">
                            <a href="#" class="avatar avatar-upload rounded box-upload-{{$product_photo_3->photo_index}} box-upload">
                                <img src='{{url('storage/uploads/'.$product_photo_3->photo)}}' />
                            </a>
                        </div>

                        @else

                        <div class="col-auto">
                            <a href="#" class="avatar avatar-upload rounded box-upload-3 box-upload">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 5l0 14"></path>
                                    <path d="M5 12l14 0"></path>
                                </svg>
                                <span class="avatar-upload-text">Add</span>
                            </a>
                        </div>

                        @endif

                        @if($product_photo_4)

                        <div class="col-auto">
                            <a href="#" class="avatar avatar-upload rounded box-upload-{{$product_photo_4->photo_index}} box-upload">
                                <img src='{{url('storage/uploads/'.$product_photo_4->photo)}}' />
                            </a>
                        </div>

                        @else

                        <div class="col-auto">
                            <a href="#" class="avatar avatar-upload rounded box-upload-4 box-upload">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 5l0 14"></path>
                                    <path d="M5 12l14 0"></path>
                                </svg>
                                <span class="avatar-upload-text">Add</span>
                            </a>
                        </div>

                        @endif

                        @if($product_photo_5)

                        <div class="col-auto">
                            <a href="#" class="avatar avatar-upload rounded box-upload-{{$product_photo_5->photo_index}} box-upload">
                                <img src='{{url('storage/uploads/'.$product_photo_5->photo)}}' />
                            </a>
                        </div>

                        @else

                        <div class="col-auto">
                            <a href="#" class="avatar avatar-upload rounded box-upload-5 box-upload">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 5l0 14"></path>
                                    <path d="M5 12l14 0"></path>
                                </svg>
                                <span class="avatar-upload-text">Add</span>
                            </a>
                        </div>

                        @endif


                    </div>
                    <label class="form-label" style="font-size:10px;color:#666">Maksimum size upload gambar : 1 MB</label>
                    <div class="mb-3">
                        <label class="form-label required">Nama Produk</label>
                        <input type="text" class="form-control" name="nama_produk" value="{{$product->product_plan_name}}" placeholder="Nama produk anda" required>
                    </div>
                    <div class="form-selectgroup-boxes row mb-3">
                        <div class="col-lg-12">
                            <label class="form-label required">File Produk</label>
                            <div class="form-selectgroup">
                                <label class="form-selectgroup-item">
                                    <input type="radio" name="product_source_type" value="local" class="form-selectgroup-input select_local" @if($product->product_source_type == 'local') checked @endif>
                                    <span class="form-selectgroup-label">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                        <img src="{{URL::asset('assets/image/local.png')}}" style="width:24px" />
                                        Lokal Komputer</span>
                                </label>
                                <label class="form-selectgroup-item">
                                    <input type="radio" name="product_source_type" value="gdrive" class="form-selectgroup-input select_grive" @if($product->product_source_type == 'gdrive') checked @endif>
                                    <span class="form-selectgroup-label">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                        <img src="{{URL::asset('assets/image/gdrive.png')}}" style="width:24px" />
                                        Gdrive</span>
                                </label>
                                <label class="form-selectgroup-item">
                                    <input type="radio" name="product_source_type" value="dropbox" class="form-selectgroup-input select_dropbox" @if($product->product_source_type == 'dropbox') checked @endif>
                                    <span class="form-selectgroup-label">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/circle -->
                                        <img src="{{URL::asset('assets/image/dropbox.png')}}" style="width:24px" />
                                        Dropbox</span>
                                </label>
                                <label class="form-selectgroup-item">
                                    <input type="radio" name="product_source_type" value="other" class="form-selectgroup-input select_other" @if($product->product_source_type == 'other') checked @endif>
                                    <span class="form-selectgroup-label">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/square -->
                                        <img src="{{URL::asset('assets/image/link.png')}}" style="width:24px" />
                                        Others</span>
                                </label>
                            </div>
                        </div>


                        <div class="col-lg-12 box-file box_local @if($product->product_source_type == 'local') active @endif">
                            <br />
                            <div class="empty" style="border:3px dashed #efefef">
                                <div class="empty-action" style="margin-top:0px !important;">
                                    <input type="file" style="display:none" name="input-local-file" class="input-local-file" />

                                    @if($product->product_source == '' || $product->product_source_type != 'local')
                                    <div class="btn btn-secondary upload-local-file box-local" style="background:#ccc;">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M12 5l0 14"></path>
                                            <path d="M5 12l14 0"></path>
                                        </svg>
                                        Select Files
                                    </div>
                                    @endif

                                    @if($product->product_source != '' && $product->product_source_type == 'local')
                                    <a href="{{url('storage/uploads/product/'.$product->product_source)}}" class="btn btn-primary upload-local-file box-local">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-paperclip">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M15 7l-6.5 6.5a1.5 1.5 0 0 0 3 3l6.5 -6.5a3 3 0 0 0 -6 -6l-6.5 6.5a4.5 4.5 0 0 0 9 9l6.5 -6.5" />
                                        </svg>
                                        Download File
                                    </a>
                                    <div class="btn btn-secondary upload-local-file box-local" style="background:#ccc;">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M12 5l0 14"></path>
                                            <path d="M5 12l14 0"></path>
                                        </svg>
                                        Upload Ulang
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-12 box-file box_gdrive  @if($product->product_source_type == 'gdrive') active @endif">
                        <br />
                        <div class="empty" style="border:3px dashed #efefef">
                            <label class="form-label">Url Anda :</label>
                            <input type="text" class="form-control" name="link_gdrive" @if($product->product_source_type == 'gdrive') value="{{$product->product_source}}" @endif placeholder="https://drive.google.com/file/nodebuilder">
                        </div>
                    </div>


                    <div class="col-lg-12 box-file box_dropbox  @if($product->product_source_type == 'dropbox') active @endif">
                        <br />
                        <div class="empty" style="border:3px dashed #efefef">
                            <label class="form-label">Url Anda :</label>
                            <input type="text" class="form-control" name="link_dropbox" @if($product->product_source_type == 'dropbox') value="{{$product->product_source}}" @endif placeholder="https://dropbox.com/sh/nodebuilder">
                        </div>
                    </div>


                    <div class="col-lg-12 box-file box_other  @if($product->product_source_type == 'other') active @endif">
                        <br />
                        <div class="empty" style="border:3px dashed #efefef">
                            <label class="form-label">Url Anda :</label>
                            <input type="text" class="form-control" name="link_other" @if($product->product_source_type == 'other') value="{{$product->product_source}}" @endif placeholder="Url platform lain">
                        </div>
                    </div>


                    <label class="form-label" style="font-size:10px;color:#666;margin-left:10px">Maksimum size upload gambar : 30 MB</label>
                </div>
                <div class="row billing-cycle" style="display:none">
                    <div class="mb-3">
                        <label class="form-label">Siklus Penagihan</label>
                        <select class="form-select" name="siklus_tagihan" id="floatingSelect" style="margin-top:12px;" aria-label="Floating label select example">
                            <option selected value="Monthly">Monthly</option>
                            <option value="Quarterly">Quarterly</option>
                            <option value="Semi-Annually">Semi-Annually</option>
                            <option value="Annually">Annually</option>
                            <option value="Biennially">Biennially</option>
                            <option value="Triennially">Triennially</option>
                        </select>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row" style="margin-top:10px">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Kuantitas Produk </label>
                                <input type="number" name="stok_produk" class="form-control" value="{{$product->product_stock}}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect" name="kategori_produk" style="margin-top:12px;" required>
                                        @forelse($product_group as $group)
                                        <option selected value="{{$group->id}}">{{$group->product_group_name}}</option>
                                        @empty
                                        <option value="3">Belum ada group produk</option>
                                        @endforelse
                                    </select>
                                    <label for="floatingSelect">Produk Group</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <br />
                                <label class="form-label required">Harga Produk</label>
                                <div class="input-group mb-2">
                                    <span class="input-group-text">
                                        IDR.
                                    </span>
                                    <input type="text" name="harga_produk" value="{{$product_price->price}}" class="form-control" required>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label class="form-label required">Deskripsi Produk</label>
                                <textarea id="tinymce-mytextarea" class="form-control" name="deskripsi_produk" rows="3" required>{{$product->product_plan_desc}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <br />
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Update" />
                </div>

        </div>
        </form>
    </div>

</div>
<br />

<script type="text/javascript">
    $(document).ready(function() {

        $('.box-upload-1').click(function() {
            $('.upload-file-1').click();
        })

        $('.box-upload-2').click(function() {
            $('.upload-file-2').click();
        })

        $('.box-upload-3').click(function() {
            $('.upload-file-3').click();
        })

        $('.box-upload-4').click(function() {
            $('.upload-file-4').click();
        })

        $('.box-upload-5').click(function() {
            $('.upload-file-5').click();
        })

        $('.upload-file-1').on('change', function() {
            var file = this.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.box-upload-1').html('<img src=' + e.target.result + ' />');
            };
            reader.readAsDataURL(file);
        });

        $('.upload-file-2').on('change', function() {
            var file = this.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.box-upload-2').html('<img src=' + e.target.result + ' />');
            };
            reader.readAsDataURL(file);
        });

        $('.upload-file-3').on('change', function() {
            var file = this.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.box-upload-3').html('<img src=' + e.target.result + ' />');
            };
            reader.readAsDataURL(file);
        });

        $('.upload-file-4').on('change', function() {
            var file = this.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.box-upload-4').html('<img src=' + e.target.result + ' />');
            };
            reader.readAsDataURL(file);
        });

        $('.upload-file-5').on('change', function() {
            var file = this.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.box-upload-5').html('<img src=' + e.target.result + ' />');
            };
            reader.readAsDataURL(file);
        });

        $('.select_local').click(function() {
            $('.box-file').hide();
            $('.box_local').show();
        })

        $('.select_grive').click(function() {
            $('.box-file').hide();
            $('.box_gdrive').show();
        })

        $('.select_dropbox').click(function() {
            $('.box-file').hide();
            $('.box_dropbox').show();
        })

        $('.select_other').click(function() {
            $('.box-file').hide();
            $('.box_other').show();
        })

        $('.upload-local-file').click(function() {
            $('.input-local-file').click();
        })

        $('.input-local-file').on('change', function() {
            var file = this.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.box-local').html('<h3>' + e.target.result + '</h3>');
            };
            reader.readAsDataURL(file);
        });

    })

</script>

<script src="{{ URL::asset('assets/dist/libs/tinymce/tinymce.min.js?1692870487') }}" defer></script>

<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function() {
        let options = {
            selector: '#tinymce-mytextarea'
            , height: 300
            , menubar: false
            , statusbar: false
            , plugins: [
                'advlist autolink lists link image charmap print preview anchor'
                , 'searchreplace visualblocks code fullscreen'
                , 'insertdatetime media table paste code help wordcount'
            ]
            , toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat'
            , content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif; font-size: 14px; -webkit-font-smoothing: antialiased; }'
        }
        if (localStorage.getItem("tablerTheme") === 'dark') {
            options.skin = 'oxide-dark';
            options.content_css = 'dark';
        }
        tinyMCE.init(options);
    })
    // @formatter:on

</script>


@endsection
