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

<style>
    a:hover {
        text-decoration: none
    }

</style>
<div class="p-5">

    <div class="row g-3 align-items-center justify-content-between">
        <div class="col-auto">
            <a href="javascript:history.back()">
                <button class="btn" style="background:none;border:1px solid #aebee9">
                    <svg style="margin:0px;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-left">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M5 12l14 0" />
                        <path d="M5 12l6 6" />
                        <path d="M5 12l6 -6" />
                    </svg>
                </button>
            </a>
        </div>
        <div class="col-auto col-sm-5 col-md-6 col-lg-auto">
            <div class="page-pretitle">Sales Order</div>
            <h1>
                #ODR-{{$order->id}}
            </h1>
        </div>
        <div class="col-auto col-sm-7 col-md-6 col-lg-auto ms-auto d-print-none">
            <div class="d-flex gap-2 justify-content-end">
                <form method="POST" action="/manage/order/set_completed" id="form-product">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="text" style="display:none" name="order_id" value="{{$order->id}}" />

                    @if($order->status_id != 1006)
                    <button type="submit" class="btn btn-primary" title="Sales Order List">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-align-left m-0" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M4 6l16 0"></path>
                            <path d="M4 12l10 0"></path>
                            <path d="M4 18l14 0"></path>
                        </svg>
                        <span class="d-none d-sm-inline">&nbsp;Set As Completed</span>
                    </button>
                    @endif

                </form>
            </div>
        </div>
    </div>

    <div class="row row-cards">

        <div class="col-md-8 col-lg-8">

            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-pills card-header-pills">
                        <li class="nav-item">
                            Informasi pesanan pelanggan
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="datagrid">
                        <div class="datagrid-item">
                            <div class="datagrid-title">Tanggal Pemesanan</div>
                            <div class="datagrid-content">{{\Carbon\Carbon::parse($order->created_at)->format('d M Y - H:i:s')}}
                            </div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Nama Pelanggan</div>
                            <div class="datagrid-content">
                                <div class="d-flex align-items-center fw-bold">
                                    <a href="http://127.0.0.1:443/manage/product/detail/NA%3D%3D">
                                        {{$customer->name}}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-external-link">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M12 6h-6a2 2 0 0 0 -2 2v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-6"></path>
                                            <path d="M11 13l9 -9"></path>
                                            <path d="M15 4h5v5"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Nomor Telpon</div>
                            <div class="datagrid-content">
                                <div class="d-flex align-items-center fw-bold">
                                    {{$customer->telp}}
                                </div>
                            </div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Email Pelanggan</div>
                            <div class="datagrid-content">
                                <div class="d-flex align-items-center fw-bold">
                                    {{$customer->email}}
                                </div>
                            </div>
                        </div>

                    </div>
                    <br>
                    <br>

                    <h3>Produk di pesan :</h3>

                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-vcenter table-mobile-md card-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Service Name</th>
                                        <th>Price (IDR)</th>
                                        <th class="text-md-center">Billing Cycle</th>
                                        <th class="text-md-center">Quantity</th>
                                        <th class="text-md-end">Total (IDR)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($order_item as $oitem)
                                    <tr>
                                        <td class="py-2" data-label="No.">{{$loop->iteration}}</td>
                                        <td class="py-2" data-label="Service Name">
                                            <b>{{$oitem->product_plan_name}}</b>
                                            <a href="{{url('/manage/product/detail/'.urlencode(base64_encode($oitem->product_id)))}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-external-link">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M12 6h-6a2 2 0 0 0 -2 2v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-6"></path>
                                                    <path d="M11 13l9 -9"></path>
                                                    <path d="M15 4h5v5"></path>
                                                </svg>
                                            </a>
                                            <br />
                                            <small>{{$oitem->product_group_name}}</small>
                                        </td>
                                        <td class="py-2" data-label="Price (IDR)">IDR. {{number_format($oitem->unit_price,'0')}}</td>

                                        <td class="py-2 text-md-center text-capitalize" data-label="Billing Cycle">
                                            {{$oitem->billing_cycle}}
                                        </td>
                                        <td class="py-2 text-md-center" data-label="Quantity">
                                            {{$oitem->qty}}
                                        </td>
                                        <td class="py-2 text-md-end" data-label="Total (IDR)">
                                            IDR. {{number_format($oitem->unit_price * $oitem->qty,'0')}}
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center p-4">Belum ada order yang masuk</td>
                                    </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <br />

            <h3>Tagihan :</h3>



            <div class="card">
                <div class="table-responsive">
                    <table class="table table-vcenter table-mobile-md card-table">
                        <thead>
                            <tr>
                                <th>Nomor Tagihan</th>
                                <th class="text-md-center">Tipe Tagihan</th>
                                <th class="text-md-center">Terbit Tagihan</th>
                                <th class="text-md-center">Jatuh Tempo</th>
                                <th class="text-md-center">Total Tagihan (IDR)</th>
                                <th class="text-md-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($invoices as $oinvoices)
                            <tr>
                                <td class="p-4 text-secondary" data-label="InvoiceID">
                                    <span class="badge bg-green-lt">INV-{{$oinvoices->id}}</span>
                                    <span class="badge bg-green text-green-fg">
                                        Publish
                                    </span>
                                </td>
                                <td class="p-4 text-secondary text-md-center" data-label="InvoiceDueDate">
                                    {{$oinvoices->invoices_type}}
                                </td>
                                <td class="p-4 text-secondary text-md-center text-capitalize" data-label="InvoiceTotal">
                                    {{\Carbon\Carbon::parse($oinvoices->invoices_date)->format('d M Y')}}<br />
                                </td>
                                <td class="p-4 text-secondary text-md-center" data-label="InvoiceDate">
                                    {{\Carbon\Carbon::parse($oinvoices->invoices_duedate)->format('d M Y')}}<br />
                                </td>

                                <td class="p-4 text-secondary text-md-center" data-label="InvoiceTotal">
                                    IDR. {{number_format($oinvoices->total,'0')}}
                                </td>
                                <td class="p-4 text-secondary text-md-center" data-label="Status">
                                    @if($oinvoices->status_id == '1004')
                                    <span class="badge border border-success text-success">
                                        Paid
                                    </span>
                                    @else
                                    <span class="badge badge-outline text-red">
                                        Unpaid
                                    </span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center p-4">Belum ada invoices pada order ini</td>
                            </tr>
                            @endempty
                        </tbody>
                    </table>
                </div>
            </div>


            <br />

            <h3>Transaksi :</h3>

            <div class="card">
                <div class="table-responsive">
                    <table class="table table-vcenter table-mobile-md card-table">
                        <thead>
                            <tr>
                                <th>Transaksi ID</th>
                                <th class="text-md-center">Tanggal Pembayaran</th>
                                <th class="text-md-center">Metode Pembayaran</th>
                                <th class="text-md-center">No Referensi</th>
                                <th class="text-md-center">Status Pembayaran</th>
                                <th class="text-md-center">Nominal Dibayarkan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($transaksi as $trx)
                            <tr>
                                <td class="py-2 text-secondary" data-label="InvoiceID">
                                    <span class="badge bg-green-lt">TRX-{{$trx->id}}</span>
                                </td>
                                <td class="py-2 text-secondary text-md-center text-capitalize" data-label="InvoiceTotal">
                                    {{\Carbon\Carbon::parse($trx->created_at)->format('d M Y')}}<br />
                                    <small>Jam : {{\Carbon\Carbon::parse($trx->created_at)->format('H:i:s')}}</small>
                                </td>
                                <td class="py-2 text-secondary text-md-center" data-label="InvoiceDate">
                                    <a href="#" class="text-reset" tabindex="-1">
                                        <b>{{$trx->payment_method_name}}</b><br />
                                        <small>{{$trx->payment_method_group}}</small>
                                    </a>
                                </td>
                                <td class="py-2 text-secondary text-md-center" data-label="InvoiceDueDate">
                                    {{$trx->txnid}}
                                </td>
                                <td class="py-2 text-secondary text-md-center" data-label="InvoiceTotal">
                                    @if($trx->payment_status == 'success')
                                    <span class="badge bg-success me-1"></span> {{ucfirst($trx->payment_status)}}
                                    @else
                                    <span class="badge bg-red me-1"></span> {{ucfirst($trx->payment_status)}}
                                    @endif
                                </td>
                                <td class="py-2 text-secondary text-md-center" data-label="Status">
                                    IDR. {{number_format($trx->amount_in, '0')}}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center p-4">Belum ada transaksi pembayaran</td>
                            </tr>
                            @endempty
                        </tbody>
                    </table>
                </div>
            </div>

            <br />

            <h3>
                Notifikasi Email :
            </h3>

            <ul class="steps steps-vertical">

                @forelse($email_log as $log)

                @php
                $status = OrderHelper::Log_email_status($log->id);
                @endphp
                <li class="step-item">
                    <div class="h4 m-0 row">@if($status['status'] == 1) <div style="height:21px;margin-top:6px;" class="col-md-1 col-lg-1 badge badge-outline text-teal">Success</div> @else <div style="height:21px;" class="col-md-1 col-lg-1 badge badge-outline text-red">Failed</div> @endif &nbsp;
                        <div class="col-md-8 col-lg-8">
                            {{$log->subject}}
                            @if($status['status'] == 1)
                            <div class="datagrid-title">{{$log->subject}} telah berhasil dikirimkan ke alamat email pelanggan</div>
                            @else
                            <div class="datagrid-title">{{$log->subject}} gagal dikirimkan ke alamat email pelanggan</div>
                            @endif
                        </div>
                    </div>
                </li>
                @empty
                <li class="step-item">
                    <div class="h4 m-0">Belum ada notifikasi email ke pelanggan</div>
                    <div class="text-secondary">Notifikasi terkait transaksi dan pemesanan</div>
                </li>
                @endforelse

            </ul>



        </div>

        <div class="col-md-4 col-lg-4">

            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-pills card-header-pills">
                        <li class="nav-item">
                            Informasi Pembayaran
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <span class="datagrid-title">Metode dipilih :</span>
                    @forelse($invoices_payment as $payment)
                    <div class="form-selectgroup-label d-flex align-items-center p-3 btn bg-indigo-lt" style="border:none;justify-content:space-between;margin-bottom:10px;margin-top:10px;">
                        <div class="me-3">
                            <img style="height:40px;border:1px solid #bbb2e1;border-radius:2px" src="{{ URL::asset('/assets/image/channel/'.$payment->payment_method_logo) }}" />


                        </div>
                        <div>
                            <small class="form-hint">
                                {{$payment->payment_method_group}}
                            </small>
                            <b id="myText">{{$payment->payment_method_name}}</b>
                        </div>
                        <div onclick="copyContent()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-library">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M7 3m0 2.667a2.667 2.667 0 0 1 2.667 -2.667h8.666a2.667 2.667 0 0 1 2.667 2.667v8.666a2.667 2.667 0 0 1 -2.667 2.667h-8.666a2.667 2.667 0 0 1 -2.667 -2.667z" />
                                <path d="M4.012 7.26a2.005 2.005 0 0 0 -1.012 1.737v10c0 1.1 .9 2 2 2h10c.75 0 1.158 -.385 1.5 -1" />
                                <path d="M11 7h5" />
                                <path d="M11 10h6" />
                                <path d="M11 13h3" />
                            </svg>
                        </div>
                    </div>
                    @empty
                    <br /> Pelanggan belum memilih metode pembayaran
                    @endforelse

                    <div class="datagrid-title">Link :</div>
                    @forelse($invoices as $in)

                    @if($invoices_payment_count == 0)

                    <div style="width:100%" class="text-end">
                        <a onclick="window.open('{{url('/order/payment/'.Crypt::encrypt($in->id))}}', '_blank', 'location=yes,height=970,width=500,scrollbars=yes,status=yes');" href="#" class="text-end">
                            <div class="datagrid-title">Link Pelanggan</div>
                            <div class="btn btn-primary text-end w-70">

                                Order Link &nbsp;&nbsp;

                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-external-link">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 6h-6a2 2 0 0 0 -2 2v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-6"></path>
                                    <path d="M11 13l9 -9"></path>
                                    <path d="M15 4h5v5"></path>
                                </svg>
                            </div>
                        </a>
                    </div>

                    @else
                    @if($in->status_id == 1004)
                    <div style="width:100%" class="text-end">
                        <a onclick="window.open('{{url('/customer/download/'.Crypt::encrypt($in->id))}}', '_blank', 'location=yes,height=970,width=500,scrollbars=yes,status=yes');" href="#" class="text-end">
                            <div class="datagrid-title">Link Pelanggan</div>
                            <div class="btn btn-purple w-70">

                                Link Download Produk &nbsp;&nbsp;

                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-external-link">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 6h-6a2 2 0 0 0 -2 2v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-6"></path>
                                    <path d="M11 13l9 -9"></path>
                                    <path d="M15 4h5v5"></path>
                                </svg>
                            </div>
                        </a>
                    </div>
                    @else
                    <div style="width:100%" class="text-end">
                        <a onclick="window.open('{{url('/order/payment/'.Crypt::encrypt($in->id))}}', '_blank', 'location=yes,height=970,width=500,scrollbars=yes,status=yes');" href="#" class="text-end">
                            <div class="datagrid-title">Link Pelanggan</div>
                            <div class="btn btn-primary text-end w-70">

                                Payment Link &nbsp;&nbsp;

                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-external-link">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 6h-6a2 2 0 0 0 -2 2v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-6"></path>
                                    <path d="M11 13l9 -9"></path>
                                    <path d="M15 4h5v5"></path>
                                </svg>
                            </div>
                        </a>
                    </div>
                    @endif

                    @endif

                    @empty

                    @endforelse

                </div>
            </div>
            <br />

            @forelse($invoices_payment as $payment)

            @if($payment->payment_method == 1)
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-pills card-header-pills">
                        <li class="nav-item">
                            Bukti Transfer
                        </li>
                    </ul>
                </div>
                <div class="card-body">

                    @forelse($invoices_confirm as $confirm)

                    <table class="table table-transparent table-responsive">
                        <tbody>
                            <tr>
                                <td class="text-left">Pemilik Rekening</td>
                                <td>:</td>
                                <td class="text-left text-end"><b>IDR. {{$confirm->pemilik_rekening}}</b></td>
                            </tr>
                            <tr>
                                <td class="text-left">Nomor Rekening</td>
                                <td>:</td>
                                <td class="text-left text-end">{{$confirm->nomor_rekening}}</td>
                            </tr>
                            <tr>
                                <td class="text-left">Bukti Transfer</td>
                                <td>:</td>
                                <td class="text-left text-end">
                                    <a onclick="window.open('{{url('/storage/uploads/payment/'.$confirm->bukti_transfer)}}', '_blank', 'location=yes,height=970,width=500,scrollbars=yes,status=yes');" href="#">
                                        Lihat bukti transfer
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-external-link">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M12 6h-6a2 2 0 0 0 -2 2v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-6"></path>
                                            <path d="M11 13l9 -9"></path>
                                            <path d="M15 4h5v5"></path>
                                        </svg>
                                    </a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                    <div style="width:100%" class="text-end">
                        @if($invoices_status != '1004')
                        <div class="btn float-right">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#set-paid">
                                Set As Paid
                            </a>
                        </div>
                        @endif
                    </div>

                    @empty

                    @endempty

                </div>
            </div>
            @else

            @endif

            @empty

            @endforelse

            <br />

        </div>
    </div>

</div>


@include('component.modal.set-paid')


<script type="text/javascript">
    $(document).ready(function() {



    })

</script>

@endsection
