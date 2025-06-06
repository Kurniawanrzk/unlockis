@extends('layouts/contentNavbarLayout')

@section('title', 'Pemesanan - Edit')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@endsection

@section('content')
<div class="row gy-4">  
    <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Pemesanan</h5> <small class="text-muted float-end">Edit Pemesanan</small>
          </div>
          <div class="card-body">
            <form method="POST" action="{{Route("pemesanan-edit", $data['pemesanan']->id_pemesanan)}}">
                @csrf
                @method("PUT")
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="total_orang_foto">Total Orang Foto</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" name="total_orang_foto" id="total_orang_foto" value="{{$data['pemesanan']->total_orang_foto}}" placeholder="Masukkan Total Orang Foto" />
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="tanggal_booking">Tanggal Booking</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" name="tanggal_booking" id="tanggal_booking" value="{{$data['pemesanan']->tanggal_booking}}" />
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="jam_booking">Jam Booking</label>
                <div class="col-sm-10">
                  <input type="time" class="form-control" name="jam_booking" id="jam_booking" value="{{$data['pemesanan']->jam_booking}}" />
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="jam_booking">Status Pembayaran</label>
                
                <div class="col-sm-10">
                  <select class="form-control" name="status_pembayaran" id="">
                    <option  value="Belum DP">Belum DP</option>
                    <option value="DP">DP</option>
                    <option value="Pelunasan">Pelunasan</option>
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="jam_booking">Status Pengerjaan</label>
                
                <div class="col-sm-10">
                  <select class="form-control" name="status_pengerjaan" id="">
                    <option value="File belum diedit">File belum diedit</option>
                    <option value="revisi">revisi</option>
                    <option value="Belum cetak">Belum cetak</option>
                    <option value="orderan selesai">orderan selesai</option>
                   
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="fotografer">Fotografer</label>
                <div class="col-sm-10">
                  <select name="id_photographer" id="fotografer" class="form-control">
                    <option value="">-</option>
                    @foreach(App\Models\User::where('id_role', 2)->get() as $ph)
                    <option @if($ph->id_user == $data['pemesanan']->id_photographer) selected @endif value="{{$ph->id_user}}">{{ $ph->nama }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="paket_pilihan">Paket Pilihan</label>
                <div class="col-sm-10">
                    <select name="id_paket" class="form-control" id="paket_pilihan">
                        @foreach($data['paket'] as $paket)
                        <option @if($data['pemesanan']->id_paket == $paket->id_paket) selected @endif value="{{$paket->id_paket}}">{{$paket->nama_paket}}</option>
                        @endforeach
                    </select>
                </div>
              </div>

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
