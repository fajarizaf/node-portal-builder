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

        .box-file  {
            display: none;
        }

        .box-file.active  {
            display: block;
        }

    </style>
    
    
    <div class="modal modal-blur fade" id="product-add-digital" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="POST" enctype="multipart/form-data" action="/manage/product/add" id="form-product">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" name="site_id" value="{{ $site_active }}" />
                <input type="hidden" name="product_type" value="produk digital" />
                <input type="hidden" name="payment_type" value="onetime" />

                <div class="modal-header">
                    <h5 class="modal-title">Tambah Digital Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3 align-items-end">
                    <label class="form-label required">Foto Produk</label>
                    <input type="file" style="display:none" name="upload-file-1" class="upload-file-1" />
                    <input type="file" style="display:none" name="upload-file-2" class="upload-file-2" />
                    <input type="file" style="display:none" name="upload-file-3" class="upload-file-3" />
                    <input type="file" style="display:none" name="upload-file-4" class="upload-file-4" />
                    <input type="file" style="display:none" name="upload-file-5" class="upload-file-5" />
                    <div class="col-auto" style="position:relative;">
                        <a href="#" class="avatar avatar-upload rounded box-upload-1 box-upload">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                        <span class="avatar-upload-text">Add</span>
                        </a>
                    </div>
                    <div class="col-auto">
                        <a href="#" class="avatar avatar-upload rounded box-upload-2 box-upload">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                        <span class="avatar-upload-text">Add</span>
                        </a>
                    </div>
                    <div class="col-auto">
                        <a href="#" class="avatar avatar-upload rounded box-upload-3 box-upload">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                        <span class="avatar-upload-text">Add</span>
                        </a>
                    </div>
                    <div class="col-auto">
                        <a href="#" class="avatar avatar-upload rounded box-upload-4 box-upload">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                        <span class="avatar-upload-text">Add</span>
                        </a>
                    </div>
                    <div class="col-auto">
                        <a href="#" class="avatar avatar-upload rounded box-upload-5 box-upload">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                        <span class="avatar-upload-text">Add</span>
                        </a>
                    </div>
                    </div>
                    <label class="form-label" style="font-size:10px;color:#666">Maksimum size upload gambar : 1 MB</label>
                    <div class="mb-3">
                        <label class="form-label required">Nama Produk</label>
                        <input type="text" class="form-control" name="nama_produk" placeholder="Nama produk anda" required>
                    </div>
                    <div class="form-selectgroup-boxes row mb-3">
                        <div class="col-lg-12">
                            <label class="form-label required">File Produk</label>
                            <div class="form-selectgroup">
                              <label class="form-selectgroup-item">
                                <input type="radio" name="product_source_type" value="local" class="form-selectgroup-input select_local" checked>
                                <span class="form-selectgroup-label"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                  <img src="{{URL::asset('assets/image/local.png')}}" style="width:24px" />
                                  Lokal Komputer</span>
                              </label>
                              <label class="form-selectgroup-item">
                                <input type="radio" name="product_source_type" value="gdrive" class="form-selectgroup-input select_grive">
                                <span class="form-selectgroup-label"><!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                  <img src="{{URL::asset('assets/image/gdrive.png')}}" style="width:24px" />
                                  Gdrive</span>
                              </label>
                              <label class="form-selectgroup-item">
                                <input type="radio" name="product_source_type" value="dropbox" class="form-selectgroup-input select_dropbox">
                                <span class="form-selectgroup-label"><!-- Download SVG icon from http://tabler-icons.io/i/circle -->
                                  <img src="{{URL::asset('assets/image/dropbox.png')}}" style="width:24px" />
                                  Dropbox</span>
                              </label>
                              <label class="form-selectgroup-item">
                                <input type="radio" name="product_source_type" value="other" class="form-selectgroup-input select_other">
                                <span class="form-selectgroup-label"><!-- Download SVG icon from http://tabler-icons.io/i/square -->
                                  <img src="{{URL::asset('assets/image/link.png')}}" style="width:24px" />
                                  Others</span>
                              </label>
                            </div>
                        </div>
                        <div class="col-lg-12 box-file box_local active">
                        <br/>
                            <div class="empty" style="border:3px dashed #efefef">
                                <div class="empty-action" style="margin-top:0px !important;">
                                <input type="file" style="display:none" name="input-local-file" class="input-local-file" />
                                <div class="btn btn-secondary upload-local-file box-local" style="background:#ccc;">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                                    Select Files
                                </d>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-12 box-file box_gdrive">
                        <br/>
                            <div class="empty" style="border:3px dashed #efefef">
                                <label class="form-label">Cantumkan url dibawah ini :</label>
                                <input type="text" class="form-control" name="link_gdrive" placeholder="drive.google.com/file/nodebuilder">
                            </div>
                        </div>
                        <div class="col-lg-12 box-file box_dropbox">
                        <br/>
                            <div class="empty" style="border:3px dashed #efefef">
                                <label class="form-label">Cantumkan url dibawah ini :</label>
                                <input type="text" class="form-control" name="link_dropbox" placeholder="dropbox.com/sh/nodebuilder">
                            </div>
                        </div>
                        <div class="col-lg-12 box-file box_other">
                        <br/>
                            <div class="empty" style="border:3px dashed #efefef">
                                <label class="form-label">Cantumkan url dibawah ini :</label>
                                <input type="text" class="form-control" name="link_other" placeholder="url lainya">
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
                    </div>
                    <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Kuantitas Produk </label>
                                <input type="number" name="stok_produk" class="form-control" required>
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
                                <label class="form-label required">Harga Produk</label>
                                <div class="input-group mb-2">
                                <span class="input-group-text">
                                    IDR.
                                </span>
                                <input type="text" name="harga_produk" class="form-control" required>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label class="form-label required">Deskripsi Produk</label>
                                <textarea class="form-control" name="deskripsi_produk" rows="3" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </a>
                    <input type="submit" class="btn btn-primary" />
                </div>
                </form>
            </div>
        </div>
    </div>

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
                    $('.box-upload-1').html('<img src='+e.target.result+' />');
                };
                reader.readAsDataURL(file);
            });

            $('.upload-file-2').on('change', function() {
                var file = this.files[0];
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.box-upload-2').html('<img src='+e.target.result+' />');
                };
                reader.readAsDataURL(file);
            });

            $('.upload-file-3').on('change', function() {
                var file = this.files[0];
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.box-upload-3').html('<img src='+e.target.result+' />');
                };
                reader.readAsDataURL(file);
            });

            $('.upload-file-4').on('change', function() {
                var file = this.files[0];
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.box-upload-4').html('<img src='+e.target.result+' />');
                };
                reader.readAsDataURL(file);
            });

            $('.upload-file-5').on('change', function() {
                var file = this.files[0];
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.box-upload-5').html('<img src='+e.target.result+' />');
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
                    $('.box-local').html('<h3>'+e.target.result+'</h3>');
                };
                reader.readAsDataURL(file);
            });

            $('.select-recuring').click(function() {
                $('.billing-cycle').show();
            })

            $('.select-onetime').click(function() {
                $('.billing-cycle').hide();
            })
        })

    </script>
