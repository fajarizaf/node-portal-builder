    <style type="text/css">

    </style>


    <div class="modal modal-blur fade" id="request-witdraw" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header" style="background:#efefef">
                    <h5 class="modal-title">Pengajuan Pencairan Dana</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="POST" action="/manage/penarikan/add" id="form-product">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="text" style="display:none" name="bank" value="{{$user_rekening->bank_name}}" />
                    <input type="text" style="display:none" name="account_name" value="{{$user_rekening->account_name}}" />
                    <input type="text" style="display:none" name="account_number" value="{{$user_rekening->account_number}}" />

                    <div class="modal-body">

                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label required">Nominal Penarikan</label>
                                    <input type="text" name="nominal" class="form-control" placeholder="Maksimal nominal penarikan : IDR. {{$saldo_active}}" required />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Transfer Ke</label>
                                    <input type="text" disabled name="account_number" value="{{$user_rekening->bank_name}} - {{$user_rekening->account_number}}" class="form-control" required />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Note ke admin</label>
                                    <textarea class="form-control" name="notes"></textarea>
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
