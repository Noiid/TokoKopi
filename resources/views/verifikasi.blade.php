<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verifikasi Email CV. Kopi Rakjat</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="{{ asset('css/login.css') }}" rel="stylesheet" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css"
            href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css') }}">

</head>

<body>
    @include('sweet::alert')
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first mt-3 mb-3">
                <img src="{{ asset('assets/img/kopi2.jpg') }}" id="icon" alt="User Icon" /><br><br>
                <h5><strong>VERIFIKASI EMAIL</strong></h5>
            </div>

            <!-- Login Form -->
            <form method="POST" action="/postverifikasi">
                {{ csrf_field() }}
                <input type="text" id="login" class="fadeIn second" name="email" placeholder="Email" required>
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password" required>
                <input type="submit" class="fadeIn fourth" value="Verifikasi">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                {{-- <a class="underlineHover" href="#">Lupa password?</a> --}}

                <a class="underlineHover" href="/login">Halaman Login</a><br>

                <a class="underlineHover mt-3" href="/">Ke Homepage Kopi Rakjat...</a>
            </div>

        </div>
    </div>
    <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js') }}"></script>
    <script>
        @if(session('success'))
        swal("Berhasil!", "{{ session('success') }}", "success");
        @endif

        @if(session('error'))
        swal("Gagal!", "{{ session('error') }}", "error");
        @endif
    </script>
</body>

</html>
