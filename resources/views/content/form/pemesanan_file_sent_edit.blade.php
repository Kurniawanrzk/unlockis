@extends('layouts/contentNavbarLayout')

@section('title', 'Pemesanan - Edit')

@section('content')
<div class="row gy-4">  
    <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Edit Tipe File Sent</h5>
            <small class="text-muted float-end">Edit Pemesanan</small>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ Route('pemesanan-Fs-edit', $data['pemesanan_id']) }}">
                @csrf
                @method('PUT')
                
                {{-- File Sent Options --}}
                @foreach($data['files'] as $fs)
                    @php
                        $formatted_price = 'Rp ' . number_format((int)$fs->harga_file_sent, 0, ',', '.'); 
                    @endphp
                    <div class="row align-items-center mb-3">
                        <label class="col-sm-2 col-form-label" for="file_sent_{{ $fs->id_file_sent }}">
                            {{ $fs->nama_file_sent }} <br>
                            <small>({{ $formatted_price }})</small>
                        </label>
                        <div class="col-sm-1">
                            <input 
                                type="checkbox" 
                                id="file_sent_{{ $fs->id_file_sent }}" 
                                name="id_file_sent[]" 
                                value="{{ $fs->id_file_sent }}" 
                                @if(in_array($fs->id_file_sent, $data['selected_files'])) checked @endif 
                                class="form-check-input"
                            />
                        </div>
                    </div>
                @endforeach

                {{-- Submit Button --}}
                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
          </div>
        </div>
    </div>
</div>
@endsection
