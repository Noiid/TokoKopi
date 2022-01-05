@extends('user.template')
@section('content-core')
<div class="container-fluid marketing p-5 pt-0">

    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Artikel</li>
    </ol>

    <div class="row mb-2">
        @foreach($artikel as $art)
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 box-shadow">
                <div class="card-body d-flex flex-column align-items-start">
                    <h3 class="mb-2">
                        <a class="text-dark" href="detail.php?id_post=12">{{ $art->judul_artikel }}</a>
                    </h3>
                    <div class="mb-1 text-muted">{{ $art->created_at }}</div>
                    <p class="card-text mb-auto">{{ \Illuminate\Support\Str::limit(strip_tags($art->deskripsi_artikel), 100, $end='...') }}</p>
                    <a href="/artikel/detail_artikel/{{ $art->id_artikel }}">Baca lebih lanjut...</a>
                </div>
                <img class="card-img-right flex-auto d-none d-md-block img" src="{{ url(Storage::url($art->gambar_artikel)) }}" alt="Card image cap" height="200px" width="auto">
            </div>
        </div>
        @endforeach
    </div>

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->



</div><!-- /.container -->
@endsection
