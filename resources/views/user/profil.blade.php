@extends('user.template')
@section('content-core')
<div class="container-fluid marketing p-5 pt-0">
    @if (count($errors) > 0)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
     @endif
     
    <div class="row">
        <div class="col-md-7 blog-main text-right">
            <dl>
                <dt>
                    <i class="fa fa-user fa-fw"></i> Nama Lengkap
                </dt>
                <dd>
                    {{ $user->name }} </dd><br>
                <dt>
                    <i class="fa fa-envelope fa-fw"></i> Email
                </dt>
                <dd>
                    {{ $user->email }} </dd><br>
                <dt>
                    <i class="fa fa-phone fa-fw"></i> No. Telp
                </dt>
                <dd>
                    {{ $user->telp_user }} </dd>
                <dd>
                    <a id="modal-990160" href="#modal-container-99017017" role="button" data-toggle="modal">Edit</a>
                    <div class="modal fade text-left" id="modal-container-99017017" role="dialog"
                        aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel">
                                        Edit Data User
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="/user/edit">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <input type="text" class="form-control" name="name" value="{{ $user->name }}" />
                                            <input type="hidden" class="form-control" name="id" value="{{ $user->id }}" />
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email"
                                                value="{{ $user->email }}" />
                                        </div>
                                        <div class="form-group">
                                            <label>No. Telp</label>
                                            <input type="text" class="form-control" name="telp_user" value="{{ $user->telp_user }}" />
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="form-control btn btn-primary" />
                                        </div>

                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                        Close
                                    </button>
                                </div>
                            </div>

                        </div>

                    </div>
                </dd>
            </dl>
        </div><!-- /.blog-main -->
        <div class="col-md-1">
            <div class="vl"></div>
        </div>
        <aside class="col-md-4 blog-sidebar">
            <div class="p-3 mb-3 bg-light rounded">
                <div class="text-center">
                    <img src="{{ asset('assets/img/male-user.png') }}" class="img img-responsive" height="200px" width="auto">
                </div><br>


                <p class="mb-0 text-center"><em>{{ $user->name }}</em></p>
            </div>


        </aside><!-- /.blog-sidebar -->

    </div><!-- /.row -->

    <hr>

    <div class="row mb-2">
        <div class="col-md-12">
            <h2 class="text-center">Riwayat Pembelian</h2><br>
            @if($riwayat_transaksi->isNotEmpty())
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
                        @foreach ($riwayat_transaksi as $tr)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $tr->tgl_transaksi }}</td>
                                <td>{{ count($tr->transaksi_produk) }} jenis produk</td>
                                <td>{{ $tr->alamat_pengiriman }}</td>
                                <td>{{ $tr->total_bayar }} @if($tr->biaya_pengiriman==null) (Belum termasuk ongkir) @endif</td>
                                <td>{{ $tr->status_transaksi }}
                                    @if($tr->status_transaksi=='Menunggu Pembayaran')
                                    <br><a href="#cekPembayaran{{$tr->id_transaksi}}" class="btn btn-warning btn-sm mt-2" data-toggle="modal"
                                        data-target="#cekPembayaran{{$tr->id_transaks}}"><i class="fa fa-edit" aria-hidden="true">
                                        </i> <span class="font-weight-bold ml-1">Lakukan Pembayaran</span></a>
                                        
                                    @elseif($tr->status_transaksi=='Melakukan Pembayaran')
                                        @if($tr->pembayaran->isNotEmpty() && $tr->pembayaran->sortByDesc('id_pembayaran')->first()->status_pembayaran=='Tidak Valid')
                                        <br><a href="#cekPembayaran{{$tr->id_transaksi}}" class="btn btn-warning btn-sm mt-2" data-toggle="modal"
                                            data-target="#cekPembayaran{{$tr->id_transaks}}"><i class="fa fa-edit" aria-hidden="true">
                                            </i> <span class="font-weight-bold ml-1">Unggah Bukti Pembayaran Ulang</span></a>
                                        @else
                                        <br><strong><i>(Menunggu validasi dari admin)</i></strong>
                                        @endif   
                                    @elseif($tr->status_transaksi=='Telah Dikirim')
                                    <br><strong><i>{{ $tr->info_pengiriman }}</i></strong>   
                                    <br><a href="/transaksi/konfirmasi_selesai/{{ $tr->id_transaksi }}" class="btn btn-info btn-sm mt-2 confirmDone"><i class="fa fa-edit" aria-hidden="true"></i> Konfirmasi Barang telah diterima.</a>
                                    
                                    @elseif($tr->status_transaksi=='Selesai')
                                            @if(count($tr->transaksi_produk)!=count($tr->rating)))
                                            <br><a href="#konfirmasiDiterima{{$tr->id_transaksi}}" class="btn btn-success btn-sm mt-2" data-toggle="modal"
                                                data-target="#konfirmasiDiterima{{$tr->id_transaks}}"><i class="fa fa-star" aria-hidden="true">
                                                </i> <span class="font-weight-bold ml-1">Berikan Penilaian</span></a>
                                                <div class="modal fade" id="konfirmasiDiterima{{$tr->id_transaks}}" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Berikan Ulasan Penilaian</h5>
                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                @foreach ($tr->transaksi_produk as $pro)
                                                                    @if($pro->produk->rating->where('id_transaksi',$tr->id_transaksi)->first()==null)
                                                                        <form action="/rating/ulasan" method="POST" enctype="multipart/form-data">
                                                                            {{ csrf_field() }}
                                                                            <input type="hidden" name="id_transaksi" value="{{ $tr->id_transaksi }}">
                                                                            <input type="hidden" name="id_produk" value="{{ $pro->produk->id_produk }}">
                                                                            <div class="form-group rating">
                                                                                <span>{{ $loop->index+1 }}. {{ $pro->produk->nama_produk }}</span>
                                                                                <span class="text-muted"><i>({{ $pro->qty_transaksi }} barang)</i></span><br>
                                                                                <img src="{{ url(Storage::url($pro->produk->gambar_produk->first()->gambar_produk)) }}" class="rounded mt-3" height="100px" width="auto" style="margin: 0px auto;"><br><br>
            
                                                                                <input id="demo-1{{ $loop->index+1 }}" type="radio" name="demo" value="1" required> 
                                                                                <label for="demo-1{{ $loop->index+1 }}">1 star</label>
                                                                                <input id="demo-2{{ $loop->index+1 }}" type="radio" name="demo" value="2" required>
                                                                                <label for="demo-2{{ $loop->index+1 }}">2 stars</label>
                                                                                <input id="demo-3{{ $loop->index+1 }}" type="radio" name="demo" value="3" required>
                                                                                <label for="demo-3{{ $loop->index+1 }}">3 stars</label>
                                                                                <input id="demo-4{{ $loop->index+1 }}" type="radio" name="demo" value="4" required>
                                                                                <label for="demo-4{{ $loop->index+1 }}">4 stars</label>
                                                                                <input id="demo-5{{ $loop->index+1 }}" type="radio" name="demo" value="5" required>
                                                                                <label for="demo-5{{ $loop->index+1 }}">5 stars</label>
                                                                                
                                                                                <div class="stars">
                                                                                    <label for="demo-1{{ $loop->index+1 }}" aria-label="1 star" title="1 star"></label>
                                                                                    <label for="demo-2{{ $loop->index+1 }}" aria-label="2 stars" title="2 stars"></label>
                                                                                    <label for="demo-3{{ $loop->index+1 }}" aria-label="3 stars" title="3 stars"></label>
                                                                                    <label for="demo-4{{ $loop->index+1 }}" aria-label="4 stars" title="4 stars"></label>
                                                                                    <label for="demo-5{{ $loop->index+1 }}" aria-label="5 stars" title="5 stars"></label>   
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="">Komentar</label>
                                                                                <textarea name="isi_comment" class="form-control" rows="5" placeholder="Berikan komentar pada produk {{ $pro->produk->nama_produk }}"></textarea>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="">Sertakan gambar / foto</label>
                                                                                <div class="custom-file">
                                                                                    <input type="file" class="custom-file-input"
                                                                                        id="validatedCustomFile"
                                                                                        onchange="chkFile(this)"
                                                                                        name="file[]" multiple required>
                                                                                    <label class="custom-file-label" data-browse="Cari File" for="validatedCustomFile">Pilih
                                                                                        file... (bisa
                                                                                        lebih dari 1 file)</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <input type="submit" value="Submit" class="btn btn-primary">
                                                                            </div>
                                                                        </form>
                                                                    @endif
                                                                @endforeach
                                                                
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" type="button"
                                                                    data-dismiss="modal">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                    @endif
                                    <div class="modal fade" id="cekPembayaran{{$tr->id_transaks}}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Lakukan Pembayaran</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="">Panduan Melakukan Pembayaran</label>
                                                        <ol>
                                                            <li>Lakukan transfer ke ATM BCA a.n. Fulan bin Fulana 087767678897898</li>
                                                            <li>Masukkan jumlah transfer sesuai dengan nominal total bayar</li>
                                                            <li>Simpan bukti transfer berupa bukti scan atau screenshot (jika melalui M-Banking / Internet Banking)</li>
                                                            <li>Unggah bukti transfer pada form dibawah ini <i>(* file berekstensi jpg,jpeg,png,pdf)</i></li>
                                                        </ol>
                                                    </div>
                                                    <form action="/transaksi/upload_bukti" method="POST" enctype="multipart/form-data">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="id_transaksi" value="{{ $tr->id_transaksi }}">
                                                        <div class="form-group">
                                                            <label for="">File Bukti Pembayaran</label>
                                                            <input type="file" name="file" class="form-control" required>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <input type="submit" value="Simpan" class="btn btn-primary">
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
                                                
                                                @if($tr->status_transaksi=='Selesai')
                                                <div class="form-group">
                                                    <span><strong>Konfirmasi diterima pada : </strong> {{ $tr->updated_at }}</span>
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
                        <th>Tanggal</th>
                        <th>Qty</th>
                        <th>Alamat</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tfoot>
                </table>
            </div>
            @else
            Data kosong!
            @endif
        </div>
        
    </div>

    <hr>

    <br>
</div>
<hr>

<!-- /END THE FEATURETTES -->



</div><!-- /.container -->
<script>
    (function(){
        var rating = document.querySelector('.rating');
        var handle = document.getElementById('toggle-rating');
        handle.onchange = function(event) {
            rating.classList.toggle('rating', handle.checked);
        };
    }());
</script>
@endsection
