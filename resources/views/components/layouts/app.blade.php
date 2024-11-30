<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/adminlte.min.css') }}">
    <script src='{{ asset('/js/fullcalender.global.min.js') }}'></script>
    <script src="{{ asset('/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('/js/adminlte.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('/plugins/moment/moment.min.js') }}"></script>
    <style>
        #calendar {
            max-width: 1100px;
            margin: 0 auto;
        }

        .fc-event-time {
            display: none;
        }
    </style>
</head>


<body class="hold-transition {{ !Auth::check() ? 'login-page' : 'sidebar-mini' }}" style="height: 100vh !important;">
    <x-alert />
    @if (!Auth::check())
        {{ $slot }}
    @endif
    @if (Auth::check())
        <div class="wrapper">
            <x-nav-menu />
            <x-sidebar />
            <div class="content-wrapper">
                {{ $slot }}
            </div>

            <footer class="main-footer">
                <div class="float-right d-none d-sm-block">
                    <b>Version</b> 1.0.0
                </div>
                <strong>&copy; {{ env('APP_NAME') }}</strong>
            </footer>
        </div>
    @endif
    <!-- Bootstrap 4 -->
    <script src="{{ asset('/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        $(document).ready(() => {
            $("button.has-loading").click(function() {
                Swal.fire({
                    title: 'Mohon Tunggu',
                    showConfirmButton: false,
                    html: `
                    <div class="p-4">
                        <div class="spinner-border" role="status"></div>
                    </div>
                    `,
                    allowOutsideClick: false
                })
            });
        });
    </script>
</body>

</html>
