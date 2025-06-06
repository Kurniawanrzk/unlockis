@extends('layouts/contentNavbarLayout')

@section('title', 'File Sent Foto')

@section('content')
<!-- Modal for Adding New File Sent -->
<div class="modal fade" id="modal-post-servis" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah File Sent Foto Baru</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('file-sent-post') }}">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            @csrf
                            @method('POST')
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="nama_file_sent">Nama File Sent</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama_file_sent" id="nama_file_sent" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="harga_file_sent">Harga Servis</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="harga_file_sent" id="harga_file_sent" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row gy-4">
    <!-- Button to trigger adding new File Sent -->
    <div>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-post-servis">Tambah Baru</button>
    </div>

    <!-- Table Displaying File Sent Data -->
    <div class="card">
        <h5 class="card-header">Data File Sent Foto</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama File Sent</th>
                        <th>Harga File Sent</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($datas[0] as $file_sent)
                    <!-- Modal for Editing File Sent -->
                    <div class="modal fade" id="modal-edit-servis-{{ $file_sent->id_file_sent }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit File Sent</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('file-sent-edit', $file_sent->id_file_sent) }}">
                                    <div class="modal-body">
                                        <div class="card">
                                            <div class="card-body">
                                                @csrf
                                                @method('PUT')
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="nama_file_sent_{{ $file_sent->id_file_sent }}">Nama Servis</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="nama_file_sent" id="nama_file_sent_{{ $file_sent->id_file_sent }}" value="{{ $file_sent->nama_file_sent }}" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="harga_file_sent_{{ $file_sent->id_file_sent }}">Harga Servis</label>
                                                    <div class="col-sm-10">
                                                        <input type="number" class="form-control" name="harga_file_sent" id="harga_file_sent_{{ $file_sent->id_file_sent }}" value="{{ $file_sent->harga_file_sent }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- File Sent Data Row -->
                    <tr>
                        <td>{{ $file_sent->nama_file_sent }}</td>
                        <td>{{ 'Rp ' . number_format((int) $file_sent->harga_file_sent, 0, ',', '.') }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-edit-servis-{{ $file_sent->id_file_sent }}">Edit</button>
                                <form method="POST" action="{{ route('file-sent-delete', $file_sent->id_file_sent) }}">
                                    @csrf
                                    @method('DELETE')
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
