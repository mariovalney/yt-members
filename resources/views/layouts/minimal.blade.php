<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <title>{{ config('app.name') }}</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

        <!-- Bootstrap 4.1.1 -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">

        <!-- Icons -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css" rel="stylesheet">

        @livewireStyles

        <link rel="stylesheet" type="text/css" href="{{ mix('css/vendor.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">
    </head>
    <body class="c-app flex-row align-items-center {{ $body_class ?? '' }}">
        <div class="container">
            <div class="row justify-content-center">
                @yield('content')
            </div>
        </div>

        <!-- jQuery 3.1.1 -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.bundle.min.js"></script>

        @livewireScripts

        <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
        @if(config('app.debug'))
            <script type="text/javascript" src="{{ mix('js/browserSync.js') }}"></script>
        @endif

        @stack('scripts')
    </body>
</html>
