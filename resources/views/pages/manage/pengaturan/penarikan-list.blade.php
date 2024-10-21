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
                <div class="form-selectgroup-label d-flex align-items-center" style="justify-content:space-between;">
                    <div>
                        <b>Layanan & Tagihan</b>
                    </div>
                </div>
            </a>

            <a href="{{url('/manage/penarikan')}}" class="form-selectgroup-item flex-fill" style="margin-bottom:15px;">
                <div class=" d-flex align-items-center p-3  btn btn-primary" style="justify-content:space-between">
                    <div>
                        <b>Saldo & Penarikan</b>
                    </div>
                </div>
            </a>



        </div>

    </div>
    <div class="col-12 col-lg-6 col-xl-9 d-none d-lg-block p-5" style="background:#f4f7fc">

        <div class="row g-2 align-items-center">
            <div class="col" style="margin-top:0px;padding-top:0px">
                <!-- Page pre-title -->
                <h2 class="page-title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-databricks">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 17l9 5l9 -5v-3l-9 5l-9 -5v-3l9 5l9 -5v-3l-9 5l-9 -5l9 -5l5.418 3.01" />
                    </svg>

                    Saldo
                </h2>

            </div>
            <!-- Page title actions -->
            @if($status_verifikasi == 1)
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="#" class="btn btn-primary d-none d-sm-inline-block  " data-bs-toggle="modal" data-bs-target="#request-witdraw">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 5l0 14"></path>
                            <path d="M5 12l14 0"></path>
                        </svg>
                        Request Penarikan
                    </a>
                </div>
            </div>
            @endif
        </div>
        <br />


        <div class="card">
            <div class="card-header">
                <div class="row" style="width:100%">
                    <div class="col-lg-4 p-4">
                        <small style="color:green">Saldo Aktif ( Settled )</small><br />
                        <span class="h1">IDR. {{number_format($saldo_active,'0')}}</span><br />
                        <small>Saldo diatas merupakan saldo yang sudah dapat anda cairkan ke rekening pribadi anda</small>
                    </div>
                    <div class="col-lg-5 p-4">
                        <small>Saldo Pending (Paid)</small><br />
                        <span class="h1">IDR. {{number_format($saldo_pending,'0')}}</span><br />
                        <small>Saldo diatas merupakan saldo dari transaksi order yang telah dibayarkan, dan baru dapat di cairkan setelah 7 hari terhitung dari transaksi dibayarkan.</small>
                    </div>

                    @if($status_verifikasi == 0)
                    <div class="col-lg-3 p-4">
                        <span class="tag">
                            <span class="badge bg-red text-red-fg tag-status badge-empty">
                            </span>
                            Belum Terverifikasi
                            <a href="#" class="btn-close"></a>
                        </span>
                        <small>Untuk melakukan penarikan dana, silahkan verifikasi data diri anda di</small> <a href="{{url('/manage/profile/verifikasi')}}">Pengaturan Akun</a>
                    </div>
                    @else
                    <div class="col-lg-3 p-4">
                        <span class="tag">
                            <span class="badge bg-green text-green-fg tag-status badge-empty">
                            </span>
                            Akun Terverifikasi
                            <a href="#" class="btn-close"></a>
                        </span>
                        <small>Status akun anda telah terverifikasi, silahkan melakukan pencairan dana</small>
                    </div>
                    @endif
                </div>
            </div>
            <div class="card-footer">
                <div class="row" style="width:100%">
                    <div class="col-lg-3">
                        <p class="h3">Rekening Pencairan :</p>
                    </div>
                    <div class="col-lg-3">
                        <small style="color:green">Rekening pencairan dana</small><br />
                        @if($count_rekening != 0)
                        <p>{{$user_rekening->bank_name}} - {{$user_rekening->account_number}}</p>
                        @else
                        <span>-</span>

                        @endif
                    </div>
                    <div class="col-lg-3">
                        <small>Pemilik Rekening</small><br />
                        @if($count_rekening != 0)
                        <span class="h4">{{$user_rekening->account_name}}</span>
                        @else
                        <span>-</span>

                        @endif
                    </div>
                    <div class="col-lg-3">

                        @if($count_rekening == 0)
                        <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#add-rekening-account">

                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-id">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M3 4m0 3a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v10a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3z" />
                                <path d="M9 10m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                <path d="M15 8l2 0" />
                                <path d="M15 12l2 0" />
                                <path d="M7 16l10 0" />
                            </svg>

                            Tambahkan nomor rekening
                        </a>
                        @else
                        <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#edit-rekening-account">

                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-id">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M3 4m0 3a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v10a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3z" />
                                <path d="M9 10m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                <path d="M15 8l2 0" />
                                <path d="M15 12l2 0" />
                                <path d="M7 16l10 0" />
                            </svg>

                            Ubah nomor rekening
                        </a>
                        @endif

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
            Histori Penarikan
        </h2>
        <br />


        <table class="table card-table table-vcenter text-nowrap datatable">
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
                    <th>Tanggal Pengajuan</th>
                    <th>Status</th>
                    <th>Transfer Ke</th>
                    <th>Jumlah Penarikan</th>
                </tr>
            </thead>
            <tbody>
                @forelse($histori_penarikan as $draw)
                <tr>
                    <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                    <td><span class="text-secondary">WDR-{{$draw->id}}</span></td>

                    <td>
                        {{\Carbon\Carbon::parse($draw->created_at)->format('d M Y')}}
                    </td>
                    <td>
                        @if($draw->status_name == 'pending')
                        <span class="badge bg-purple text-purple-fg">Pending</span>
                        @endif

                        @if($draw->status_name == 'proccess')
                        <span class="badge bg-blue text-blue-fg">Proccess</span>
                        @endif

                        @if($draw->status_name == 'complete')
                        <span class="badge bg-green text-green-fg">Complete</span>
                        @endif
                    </td>
                    <td>
                        <small>Bank Transfer</small>
                        <p>{{$draw->bank}} - {{$draw->no_rek}} ( {{$draw->nama_rek}} )</p>
                    </td>
                    <td>
                        <div class="red">- IDR. {{number_format($draw->amount,'0')}}</div>
                    </td>
                </tr>
                @empty

                @endforelse

            </tbody>
        </table>

        @include('component.modal.add-rekening-account')
        @include('component.modal.edit-rekening-account')

        @if($count_rekening != 0)
        @include('component.modal.request-witdraw')
        @endif

        <script type="text/javascript">
            $(document).ready(function() {



            })

        </script>

        @endsection
