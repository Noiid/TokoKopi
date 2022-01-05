@extends('user.template')
@section('content-core')
<div class="container-fluid marketing p-5 pt-0">

    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Produk</li>
    </ol>

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
        
        {{-- <div class="col-md-6">
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-2 text-primary">Converse</strong>
                    <h3 class="mb-0">
                        <a class="text-dark" href="detail.php?id_post=10">Cara Membedakan Converse One Star Asli dan
                            Palsu</a>
                    </h3>
                    <div class="mb-1 text-muted">2018-07-06 11:09:08</div>
                    <div class="mb-1 text-muted">by <a href="detailUser.php?user_post=12">admin</a> </div>
                    <p class="card-text mb-auto">Dari sekian banyak merek sneaker yang ada di dunia, Converse jadi salah
                        satu merek yang memiliki cuk...</p>
                    <a href="detail.php?id_post=10">Read more..</a>
                </div>
                <img class="card-img-right flex-auto d-none d-lg-block img"
                    src="admin/images/upload/Jangan Tertipu, Ini 4 Cara Membedakan Converse One Star Asli dan Palsu.jpg"
                    alt="Card image cap" height="200px" width="auto">
            </div>
        </div> --}}
    </div>

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->



</div><!-- /.container -->
@endsection
