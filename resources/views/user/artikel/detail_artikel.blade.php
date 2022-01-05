@extends('user.template')
@section('content-core')
<div class="container-fluid marketing p-5 pt-0">

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/artikel/list_artikel">Artikel</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $artikel->judul_artikel }}</li>
    </ol>

    <div class="row p-3">
        <div class="col-md-8 blog-main">

            <div class="blog-post">
                <h2 class="blog-post-title">{{ $artikel->judul_artikel }}</h2>
                <p class="blog-post-meta">{{ $artikel->created_at }}</p>
                <hr>
                <img src="{{ url(Storage::url($artikel->gambar_artikel)) }}"
                    class="img img-responsive text-center" height="auto" width="800px" id="img_02">
                <div class="mt-3">
                    {!! $artikel->deskripsi_artikel !!}
                </div>
            </div><!-- /.blog-post -->

        </div><!-- /.blog-main -->

        <aside class="col-md-4 blog-sidebar">
            <div class="p-3 mb-3 bg-light rounded">
                <h4 class="font-italic"><strong>Tentang Artikel</strong></h4>
                <p class="mb-0">Artikel-artikel ini dibuat oleh admin dan diambil dari pengalaman pribadi serta informasi yang diberikan tak luput dari observasi admin. Happy reading guys!</p>
            </div>


            <div class="card">

                <h5 class="card-header">
                    Artikel Terbaru
                </h5>
                @foreach($artikels as $art)
                <div class="card-footer">
                    <img class="img rounded float-left mr-3" src="{{ url(Storage::url($art->gambar_artikel)) }}" alt="Card image cap" height="50px" width="auto">
                    <a href="/artikel/detail_artikel/{{ $art->id_artikel }}">
                        <p class="text-muted">
                            {{ $art->judul_artikel }} </p>
                    </a>
                </div>
                @endforeach
            </div>
        </aside><!-- /.blog-sidebar -->

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->



    </div><!-- /.container -->
    @endsection
