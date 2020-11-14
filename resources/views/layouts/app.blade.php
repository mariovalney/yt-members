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
    <body class="c-app {{ $body_class ?? '' }}">
        <div class="c-wrapper">
            <header class="c-header c-header-light c-header-fixed">
                <a class="c-header-brand c-header-brand-sm-up-center" href="{{ route('index') }}">
                    {{ config('app.name') }}
                </a>
                @if (! empty($user))
                    <ul class="c-header-nav mfs-auto">
                        <li class="c-header-nav-item dropdown">
                            <a class="c-header-nav-link mr-2" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                <div class="c-avatar">
                                    <img class="c-avatar-img" src="{{ $user->avatar }}">
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right pt-0 pb-0">
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}">
                                    <i class="c-icon icon-logout mfe-2"></i>
                                    <span>@lang('auth.google.logout')</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                @endif
            </header>

            <div class="c-body">
                <main class="main">
                    @yield('content')
                </main>
            </div>

            <footer class="c-footer">
                <div>
                    {{ config('app.name') }} &copy; {{ date('Y') }}<span class="d-none d-sm-inline d-md-inline d-lg-inline"> - Todos os direitos reservados</span></span>
                </div>
                <div class="ml-auto">
                    <span class="d-none d-sm-flex d-md-flex d-lg-flex">Versão @version('full')</span>
                    <span class="d-flex d-sm-none d-md-none d-lg-none">{{'v'}}@version('compact')</span>
                </div>
            </footer>
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
