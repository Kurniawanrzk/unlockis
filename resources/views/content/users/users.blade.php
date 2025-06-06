@extends('layouts/contentNavbarLayout')

@section('title', 'Layanan Foto')
@section('content')
<div class="modal fade" id="modal-post-users" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel4">Tambah User Baru</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="{{Route("users-post")}}" >
        <div class="modal-body">
         <div class="row">
          <div class="card">
                <div class="card-body">
                        @csrf
                        @method("POST")
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="nama">Nama <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="nama" id="nama" placeholder="masukkan nama user">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="username">Username<span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="username" id="username" placeholder="masukkan username user">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="password">Password<span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" name="password" id="password" placeholder="masukkan password user">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="role">Role<span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <select class="form-control" name="id_role" id="role">
                                <option value="">-</option>
                                @foreach(App\Models\Role::all() as $r)
                                <option value="{{$r->id_role}}">{{ $r->nama_role }}</option>
                                @endforeach
                            </select>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </div>
</form>
</div>
    </div>
  
<div class="row gy-4">  
    <div>
        <button data-bs-toggle="modal" data-bs-target="#modal-post-users" class="btn btn-primary">Tambah Baru</button>
    </div>
    <div class="card">
        <h5 class="card-header">Data Layanan Foto</h5>
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th class="text-truncate">Nama</th>
                <th class="text-truncate">Username</th>
                <th class="text-truncate">Role</th>
                <th class="text-truncate">Aksi</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">

             @foreach($datas[0] as $users) 
            {{-- Edit Layanan Foto --}}
            <div class="modal fade" id="modal-edit-users-{{$users->id_user}}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="exampleModalLabel4">Edit User</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{Route("users-edit", $users->id_user)}}" >
                    <div class="modal-body">
                     <div class="row">
                      <div class="card">
                            <div class="card-body">
                                    @csrf
                                    @method("PUT")
                                  <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="nama">Nama <span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input class="form-control" value="{{$users->nama}}" type="text" name="nama" id="nama" placeholder="masukkan nama user">
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="username">Username<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input class="form-control" value="{{$users->username}}" type="text" name="username" id="username" placeholder="masukkan username user">
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="password">Password<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="password" name="password" id="password" placeholder="masukkan password user">
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="role">Role<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="id_role" id="role">
                                            <option value="">-</option>
                                            @foreach(App\Models\Role::all() as $r)
                                            <option @if($users->id_role == $r->id_role) selected @endif value="{{$r->id_role}}">{{ $r->nama_role }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </div>
            </form>
            </div>
                </div>
                {{-- Edit Layanan Foto --}}

                <tr>
                    <td class="text-truncate">{{$users->nama}}</td>
                    <td class="text-truncate">{{$users->username}}</td>
                    <td class="text-truncate">{{ App\Models\Role::find($users->id_role)->nama_role }}</td>

                    <td class="">
                       <div class="d-flex gap-2">
                        <button data-bs-toggle="modal" data-bs-target="#modal-edit-users-{{$users->id_user}}" class="btn btn-success">Edit</button>
                        <form action="{{Route("users-delete", $users->id_user)}}"  method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                       </div>
                    </td>
                </tr>
              @endforeach

            </tbody>
          </table>
        </div>
      </div>
</div>
@endsection
