    <style type="text/css">

    </style>


    <div class="modal modal-blur fade" id="set-paid" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header" style="background:#efefef">
                    <h5 class="modal-title">Tandai Sudah dibayar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="POST" action="/manage/order/set_paid" id="form-product">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="text" style="display:none" name="invoices_id" value="{{$invoices_id}}" />
                    <input type="text" style="display:none" name="order_id" value="{{$order->id}}" />

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Tanggal Pembayaran</label>
                                    <input type="date" class="form-control" name="payment_date" required="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Metode Pembayaran</label>
                                    <select class="form-select" name="payment_method">
                                        <option value="Bank Transfer">Bank Transfer</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">

                            <label class="form-label">Transaksi ID</label>
                            <input type="text" class="form-control" name="transaction_id">

                        </div>

                        <div class="mb-3">

                            <label class="form-label">Total Dibayarkan</label>
                            <input type="number" class="form-control" name="amount" required="">

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
