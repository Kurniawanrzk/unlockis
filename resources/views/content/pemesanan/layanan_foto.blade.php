@extends('layouts/contentNavbarLayout')

@section('title', 'Layanan Foto')

@section("urgentStyle")
<style>
  #delete-image {
    opacity: 0; /* Set initial visibility to hidden */
  }
  #delete-image:hover {
    opacity: 1;
  }

  .container-image-layanan {
    display: grid;
    grid-template-columns:  auto auto auto;
    justify-content: space-around
  }

  .gambar-layanan {
    width:130px;
    height:130px;
    background-size:cover;
    background-position:center;
    background-repeat:no-repeat;
  }
  .gambar-layanan-detail {
    width:220px;
    height:190px;
    background-size:cover;
    background-position:center;
    background-repeat:no-repeat;
  }
</style>

@endsection
@section('content')
<div class="modal fade" id="modal-post-layanan-foto" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel4">Tambah Layanan Foto Baru</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="{{Route("layanan-foto-post")}}" enctype="multipart/form-data">
        <div class="modal-body">
         <div class="row">
          <div class="card">
                <div class="card-body">
                        @csrf
                        @method("POST")
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="layanan_foto">Nama</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="nama_layanan_foto" id="layanan_foto" placeholder="Masukkan Nama Layanan Foto Baru" />
                        </div>
                       
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="deskripsi">Deskripsi</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="5"></textarea>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="gambar">Gambar</label>
                        <div class="col-sm-10">
                          <input class="form-control" type="file" name="gambar[]" id="gambar" accept=".png, .jpg" multiple>
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
        <button data-bs-toggle="modal" data-bs-target="#modal-post-layanan-foto" class="btn btn-primary">Tambah Baru</button>
    </div>
    <div class="card">
        <h5 class="card-header">Data Layanan Foto</h5>
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th class="text-truncate">Nama Layanan Foto</th>
                <th class="text-truncate">Gambar</th>
                <th class="text-truncate">Aksi</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">

             @foreach($datas[0] as $layanan_foto) 
            {{-- Edit Layanan Foto --}}
            @php
            $layanan_foto_detail = App\Models\LayananFoto::find($layanan_foto->id_layanan_foto);
            @endphp
             <div class="modal fade" id="modal-edit-layanan-foto-{{$layanan_foto->id_layanan_foto}}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="exampleModalLabel4">Edit Layanan Foto Baru</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{Route("layanan-foto-edit", $layanan_foto_detail->id_layanan_foto)}}" enctype="multipart/form-data">
                    <div class="modal-body">
                     <div class="row">
                      <div class="card">
                            <div class="card-body">
                                    @csrf
                                    @method("PUT")
                                  <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="layanan_foto">Nama</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" value="{{ $layanan_foto_detail->nama_layanan_foto }}" name="nama_layanan_foto" id="layanan_foto" placeholder="Masukkan Nama Layanan Foto Baru" />
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="deskripsi">Deskripsi</label>
                                    <div class="col-sm-10">
                                      <textarea class="form-control" value="}" name="deskripsi" id="deskripsi" cols="30" rows="5">{{ $layanan_foto_detail->deskripsi }}</textarea>
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="gambar">Gambar</label>
                                    <div class="col-sm-10">
                                      <input class="form-control" type="file" name="gambar[]" id="gambar" accept=".png, .jpg" multiple>
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
                {{-- Gambar --}}
                <div class="modal fade" id="modal-gambar-{{$layanan_foto->id_layanan_foto}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Gambar Layanan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="d-flex justify-content-center">
                          <div class="container-image-layanan">
                            @foreach (App\Models\DetailLayananFoto::where("id_layanan_foto", $layanan_foto->id_layanan_foto)->get() as $g)
                            <div  style="cursor: pointer;position:relative">
                              <a href="{{Route("layanan-detail-foto-delete", $g->id_detail_layanan_foto)}}" id="delete-image" style="background-color:rgba(0, 0, 0, 0.358);width:220px;height:190px;position: absolute;display:flex;justify-content:center;align-items:center">
                                <i style="color:white;font-size:30px" class="fa fa-trash" aria-hidden="true"></i>
                              </a>
                              <div style="    background-image:url('{{ asset('storage/' . $g->gambar) }}');" class="gambar-layanan-detail">

                              </div>                            
                            </div>
                            @endforeach
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <p class="text-truncate"><b>Hover ke gambar untuk menghapus gambar</b></p>
                      </div>
                    </div>
                  </div>
                </div>
                {{-- Gambar --}}
                <tr>
                    <td class="text-truncate">{{$layanan_foto->nama_layanan_foto}}</td>
                    <td class="text-truncate" >
                        @if((App\Models\DetailLayananFoto::where("id_layanan_foto", $layanan_foto->id_layanan_foto)->get()->isEmpty()))
                        Belum Ada Gambar
                        @else
                          @foreach (App\Models\DetailLayananFoto::where("id_layanan_foto", $layanan_foto->id_layanan_foto)->get() as $g)
                          <span data-bs-toggle="modal" data-bs-target="#modal-gambar-{{$layanan_foto->id_layanan_foto}}" style="cursor: pointer">
                            <div style="    background-image:url('{{ asset('storage/' . $g->gambar) }}');" class="gambar-layanan">

                            </div>
                          </span>
                            @break
                          @endforeach
                      @endif
                    </td>
                    <td class="d-flex gap-2">
                        <button data-bs-toggle="modal" data-bs-target="#modal-edit-layanan-foto-{{$layanan_foto->id_layanan_foto}}" class="btn btn-success">Edit</button>
                        <form action="{{ Route("layanan-foto-delete", $layanan_foto->id_layanan_foto) }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
              @endforeach

            </tbody>
          </table>
        </div>
      </div>
</div>
@endsection
