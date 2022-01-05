@extends('user.template')
@section('content-core')
<div class="container-fluid marketing p-5 pt-0">

    <!-- Page Heading -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Produk</a></li>
        <li class="breadcrumb-item"><a href="#">Arabika</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $produk->nama_produk }}</li>
    </ol>
    <div class="row">
        {{-- isi side kiri --}}
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <img src="{{ url(Storage::url($produk->gambar_produk->first()->gambar_produk)) }}"
                        class="img-thumbnail rounded mt-3" alt="...">
                </div>

            </div>
            <hr>
            {{-- isi foto detail --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        @foreach ($produk->gambar_produk->sortBy('id_gambar_produk') as $gambar)
                        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                            <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
                                data-image="{{ url(Storage::url($gambar->gambar_produk)) }}"
                                data-target="#image-gallery">
                                <img class="img-thumbnail"
                                    src="{{ url(Storage::url($gambar->gambar_produk)) }}"
                                    alt="Another alt text">
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>



                <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="image-gallery-title"></h4>
                                <button type="button" class="close" data-dismiss="modal"><span
                                        aria-hidden="true">×</span><span class="sr-only">Close</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <img id="image-gallery-image" class="img-responsive col-md-12" src="">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i
                                        class="fa fa-arrow-left"></i>
                                </button>

                                <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i
                                        class="fa fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- isi side tengah --}}
        <div class="col-md-4">
            <div class="mt-3">
                <h4>{{ $produk->nama_produk }}</h4>
            </div>
            <div class="mb-1 text-warning">
                <strong>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <span class="text-muted">{{ $besar_rating }} | Terjual {{ $jum_barang }}</span>
                </strong>
            </div>
            <div class="mt-2 mb-3">
                <h2>Rp. {{ $produk->harga_produk }},-</h2>
            </div>
            <div class="card bg-white border border-success">
                <h5 class="card-header text-success font-weight-bold">Detail</h5>

            </div>
            <div class="mt-2 mb-3 pl-2">
                <span>
                    Berat : <strong>{{ $produk->berat }} Gram</strong>
                </span><br>
                <span>
                    Kadaluarsa : <strong>{{ $produk->kadaluarsa }}</strong>
                </span><br>
                <span>
                    Deskripsi Produk :
                </span><br>
                <span class="text-muted">
                    <strong>{{ $produk->deskripsi_produk }}
                    </strong>
                </span>
            </div>
        </div>

        {{-- isi side kanan --}}
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <form action="/add-to-cart" method="POST">
                        {{ csrf_field() }}
                        @auth
                            
                        <input type="hidden" name="id" value="{{ auth()->user()->id }}">
                        @endauth
                        <input type="hidden" name="id_produk" value="{{ $produk->id_produk }}">
                        <h5 class="card-title">
                            <i class="fa fa-shopping-cart"></i> <strong>Keranjang Belanja</strong></h5><br>
                        <div class="row">
                            <div class="col-md-7 pl-3">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                    <button type="button" class="btn btn-success btn-number" disabled="disabled" data-type="minus" data-field="qty" data-harga={{ $produk->harga_produk }}>
                                        <span class="fa fa-minus"></span>
                                        </button>
                                        </span>
                                        <input type="text" name="qty" class="form-control input-number" value="1" min="1" max="{{ $produk->stok }}" harga="{{ $produk->harga_produk }}">
                                        <span class="input-group-btn">
                                    <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="qty" data-harga={{ $produk->harga_produk }}>
                                        <span class="fa fa-plus"></span>
                                        </button>
                                        </span>
                                </div>
                            </div>
                            <div class="col-md-5" style="font-size: 1.3rem;">
                                Stok : <strong>{{ $produk->stok }}</strong>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-7 pl-3">
                                <div style="font-size: 1.3rem;">
                                    Subtotal :
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div style="font-size: 1.3rem;">
                                    <span class="font-weight-bold subtotal-detail">Rp. {{ $produk->harga_produk }},-</span>    
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                @auth
                                    <input type="submit" value="Tambah ke Keranjang Belanja" class="btn btn-success w-100 font-weight-bold">
                                    {{-- <a href="/cart" class="btn btn-success w-100 font-weight-bold" data-id_users="{{ auth()->user()->id }}"
                                        data-id_produk="{{ $produk->id_produk }}" id="btnCart">Tambah ke Keranjang Belanja</a> --}}
                                @endauth
                                @guest
                                <button type="button" class="btn btn-success w-100 font-weight-bold" data-toggle="modal" data-target="#exampleModal">
                                    Tambah ke Keranjang Belanja
                                </button>
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Ke Keranjang Belanja</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        Anda harus Login terlebih dahulu!
                                        <a href="/login" class="btn btn-primary mt-3"><i class="fa fa-arrow-right" aria-hidden="true"></i> Menuju ke Halaman Login</a>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                @endguest
                            </div>
                        </div>
                    </form>
                    
                    
                </div>
            </div>
            
        </div>
    </div>
    <hr>
    <div class="row mb-5">
        <div class="col-md-12">
            <h5><strong>ULASAN ({{ count($produk->rating) }})</strong></h5>
            <div class="mt-3">
                <h4>{{ $produk->nama_produk }}</h4>
            </div>
            <div class="row">
                <div class="col-md-3 text-center">
                    <strong>
                        <span class="display-4">{{ $besar_rating }}</span>/ 5
                    </strong>
                    <div class="mb-1 text-warning">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </div>
                    <span class="text-muted font-weight-bold">({{ count($produk->rating) }}) Ulasan</span>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-2">
                            <i class="fa fa-star text-warning" aria-hidden="true"></i> <strong>5</strong>
                        </div>
                        <div class="col-md-8">
                            <div class="progress mt-2" style="height: 10px;">
                                <div class="progress-bar" role="progressbar" aria-valuenow="{{ count($rating5) }}" aria-valuemin="0"
                                    aria-valuemax="100" style="width: {{ count($rating5)/count($produk->rating)*100 }}%;"></div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <span class="text-muted">{{ count($rating5) }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <i class="fa fa-star text-warning" aria-hidden="true"></i> <strong>4</strong>
                        </div>
                        <div class="col-md-8">
                            <div class="progress mt-2" style="height: 10px;">
                                <div class="progress-bar" role="progressbar" aria-valuenow="{{ count($rating4) }}" aria-valuemin="0"
                                    aria-valuemax="100" style="width: {{ count($rating4)/count($produk->rating)*100 }}%;"></div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <span class="text-muted">{{ count($rating4) }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <i class="fa fa-star text-warning" aria-hidden="true"></i> <strong>3</strong>
                        </div>
                        <div class="col-md-8">
                            <div class="progress mt-2" style="height: 10px;">
                                <div class="progress-bar" role="progressbar" aria-valuenow="{{ count($rating3) }}" aria-valuemin="0"
                                    aria-valuemax="100" style="width: {{ count($rating3)/count($produk->rating)*100 }}%;"></div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <span class="text-muted">{{ count($rating3) }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <i class="fa fa-star text-warning" aria-hidden="true"></i> <strong>2</strong>
                        </div>
                        <div class="col-md-8">
                            <div class="progress mt-2" style="height: 10px;">
                                <div class="progress-bar" role="progressbar" aria-valuenow="{{ count($rating2) }}" aria-valuemin="0"
                                    aria-valuemax="100" style="width: {{ count($rating2)/count($produk->rating)*100 }}%;"></div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <span class="text-muted">{{ count($rating2) }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <i class="fa fa-star text-warning" aria-hidden="true"></i> <strong>1</strong>
                        </div>
                        <div class="col-md-8">
                            <div class="progress mt-2" style="height: 10px;">
                                <div class="progress-bar" role="progressbar" aria-valuenow="{{ count($rating1) }}" aria-valuemin="0"
                                    aria-valuemax="100" style="width: {{ count($rating1)/count($produk->rating)*100 }}%;"></div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <span class="text-muted">{{ count($rating1) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row mt-3">
        <div class="col-md-12">
            <h5><strong>KOMENTAR</strong></h5>
            @foreach ($produk->comment as $komentar)
            <div class="row mb-3">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <strong>
                                <h5>{{ $komentar->transaksi->user->name }}</h5>
                            </strong>
                            <div class="mb-2">
                                @for($i = 0; $i < $komentar->transaksi->rating->where('id_transaksi',$komentar->id_transaksi)->first()->besar_rating; $i++)
                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                @endfor

                                @for($i = 0; $i < (5-$komentar->transaksi->rating->where('id_transaksi',$komentar->id_transaksi)->first()->besar_rating); $i++)
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                @endfor

                                <span class="ml-2 text-muted">{{ $komentar->created_at->translatedFormat('l, d F Y H:i') }}</span>
                            </div>
                            <span class="font-italic font-weight-bold">
                                {{ $komentar->isi_comment }}
                            </span>
                            <div class="row">
                                @foreach ($komentar->gambar_comment as $gambar)
                                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                    <img class="img-thumbnail"
                                        src="{{ url(Storage::url($gambar->gambar_comment)) }}"
                                        alt="Another alt text">
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <hr>
</div><!-- /.container -->
@endsection
