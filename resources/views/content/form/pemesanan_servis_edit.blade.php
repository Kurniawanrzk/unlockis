@extends('layouts/contentNavbarLayout')

@section('title', 'Edit Pemesanan - Servis Tambahan')

@section('content')
<div class="row gy-4">
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Servis Tambahan</h5>
                <small class="text-muted">Edit Pemesanan</small>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('pemesanan-servis-edit', $data['pemesanan_id']) }}">
                    @csrf
                    @method('PUT')
                    
                    {{-- Servis Tambahan List --}}
                    @foreach($data['servis_tambahan'] as $servis)
                        @php
                            $hargaFormatted = 'Rp ' . number_format((int) $servis->harga_servis, 0, ',', '.');
                            $isChecked = in_array($servis->id_servis, $data['selected_servis']);
                        @endphp
                        <div class="row mb-3 align-items-center">
                            <label class="col-sm-2 col-form-label" for="servis_{{ $servis->id_servis }}">
                                {{ $servis->nama_servis }} <br> 
                                <small class="text-muted">{{ $hargaFormatted }}</small>
                            </label>
                            <div class="col-sm-1 mt-1">
                                <input 
                                    type="checkbox" 
                                    id="servis_{{ $servis->id_servis }}" 
                                    name="id_servis[]" 
                                    value="{{ $servis->id_servis }}" 
                                    {{ $isChecked ? 'checked' : '' }} 
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
