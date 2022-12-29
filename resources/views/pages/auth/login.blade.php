<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="NobleUI">
    <meta name="keywords"
        content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <title>Login</title>


    <link rel="preconnect" href="{{ url('https://fonts.googleapis.com') }}">
    <link rel="preconnect" href="{{ url('https://fonts.gstatic.com') }}" crossorigin>
    <link href="{{ url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/vendors/core/core.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/demo1/style.css') }}">

    <link rel="shortcut icon" href="{{ asset('assets/dashboard/images/favicon.png') }}" />
</head>

<body>
    <div class="main-wrapper">
        <div class="page-wrapper full-page">
            <div class="page-content d-flex align-items-center justify-content-center">

                <div class="row w-100 mx-0 auth-page">
                    <div class="col-md-8 col-xl-6 mx-auto">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-4 pe-md-0">
                                    <div class="auth-side-wrapper">

                                    </div>
                                </div>
                                <div class="col-md-8 ps-md-0">
                                    <div class="auth-form-wrapper px-4 py-5">
                                        <a href="{{ route('login') }}" class="noble-ui-logo d-block mb-2">POS<span>Laundry</span></a>
                                        <h5 class="text-muted fw-normal mb-4">Welcome back! Log in to your account.</h5>

                                        @forelse ($errors->all() as $message)
                                            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                <strong>{{ $message }}</strong>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        @empty

                                        @endforelse

                                        <form action="{{ route('login') }}" class="forms-sample" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('POST')
                                            <div class="mb-3">
                                                <label for="userEmail" class="form-label">Email address</label>
                                                <input type="email" name="email" class="form-control" id="userEmail"
                                                    placeholder="Email">
                                            </div>
                                            <div class="mb-3">
                                                <label for="userPassword" class="form-label">Password</label>
                                                <input type="password" name="password" class="form-control" id="userPassword"
                                                    autocomplete="current-password" placeholder="Password">
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn-success btn-sm fw-bold">Login <i class="fa-light fa-arrow-right"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script src="{{ asset('assets/vendors/core/core.js') }}"></script>


    <script src="{{ asset('assets/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/template.js') }}"></script>


</body>

</html>
