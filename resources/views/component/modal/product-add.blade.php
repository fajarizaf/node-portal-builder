
    <div class="modal modal-blur fade" id="modal-report" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="POST" action="/manage/product/add" id="form-product">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                <div class="modal-header">
                    <h5 class="modal-title">Tambah Produk Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3 align-items-end">
                    <div class="col-auto">
                        <a href="#" class="avatar avatar-upload rounded">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                        <span class="avatar-upload-text">Add</span>
                        </a>
                    </div>
                    <div class="col-auto">
                        <a href="#" class="avatar avatar-upload rounded">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                        <span class="avatar-upload-text">Add</span>
                        </a>
                    </div>
                    <div class="col-auto">
                        <a href="#" class="avatar avatar-upload rounded">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                        <span class="avatar-upload-text">Add</span>
                        </a>
                    </div>
                    <div class="col-auto">
                        <a href="#" class="avatar avatar-upload rounded">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                        <span class="avatar-upload-text">Add</span>
                        </a>
                    </div>
                    <div class="col-auto">
                        <a href="#" class="avatar avatar-upload rounded">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                        <span class="avatar-upload-text">Add</span>
                        </a>
                    </div>
                    <div class="col-auto">
                        <a href="#" class="avatar avatar-upload rounded">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                        <span class="avatar-upload-text">Add</span>
                        </a>
                    </div>
                    <div class="col-auto">
                        <a href="#" class="avatar avatar-upload rounded">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                        <span class="avatar-upload-text">Add</span>
                        </a>
                    </div>
                    <div class="col-auto">
                        <a href="#" class="avatar avatar-upload rounded">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                        <span class="avatar-upload-text">Add</span>
                        </a>
                    </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" name="nama_produk" placeholder="Nama produk anda" required>
                    </div>
                    <div class="form-selectgroup-boxes row mb-3">
                        <div class="col-lg-6">
                            <label class="form-selectgroup-item">
                            <input type="radio" name="tipe_produk" value="onetime" class="form-selectgroup-input select-onetime" checked="">
                            <span class="form-selectgroup-label d-flex align-items-center p-3">
                                <span class="me-3">
                                <span class="form-selectgroup-check"></span>
                                </span>
                                <span class="form-selectgroup-label-content">
                                <span class="form-selectgroup-title strong mb-1">Onetime</span>
                                <span class="d-block text-secondary">Produk atau layanan jenis sekali bayar, setelah pelanggan menyelesaikan pemmbelian produk</span>
                                </span>
                            </span>
                            </label>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-selectgroup-item">
                            <input type="radio" name="tipe_produk" value="recuring" class="form-selectgroup-input select-recuring">
                            <span class="form-selectgroup-label d-flex align-items-center p-3">
                                <span class="me-3">
                                <span class="form-selectgroup-check"></span>
                                </span>
                                <span class="form-selectgroup-label-content">
                                <span class="form-selectgroup-title strong mb-1">Recuring</span>
                                <span class="d-block text-secondary">Produk atau layanan jenis berlangganan yang akan terima tagihan sesuai siklus tagihan </span>
                                </span>
                            </span>
                            </label>
                        </div>
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
                                <label class="form-label">Kode Produk</label>
                                <input type="text" class="form-control" name="kode_produk" placeholder="Untuk label produk bila perlu">
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
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Harga Produk</label>
                                <div class="input-group mb-2">
                                <span class="input-group-text">
                                    IDR.
                                </span>
                                <input type="text" name="harga_produk" class="form-control" required>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Stock Produk</label>
                                <input type="text" name="stok_produk" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label class="form-label">Deskripsi Produk</label>
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

            $('.select-recuring').click(function() {
                $('.billing-cycle').show();
            })

            $('.select-onetime').click(function() {
                $('.billing-cycle').hide();
            })
        })

    </script>
