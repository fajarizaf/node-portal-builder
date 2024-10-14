    <style type="text/css">

    </style>


    <div class="modal modal-blur fade" id="add-bank-account" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header" style="background:#efefef">
                    <h5 class="modal-title">Tambah Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="POST" enctype="multipart/form-data" action="/store/payment" id="form-product">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" name="site_id" value="{{ $site_active }}" />

                    <div class="modal-body">

                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Pilih Bank</label>
                                    <select type="text" name="account_bank" class="form-select" required>

                                        @forelse($site_bank as $bank)
                                        <option value="{{$bank->id}}">{{$bank->bank_name}}</option>
                                        @empty
                                        <option value="">Bank not found</option>
                                        @endforelse

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Account Name</label>
                                    <input type="text" name="account_name" class="form-control" required />

                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Account Number</label>
                                    <input type="text" name="account_number" class="form-control" required />

                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Note</label>
                                    <textarea class="form-control" name="notes"></textarea>
                                    <small class="form-hint">
                                        Informasi tambahan setelah melakukan checkout untuk pelanggan
                                    </small>

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



        })

    </script>
