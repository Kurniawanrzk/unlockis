
@extends('layouts.mainLayout')

@section("css")
<link rel="stylesheet" href="{{asset("assets/css/servis.css")}}">
@endsection

@section("content")
    <div class="section-detail-layanan">
        <div class="detail-layanan">
            <div class="gambar-layanan">
                @php
                    $image = App\Models\DetailLayananFoto::where("id_layanan_foto", $datas['layanan_foto']->id_layanan_foto)->get();
                @endphp
                <div class="gambar-utama">
                   @foreach($image as $i)
                   <div id="gambar-utama" style="background-image:url({{asset('storage/' . $i->gambar)}})">

                   </div>
                   @break
                   @endforeach
                </div>
                <div class="gambar">
                    @foreach($image as $i)
                    <div onclick="gantiGambarUtama(this)" src-image='{{asset('storage/' . $i->gambar)}}' style="background-image:url({{asset('storage/' . $i->gambar)}})">
                        
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="detail">
                <h1 style="color:#2C4257">{{ $datas['layanan_foto']->nama_layanan_foto }}</h1>
                <p >{{$datas['layanan_foto']->deskripsi}}</p>
                <br>
                <p>Durasi Paket:</p>
                @php
                $paket = App\Models\Paket::where("id_layanan_foto", $datas['layanan_foto']->id_layanan_foto)->get();
                @endphp

                @foreach($paket as $p)
                <p>{{$p->nama_paket}} : {{ $p->durasi_pemotretan }} menit</p>
                @endforeach
            </div>
        </div>
    </div>
    <div class="section-paket-layanan" style="padding-bottom: 40px">
        <div class="paket-layanan-list">
          
          
            @foreach($paket as $p)
            <div class="paket" style="color:#2C4257">
                <a class="paket-url" href="{{Route("form-pemesanan-index", [ "slug" => $datas['layanan_foto']->slug])}}?nama_paket={{urlencode($p->nama_paket)}}" style="">
                
                </a>    
                <h5 style="padding: 5px;padding-bottom:10px" align='center'>{{ $p->nama_paket }}</h5>
                <center>
                    @foreach($image as $i)
                        <img src="{{asset("storage/".$i->gambar)}}" alt="">
                        @break
                    @endforeach
                </center>
                <div style="padding-left:25px;display:flex;justify-content:space-around;align-items:center;gap:20px;margin-top:30px">
                    @php
                                        $array_keypoints = explode(",",$p->deskripsi);
                    $half = ceil(count($array_keypoints) / 2); // Hitung setengah jumlah array
                    $leftColumn = array_slice($array_keypoints, 0, $half); // Ambil bagian kiri
                    $rightColumn = array_slice($array_keypoints, $half); // Ambil bagian kanan
                 @endphp
                      <!-- Kolom Kiri -->
                    <ul style="font-size:10px; font-weight:bold; flex: 1; margin-right: 10px;">
                        @foreach($leftColumn as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>

                    <!-- Kolom Kanan -->
                    <ul style="font-size:10px; font-weight:bold; flex: 1; margin-left: 10px;">
                        @foreach($rightColumn as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>

                <div style="cursor: pointer;margin-top:30px;display:grid;justify-content:center">
                    <button type="button" style="background-color:#2C4257;border:none;color:white;padding:5px;border-radius:3px;cursor: pointer;font-size:15px">{{ 'Rp ' . number_format((int)$p->harga, 0, ',', '.')}}</button>
                </div>
            </div>            
            @endforeach
          
            
        </div>
    </div>
@endsection

@section("js")
<script>
    headerStatus = true;
</script>
<script>
    const gambarUtama = document.getElementById("gambar-utama");

    function gantiGambarUtama(id) {
        var s = id.getAttribute('src-image');
        gambarUtama.style.backgroundImage = `url('${s}')`
        console.log(gambarUtama.style.background)
    }
</script>
@endsection