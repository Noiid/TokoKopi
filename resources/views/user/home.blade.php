@extends('user.template')
@section('content-core')
<div class="container marketing mt-5">

    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
                <div class="col-md-6 px-0">
                    <h1 class="display-4 font-italic">{{ $artikel->judul_artikel }}</h1>
                    <p class="lead my-3">{!! \Illuminate\Support\Str::limit($artikel->deskripsi_artikel, 180, $end='...') !!}</p>
                    <p class="lead mb-0"><a href="/artikel/detail_artikel/{{ $artikel->id_artikel }}" class="text-white font-weight-bold">Baca lebih lanjut...</a>
                    </p>
                </div>
            </div>
        </div>

    </div>

    <div class="row mb-2">
        @foreach($produk as $pro)
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 box-shadow">
                <div class="card-body d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-2 text-primary">{{ $pro->kategori->nama_kategori }}</strong>
                    <h3 class="mb-0">
                        <a class="text-dark" href="/produk/detail_produk/{{ $pro->id_produk }}">{{ $pro->nama_produk }}</a>
                    </h3>
                    <img src="{{ url(Storage::url($pro->gambar_produk->first()->gambar_produk)) }}"
                        class="img rounded mt-3 mb-3" alt="..." height="250px" width="auto">
                    <div class="mb-1 text-primary font-weight-bold">Rp. {{ $pro->harga_produk }}</div>
                    <div class="mb-1 text-warning">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        @php
                            $besar_rating = 0;
                            $jum = 0;
                            $rating = 0;
                            $jum_barang = 0;
                            foreach ($pro->rating as $rating){
                                $besar_rating += $rating->besar_rating;
                                $jum++;
                            }
                            foreach ($pro->transaksi_produk as $tr) {
                                $jum_barang += $tr->qty_transaksi;
                            }
                            if ($jum!=0) {
                                $rating = $besar_rating/$jum;
                            }
                        @endphp
                        <span class="text-muted">{{ $rating }} | Terjual {{ $jum_barang }}</span>
                    </div>
                    <a href="/produk/detail_produk/{{ $pro->id_produk }}" class="btn btn-primary btn-sm mt-2 ml-auto">Lihat Detail Produk</a>
                    
                </div>
                {{-- <img class="card-img-right flex-auto d-none d-lg-block" src="{{ asset('assets/img/kopi.jpg') }}"
                alt="Card image cap" height="auto" width="100px"> --}}
            </div>
        </div>
        @endforeach
    </div>

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->



</div><!-- /.container -->
@endsection
