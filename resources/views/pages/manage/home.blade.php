@extends('layout-1')
@section('container')

    @if(session()->has('success'))
        <div class="alert alert-important alert-success alert-dismissible fade show" role="alert" style="border-radius:0px;margin:0px">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"  aria-label="Close"></button>
        </div>
    @endif

    @if(session()->has('failed'))
        <div class="alert alert-important alert-failed alert-dismissible fade show" role="alert" style="border-radius:0px;margin:0px">
            {{ session('faild') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"  aria-label="Close"></button>
        </div>
    @endif
    <br/>
    <br/>
    <div class="container">
        <div class="row g-0 flex-fill">

            <div class="col-12 col-lg-8 p-2">
                <div class="card">
                  <div class="ribbon bg-red">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-tower">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 3h1a1 1 0 0 1 1 1v2h3v-2a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v2h3v-2a1 1 0 0 1 1 -1h1a1 1 0 0 1 1 1v4.394a2 2 0 0 1 -.336 1.11l-1.328 1.992a2 2 0 0 0 -.336 1.11v7.394a1 1 0 0 1 -1 1h-10a1 1 0 0 1 -1 -1v-7.394a2 2 0 0 0 -.336 -1.11l-1.328 -1.992a2 2 0 0 1 -.336 -1.11v-4.394a1 1 0 0 1 1 -1z" />
                            <path d="M10 21v-5a2 2 0 1 1 4 0v5" />
                    </svg>&nbsp;&nbsp;
                    Basic Package
                  </div>
                  <div class="card-body">
                    
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="text-white avatar" style="background:rgb(47 24 147)"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user-square-rounded">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 13a3 3 0 1 0 0 -6a3 3 0 0 0 0 6z" />
                                <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z" />
                                <path d="M6 20.05v-.05a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v.05" />
                              </svg>
                            </span>
                          </div>
                          <div class="col">
                            <div class="h3 font-weight-bold">
                              Fajar Riza Fauzi
                            </div>
                            <div class="mt-3 list-inline list-inline-dots mb-0 text-secondary d-sm-block d-none">
                                  <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/building-community -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user-square-rounded">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 13a3 3 0 1 0 0 -6a3 3 0 0 0 0 6z" />
                                    <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z" />
                                    <path d="M6 20.05v-.05a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v.05" />
                                    </svg>
                                    0 produk</div>
                                  <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/license -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-inline"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11"></path><path d="M9 7l4 0"></path><path d="M9 11l4 0"></path></svg>
                                    0 Site ( Funnel )</div>
                                  <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/map-pin -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-inline"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"></path></svg>
                                    0 Visitor &nbsp;&nbsp;&nbsp;<span class="badge bg-indigo-lt">Lihat Selangkapnya</span></div>
                                </div>
                          </div>
                        </div>

                  </div>

                  <div class="card-footer" style="padding:12px">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <a href="#" class="btn bg-indigo-lt" style="border-color:#7f65f1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-tower">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 3h1a1 1 0 0 1 1 1v2h3v-2a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v2h3v-2a1 1 0 0 1 1 -1h1a1 1 0 0 1 1 1v4.394a2 2 0 0 1 -.336 1.11l-1.328 1.992a2 2 0 0 0 -.336 1.11v7.394a1 1 0 0 1 -1 1h-10a1 1 0 0 1 -1 -1v-7.394a2 2 0 0 0 -.336 -1.11l-1.328 -1.992a2 2 0 0 1 -.336 -1.11v-4.394a1 1 0 0 1 1 -1z" />
                            <path d="M10 21v-5a2 2 0 1 1 4 0v5" />
                            </svg>
                            Upgrade To Pro
                        </a>
                      </div>
                      <div class="col-auto ms-auto">
                        <label class="form-check form-switch m-0">
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-adjustments-alt">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 8h4v4h-4z" />
                            <path d="M6 4l0 4" />
                            <path d="M6 12l0 8" />
                            <path d="M10 14h4v4h-4z" />
                            <path d="M12 4l0 10" />
                            <path d="M12 18l0 2" />
                            <path d="M16 5h4v4h-4z" />
                            <path d="M18 4l0 1" />
                            <path d="M18 9l0 11" />
                            </svg>
                            Pengaturan
                        </a>
                        </label>
                      </div>
                    </div>
                  </div>

                </div>
            </div>

            <div class="col-12 col-lg-4 p-2">
                <div class="card">
                  <div class="card-body" style="background:rgb(47 24 147);color:#fff">
                    
                    <div class="row g-0 flex-fill">
                        <div class="col-12 col-lg-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" class="icon-tabler icons-tabler-outline icon-tabler-ikosaedr">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M21 8.007v7.986a2 2 0 0 1 -1.006 1.735l-7 4.007a2 2 0 0 1 -1.988 0l-7 -4.007a2 2 0 0 1 -1.006 -1.735v-7.986a2 2 0 0 1 1.006 -1.735l7 -4.007a2 2 0 0 1 1.988 0l7 4.007a2 2 0 0 1 1.006 1.735" />
                            <path d="M3.29 6.97l4.21 2.03" />
                            <path d="M20.71 6.97l-4.21 2.03" />
                            <path d="M20.7 17h-17.4" />
                            <path d="M11.76 2.03l-4.26 6.97l-4.3 7.84" />
                            <path d="M12.24 2.03q 2.797 4.44 4.26 6.97t 4.3 7.84" />
                            <path d="M12 17l-4.5 -8h9z" />
                            <path d="M12 17v5" />
                            </svg>
                        </div>
                        <div class="col-12 col-lg-8">
                            <h2 style="margin:0px">
                                Earnings 
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-tabler icons-tabler-outline icon-tabler-eye">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                </svg>
                            </h2>
                            <h2 style="margin:0px;">IDR. --.--</h2>
                        </div>
                    </div>

                  </div>
                  <!-- Card footer -->
                  <div class="card-footer">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <a href="#">Pencairan</a>
                      </div>
                      <div class="col-auto ms-auto">
                        <label class="form-check form-switch m-0">
                          <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-adjustments-alt">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 8h4v4h-4z" />
                            <path d="M6 4l0 4" />
                            <path d="M6 12l0 8" />
                            <path d="M10 14h4v4h-4z" />
                            <path d="M12 4l0 10" />
                            <path d="M12 18l0 2" />
                            <path d="M16 5h4v4h-4z" />
                            <path d="M18 4l0 1" />
                            <path d="M18 9l0 11" />
                            </svg>
                            Pengaturan
                        </a>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
            </div>

        </div>


        <div class="row g-0 flex-fill">

            <div class="col-12 col-lg-6 p-2">

                <div class="card card-md sticky-top">
                  <div class="card-stamp card-stamp-lg">
                    <div class="card-stamp-icon bg-primary">
                      <!-- Download SVG icon from http://tabler-icons.io/i/ghost -->
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 11a7 7 0 0 1 14 0v7a1.78 1.78 0 0 1 -3.1 1.4a1.65 1.65 0 0 0 -2.6 0a1.65 1.65 0 0 1 -2.6 0a1.65 1.65 0 0 0 -2.6 0a1.78 1.78 0 0 1 -3.1 -1.4v-7"></path><path d="M10 10l.01 0"></path><path d="M14 10l.01 0"></path><path d="M10 14a3.5 3.5 0 0 0 4 0"></path></svg>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-10">
                        <h3 class="h1">Checkout</h3>
                        <div class="markdown text-secondary">
                          All icons come from the Tabler Icons set and are MIT-licensed. Visit
                          <a href="https://tabler-icons.io" target="_blank" rel="noopener">tabler-icons.io</a>,
                          download any of the 5628 icons in SVG, PNG or&nbsp;React and use them in your favourite design tools.
                        </div>
                        <div class="mt-3">
                          <a href="https://tabler-icons.io" class="btn btn-primary" target="_blank" rel="noopener">
                            <!-- Download SVG icon from http://tabler-icons.io/i/download -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path><path d="M7 11l5 5l5 -5"></path><path d="M12 4l0 12"></path></svg>
                            Personalisasikan
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

            </div>
            <div class="col-12 col-lg-6 p-2">

                <div class="card card-md sticky-top">
                  <div class="card-stamp card-stamp-lg">
                    <div class="card-stamp-icon bg-primary">
                      <!-- Download SVG icon from http://tabler-icons.io/i/ghost -->
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 11a7 7 0 0 1 14 0v7a1.78 1.78 0 0 1 -3.1 1.4a1.65 1.65 0 0 0 -2.6 0a1.65 1.65 0 0 1 -2.6 0a1.65 1.65 0 0 0 -2.6 0a1.78 1.78 0 0 1 -3.1 -1.4v-7"></path><path d="M10 10l.01 0"></path><path d="M14 10l.01 0"></path><path d="M10 14a3.5 3.5 0 0 0 4 0"></path></svg>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-10">
                        <h3 class="h1">Produk Link</h3>
                        <div class="markdown text-secondary">
                          All icons come from the Tabler Icons set and are MIT-licensed. Visit
                          <a href="https://tabler-icons.io" target="_blank" rel="noopener">tabler-icons.io</a>,
                          download any of the 5628 icons in SVG, PNG or&nbsp;React and use them in your favourite design tools.
                        </div>
                        <div class="mt-3">
                          <a href="https://tabler-icons.io" class="btn btn-primary" target="_blank" rel="noopener">
                            <!-- Download SVG icon from http://tabler-icons.io/i/download -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path><path d="M7 11l5 5l5 -5"></path><path d="M12 4l0 12"></path></svg>
                            Kelola Produk
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

            </div>
        </div>


                

    </div>


@endsection
