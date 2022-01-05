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
        <h3 class="mt-4">Data Petani</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Petani</li>
        </ol>
        
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Data Petani
            </div>
            <div class="card-body">
                <div class="row">
                </div>
                
                {{-- Form Tambah Data  --}}
                <a href="#tambah_petani" class="btn btn-primary float-right mb-3" data-toggle="modal" data-target="#tambah_petani"><strong><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</strong></a>
                <div class="modal fade" id="tambah_petani" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Petani</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="/petani" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="">Nama Petani</label>
                                        <input type="text" name="nama_petani" class="form-control" placeholder="Isi Nama" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Alamat Petani</label>
                                        <textarea name="alamat_petani" class="form-control ckeditor" rows="10" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">No. Telp Petani</label>
                                        <input type="tel" name="telp_petani" class="form-control" placeholder="Isi No. Telp" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Foto Petani <i>(Ekstensi file .jpeg, .jpg, .png)</i></label>
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
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No. Telp</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </thead>
                        <tfoot>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No. Telp</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tfoot>
                        <tbody>
                            @foreach ($petani as $pet)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $pet->nama_petani }}</td>
                                    <td>{!! $pet->alamat_petani !!}</td>
                                    <td>{{ $pet->telp_petani }}</td>
                                    <td><img src="{{ url(Storage::url($pet->gambar_petani)) }}" class="rounded" height="100px" width="auto"></td>
                                    <td><a href="#editModal{{$pet->id_petani}}" class="btn btn-warning btn-sm" data-toggle="modal"
                                        data-target="#editModal{{$pet->id_petani}}"><i class="fa fa-pen" aria-hidden="true">
                                        </i> <span class="font-weight-bold ml-1">Edit</span></a> 

                                        <a href="/petani/delete/{{$pet->id_petani}}"
                                        class="btn btn-danger btn-sm delete-item">
                                        <i class="fa fa-trash" aria-hidden="true"></i><span
                                            class="font-weight-bold ml-1">Hapus</span></a>

                                    </td>

                                    {{-- modal ubah data user (kecuali password)  --}}
                                    <div class="modal fade" id="editModal{{$pet->id_petani}}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data Petani</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="/petani/edit" method="POST" enctype="multipart/form-data">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="id_petani" value="{{ $pet->id_petani }}">
                                                        <div class="form-group">
                                                            <label for="">Nama Petani</label>
                                                            <input type="text" name="nama_petani" class="form-control" placeholder="Isi Nama" required value="{{ $pet->nama_petani }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Alamat Petani</label>
                                                            <textarea name="alamat_petani" class="form-control ckeditor" rows="10" required>{{ $pet->alamat_petani }}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">No. Telp Petani</label>
                                                            <input type="tel" name="telp_petani" class="form-control" placeholder="Isi No. Telp" required value="{{ $pet->telp_petani }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Foto Petani <i>(Ekstensi file .jpeg, .jpg, .png)</i></label>
                                                            <span><i>* jika tidak ingin mengubah foto maka tidak butuh menyertakan foto baru</i></span>
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
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection