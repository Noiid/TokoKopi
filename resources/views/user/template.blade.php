<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>CV. Kopi Rakjat</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/carousel/">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />


    <!-- Custom styles for this template -->
    <link href="{{ asset('css/carousel.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/blog.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/rating.css') }}" rel="stylesheet" />

    <link href="{{ asset('https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" crossorigin="anonymous" />
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js') }}" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css"
        href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css') }}">

    <style>
        #image-gallery .modal-footer{
        display: block;
        }

        .thumb{
        margin-top: 15px;
        margin-bottom: 15px;
        }

        .vl{
            border-left: 2px solid #DFDFDF;
            height: 280px;
            position: absolute;
            left: 50%;
            margin-left: 0px;
            top:0;
            margin-top: 0px;
        }
    </style>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-md navbar-light fixed-top bg-white border-bottom">
            <a class="navbar-brand" href="/">CV. Kopi Rakjat</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <form class="form-inline mt-2 mt-md-0 ml-auto">
                    <input class="form-control mr-sm-2 col" type="text" placeholder="Cari Produk..." aria-label="Search" >
                    <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Cari">
                </form>
                <ul class="navbar-nav mr-5 ml-3">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Beranda <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/produk/list_produk">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/artikel/list_artikel">Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/cart">Cart</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#">Tentang Kami</a>
                    </li> --}}
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    @endguest                    
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <span class="dropdown-item font-weight-bold">Hai, {{ auth()->user()->name }}</span>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/profil">Profil</a>
                            <a class="dropdown-item" href="/logout">Logout</a>
                        </div>
                    </li>
                    @endauth
                </ul>
                
            </div>
        </nav>
    </header>

    <main role="main">
        <!-- Marketing messaging and featurettes
      ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->

        @include('sweet::alert')

        @yield('content-core')
        


        <!-- FOOTER -->
        <footer class="container">
            <p class="float-right"><a href="#">Kembali ke atas</a></p>
            <p>&copy; 2021 CV. Kopi Rakjat</p>
        </footer>
    </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')

    </script>
    <script src="{{ asset('https://code.jquery.com/jquery-3.5.1.slim.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('assets/demo/chart-bar-demo.js') }}"></script>
    <script src="{{ asset('https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/demo/datatables-demo.js') }}"></script>
    <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script>
        function chkFile(file) {
                var files = [];
                for (var i = 0; i < $(file)[0].files.length; i++) {
                    files.push($(file)[0].files[i].name);
                }
                $(file).next('.custom-file-label').html(files.join(', '));
            }
        @if(session('success'))
        swal("Berhasil!", "{{ session('success') }}", "success");
        @endif

        @if(session('error'))
        swal("Gagal!", "{{ session('error') }}", "error");
        @endif
    </script>
    <script src="{{ asset('js/gallery.js') }}"></script>
    <script src="{{ asset('js/counter.js') }}"></script>

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
</body>

</html>
