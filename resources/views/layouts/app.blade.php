<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="shortcut icon" href="{{ asset('assets/frontend/images/dolan-logo.svg') }}" type="image/x-icon">
    @include('includes.style')
    @stack('addonStyle')
</head>

<body>
    <x-navbar />
    {{ $slot }}

    @include('includes.script')
    @stack('addonScript')
</body>

</html>
