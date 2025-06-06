<footer id="footer">
    <div
    class="content-footer">
        <div class="logo">
            <img 
            style="width:50px"
            src="{{asset("assets/img/logo-unlock.png")}}" alt="Logo Unlockis">
        </div>
        <div class="alamat-footer">
            <h5 align="center">Alamat</h5>
            <div style="max-width:100%;overflow:hidden;color:red;width:200px;height:120px;margin-top:3px"><div id="canvas-for-googlemap" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=Unlock+Studio+Malang&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe></div><a class="googl-ehtml" rel="nofollow" href="https://www.bootstrapskins.com/themes" id="enable-map-data">premium bootstrap themes</a><style>#canvas-for-googlemap img.text-marker{max-width:none!important;background:none!important;}img{max-width:none}</style></div>        </div>
        <div 
        class="service-footer">
        <h5 align="center">Service</h5>
        <div
        style=""  
        >
            @php
                $iteration_layanan = 0;
                $layanan = App\Models\LayananFoto::all();
                $count_layanan = count($layanan);
            @endphp
           <div style="display: grid;">
            @for ($i = 0; $i < $count_layanan; $i++)
            <a 
            style="color:black"
            href="{{Route("servis-index", $layanan[$i]->slug)}}">{{$layanan[$i]->nama_layanan_foto}}</a>
            @php
                $iteration_layanan++;
                if($count_layanan / $iteration_layanan == 2) {
                    break;
                }
            @endphp
            @endfor
           </div>
           <div style="display: grid">
            @for ($i = $iteration_layanan; $i < $count_layanan; $i++)
            <a 
            style="color:black"
            href="{{Route("servis-index", $layanan[$i]->slug)}}">{{$layanan[$i]->nama_layanan_foto}}</a>            @endfor
           </div>
        </div>
        </div>
        <div class="contect-footer">
            <h5 align="center">Contact Us</h5>
            <p>@Unlockstudiomlg</p>
        </div>
    </div>
</footer>