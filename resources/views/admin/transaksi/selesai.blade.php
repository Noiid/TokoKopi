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
        <h3 class="mt-4">Transaksi Selesai</h3>
        
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
                                    <td>{{ $tr->tgl_transaksi }}</td>
                                    <td>{{ count($tr->transaksi_produk) }} jenis produk</td>
                                    <td>{{ $tr->alamat_pengiriman }}</td>
                                    <td>{{ $tr->total_bayar }} @if($tr->biaya_pengiriman==null) (Belum termasuk ongkir) @endif</td>
                                    <td>{{ $tr->status_transaksi }}</td>
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
                                                            <img src="{{ url(Storage::url($produk->produk->gambar_produk->first()->gambar_produk)) }}" class="rounded mt-3" height="100px" width="auto"><br><br>
                                                        @endforeach
                                                    </div>                                            
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