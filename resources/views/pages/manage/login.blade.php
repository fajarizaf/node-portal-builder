<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>App - nodebuilder.id</title>
    <link rel="icon" href="{{ URL::asset('assets/static/logo-uninet-white.svg') }}" type="image/x-icon">
    <!-- CSS files -->
    <link href="{{ URL::asset('assets/dist/css/tabler.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/dist/css/tabler-flags.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/dist/css/tabler-payments.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/dist/css/tabler-vendors.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/dist/css/demo.min.css?1692870487') }}" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }

    </style>
</head>

<form method="POST" action="/auth/login" id="form-salesorder">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

    <body class=" d-flex flex-column bg-white">
        <script src="{{ URL::asset('assets/dist/js/demo-theme.min.js?1692870487') }}"></script>
        <div class="row g-0 flex-fill">
            <div class="col-12 col-lg-6 col-xl-4 border-top-wide border-primary d-flex flex-column justify-content-center">
                <div class="container container-tight my-5 px-lg-5">
                    <div class="text-center mb-4">
                        <a href="." class="navbar-brand navbar-brand-autodark"><img src="{{ URL::asset('/assets/static/logo.png') }}" /></a>
                    </div>

                    @if(session()->has('failed'))
                    <div class="alert alert-important alert-danger alert-dismissible" role="alert">
                        <div class="d-flex">
                            <div>
                                <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon alert-icon">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                                    <path d="M12 8v4"></path>
                                    <path d="M12 16h.01"></path>
                                </svg>
                            </div>
                            <div>
                                {{ session('failed') }}
                            </div>
                        </div>
                        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                    </div>
                    @endif

                    <a href="{{ route('oauth.google') }}" class="btn" style="width:100%;background:#f4f7fc">
                        <img style="width:40px;" src="{{ URL::asset('/assets/image/google.png') }}" />&nbsp;&nbsp;
                        Login dengan google
                    </a>


                    <div class="text-center text-secondary mt-3">
                        Belum punya akun? <a href="{{ route('register') }}" tabindex="-1">Daftar Sekarang</a>

                    </div>
                    <br />
                    <br />
                    <small>Dengan login dan mendaftar, berarti anda telah setuju dengan kebijakan privasi dan kebijakan layanan kami</small>

                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-8 d-none d-lg-block">

                <div class="bg-cover h-100 min-vh-100" style="background:#f4f7fc"></div>
            </div>
        </div>
        <!-- Libs JS -->
        <!-- Tabler Core -->
    </body>
</form>
<script src="{{ URL::asset('assets/dist/js/tabler.min.js?1692870487') }}" defer></script>
<script src="{{ URL::asset('assets/dist/js/demo.min.js?1692870487') }}" defer></script>
</html>
