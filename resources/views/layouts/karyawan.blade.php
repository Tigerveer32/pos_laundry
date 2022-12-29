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

    <title>@yield('title')</title>

    @stack('before-style')

    @include('includes.styles')

    @stack('after-style')

    <link rel="shortcut icon" href="../assets/images/favicon.png" />

</head>

<body class="sidebar-dark">
    <div class="main-wrapper">

        <x-SidebarKaryawan></x-SidebarKaryawan>

        <div class="page-wrapper">

            <x-TopbarDashboard></x-TopbarDashboard>

            <div class="page-content">

                @include('sweetalert::alert')
                @yield('content')

            </div>

            <x-FooterDashboard></x-FooterDashboard>

        </div>
    </div>

    @stack('before-script')

    @include('includes.scripts')

    @stack('after-script')

</body>

</html>
