@extends('admin.template')
@section('content-core')
<main>
    <div class="container-fluid">
        <h3 class="mt-4">Daftar Produk</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Produk</li>
            <li class="breadcrumb-item active">Daftar Produk</li>
        </ol>
        
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Daftar Produk
            </div>
            <div class="card-body">
                <div class="row">
                </div>
                
                {{-- Form Tambah Data  --}}
                <a href="#tambah_produk" class="btn btn-primary float-right mb-3" data-toggle="modal" data-target="#tambah_produk"><strong><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</strong></a>
                <div class="modal fade" id="tambah_produk" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Produk</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="/produk" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="">Kategori Produk</label>
                                        <select name="id_kategori" id="" class="custom-select" required>
                                            <option value="">-- Pilih Kategori --</option>
                                            @foreach ($kategori as $kat)
                                                <option value="{{ $kat->id_kategori }}">{{ $kat->nama_kategori }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nama Produk</label>
                                        <input type="text" name="nama_produk" class="form-control" placeholder="Isi Nama Produk" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Harga</label>
                                        <input type="number" name="harga_produk" class="form-control" placeholder="Isi Harga Produk" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="">Berat</label>
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control"
                                                name="berat" aria-describedby="beratProduk" min="0" required step=0.01>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="beratProduk">gram</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Kadaluarsa</label>
                                        <input type="date" name="kadaluarsa" class="form-control" placeholder="Isi Kadaluarsa" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Stok</label>
                                        <input type="number" name="stok" class="form-control" placeholder="Isi Stok" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Deskripsi Produk</label>
                                        <textarea name="deskripsi_produk" class="form-control" required placeholder="Isi Deskripsi" cols="10"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Simpan Data" class="btn btn-primary">
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


                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <th>No.</th>
                            <th>Kategori</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Berat (gram)</th>
                            <th>Kadaluarsa</th>
                            <th>Stok</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($produk as $pro)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $pro->kategori->nama_kategori }}</td>
                                    <td>{{ $pro->nama_produk }}</td>
                                    <td>{{ $pro->harga_produk }}</td>
                                    <td>{{ $pro->berat }}</td>
                                    <td>{{ $pro->kadaluarsa }}</td>
                                    <td>{{ $pro->stok }}</td>
                                    <td style="max-width: 200px;">{{ $pro->deskripsi_produk }}</td>
                                    <td><a href="#editModal{{$pro->id_produk}}" class="btn btn-warning btn-sm" data-toggle="modal"
                                        data-target="#editModal{{$pro->id_produk}}"><i class="fa fa-pen" aria-hidden="true">
                                        </i> <span class="font-weight-bold ml-1">Edit</span></a> 

                                        <a href="/produk/delete/{{$pro->id_produk}}"
                                        class="btn btn-danger btn-sm delete-item">
                                        <i class="fa fa-trash" aria-hidden="true"></i><span
                                            class="font-weight-bold ml-1">Hapus</span></a>

                                        <br><a href="/produk/detail/{{ $pro->id_produk }}" class="btn btn-info btn-sm mt-3"><i class="fa fa-camera-retro" aria-hidden="true">
                                        </i> <span class="font-weight-bold ml-1">Detail Produk</span></a>

                                    </td>

                                    {{-- modal ubah data user (kecuali password)  --}}
                                    <div class="modal fade" id="editModal{{$pro->id_produk}}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data Produk</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="/produk/edit" method="POST">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="id_produk" value="{{ $pro->id_produk }}">
                                                        <div class="form-group">
                                                            <label for="">Kategori Produk</label>
                                                            <select name="id_kategori" id="" class="custom-select" required>
                                                                <option value="">-- Pilih Kategori --</option>
                                                                @foreach ($kategori as $kat)
                                                                    <option value="{{ $kat->id_kategori }}" @if($pro->id_kategori==$kat->id_kategori) selected @endif>{{ $kat->nama_kategori }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Nama Produk</label>
                                                            <input type="text" name="nama_produk" class="form-control" placeholder="Isi Nama Produk" required value="{{ $pro->nama_produk }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Harga</label>
                                                            <input type="number" name="harga_produk" class="form-control" placeholder="Isi Harga Produk" required value="{{ $pro->harga_produk }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="">Berat</label>
                                                            <div class="input-group mb-3">
                                                                <input type="number" class="form-control"
                                                                    name="berat" aria-describedby="beratProduk" min="0" required value="{{ $pro->berat }}" step=0.01>
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="beratProduk">gram</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Kadaluarsa</label>
                                                            <input type="date" name="kadaluarsa" class="form-control" placeholder="Isi Kadaluarsa" required value="{{ $pro->kadaluarsa }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Stok</label>
                                                            <input type="number" name="stok" class="form-control" placeholder="Isi Stok" required value="{{ $pro->stok }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Deskripsi Produk</label>
                                                            <textarea name="deskripsi_produk" class="form-control" required placeholder="Isi Deskripsi" rows="5">{{ $pro->deskripsi_produk }}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="submit" value="Edit Data" class="btn btn-warning">
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
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <th>No.</th>
                            <th>Kategori</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Berat (gram)</th>
                            <th>Kadaluarsa</th>
                            <th>Stok</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection