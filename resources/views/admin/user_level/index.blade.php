@extends('admin.template')
@section('content-core')
<main>
    <div class="container-fluid">
        <h3 class="mt-4">User Level</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">User</li>
            <li class="breadcrumb-item active">Level</li>
        </ol>
        
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Data User Level
            </div>
            <div class="card-body">
                <div class="row">
                </div>
                
                {{-- Form Tambah Data  --}}
                <a href="#tambah_lvl" class="btn btn-primary float-right mb-3" data-toggle="modal" data-target="#tambah_lvl"><strong><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</strong></a>
                <div class="modal fade" id="tambah_lvl" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data User Level</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="/user_level" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="">Deskripsi Level</label>
                                        <input type="text" name="deskripsi_level" class="form-control" placeholder="Isi Nama Level" required>
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
                            <th>Level</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($level as $lvl)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $lvl->deskripsi_level }}</td>
                                    <td><a href="#editModal{{$lvl->id_level}}" class="btn btn-warning btn-sm" data-toggle="modal"
                                        data-target="#editModal{{$lvl->id_level}}"><i class="fa fa-pen" aria-hidden="true">
                                        </i> <span class="font-weight-bold ml-1">Edit</span></a> 
                                        <a href="/user_level/delete/{{$lvl->id_level}}"
                                        class="btn btn-danger btn-sm delete-item">
                                        <i class="fa fa-trash" aria-hidden="true"></i><span
                                            class="font-weight-bold ml-1">Hapus</span></a></td>
                                    <div class="modal fade" id="editModal{{$lvl->id_level}}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data User Level</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="/user_level/edit" method="POST">
                                                        {{ csrf_field() }}
                                                        <div class="form-group">
                                                            <label for="">Deskripsi Level</label>
                                                            <input type="text" name="deskripsi_level" id="" value="{{ $lvl->deskripsi_level }}" class="form-control" required>
                                                            <input type="hidden" name="id_level" value="{{ $lvl->id_level }}">
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