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

    @media only screen and (max-width: 1000px) {

        /* Force table to not be like tables anymore */
        #no-more-tables table,
        #no-more-tables thead,
        #no-more-tables tbody,
        #no-more-tables th,
        #no-more-tables td,
        #no-more-tables tr {
            display: block;
        }

        /* Hide table headers (but not display: none;, for accessibility) */
        #no-more-tables thead tr {
            position: absolute;
            top: -9999px;
            left: -9999px;
        }

        #no-more-tables tr {}

        #no-more-tables td {
            /* Behave like a "row" */
            border: none;
            border-bottom: 1px solid #eee;
            position: relative;
            padding-left: 50%;
            white-space: normal;
            text-align: left;
        }

        #no-more-tables td:before {
            /* Now like a table header */
            position: absolute;
            /* Top/left values mimic padding */
            top: 6px;
            left: 6px;
            width: 45%;
            padding-right: 10px;
            white-space: nowrap;
            text-align: left;
            font-weight: bold;
        }

        /*
    Label the data
    */
        #no-more-tables td:before {
            content: attr(data-title);
        }
    }

</style>



<div class="row g-0 flex-fill">

    <div class="col-12 col-lg-6 col-xl-12 d-lg-block p-5" style="background:#f4f7fc">

        <div class="row align-items-center">
            <div class="col-lg-2 p-2">
                <!-- Page pre-title -->
                <h2 class="page-title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-receipt">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2m4 -14h6m-6 4h6m-2 4h2"></path>
                    </svg>
                    Transaksi Masuk
                </h2>
            </div>
            <div class="col-lg-2 p-2">
                <form method="GET" action="">
                    <select name="site" class="form-select select-site">
                        @forelse($sites as $ste)
                        <option value="{{$ste->id}}" @if($site_active==$ste->id) selected @endif>{{$ste->domain_name}}</option>
                        @empty
                        <option value="">Belum ada landing page</option>
                        @endforelse
                    </select>
                </form>
            </div>
        </div>

        <br />

        <div id="no-more-tables">

            <table class="table card-table table-vcenter text-nowrap datatable cf">
                <thead class="cf">
                    <tr>
                        <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select all invoices"></th>
                        <th class="w-1">Transaksi ID
                            <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-sm icon-thick">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M6 15l6 -6l6 6"></path>
                            </svg>
                        </th>
                        <th>Tanggal Pembayaran</th>
                        <th>Invoices ID</th>
                        <th>Metode Pembayaran</th>
                        <th>Nomor Referensi</th>
                        <th>Status Pembayaran</th>
                        <th>Nominal Dibayarkan</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse($transaction as $row)
                    <tr>
                        <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                        <td data-title="Transaksi ID"><span class="text-secondary">TRX-{{$row->id}}</span></td>
                        <td data-title="Tanggal Pembayaran">

                            {{\Carbon\Carbon::parse($row->created_at)->format('d M Y')}}<br />
                            <small>Jam : {{\Carbon\Carbon::parse($row->created_at)->format('H:i:s')}}</small>
                        </td>
                        <td data-title="Invoices ID">

                            <a href="#">
                                INV-{{$row->invoices_id}}
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-external-link">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 6h-6a2 2 0 0 0 -2 2v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-6"></path>
                                    <path d="M11 13l9 -9"></path>
                                    <path d="M15 4h5v5"></path>
                                </svg>
                            </a>
                        </td>
                        <td data-title="Metode Pembayaran">

                            <a href="#" class="text-reset" tabindex="-1">
                                <b><br />{{$row->payment_method_name}}</b><br />
                                <small>{{$row->payment_method_group}}</small>
                            </a>
                        </td>
                        <td data-title="Nomor Referensi">

                            <span class="badge bg-purple text-purple-fg">{{$row->txnid}}</span>
                        </td>
                        <td data-title="Status Pembayaran">

                            @if($row->payment_status == 'success')
                            <span class="badge bg-success me-1"></span> {{ucfirst($row->payment_status)}}
                            @else
                            <span class="badge bg-red me-1"></span> {{ucfirst($row->payment_status)}}
                            @endif
                        </td>
                        <td data-title="Nominal Transaksi">

                            <div class="red">IDR. {{number_format($row->amount_in,'0')}}</div>
                        </td>
                        <td>
                            <div class="btn btn-sm btn-primary btn-pill w-100">Detail</div>

                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td style="padding:40px;text-align:center" colspan="9">
                            <h2 class="page-title">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-autofit-down">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 20h-6a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h8" />
                                    <path d="M18 4v17" />
                                    <path d="M15 18l3 3l3 -3" />
                                </svg>
                                &nbsp;
                                Belum ada transaksi masuk
                            </h2>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <br />
        <br />
        <ul class="pagination m-0 ms-auto">
            {{ $transaction->appends(request()->query())->links() }}
        </ul>
        <br />
        <br />
        <br />



        <br />
        <br />


    </div>

</div>
<br />



<script type="text/javascript">
    $(document).ready(function() {

        $('.select-site').change(function() {
            this.form.submit();
        })

    })

</script>

@endsection
