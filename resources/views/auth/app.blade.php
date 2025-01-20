<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<style>
    .background {
        background: linear-gradient(45deg, #212121, #9b111e);
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .container {
        width: 100%;
        max-width: 1000px;
    }

    .content {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .register-box {
        background-color: rgba(0, 0, 0, 0.8);
        border-radius: 10px;
        padding: 40px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .register-box:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
    }

    .text-white {
        color: #fff;
    }

    .text-center {
        text-align: center;
    }

    .form-floating input {
        border-radius: 8px;
        padding: 12px;
        margin-top: 15px;
        border: 1px solid #444;
        background-color: #333;
        color: #fff;
    }

    .form-floating label {
        color: #bbb;
    }

    .text-red {
        color: #9b111e;
        text-decoration: none;
    }

    .text-red:hover {
        text-decoration: underline;
    }

    .btn-light {
        background-color: #9b111e;
        color: #fff;
        border: none;
        border-radius: 8px;
        padding: 12px;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    .btn-light:hover {
        background-color: #d32f2f;
    }

    .btn-light.wow {
        animation-duration: 1s;
    }

    .invalid-feedback {
        color: #f44336;
        font-size: 0.875rem;
    }

    @media (max-width: 768px) {
        .col-lg-6 {
            max-width: 100%;
        }

        .register-box {
            padding: 30px;
        }
    }

    .background {
        background: linear-gradient(45deg, #212121, #9b111e);
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .container {
        width: 100%;
        max-width: 1000px;
    }

    .content {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .login-box {
        background-color: rgba(0, 0, 0, 0.8);
        border-radius: 10px;
        padding: 40px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .login-box:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
    }

    .text-white {
        color: #fff;
    }

    .text-center {
        text-align: center;
    }

    .form-floating input {
        border-radius: 8px;
        padding: 12px;
        margin-top: 15px;
        border: 1px solid #444;
        background-color: #333;
        color: #fff;
    }

    .form-floating label {
        color: #bbb;
    }

    .text-red {
        color: #9b111e;
        text-decoration: none;
    }

    .text-red:hover {
        text-decoration: underline;
    }

    .btn-light {
        background-color: #9b111e;
        color: #fff;
        border: none;
        border-radius: 8px;
        padding: 12px;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    .btn-light:hover {
        background-color: #d32f2f;
    }

    .btn-light.wow {
        animation-duration: 1s;
    }

    @media (max-width: 768px) {
        .col-lg-6 {
            max-width: 100%;
        }

        .login-box {
            padding: 30px;
        }
    }

    .toast-error {
        background-color: #F44336;
        /* Red color for error */
        color: white;
        font-size: 16px;
    }

    .toast-success {
        background-color: #4CAF50;
        /* Green color for success */
        color: white;
        font-size: 16px;
    }
</style>

<body>

    @yield('content')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/wow.js/1.1.2/wow.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @yield('scripts')
    <script>
        // new WOW().init();

        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "500",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        @if (session('success'))
            toastr.success('{{ session('success') }}');
        @endif

        @if (session('error'))
            toastr.error('{{ session('error') }}');
        @endif

        @if (session('info'))
            toastr.info('{{ session('info') }}');
        @endif

        @if (session('warning'))
            toastr.warning('{{ session('warning') }}');
        @endif
    </script>


</body>

</html>
