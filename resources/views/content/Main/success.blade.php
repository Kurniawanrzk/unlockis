
@extends('layouts.mainLayout')

@section("css")
<link rel="stylesheet" href="{{asset("assets/css/servis.css")}}">
@endsection

@section("content")
    <div style="padding-top: 100px">

    </div>
    <div class="section-success" style="margin-top:30px;background-size:cover;background-position:center;background-repeat:no-repeat;display: grid;justify-content:center;align-items:center;width:100%;height:50vh;background-image:url({{asset("assets/img/success_pemesanan.png")}})">
        <div style="text-align: center">
            <h1>TERIMAKASIH TELAH BOOKING</h1>
            <h1>SILAHKAN MENUNGGU INVOICE MELALUI WHATSAPP </h1>
            <br><br>
            <a href="{{Route("main-index")}}">
                <button type="button" class="btn-primary" >Kembali Ke Home</button>

            </a>
        </div>
    </div>
@endsection

@section("js")
<script>
    hiddenFooter();
    headerStatus = true;
</script>

@endsection