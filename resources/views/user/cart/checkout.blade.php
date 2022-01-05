@extends('user.template')
@section('content-core')
<div class="container marketing p-5 pt-0">

    <!-- Page Heading -->
    <ol class="breadcrumb">
        {{-- <li class="breadcrumb-item"><a href="#">Keranj</a></li>
        <li class="breadcrumb-item"><a href="#">Arabika</a></li> --}}
        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
    </ol>
    <form action="/cek_pengiriman" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ auth()->user()->id }}">
        <div class="row">
        
            {{-- isi side kiri --}}
            <div class="col-md-7 pl-4">
                <h4><strong>Alamat Pengiriman</strong></h4>
                <div class="form-group">
                    <label for="">Isi Alamat Pengiriman : </label>
                    <textarea class="form-control" name="alamat_pengiriman" id="alamatPengiriman" rows="3" placeholder="Isikan alamat lengkap beserta kecamatan dan keluruhan" required></textarea>
                </div>
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Riwayat Alamat Pengiriman (Klik)
                </button>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body mt-2">
                        Surabaya, Gubeng.
                        <button class="btn btn-sm btn-success mt-2" onclick="setAlamat('Surabaya, Gubeng.')" type="button"><i class="fa fa-arrow-right"></i> Gunakan</button>
                    </div>
                    <div class="card card-body mt-2">
                        Malang, Sukoharjo.
                        <button class="btn btn-sm btn-success mt-2" onclick="setAlamat('Malang, Sukoharjo.')" type="button"><i class="fa fa-arrow-right"></i> Gunakan</button>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-md-1">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        </div>
                    </div>
                    <div class="col-md-11">Pilih Semua</div>
                </div> --}}
                @foreach ($carts as $cart)
                <div class="row mt-3">
                    <div class="col-md-4">
                        <input type="hidden" name="id_produk[]" value="{{ $cart->produk->id_produk }}">
                        <input type="hidden" name="harga_produk[]" value="{{ $cart->produk->harga_produk }}">
                        <input type="hidden" name="qty_cart[]" value="{{ $cart->qty_cart }}">
                        <strong>{{ $loop->index+1 }}. {{ $cart->produk->nama_produk }}</strong><br>
                        <img src="{{ url(Storage::url($cart->produk->gambar_produk->first()->gambar_produk)) }}"
                            class="img-thumbnail rounded mt-3 mb-3" alt="...">
                        
                    </div>
                    <div class="col-md-5">
                        <span class="text-muted">({{ $cart->qty_cart }} barang)</span><br>
                        <strong class="text-primary">Rp. {{ $cart->produk->harga_produk }},-</strong><br><br>
                        
                    </div>
                </div>
                @endforeach
            </div>
    
            {{-- isi side kanan --}}
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fa fa-shopping-cart"></i> <strong>Ringkasan Belanja</strong>
                        </h5><br>
                        <div class="row">
                            <div class="col-md-7 pl-3">
                                <div style="font-size: 1rem;" class="text-secondary">
                                    Total Harga : (<span id="">{{ $jum_produk }}</span> Barang)
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div style="font-size: 1rem;" class="text-secondary">
                                    <strong>Rp. <span class="" id="">{{ $subtotal }}</span>,-</strong>
                                    <input type="hidden" name="subtotal" value="{{ $subtotal }}">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-4">
                            <div class="col-md-7 pl-3">
                                <div style="font-size: 1rem;">
                                    Biaya Pengiriman :
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div style="font-size: 1rem;">
                                    <strong>Rp. <span class="">-</span></strong>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-7 pl-3">
                                <div style="font-size: 1rem;">
                                    Subtotal :
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div style="font-size: 1rem;">
                                    <strong>Rp. <span class="">{{ $subtotal }}</span></strong>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-success w-100 font-weight-bold" value="Cek Biaya Pengiriman">
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
                
            </div>
        </div>
    </form>
    
    <hr>
</div><!-- /.container -->

<script>
    function setAlamat(alamat) {
        $('#alamatPengiriman').val(alamat);
    }
</script>
@endsection
