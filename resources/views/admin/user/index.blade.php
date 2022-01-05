@extends('admin.template')
@section('content-core')
<main>
    <div class="container-fluid">
        <h3 class="mt-4">Daftar User</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">User</li>
            <li class="breadcrumb-item active">Daftar User</li>
        </ol>
        
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Daftar User
            </div>
            <div class="card-body">
                <div class="row">
                </div>
                
                {{-- Form Tambah Data  --}}
                <a href="#tambah_user" class="btn btn-primary float-right mb-3" data-toggle="modal" data-target="#tambah_user"><strong><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</strong></a>
                <div class="modal fade" id="tambah_user" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data User</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="/user" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="">Nama</label>
                                        <input type="text" name="name" class="form-control" placeholder="Isi Nama" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Isi Email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Isi Password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Konfirmasi Password</label>
                                        <input type="password" name="confirm_password" class="form-control" placeholder="Isi Konfirmasi Password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">No. Telp</label>
                                        <input type="number" name="telp_user" class="form-control" placeholder="Isi Telp" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Level</label>
                                        <select name="id_level" class="custom-select" required>
                                            <option value="">-- Pilih Level --</option>
                                            @foreach ($level as $lvl)
                                                <option value="{{ $lvl->id_level }}">{{ $lvl->deskripsi_level }}</option>
                                            @endforeach
                                        </select>
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
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Telp</th>
                            <th>Level</th>
                            <th>Verifikasi</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->telp_user }}</td>
                                    <td>{{ $user->level->deskripsi_level }}</td>
                                    <td>
                                        @if($user->email_verified_at!=null)
                                            <span class="text-success"><i class="fas fa-check" aria-hidden="true"></i></span>
                                        @else
                                            <span class="text-secondary"><i class="fas fa-minus" aria-hidden="true"></i></span>
                                        @endif
                                    </td>
                                    <td><a href="#editModal{{$user->id}}" class="btn btn-warning btn-sm" data-toggle="modal"
                                        data-target="#editModal{{$user->id}}"><i class="fa fa-pen" aria-hidden="true">
                                        </i> <span class="font-weight-bold ml-1">Edit</span></a> 

                                        <a href="/user/delete/{{$user->id}}"
                                        class="btn btn-danger btn-sm delete-item">
                                        <i class="fa fa-trash" aria-hidden="true"></i><span
                                            class="font-weight-bold ml-1">Hapus</span></a>

                                        <a href="#ubahPass{{$user->id}}" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#ubahPass{{$user->id}}"><i class="fa fa-unlock-alt" aria-hidden="true">
                                        </i> <span class="font-weight-bold ml-1">Ubah Password</span></a>

                                    </td>

                                    {{-- modal ubah data user (kecuali password)  --}}
                                    <div class="modal fade" id="editModal{{$user->id}}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data User</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="/user/edit" method="POST">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                                        <div class="form-group">
                                                            <label for="">Nama</label>
                                                            <input type="text" name="name" class="form-control" placeholder="Isi Nama" required value="{{ $user->name }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Email</label>
                                                            <input type="email" name="email" class="form-control" placeholder="Isi Email" required value="{{ $user->email }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">No. Telp</label>
                                                            <input type="number" name="telp_user" class="form-control" placeholder="Isi Telp" required value="{{ $user->telp_user }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Level</label>
                                                            <select name="id_level" class="custom-select" required>
                                                                <option value="">-- Pilih Level --</option>
                                                                @foreach ($level as $lvl)
                                                                    <option value="{{ $lvl->id_level }}" @if($user->id_level==$lvl->id_level) selected @endif>{{ $lvl->deskripsi_level }}</option>
                                                                @endforeach
                                                            </select>
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

                                    {{-- modal ubah password  --}}
                                    <div class="modal fade" id="ubahPass{{$user->lvl}}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="/user/edit_pass" method="POST">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                                        <div class="form-group">
                                                            <label for="">Isi Password</label>
                                                            <input type="password" name="password" class="form-control" placeholder="Isi Password" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Isi Konfirmasi Password</label>
                                                            <input type="password" name="confirm_password" class="form-control" placeholder="Isi Konfirmasi Password" required>
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
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Telp</th>
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