@extends('layouts/contentNavbarLayout')

@section('title', 'Layanan Foto')
@section('content')
<div class="modal fade" id="modal-edit-paket" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel4">Tambah Paket</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="{{Route("paket-post")}}">
        <div class="modal-body">
         <div class="row">
          <div class="card">
                <div class="card-body">
                        @csrf
                        @method("POST")
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="background">Nama Paket</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="nama_paket" id="background">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="deskripsi">Key Point</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="2"></textarea>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="harga">Harga</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" name="harga" id="harga">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="durasi_pemotretan">Durasi Pemotretan</label>
                        <div class="col-sm-10">
                            <input class="form-control"  type="number" name="durasi_pemotretan" id="durasi_pemotretan">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="id_layanan_foto">Layanan Foto</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="id_layanan_foto" id="id_layanan_foto">
                                <option value="">-</option>
                                @foreach(App\Models\LayananFoto::all() as $r)
                                <option value="{{$r->id_layanan_foto}}">{{ $r->nama_layanan_foto }}</option>
                                @endforeach
                            </select>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="tipe_paket">Tipe Paket</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="tipe_paket" id="tipe_paket">
                                <option value="">-</option>
                                <option value="0">Basic</option>
                                <option value="1">Reguler</option>
                                <option value="2">Luxury</option>
                                <option value="3">Bundling</option>

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
        <button data-bs-toggle="modal" data-bs-target="#modal-edit-paket" class="btn btn-primary">Tambah Baru</button>
    </div>
    <div class="card">
        <h5 class="card-header">Data Layanan Foto</h5>
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th class="text-truncate">Nama Paket</th>
                <th class="text-truncate">Key Point</th>
                <th class="text-truncate">Harga</th>
                <th class="text-truncate">Tipe Layanan</th>
                <th class="text-truncate">Tipe Paket</th>
                <th class="text-truncate">Aksi</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">

             @foreach($datas[0] as $paket) 
            {{-- Edit Layanan Foto --}}
            <div class="modal fade" id="modal-edit-paket-{{$paket->id_paket}}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="exampleModalLabel4">Edit Paket</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{Route("paket-edit", $paket->id_paket)}}">
                    <div class="modal-body">
                     <div class="row">
                      <div class="card">
                            <div class="card-body">
                                    @csrf
                                    @method("PUT")
                                  <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="background">Nama Paket</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="{{$paket->nama_paket}}" name="nama_paket" id="background">
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="deskripsi">Key Point</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control"name="deskripsi" id="deskripsi" cols="30" rows="2">{{$paket->deskripsi}}</textarea>
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="harga">Harga</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" value="{{$paket->harga}}" type="number" name="harga" id="harga">
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="durasi_pemotretan">durasi pemotretan</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" value="{{$paket->durasi_pemotretan}}" type="number" name="durasi_pemotretan" id="durasi_pemotretan">
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="id_layanan_foto">Layanan Foto</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="id_layanan_foto" id="id_layanan_foto">
                                            <option value="">-</option>
                                            @foreach(App\Models\LayananFoto::all() as $r)
                                            <option @if($paket->id_layanan_foto == $r->id_layanan_foto) selected @endif  value="{{$r->id_layanan_foto}}">{{ $r->nama_layanan_foto }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="tipe_paket">Tipe Paket</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="tipe_paket" id="tipe_paket">
                                            <option value="">-</option>
                                            <option @if($paket->tipe_paket == 0) selected @endif value="0">Basic</option>
                                            <option @if($paket->tipe_paket == 1) selected @endif value="1">Reguler</option>
                                            <option @if($paket->tipe_paket == 2) selected @endif value="2">Luxury</option>
                                            <option @if($paket->tipe_paket == 3) selected @endif value="3">Bundling</option>
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
                    <td class="text-truncate">{{$paket->nama_paket}}</td>
                    <td class="text-truncate">
                        @php
                        $iterate_deskripsi = 0;   
                        @endphp
                        @foreach(explode(",",$paket->deskripsi) as $deskripsi)
                        {{$deskripsi}}, <br>
                        @php
                        ++$iterate_deskripsi;
                        if($iterate_deskripsi == count(explode(",",$paket->deskripsi)) - 1) {
                            break;
                        }
                        @endphp
                        
                        @endforeach
                        {{explode(",",$paket->deskripsi)[count(explode(",",$paket->deskripsi)) - 1]}}.
                    </td>
                    <td class="text-truncate">
                        {{ 'Rp ' . number_format((int)$paket->harga, 0, ',', '.')}}
                    </td>
                    <td>{{ App\Models\LayananFoto::find($paket->id_layanan_foto)->nama_layanan_foto }}</td>
                    <td>
                        @if($paket->tipe_paket == 0)
                        Basic
                        @elseif($paket->tipe_paket == 1)
                        Regular
                        @elseif($paket->tipe_paket == 2)
                        Luxury
                        @elseif($paket->tipe_paket == 3)
                        Bundling
                        @endif
                    </td>
                    <td class="">
                       <div class="d-flex gap-2">
                        <button data-bs-toggle="modal" data-bs-target="#modal-edit-paket-{{$paket->id_paket}}" class="btn btn-success">Edit</button>
                        <form action="{{ Route("paket-delete", $paket->id_paket) }}" method="POST">
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
