@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@endsection

@section('content')
<div class="row gy-4">  
    <div class="card">
        <h5 class="card-header">Data Pemesanan</h5>
        <div class="table-responsive text-nowrap">
            @livewire("tabel-pemesanan")
        </div>
    </div>
</div>

<script>

</script>
@endsection
