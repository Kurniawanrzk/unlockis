@extends('layouts/contentNavbarLayout')

@section('title', 'Layanan Foto')
@section('content')
<div class="modal fade" id="modal-post-servis" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel4">Tambah Layanan Foto Baru</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="{{Route("servis-tambahan-post")}}" >
        <div class="modal-body">
         <div class="row">
          <div class="card">
                <div class="card-body">
                        @csrf
                        @method("POST")
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="nama_servis">Nama Servis</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="nama_servis" id="nama_servis">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="harga_servis">Harga Servis</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" name="harga_servis" id="harga_servis">
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
        <button data-bs-toggle="modal" data-bs-target="#modal-post-servis" class="btn btn-primary">Tambah Baru</button>
    </div>
    <div class="card">
        <h5 class="card-header">Data Layanan Foto</h5>
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th class="text-truncate">Nama Servis</th>
                <th class="text-truncate">Harga Servis</th>
                <th class="text-truncate">Aksi</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">

             @foreach($datas[0] as $servis_tambahan) 
            {{-- Edit Layanan Foto --}}
            <div class="modal fade" id="modal-edit-servis-{{$servis_tambahan->id_servis}}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="exampleModalLabel4">Edit Servis</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{Route("servis-tambahan-edit", $servis_tambahan->id_servis)}}" >
                    <div class="modal-body">
                     <div class="row">
                      <div class="card">
                            <div class="card-body">
                                    @csrf
                                    @method("PUT")
                                  <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="nama_servis">Nama Servis</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" value="{{$servis_tambahan->nama_servis}}" type="text" name="nama_servis" id="nama_servis">
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="harga_servis">Harga Servis</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" value="{{$servis_tambahan->harga_servis}}" type="number" name="harga_servis" id="harga_servis">
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
                    <td class="text-truncate">{{$servis_tambahan->nama_servis}}</td>
                    <td class="text-truncate">{{ 'Rp ' . number_format((int)$servis_tambahan->harga_servis, 0, ',', '.')}}</td>

                    <td class="">
                       <div class="d-flex gap-2">
                        <button data-bs-toggle="modal" data-bs-target="#modal-edit-servis-{{$servis_tambahan->id_servis}}" class="btn btn-success">Edit</button>
                        <form action="{{Route("servis-tambahan-delete", $servis_tambahan->id_servis)}}"  method="POST">
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
