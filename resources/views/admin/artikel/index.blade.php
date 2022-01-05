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
        <h3 class="mt-4">Artikel</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Artikel</li>
        </ol>
        
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Data Artikel
            </div>
            <div class="card-body">
                <div class="row">
                </div>
                
                {{-- Form Tambah Data  --}}
                <a href="#tambah_artikel" class="btn btn-primary float-right mb-3" data-toggle="modal" data-target="#tambah_artikel"><strong><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</strong></a>
                <div class="modal fade" id="tambah_artikel" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Artikel</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="/artikel" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{ auth()->user()->id }}">
                                    <div class="form-group">
                                        <label for="">Judul Artikel</label>
                                        <input type="text" name="judul_artikel" class="form-control" placeholder="Isi Judul Artikel" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Deskripsi Artikel</label>
                                        <textarea name="deskripsi_artikel" class="form-control ckeditor" rows="10" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Gambar Artikel <i>(Ekstensi file .jpeg, .jpg, .png)</i></label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input"
                                                id="validatedCustomFile"
                                                onchange="chkFile(this)"
                                                name="file" required>
                                            <label class="custom-file-label" data-browse="Cari File" for="validatedCustomFile">Pilih
                                                file...</label>
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
                            <th>Judul</th>
                            <th>Isi Artikel</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($artikel as $art)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $art->judul_artikel }}</td>
                                    <td>{!! $art->deskripsi_artikel !!}</td>
                                    <td><img src="{{ url(Storage::url($art->gambar_artikel)) }}" class="rounded" height="100px" width="auto"></td>
                                    <td><a href="#editModal{{$art->id_artikel}}" class="btn btn-warning btn-sm" data-toggle="modal"
                                        data-target="#editModal{{$art->id_artikel}}"><i class="fa fa-pen" aria-hidden="true">
                                        </i> <span class="font-weight-bold ml-1">Edit</span></a> 

                                        <a href="/artikel/delete/{{$art->id_artikel}}"
                                        class="btn btn-danger btn-sm delete-item">
                                        <i class="fa fa-trash" aria-hidden="true"></i><span
                                            class="font-weight-bold ml-1">Hapus</span></a>

                                    </td>

                                    {{-- modal ubah data user (kecuali password)  --}}
                                    <div class="modal fade" id="editModal{{$art->id_artikel}}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data Artikel</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="/artikel/edit" method="POST" enctype="multipart/form-data">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="id_artikel" value="{{ $art->id_artikel }}">
                                                        <div class="form-group">
                                                            <label for="">Judul Artikel</label>
                                                            <input type="text" name="judul_artikel" class="form-control" placeholder="Isi Judul Artikel" required value="{{ $art->judul_artikel }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Deskripsi Artikel</label>
                                                            <textarea name="deskripsi_artikel" class="form-control ckeditor" rows="10" required>{{ $art->deskripsi_artikel }}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Gambar Artikel <i>(Ekstensi file .jpeg, .jpg, .png)</i></label><br>
                                                            <span><i>* jika tidak ingin mengubah gambar maka tidak butuh menyertakan gambar baru</i></span>
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input"
                                                                    id="validatedCustomFile"
                                                                    onchange="chkFile(this)"
                                                                    name="file">
                                                                <label class="custom-file-label" data-browse="Cari File" for="validatedCustomFile">Pilih
                                                                    file...</label>
                                                            </div>
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
                            <th>Judul</th>
                            <th>Isi Artikel</th>
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