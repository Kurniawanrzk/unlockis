
@extends('layouts.mainLayout')

@section("css")
<link rel="stylesheet" href="{{asset("assets/css/main.css")}}">
@endsection

@section("content")
<div class="container">
    <div class="hero-section">
        <div class="layer-color">
            
        </div>
        <div id="prev-hero" style="cursor:pointer;position: absolute;top:300px;left:15px;z-index:3">
            <button style="background: none;border:none;"><i style="font-size: 50px;color:white" class="fa fa-arrow-left" aria-hidden="true"></i>
            </button>
        </div>
        <div id="next-hero" style="cursor:pointer;position: absolute;top:300px;right:15px;z-index:3">
            <button style="background: none;border:none;cursor: pointer;"><i style="font-size: 50px;color:white" class="fa fa-arrow-right" aria-hidden="true"></i>
            </button>
        </div>
    </div>
    <div id="services-section" class="services-section">
        <div class="title">
            <h1 align="center">OUR SERVICES</h1>
        </div>

        <div class="list-services">
            @foreach($datas['layanan_foto'] as $lf)
            @php
            $image = App\Models\DetailLayananFoto::where("id_layanan_foto", $lf->id_layanan_foto)->first();
            @endphp
            <a href="{{Route("servis-index", $lf->slug)}}" class="services-route">
            <div class="service" style="background-image: url({{ asset('storage/' . $image->gambar) }})">
                <div class="layer-color">

                </div>
                <span>{{$lf->nama_layanan_foto}}</span>
            </div>
        </a>

            @endforeach

        </div>
    </div>
    <div class="testimoni-section">
        <div class="testimoni-list">
            <div class="testimoni">
                <div class="pelanggan">
                    <img  style="width:150px;height:150px;border-radius:300px;border:2px solid white" src="{{asset("assets/img/testimoni1.png")}}" alt="">
                    
                </div>
                <div class="review" style="color:white;max-width:50%">
                    <h3 class="nama">Adinda Sukma</h3>
                    <h4 class="service-review">Prewedding Photosession</h4>
                    <p class="deskripsi">Hasil fotonya sangat memuaskan! Tim Unlock Studio profesional dan memberikan arahan yang baik selama sesi pemotretan. Studio yang nyaman dan fasilitas lengkap</p>
                </div>
            </div>
            <div class="testimoni">
                <div class="pelanggan">
                    <img  style="width:150px;height:150px;border-radius:300px;border:2px solid white" src="{{asset("assets/img/testimoni2.png")}}" alt="">

                </div>
                <div class="review" style="color:white;max-width:50%">
                    <h3 class="nama">Adinda Sukma</h3>
                    <h4 class="service-review">Prewedding Photosession</h4>
                    <p class="deskripsi">Hasil fotonya sangat memuaskan! Tim Unlock Studio profesional dan memberikan arahan yang baik selama sesi pemotretan. Studio yang nyaman dan fasilitas lengkap</p>
                </div>
            </div>
            <div class="testimoni">
                <div class="pelanggan">
                    <img  style="width:150px;height:150px;border-radius:300px;border:2px solid white" src="{{asset("assets/img/testimoni3.png")}}" alt="">

                </div>
                <div class="review" style="color:white;max-width:50%">
                    <h3 class="nama">Adinda Sukma</h3>
                    <h4 class="service-review">Prewedding Photosession</h4>
                    <p class="deskripsi">Hasil fotonya sangat memuaskan! Tim Unlock Studio profesional dan memberikan arahan yang baik selama sesi pemotretan. Studio yang nyaman dan fasilitas lengkap</p>
                </div>
            </div>
        </div>
    </div>
    <div id="about-section" class="about-section">
        <div class="about">
            <div class="deskripsi-about">
                <h1>About Us</h1>
                <p>Unlock Studio adalah usaha mikro yang bergerak di bidang industri kreatif, khususnya dalam fotografi. Studio ini menawarkan berbagai layanan fotografi, termasuk foto dalam studio, foto outdoor, dan penyewaan studio. Dengan lokasi strategis di Perumahan Bumi Palapa, Kota Malang.</p>
            </div>
            <div class="image-about">
                <img src="{{asset("assets/img/about.png")}}" width="400" height="260" alt="about-image">
            </div>
        </div>
    </div>
  </div>
@endsection

@section("js")
<script>
    let backgroundHero = ["{{asset("assets/img/hero-section.jpg")}}","{{asset("assets/img/hero-section2.jpg")}}","{{asset("assets/img/hero-section1.jpg")}}"];
</script>
<script src="{{asset("assets/js/hero.js")}}"></script>
@endsection