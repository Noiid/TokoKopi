@extends('admin.template')
@section('content-core')
<main>
    <div class="container-fluid">
        <h3 class="mt-4">Profil Toko</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Profil Toko</li>
        </ol>
        
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-shopping-cart mr-1"></i>
                Data Profil Toko
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Nama Toko : </strong><br> @if($profil!=null){{ $profil->nama_toko }}@else - @endif
                    </div>
                    <div class="col-md-6">
                        <strong>Alamat Toko : </strong><br> @if($profil!=null){{ $profil->alamat_toko }}@else - @endif
                    </div>
                </div>
                <hr>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Email Toko : </strong><br> @if($profil!=null){{ $profil->email_toko }}@else - @endif
                    </div>
                    <div class="col-md-4">
                        <strong>No. Telp Toko : </strong><br> @if($profil!=null){{ $profil->nomor_telp }}@else - @endif
                    </div>
                    <div class="col-md-4">
                        <strong>No. WA Toko : </strong><br> @if($profil!=null){{ $profil->wa_toko }}@else - @endif
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <strong>Deskripsi Toko : </strong><br> @if($profil!=null){{ $profil->deskripsi_toko }}@else - @endif
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-12">
                        <a href="#edit_profil" class="btn btn-warning btn-sm float-right font-weight-bold" data-toggle="modal" data-target="#edit_profil">Ubah Data Profil</a>
                        <div class="modal fade" id="edit_profil" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Profil Toko</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form @if($profil==null) action="/profil_toko"
                                        @else action="/profil_toko/edit" @endif method="POST">
                                            {{ csrf_field() }}
                                            @if($profil!=null)
                                            <input type="hidden" name="id_toko" value="{{ $profil->id_toko }}">
                                            @endif
                                            <div class="form-group">
                                                <label for="">Nama Toko</label>
                                                <input type="text" name="nama_toko" class="form-control" placeholder="Isi Nama Toko" required @if($profil!=null) value="{{ $profil->nama_toko }}" @endif>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Alamat Toko</label>
                                                <textarea name="alamat_toko" rows="5" class="form-control" placeholder="Isi Alamat Toko" required>@if($profil!=null){{ $profil->alamat_toko }}@endif</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Email Toko</label>
                                                <input type="email" name="email_toko" class="form-control" placeholder="Isi Email Toko" required @if($profil!=null) value="{{ $profil->email_toko }}" @endif>
                                            </div>
                                            <div class="form-group">
                                                <label for="">No. Telp</label>
                                                <input type="text" name="nomor_telp" class="form-control" placeholder="Isi Nomor Telp" required @if($profil!=null) value="{{ $profil->nomor_telp }}" @endif>
                                            </div>
                                            <div class="form-group">
                                                <label for="">No. WA Toko</label>
                                                <input type="text" name="wa_toko" class="form-control" placeholder="Isi Nomor WA" required @if($profil!=null) value="{{ $profil->wa_toko }}" @endif>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Deskripsi Toko</label>
                                                <textarea name="deskripsi_toko" rows="5" class="form-control" required placeholder="Isi Deskripsi Toko">@if($profil!=null){{ $profil->deskripsi_toko }}@endif</textarea>
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
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Data Sosial Media Toko
            </div>
            <div class="card-body">
                <div class="row">
                </div>
                
                {{-- Form Tambah Data  --}}
                <a href="#tambah_sosmed" class="btn btn-primary btn-sm float-right mb-3" data-toggle="modal" data-target="#tambah_sosmed"><strong><i class="fa fa-plus" aria-hidden="true"></i> Tambah Media Sosial</strong></a>
                <div class="modal fade" id="tambah_sosmed" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Sosial Media</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="/sosmed" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="">Jenis Sosial Media</label>
                                        <input type="text" name="jenis_sosmed" class="form-control" placeholder="Isi Jenis Sosmed (contoh: instagram, facebook, dll)" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nama Akun Sosial Media</label>
                                        <input type="text" name="nama_sosmed" class="form-control" placeholder="Isi Nama Akun Sosmed" required>
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


                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <th>No.</th>
                            <th>Jenis Sosmed</th>
                            <th>Nama Akun Sosmed</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($sosmed as $sos)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $sos->jenis_sosmed }}</td>
                                    <td>{{ $sos->nama_sosmed }}</td>
                                    <td><a href="#editModal{{$sos->id_sosmed}}" class="btn btn-warning btn-sm" data-toggle="modal"
                                        data-target="#editModal{{$sos->id_sosmed}}"><i class="fa fa-pen" aria-hidden="true">
                                        </i> <span class="font-weight-bold ml-1">Edit</span></a> 
                                        <a href="/sosmed/delete/{{$sos->id_sosmed}}"
                                        class="btn btn-danger btn-sm delete-item">
                                        <i class="fa fa-trash" aria-hidden="true"></i><span
                                            class="font-weight-bold ml-1">Hapus</span></a></td>
                                    <div class="modal fade" id="editModal{{$sos->id_sosmed}}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data Sosial Media</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="/sosmed/edit" method="POST">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="id_sosmed" value="{{ $sos->id_sosmed }}">
                                                        <div class="form-group">
                                                            <label for="">Jenis Sosial Media</label>
                                                            <input type="text" name="jenis_sosmed" class="form-control" placeholder="Isi Jenis Sosmed (contoh: instagram, facebook, dll)" required value="{{ $sos->jenis_sosmed }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Nama Akun Sosial Media</label>
                                                            <input type="text" name="nama_sosmed" class="form-control" placeholder="Isi Nama Akun Sosmed" required value="{{ $sos->nama_sosmed }}">
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
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <th>No.</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection