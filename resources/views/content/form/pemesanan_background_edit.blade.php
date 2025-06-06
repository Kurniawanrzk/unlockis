@extends('layouts/contentNavbarLayout')

@section('title', 'Edit Pemesanan - Background')

@section('content')
<div class="row gy-4">
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Pemesanan Background</h5>
                <small class="text-muted">Edit Pemesanan</small>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('pemesanan-bg-edit', $data['pemesanan_id']) }}">
                    @csrf
                    @method('PUT')
                    
                    {{-- Background Options List --}}
                    @foreach($data['backgrounds'] as $background)
                        @php
                            $isSelected = in_array($background->id_background, $data['selected_backgrounds']);
                        @endphp
                        <div class="row mb-3 align-items-center">
                            <label class="col-sm-2 col-form-label" for="background_{{ $background->id_background }}">
                                {{ $background->nama_background }}
                            </label>
                            <div class="col-sm-1 mt-1">
                                <input 
                                    type="checkbox" 
                                    id="background_{{ $background->id_background }}" 
                                    name="id_background[]" 
                                    value="{{ $background->id_background }}" 
                                    {{ $isSelected ? 'checked' : '' }} 
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
