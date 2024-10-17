@extends('layout-1')
@section('container')

@if(session()->has('success'))
<div class="alert alert-important alert-success alert-dismissible fade show" role="alert" style="border-radius:0px;margin:0px">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session()->has('failed'))
<div class="alert alert-important alert-failed alert-dismissible fade show" role="alert" style="border-radius:0px;margin:0px">
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

<header class="navbar navbar-expand-md" style="background:#d9e2f1">

    <div class="d-md-none"></div>
    <button style="margin-top:7px" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu-01" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse pb-2 pb-md-0" id="navbar-menu-01">
        <div class="row flex-fill align-items-center g-2">
            <div class="col-12 col-md-10">
                <ul class="navbar-nav">
                    <li class="nav-item @if(Request::segment(3) == '') active @endif">


                        <a style="color:#212053" class="nav-link" href="{{url('/manage/order')}}" title="Invoice Drafted">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alarm" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 13m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                    <path d="M12 10l0 3l2 0" />
                                    <path d="M7 4l-2.75 2" />
                                    <path d="M17 4l2.75 2" />
                                </svg>
                            </span>
                            <span class="nav-link-title"><b>Pending</b></span>

                        </a>
                    </li>
                    <li class="nav-item @if(Request::segment(3) == 'paid') active @endif">


                        <a style="color:#212053" class="nav-link" href="{{url('/manage/order/paid')}}" title="Invoice Published">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-basket-check" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M17 10l-2 -6" />
                                    <path d="M7 10l2 -6" />
                                    <path d="M11 20h-3.756a3 3 0 0 1 -2.965 -2.544l-1.255 -7.152a2 2 0 0 1 1.977 -2.304h13.999a2 2 0 0 1 1.977 2.304l-.479 2.729" />
                                    <path d="M10 14a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                    <path d="M15 19l2 2l4 -4" />
                                </svg>
                            </span>
                            <span class="nav-link-title"><b>Paid</b></span>

                        </a>
                    </li>
                    <li class="nav-item @if(Request::segment(3) == 'proccess') active @endif">


                        <a style="color:#212053" class="nav-link" href="{{url('/manage/order/proccess')}}" title="Invoice Published">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-activity-heartbeat">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M3 12h4.5l1.5 -6l4 12l2 -9l1.5 3h4.5" />
                                </svg>
                            </span>
                            <span class="nav-link-title"><b>Proccess</b></span>

                        </a>
                    </li>
                    <li class="nav-item @if(Request::segment(3) == 'complete') active @endif">

                        <a style="color:#212053" class="nav-link" href="{{url('/manage/order/complete')}}" title="Invoice Due">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-progress-check" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M10 20.777a8.942 8.942 0 0 1 -2.48 -.969" />
                                    <path d="M14 3.223a9.003 9.003 0 0 1 0 17.554" />
                                    <path d="M4.579 17.093a8.961 8.961 0 0 1 -1.227 -2.592" />
                                    <path d="M3.124 10.5c.16 -.95 .468 -1.85 .9 -2.675l.169 -.305" />
                                    <path d="M6.907 4.579a8.954 8.954 0 0 1 3.093 -1.356" />
                                    <path d="M9 12l2 2l4 -4" />
                                </svg>
                            </span>
                            <span class="nav-link-title"><b>Completed</b></span>

                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>



<div class="row g-0 flex-fill">

    <div class="col-12 col-lg-6 col-xl-12 d-lg-block p-5" style="background:#f4f7fc">

        <div class="row align-items-center">
            <div class="col-lg-1 p-2">
                <!-- Page pre-title -->
                <h2 class="page-title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-basket">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M10 14a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                        <path d="M5.001 8h13.999a2 2 0 0 1 1.977 2.304l-1.255 7.152a3 3 0 0 1 -2.966 2.544h-9.512a3 3 0 0 1 -2.965 -2.544l-1.255 -7.152a2 2 0 0 1 1.977 -2.304z"></path>
                        <path d="M17 10l-2 -6"></path>
                        <path d="M7 10l2 -6"></path>
                    </svg>

                    Order
                </h2>
            </div>
            <div class="col-lg-2 p-2">
                <form method="GET" action="proccess">
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
                        <th class="w-1">Order ID
                            <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-sm icon-thick">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M6 15l6 -6l6 6"></path>
                            </svg>
                        </th>
                        <th>Tanggal Pesan</th>
                        <th>Produk Dipesan</th>
                        <th>Tipe</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Payment</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse($order as $row)
                    <tr>
                        <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>

                        <td data-title="Order ID"><span class="text-secondary">ODR-{{$row->id}}</span></td>


                        <td data-title="Tanggal Pesan">
                            {{\Carbon\Carbon::parse($row->created_at)->format('d M Y')}}<br />
                            <small>Jam : {{\Carbon\Carbon::parse($row->created_at)->format('H:i:s')}}</small>
                        </td>
                        <td data-title="Produk Dipesan">

                            <a href="invoice.html" class="text-reset" tabindex="-1">
                                <b><br />{{$row->product_plan_name}}</b>
                                <a href="{{url('/manage/product/detail/'.urlencode(base64_encode($row->product_id)))}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-external-link">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M12 6h-6a2 2 0 0 0 -2 2v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-6"></path>
                                        <path d="M11 13l9 -9"></path>
                                        <path d="M15 4h5v5"></path>
                                    </svg>
                                </a>
                                <br />
                                <small>{{$row->product_group_name}}</small>
                            </a>
                        </td>
                        <td data-title="Tipe">
                            <span class="badge bg-purple text-purple-fg">{{$row->product_type}}</span>
                        </td>
                        <td data-title="Status">

                            <span class="badge bg-success me-1"></span> {{ucfirst($row->status_name)}}<br />
                            <small>
                                <a href="{{url('/manage/order/detail/'.urlencode(base64_encode($row->id)))}}">
                                    INV-{{$row->invoices_id}}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-external-link">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M12 6h-6a2 2 0 0 0 -2 2v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-6"></path>
                                        <path d="M11 13l9 -9"></path>
                                        <path d="M15 4h5v5"></path>
                                    </svg>
                                </a>
                            </small>

                        </td>
                        <td data-title="Total">

                            <div class="red">- IDR. {{number_format($row->total,'0')}}</div>
                        </td>
                        <td data-title="Payment">

                            <a onclick="window.open('{{url('/order/payment/'.Crypt::encrypt($row->invoices_id))}}', '_blank', 'location=yes,height=970,width=500,scrollbars=yes,status=yes');" class="btn btn-sm btn-secondary btn-pill w-100">
                                Payment Link
                            </a>
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
                                Belum ada data pesanan
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
            {{ $order->appends(request()->query())->links() }}
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
