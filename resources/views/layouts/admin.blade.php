<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('title')
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconly/bold.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    @yield('style')
</head>
<body>
@include('includes.admin_sidebar')
<div class="page-heading">
    <h3 class="text-center">Welcome To Dashboard Panel</h3>
</div>
<div class="page-content" style="min-height: 700px;">
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row">

                    <div class="col-4 col-lg-4 col-md-4">
                        <a href="{{ route('client.index') }}">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon purple">
                                                <i class="iconly-boldShow"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 align-self-md-center">
                                            <h6 class="text-muted font-semibold">Customer Profile</h6>
                                            {{-- <h6 class="font-extrabold mb-0">112.000</h6> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>


                    <div class="col-4 col-lg-4 col-md-4">
                        <a href="{{ url('VolumeChart') }}">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon blue">
                                                <i class="iconly-boldChart"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 align-self-md-center">
                                            <h6 class="text-muted font-semibold">Volume Chart</h6>
                                            {{-- <h6 class="font-extrabold mb-0">183.000</h6> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>


                    <div class="col-4 col-lg-4 col-md-4">
                        <a href="{{ route('account.index') }}">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon green">
                                                <i class="iconly-boldDocument"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 align-self-md-center">
                                            <h6 class="text-muted font-semibold">Accounting</h6>
                                            {{-- <h6 class="font-extrabold mb-0">80.000</h6> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

            </div>
    </section>
@yield('contents')


<footer>
    <div class="footer clearfix mb-0 text-muted">
        <div class="float-start">
            <p>2021 &copy; Makfuels</p>
        </div>
        <div class="float-end">
            <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a href="https://makfuels.com">Makfuels</a></p>
        </div>
    </div>
</footer>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
@yield('script')
<script src="{{ asset('assets/js/mazer.js') }}"></script>
</body>

</html>
