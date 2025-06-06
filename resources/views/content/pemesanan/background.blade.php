@extends('layouts/contentNavbarLayout')

@section('title', 'Layanan Foto')
@section('content')

<!-- Add New Background Modal -->
<div class="modal fade" id="modal-post-layanan-foto" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Background Foto Baru</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ Route('background-foto-post') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="background">Nama</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="nama_background" id="background">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="min">Kapasitas Minimal</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="number" name="kapasitas_min" id="min">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="max">Kapasitas Maximal</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="number" name="kapasitas_max" id="max">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="bg">Gambar Background</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" name="gambar_bg" id="bg">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="row gy-4">  
    <div>
        <button data-bs-toggle="modal" data-bs-target="#modal-post-layanan-foto" class="btn btn-primary">Tambah Baru</button>
    </div>
    <div class="card">
        <h5 class="card-header">Data Background Foto</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-truncate">Nama Background</th>
                        <th class="text-truncate">Kapasitas</th>
                        <th class="text-truncate">Gambar</th>
                        <th class="text-truncate">Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($datas[0] as $background)
                    <!-- Edit Background Modal -->
                    <div class="modal fade" id="modal-edit-background-{{ $background->id_background }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit Background Foto</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ Route('background-foto-edit', $background->id_background) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row mb-3">
                                                        <label class="col-sm-2 col-form-label" for="background">Nama</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="text" value="{{ $background->nama_background }}" name="nama_background" id="background">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label class="col-sm-2 col-form-label" for="min">Kapasitas Minimal</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="number" value="{{ $background->kapasitas_min }}" name="kapasitas_min" id="min">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label class="col-sm-2 col-form-label" for="max">Kapasitas Maximal</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="number" value="{{ $background->kapasitas_max }}" name="kapasitas_max" id="max">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label class="col-sm-2 col-form-label" for="bg">Gambar Background</label>
                                                        <div class="col-sm-5 d-flex">
                                                            <input class="form-control" type="file" name="gambar_bg" id="bg">
                                                            @if(!empty($background->gambar_bg))
                                                                <img src="{{ asset('storage/' . $background->gambar_bg) }}" width="100" height="100" alt="Background Image" class="ms-3">
                                                            @else
                                                                <span class="text-muted">Belum Ada Gambar</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Data Row -->
                    <tr>
                        <td class="text-truncate">{{ $background->nama_background }}</td>
                        <td class="text-truncate">{{ $background->kapasitas_min }} - {{ $background->kapasitas_max }}</td>
                        <td class="text-truncate">
                            @if(!empty($background->gambar_bg))
                                <img width="100" height="100" src="{{ asset('storage/' . $background->gambar_bg) }}" alt="Background Image">
                            @else
                                <span class="text-muted">Belum Ada Gambar</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <button data-bs-toggle="modal" data-bs-target="#modal-edit-background-{{ $background->id_background }}" class="btn btn-success">Edit</button>
                                <form id="form-delete-bg-{{ $background->id_background }}" action="{{ Route('background-foto-delete', $background->id_background) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="alertSure(document.getElementById('form-delete-bg-{{ $background->id_background }}'))" class="btn btn-danger">Hapus</button>
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
