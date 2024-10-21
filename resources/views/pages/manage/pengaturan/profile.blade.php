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
                <div class="d-flex align-items-center p-3  btn btn-primary" style="justify-content:space-between">
                    <div>
                        <b>Pengaturan Akun</b>
                    </div>
                </div>
            </a>

            <a href="{{url('/manage/tagihan')}}" class="form-selectgroup-item flex-fill" style="margin-bottom:15px;">

                <div class="form-selectgroup-label d-flex align-items-center p-3" style="justify-content:space-between;">
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
    <div class="col-12 col-lg-6 col-xl-9 d-none d-lg-block p-0" style="background:#f4f7fc">

        <div class="page-header d-print-none p-7" style="background:url({{URL::asset('assets/image/bglogin.jpg')}}) !important">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle" style="color:#fff">
                            Pengaturan
                        </div>
                        <h2 class="page-title" style="color:#fff">
                            Akun Pengguna
                        </h2>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <span class="d-none d-sm-inline">
                                <a href="#" class="btn">
                                    Dokumentasi
                                </a>
                            </span>
                            <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 5l0 14"></path>
                                    <path d="M5 12l14 0"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row align-items-center px-7" style="background:#fff">
            <div class="col-auto" style="margin-top:-50px;">
                <span class="avatar avatar-xl" style="background-image: url(https://lh3.googleusercontent.com/a/ACg8ocKwPUI3qb_mzCKV7LI4hViRK9fBQA2hbgfJE49JufiT3TYkvQ=s96-c);border-radius:50%"></span>

            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">

                <header class="navbar-expand-md">
                    <div class="collapse navbar-collapse" id="navbar-menu">

                        <div class="navbar px-4">

                            <div class="container-xl">
                                <div class="row flex-fill align-items-center">
                                    <div class="col">
                                        <ul class="navbar-nav">
                                            <li class="nav-item active">
                                                <a class="nav-link" href="{{url('/manage/profile')}}">
                                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                        <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path d="M5 12l-2 0l9 -9l9 9l-2 0"></path>
                                                            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                                            <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                                                        </svg>
                                                    </span>
                                                    <span class="nav-link-title">
                                                        Akun Saya
                                                    </span>
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" href="{{url('/manage/profile/verifikasi')}}">
                                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                        <!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path d="M9 11l3 3l8 -8"></path>
                                                            <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9"></path>
                                                        </svg>
                                                    </span>
                                                    <span class="nav-link-title">
                                                        Verifikasi
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                <div class="col-lg-12">

                    <div class="row">
                        <div class="col-md-6 col-xl-5 p-6">

                            <form method="POST" action="./profile">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <div class="mb-3">
                                    <label class="form-label">Nama Lengkap</label>
                                    <div class="form-floating mb-3">
                                        <input style="background:none" type="text" name="name" class="form-control" id="floating-input" value="{{$profile->name}}" autocomplete="off">
                                    </div>
                                    <label class="form-label">Email Terdaftar</label>
                                    <div class="form-floating mb-3">
                                        <input style="background:none" disabled type="email" class="form-control" id="floating-input" value="{{$profile->email}}" autocomplete="off">

                                    </div>
                                    <label class="form-label">Nomor HP</label>
                                    <div class="form-floating mb-3">
                                        <input style="background:none" type="text" name="telp" class="form-control" id="floating-input" value="{{$profile->telp}}" autocomplete="off">

                                    </div>
                                    <div class="form-floating mb-3">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="col-md-6 col-xl-5 p-6">

                            <br />
                            <div class="mb-3">
                                <h3>Delete Akun Pengguna</h3>
                                <small>
                                    Menghapus akun sama saja dengan menghapus seluruh asset digital anda di layanan kami
                                </small>
                                <div class="form-selectgroup-label d-flex align-items-center p-3" style="justify-content:space-between;margin-top:10px">
                                    <div class="me-3">

                                    </div>
                                    <div>
                                        <b>Delete Akun</b>
                                    </div>
                                    <div class="me-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M4 7l16 0" />
                                            <path d="M10 11l0 6" />
                                            <path d="M14 11l0 6" />
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                        </svg>

                                    </div>
                                </div>
                            </div>
                            <br />
                            <div style="border:1px solid #dadfe5;border-radius:4px;" class="row flex-fill p-3">
                                <div class="col-2"><img src="{{ URL::asset('/assets/image/google.png') }}" style="width:40px" /></div>
                                <div class="col-10">
                                    <div style="margin-top:10px;">Akun anda terhubung dengan google</div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>




        <script type="text/javascript">
            $(document).ready(function() {



            })

        </script>

        @endsection
