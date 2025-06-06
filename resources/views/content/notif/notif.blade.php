@extends('layouts/contentNavbarLayout')

@section('title', 'Layanan Foto')
@section('content')

<div class="row gy-4">  
  <div class="card">
    <h5 class="card-header">
        Manajemen Notifikasi
    </h5>
    <div class="card-body">
        <div class="row mb-4">
            <label for="email" class="text-truncate">Tambah Email</label>
            <label for="" style="font-size: 12px;"><i>Pisahkan dengan "," untuk email lebih dari 1</i></label>
            <div class="col-md-10 d-flex">
               <form action="{{Route("notif-post")}}" method="POST">
                @csrf
                <input id="email" type="text" name="email" class="form-control" placeholder="jhondoe@gmail.com, johanal@yahoo.com">
                <button type="submit" class="btn btn-primary">Submit</button>
               </form>
            </div>
        </div>
        <div>
            <p>Email Penerima Notif <br>            <i style="font-size: 12px">Click Email Untuk Hapus</i>
            </p>
            <ul>
                @foreach($datas[0] as $nf)
                    <li><a href="{{Route("hapus-notif", $nf->email)}}">{{ $nf->email }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
  </div>
</div>
@endsection
