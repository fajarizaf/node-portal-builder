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

    <div class="col-12 col-lg-6 col-xl-12 d-none d-lg-block p-5" style="background:#f4f7fc">

        <div class="row g-2 align-items-center">
            <div class="col-1">

                <!-- Page pre-title -->
                <h2 class="page-title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-chart-funnel">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M4.387 3h15.226a1 1 0 0 1 .948 1.316l-5.105 15.316a2 2 0 0 1 -1.898 1.368h-3.116a2 2 0 0 1 -1.898 -1.368l-5.104 -15.316a1 1 0 0 1 .947 -1.316" />
                        <path d="M5 9h14" />
                        <path d="M7 15h10" />
                    </svg>
                    Order
                </h2>
            </div>
            <div class="col-3">
                <form method="GET" action="order">
                    <select name="site" class="form-select select-site">
                        @forelse($sites as $ste)
                        <option value="{{$ste->id}}" @if($site_active==$ste->id) selected @endif>{{$ste->domain_name}}</option>
                        <option value="4">coba.nodebuilder.id</option>
                        @empty
                        <option value="">Belum ada landing page</option>
                        @endforelse
                    </select>
                </form>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <span class="d-none d-sm-inline">
                        <a href="#" class="btn">
                            Filter
                        </a>
                    </span>
                </div>
            </div>
        </div>
        <br />

        <table class="table card-table table-vcenter text-nowrap datatable">
            <thead>
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
                    <td><span class="text-secondary">ODR-{{$row->id}}</span></td>

                    <td>
                        {{\Carbon\Carbon::parse($row->created_at)->format('d M Y')}}
                    </td>
                    <td>
                        <a href="invoice.html" class="text-reset" tabindex="-1">
                            <b><br />{{$row->product_plan_name}}</b><br />
                            <small>{{$row->product_group_name}}</small>
                        </a>
                    </td>
                    <td>
                        <span class="badge bg-purple text-purple-fg">{{$row->product_type}}</span>
                    </td>
                    <td>
                        <span class="badge bg-success me-1"></span> {{ucfirst($row->status_name)}}
                    </td>
                    <td>
                        <div class="red">- IDR. {{number_format($row->total,'0')}}</div>
                    </td>
                    <td>
                        <a onclick="window.open('{{url('/order/payment/'.Crypt::encrypt($row->invoices_id))}}', '_blank', 'location=yes,height=970,width=500,scrollbars=yes,status=yes');" class="btn btn-sm btn-secondary btn-pill w-100">
                            Payment Link
                        </a>
                    </td>
                    <td>
                        <div class="btn btn-sm btn-primary btn-pill w-100">Detail</div>

                    </td>
                </tr>
                @empty

                @endforelse

            </tbody>
        </table>


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
