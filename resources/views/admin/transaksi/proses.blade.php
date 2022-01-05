@extends('admin.template')
@section('content-core')
<main>
    <div class="container-fluid">
        @if (count($errors) > 0)
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <h3 class="mt-4">Proses Transaksi</h3>
        
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Data Proses Transaksi
            </div>
            <div class="card-body">
                <div class="row">
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <th>No.</th>
                            <th>User</th>
                            <th>Tanggal</th>
                            <th>Qty</th>
                            <th>Alamat</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($transaksi as $tr)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $tr->user->name }}</td>
                                    <td>{{ $tr->tgl_transaksi }}</td>
                                    <td>{{ count($tr->transaksi_produk) }} jenis produk</td>
                                    <td>{{ $tr->alamat_pengiriman }}</td>
                                    <td>{{ $tr->total_bayar }} @if($tr->biaya_pengiriman==null) (Belum termasuk ongkir) @endif</td>
                                    <td>{{ $tr->status_transaksi }} 
                                        @if($tr->status_transaksi=='Cek Ongkos Kirim')
                                        <br><a href="#cekOngkir{{$tr->id_transaksi}}" class="btn btn-warning btn-sm mt-2" data-toggle="modal"
                                            data-target="#cekOngkir{{$tr->id_transaks}}"><i class="fa fa-edit" aria-hidden="true">
                                            </i> <span class="font-weight-bold ml-1">Konfirmasi Ongkos Kirim</span></a>
                                            <div class="modal fade" id="cekOngkir{{$tr->id_transaks}}" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Ongkos Kirim</h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="/transaksi/update_ongkir" method="POST">
                                                                <input type="hidden" name="id_transaksi" value="{{ $tr->id_transaksi }}">
                                                                {{ csrf_field() }}
                                                                <div class="form-group">
                                                                    <span class="font-weight-bold">Alamat Pengiriman : </span> <br>
                                                                    <span>{{ $tr->alamat_pengiriman }}</span>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Biaya Pengiriman</label>
                                                                    {{-- <input type="number" name="biaya_pengiriman" placeholder="" required> --}}
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Rp.</span>
                                                                        </div>
                                                                        <input type="number" class="form-control" placeholder="Masukkan besar biaya pengiriman" name="biaya_pengiriman" aria-label="Username" aria-describedby="basic-addon1" required>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="submit" value="Submit" class="btn btn-primary">
                                                                </div>
                                                            </form>                                           
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button"
                                                                data-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif($tr->status_transaksi=='Melakukan Pembayaran')
                                        <br><a href="#cekPembayaran{{$tr->id_transaksi}}" class="btn btn-warning btn-sm mt-2" data-toggle="modal"
                                            data-target="#cekPembayaran{{$tr->id_transaks}}"><i class="fa fa-edit" aria-hidden="true">
                                            </i> <span class="font-weight-bold ml-1">Konfirmasi Pembayaran</span></a>
                                            <div class="modal fade" id="cekPembayaran{{$tr->id_transaks}}" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pembayaran</h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @if($tr->pembayaran->isNotEmpty())
                                                                @if($tr->pembayaran->sortByDesc('id_pembayaran')->first()->status_pembayaran=='Tidak Valid')
                                                                <div class="alert alert-warning" role="alert">
                                                                    Menunggu pelanggan unggah bukti pembayaran ulang.
                                                                </div>
                                                                @elseif($tr->pembayaran->sortByDesc('id_pembayaran')->first()->status_pembayaran=='Valid')
                                                                <div class="alert alert-success" role="alert">
                                                                    Pembayaran telah valid.
                                                                </div>
                                                                @endif
                                                            @endif
                                                            <div class="table-responsive">
                                                                <table class="table table-bordered">
                                                                    <thead>
                                                                        <th>No.</th>
                                                                        <th>File Bukti Pembayaran</th>
                                                                        <th>Status</th>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach($tr->pembayaran as $bayar)
                                                                            <tr>
                                                                                <td>{{ $loop->index+1 }}</td>
                                                                                <td><a href="/pembayaran/download/{{ $bayar->id_pembayaran }}">{{ explode('/',$bayar->bukti_pembayaran)[1] }} <i>(Klik untuk download)</i></a></td>
                                                                                <td>{{ $bayar->status_pembayaran }}
                                                                                    @if($bayar->status_pembayaran=='Kirim')
                                                                                        (Silahkan validasi) <br>
                                                                                        <a href="/pembayaran/acc/{{ $bayar->id_pembayaran }}" class="btn btn-success validasi-item"><i class="fa fa-check" aria-hidden="true"></i></a>
                                                                                        <a href="/pembayaran/reject/{{ $bayar->id_pembayaran }}" class="btn btn-danger validasi-item"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                                                    @endif
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button"
                                                                data-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif($tr->status_transaksi=='Menunggu Dikirim')
                                        <br><a href="#konfirmasiPengiriman{{$tr->id_transaksi}}" class="btn btn-warning btn-sm mt-2" data-toggle="modal"
                                            data-target="#konfirmasiPengiriman{{$tr->id_transaks}}"><i class="fa fa-edit" aria-hidden="true">
                                            </i> <span class="font-weight-bold ml-1">Konfirmasi Pengiriman</span></a>
                                            <div class="modal fade" id="konfirmasiPengiriman{{$tr->id_transaks}}" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pembayaran</h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="/transaksi/update_pengiriman" method="POST">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="id_transaksi" value="{{ $tr->id_transaksi }}">
                                                                <div class="form-group">
                                                                    <label for="">Informasi Pengiriman <i>(Isikan nama ekspedisi pengiriman dan nomer resi nya.)</i></label>
                                                                    <textarea name="info_pengiriman" class="form-control" rows="5" required placeholder="Isikan informasi pengiriman"></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="submit" value="Submit" class="btn btn-primary">
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button"
                                                                data-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </td>
                                    {{-- <td><img src="{{ url(Storage::url($art->gambar_artikel)) }}" class="rounded" height="100px" width="auto"></td> --}}
                                    <td><a href="#editModal{{$tr->id_transaksi}}" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#editModal{{$tr->id_transaks}}"><i class="fa fa-eye" aria-hidden="true">
                                        </i> <span class="font-weight-bold ml-1">Detail</span></a> 
    
                                    </td>
    
                                    {{-- modal detail produk --}}
                                    <div class="modal fade" id="editModal{{$tr->id_transaks}}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail Transaksi</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <span class="font-weight-bold">Alamat Pengiriman : </span> <br>
                                                        <span>{{ $tr->alamat_pengiriman }}</span>
                                                    </div>
                                                    <div class="form-group">
                                                        <span class="font-weight-bold">Detail Produk : </span> <br>
                                                        @foreach ($tr->transaksi_produk as $produk)
                                                            <span>{{ $loop->index+1 }}. {{ $produk->produk->nama_produk }}</span>
                                                            <span class="text-muted"><i>({{ $produk->qty_transaksi }} barang)</i></span><br>
                                                            <span class="font-weight-bold">Rp. {{ $produk->produk->harga_produk }}</span><br>
                                                            <img src="{{ url(Storage::url($produk->produk->gambar_produk->first()->gambar_produk)) }}" class="rounded mt-3" height="100px" width="auto"><br><br>
                                                        @endforeach
                                                    </div>
                                                    <div class="form-group">
                                                        <span><strong>Biaya Pengiriman : </strong> Rp. {{ $tr->biaya_pengiriman??'-' }}</span>
                                                    </div>
                                                    <div class="form-group">
                                                        <span><strong>Total Bayar : </strong> Rp. {{ $tr->total_bayar }}</span>
                                                    </div>  
                                                    @if($tr->pembayaran->sortByDesc('id_pembayaran')->first()->status_pembayaran=='Valid')
                                                    <div class="form-group">
                                                        <span><strong>Informasi Pembayaran : </strong></span><br>
                                                        <ol>
                                                            @foreach($tr->pembayaran as $bayar)
                                                            <li><a href="/pembayaran/download/{{ $bayar->id_pembayaran }}">{{ explode('/',$bayar->bukti_pembayaran)[1] }} <i>(Klik untuk download)</i></a> ({{ $bayar->status_pembayaran }})
                                                                
                                                            </li>
                                                        @endforeach
                                                        </ol>
                                                    </div>       
                                                    @endif  
                                                    
                                                    @if($tr->info_pengiriman!=null)
                                                    <div class="form-group">
                                                        <span><strong>Info Pengiriman : </strong> {{ $tr->info_pengiriman }}</span>
                                                    </div>
                                                    @endif
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button"
                                                        data-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <th>No.</th>
                            <th>User</th>
                            <th>Tanggal</th>
                            <th>Qty</th>
                            <th>Alamat</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection