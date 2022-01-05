@extends('user.template')
@section('content-core')
<div class="container marketing p-5 pt-0">

    <!-- Page Heading -->
    <ol class="breadcrumb">
        {{-- <li class="breadcrumb-item"><a href="#">Keranj</a></li>
        <li class="breadcrumb-item"><a href="#">Arabika</a></li> --}}
        <li class="breadcrumb-item active" aria-current="page">Keranjang Belanja</li>
    </ol>
    <form action="/checkout" method="POST">
        {{ csrf_field() }}
        <div class="row">
            {{-- isi side kiri --}}
            <div class="col-md-7 pl-4">
                <h4><strong>Keranjang Belanja</strong></h4>
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
                    <div class="col-md-1">
                        <div class="form-group form-check">
                            <input name="id_cart[{{ $loop->index }}]" value="{{ $cart->id_cart }}" type="checkbox" id="checkCart{{ $loop->index }}" data-harga={{ $cart->produk->harga_produk }} data-id={{ $loop->index }} class="form-check-input cb-cart" @if($cart->produk->stok==0) disabled @endif>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <strong>{{ $cart->produk->nama_produk }}</strong><br>
                        <img src="{{ url(Storage::url($cart->produk->gambar_produk->first()->gambar_produk)) }}"
                            class="img-thumbnail rounded mt-3 mb-3" alt="...">
                        
                    </div>
                    <div class="col-md-5">
                        <div class="row mt-5 mb-3">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                    <button type="button" class="btn btn-success btn-number btn-sm" data-type="minus" data-field="cart1[{{ $loop->index }}]">
                                        <span class="fa fa-minus"></span>
                                        </button>
                                        </span>
                                        <input type="text" name="cart1[{{ $loop->index }}]" class="form-control form-control-sm input-number cartQty{{ $loop->index }}" value="{{ $cart->qty_cart }}" min="1" max="{{ $cart->produk->stok }}">
                                        <span class="input-group-btn">
                                    <button type="button" class="btn btn-success btn-number btn-sm" data-type="plus" data-field="cart1[{{ $loop->index }}]">
                                        <span class="fa fa-plus"></span>
                                        </button>
                                        </span>
                                </div><br>
                                <strong class="text-primary">Rp. {{ $cart->produk->harga_produk }},-</strong><br><br>
                                <strong>Stok : {{ $cart->produk->stok }}</strong>
                            </div>
                            <div class="col-md-6">
                                <a href="/cart/delete/{{ $cart->id_cart }}" class="btn btn-danger btn-sm delete-item" type="button"><i class="fa fa-trash"></i></a>
                            </div>
                        </div>
                        
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
                                    Total Harga : (<span id="totalCart">0</span> Barang)
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div style="font-size: 1rem;" class="text-secondary">
                                    <strong>Rp. <span class="subTotalCart" id="subTot">0</span>,-</strong>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-4">
                            <div class="col-md-7 pl-3">
                                <div style="font-size: 1rem;">
                                    Subtotal :
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div style="font-size: 1rem;">
                                    <strong>Rp. <span class="subTotalCart">0</span>,-</strong>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                {{-- <a href="/cart" class="btn btn-success w-100 font-weight-bold">Checkout</a> --}}
                                <input type="submit" value="Checkout" class="btn btn-success w-100 font-weight-bold" id="submitCheckout" disabled>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
                
            </div>
        </div>
    </form>
    
    <hr>
</div><!-- /.container -->

@endsection
