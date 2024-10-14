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

</style>


<div class="row g-0 flex-fill">
    <div class="col-12 col-lg-6 col-xl-3 d-none d-lg-block p-5" style="background:#fff">

        <h2 class="page-title">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-settings">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"></path>
                <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
            </svg>

            Pengaturan
        </h2>
        <br />

        <div class="form-selectgroup form-selectgroup-boxes d-flex flex-column">

            <a href="{{url('/manage/profile')}}" class="form-selectgroup-item flex-fill" style="margin-bottom:15px;">
                <div class="form-selectgroup-label d-flex align-items-center p-3" style="justify-content:space-between">
                    <div>
                        <b>Pengaturan Akun</b>
                    </div>
                </div>
            </a>

            <a href="{{url('/manage/tagihan')}}" class="form-selectgroup-item flex-fill" style="margin-bottom:15px;">

                <div class=" d-flex align-items-center p-3 btn btn-primary" style="justify-content:space-between;">

                    <div>
                        <b>Layanan & Tagihan</b>
                    </div>
                </div>
            </a>

            <a href="{{url('/manage/penarikan')}}" class="form-selectgroup-item flex-fill" style="margin-bottom:15px;">
                <div class="form-selectgroup-label d-flex align-items-center p-3" style="justify-content:space-between">
                    <div>
                        <b>Penarikan</b>
                    </div>
                </div>
            </a>



        </div>

    </div>
    <div class="col-12 col-lg-6 col-xl-9 d-none d-lg-block p-5" style="background:#f4f7fc">

        <h2 class="page-title">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-databricks">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M3 17l9 5l9 -5v-3l-9 5l-9 -5v-3l9 5l9 -5v-3l-9 5l-9 -5l9 -5l5.418 3.01" />
            </svg>

            Layanan
        </h2>
        <br />


        <div class="card">
            <div class="card-header">
                <div class="row" style="width:100%">
                    <div class="col-lg-4 p-4">
                        <small>Paket Berlangganan</small>
                        <h1>{{$package->product_plan_name}}</h1><span class="badge bg-green-lt">{{$package->status_name}}</span>


                    </div>
                    <div class="col-lg-5 p-4">
                        <small>Tagihan</small><br />
                        <span class="h1">IDR. {{number_format($package->amount,'0')}}</span><small>per bulan</small><br />
                        <small>Tagihan berikutnya</small><br />
                        @if($package->next_due_date)
                        <small>{{\Carbon\Carbon::parse($package->next_due_date)->format('d M Y')}}</small><br />
                        @else
                        -
                        @endif



                    </div>

                    <div class="col-lg-3 p-4">
                        <small>Ubah paket</small><br />
                        <br />
                        <a href="#" class="btn bg-indigo-lt" style="border-color:#7f65f1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-big-up-lines">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M9 12h-3.586a1 1 0 0 1 -.707 -1.707l6.586 -6.586a1 1 0 0 1 1.414 0l6.586 6.586a1 1 0 0 1 -.707 1.707h-3.586v3h-6v-3z" />
                                <path d="M9 21h6" />
                                <path d="M9 18h6" />
                            </svg>
                            Upgrade Layanan
                        </a>


                    </div>


                </div>
            </div>
            <div class="card-body">

                <div class="row" style="width:100%">

                    @php
                    $count_product = ProdukHelper::Product_status_usage(auth()->user()->id);
                    $count_order = OrderHelper::Order_status_usage(auth()->user()->id);
                    $count_site = SiteHelper::Site_status_usage(auth()->user()->id);
                    @endphp

                    <div class="col-lg-3 p-4">
                        <div class="d-flex mb-2">
                            <div><b>Produk</b></div>
                        </div>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-primary" style="width: {{$count_product['percentage']}}%" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" aria-label="50% Complete">

                                <span class="visually-hidden">75% Complete</span>
                            </div>
                        </div>
                        <br />
                        <div class="d-flex mb-2">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path>
                                    <path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-10"></path>
                                    <path d="M10 12l4 0"></path>
                                </svg>

                                {{$count_product['count_product']}} Produk
                                ({{$count_product['percentage']}}%)
                            </div>
                            <div class="ms-auto">
                            </div>
                        </div>
                        <div>
                        </div>
                    </div>


                    <div class="col-lg-3 p-4">
                        <div class="d-flex mb-2">
                            <div><b>Order</b></div>
                        </div>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-primary" style="width: {{$count_order['percentage']}}%" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" aria-label="50% Complete">
                                <span class="visually-hidden">75% Complete</span>
                            </div>
                        </div>
                        <br />
                        <div class="d-flex mb-2">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path>
                                    <path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-10"></path>
                                    <path d="M10 12l4 0"></path>
                                </svg>
                                {{$count_order['count_order']}} Order
                                ({{$count_order['percentage']}}%)
                            </div>
                            <div class="ms-auto">
                            </div>
                        </div>
                        <div>
                        </div>
                    </div>


                    <div class="col-lg-3 p-4">
                        <div class="d-flex mb-2">
                            <div><b>Landing Page</b></div>
                        </div>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-primary" style="width: {{$count_site['percentage']}}%" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" aria-label="50% Complete">
                                <span class="visually-hidden">75% Complete</span>
                            </div>
                        </div>
                        <br />
                        <div class="d-flex mb-2">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path>
                                    <path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-10"></path>
                                    <path d="M10 12l4 0"></path>
                                </svg>
                                {{$count_site['count_site']}} Landing Page
                                ({{$count_site['percentage']}}%)
                            </div>
                            <div class="ms-auto">
                            </div>
                        </div>
                        <div>
                        </div>
                    </div>

                    <div class="col-lg-3 p-4">
                        <div class="d-flex mb-2">
                            <div><b>Siklus tagihan :</b> {{$package->billing_cycle}}</div>
                        </div>
                        <div class="d-flex mb-2">
                            <button type="button" class="btn">Ubah siklus penagihan</button>
                        </div>
                        <div>
                        </div>
                    </div>


                </div>



            </div>

        </div>
        <br />
        <br />
        <h2 class="page-title">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-align-box-left-stretch">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M3 5a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-14z" />
                <path d="M9 17h-2" />
                <path d="M13 12h-6" />
                <path d="M11 7h-4" />
            </svg>
            Tagihan
        </h2>
        <br />


        <table class="table table-vcenter table-mobile-md card-table">


            <thead>
                <tr>
                    <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select all invoices"></th>
                    <th class="w-1">No.
                        <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-sm icon-thick">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M6 15l6 -6l6 6"></path>
                        </svg>
                    </th>
                    <th>Invoice Subject</th>
                    <th>Tipe</th>
                    <th>Tanggal Terbit</th>
                    <th>Jatuh Tempo</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($invoices as $inv)
                <tr>
                    <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                    <td><span class="text-secondary">INV-{{$inv->id}}</span></td>
                    <td>
                        <a href="invoice.html" class="text-reset" tabindex="-1">
                            Berlangganan Paket <b><br />{{$inv->item_name}}</b><br />
                            <small>Siklus penagihan ( {{$inv->billing_cycle}} )</small>
                        </a>
                    </td>
                    <td>
                        @if($inv->invoices_type == 'register')
                        <span class="badge bg-purple text-purple-fg">{{$inv->invoices_type}}</span>
                        @endif

                        @if($inv->invoices_type == 'renew')
                        <span class="badge bg-blue-lt">{{$inv->invoices_type}}</span>
                        @endif
                    </td>
                    <td>
                        {{ \Carbon\Carbon::parse($inv->invoices_date)->format('d M Y')}}
                    </td>
                    <td>
                        {{ \Carbon\Carbon::parse($inv->invoices_duedate)->format('d M Y')}}
                    </td>
                    <td>
                        <span class="badge bg-success me-1"></span> {{ucfirst($inv->status_name)}}
                    </td>
                    <td>IDR. {{number_format($inv->total,'0')}}</td>

                    <td class="text-end">
                        <button class="btn btn-warning" data-bs-boundary="viewport" data-bs-toggle="dropdown">Bayar Tagihan</button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center p-5">Belum ada tagihan yang terbit untuk anda</td>
                <tr>
                    @endforelse

            </tbody>
        </table>





        <script type="text/javascript">
            $(document).ready(function() {



            })

        </script>

        @endsection
