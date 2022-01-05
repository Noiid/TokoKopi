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
        <h3 class="mt-4">Detail Produk</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Produk</li>
            <li class="breadcrumb-item">Detail</li>
            <li class="breadcrumb-item active">{{ $produk->nama_produk }}</li>
        </ol>
        
        <div class="card mb-4">
            
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Detail Produk 
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Accordion -->
                            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button"
                                aria-expanded="true" aria-controls="collapseCardExample">
                                <h6 class="m-0 font-weight-bold text-primary">Data Produk</h6>
                            </a>
                            <!-- Card Content - Collapse -->
                            <div class="collapse show" id="collapseCardExample">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <strong>Nama Produk : </strong> {{ $produk->nama_produk }} <br><br>
                                            <strong>Kategori : </strong> {{ $produk->kategori->nama_kategori }} <br><br>
                                            <strong>Harga : </strong> {{ $produk->harga_produk }} <br><br>
                                        </div>
                                        <div class="col-md-6">
                                            <strong>Berat : </strong> {{ $produk->berat }} gram <br><br>
                                            <strong>Kadaluarsa : </strong> {{ $produk->kadaluarsa }} <br><br>
                                            <strong>Stok : </strong> {{ $produk->stok }} <br><br>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <strong>Deskripsi : </strong>
                                            <p>{{ $produk->deskripsi_produk }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- Form Tambah Data  --}}
                <a href="#tambah_gambar_produk" class="btn btn-primary float-right mb-3" data-toggle="modal" data-target="#tambah_gambar_produk"><strong><i class="fa fa-plus" aria-hidden="true"></i> Tambah Gambar</strong></a>
                <div class="modal fade" id="tambah_gambar_produk" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Gambar Produk</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="/gambar_produk" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id_produk" value="{{ $produk->id_produk }}">
                                    <div class="form-group">
                                        <label for="">Gambar Produk <i>(Ekstensi file .jpeg, .jpg, .png)</i></label>
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
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($produk->gambar_produk as $gambar)
                                <tr>
                                    <td>{{ $loop->index+1 }}.</td>
                                    <td><img src="{{ url(Storage::url($gambar->gambar_produk)) }}" class="rounded" height="100px" width="auto"></td>
                                    <td>
                                        <a href="/gambar_produk/delete/{{$gambar->id_gambar_produk}}"
                                        class="btn btn-danger btn-sm delete-item">
                                        <i class="fa fa-trash" aria-hidden="true"></i><span
                                            class="font-weight-bold ml-1">Hapus</span></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <th>No.</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection