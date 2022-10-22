<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin || {{ $title }}</title>

    <link rel="stylesheet" href="{{ asset('assets/backend/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/main/app-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/pages/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/pages/datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/shared/iconly.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/pages/lightbox.css') }}">

    @stack('styles')

    <meta name="description" content="Dolan adalah tempat pembelian tiket pariwisata untuk banyumas">

    <link rel="icon" href="{{ asset('assets/frontend/images/dolan-logo.svg') }}" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="main">

            <x-admin.sidebar active="{{ $active }}" />
            <x-admin.header title="{{ $title }}" />

            <x-admin.alert />

            {{ $slot }}

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{ asset('assets/backend/js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/app.js') }}"></script>
    <script src="{{ asset('assets/backend/js/pages/datatables.js') }}"></script>
    <script src="{{ asset('assets/backend/js/script.js') }}"></script>
    <script src="{{ asset('assets/backend/js/pages/lightbox-plus-jquery.min.js') }}"></script>
    @stack('scripts')
</body>

</html>
