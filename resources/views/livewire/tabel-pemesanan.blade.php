<div>
    <div>
        <input id="search-pemesanan" value="{{ isset($_GET["q"]) ? $_GET["q"] : ""  }}" type="text" wire:keydown.debounce.300ms="fillSearch($event.target.value)" class="form-control" placeholder="Cari berdasarkan nama pelanggan/paket/tanggal_booking">
    </div>
    <table class="table">
        <thead>
            <tr>
                <th class="text-truncate">Bio</th>
                <th class="text-truncate">Paket</th>
                <th class="text-truncate">Tanggal & Jam Booking</th>
                <th class="text-truncate">Status Pembayaran</th>
                <th class="text-truncate">Aksi</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach($data as $pemesanan)
                                    {{-- Detail Modal --}}
                                    <div class="modal fade" id="modal-pemesanan-{{ $pemesanan->id_pemesanan }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-xl" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Detail Pemesanan</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <ul class="list-unstyled">
                                                                <li><strong>Detail Pelanggan</strong></li>
                                                                <li>Nama Lengkap: {{ $pemesanan->pelanggan->nama_lengkap }}</li>
                                                                <li>No Whatsapp: <a href="https://api.whatsapp.com/send/?phone={{$pemesanan->pelanggan->no_wa}}&text&type=phone_number">{{ $pemesanan->pelanggan->no_wa }}</a></li>
                                                                <li>Instagram: {{ $pemesanan->pelanggan->instagram }}</li>
                                                                <li>Rekening: {{ $pemesanan->pelanggan->no_rekening }} ({{ $pemesanan->pelanggan->nama_bank }})</li>
                                                                <li>No Member: {{ $pemesanan->pelanggan->member_id ?? '-' }}</li>
                                                            </ul>
                                                            <hr>
                                                            
                                                            {{-- Fetching and displaying file_sent, servis_tambahan, background --}}
                                                            @php
                                                              $file_sent = App\Models\PemesananFileSent::where("id_pemesanan", $pemesanan->id_pemesanan)
                                                              ->get()
                                                              ->map(function($d) {
                                                                return App\Models\FileSent::find($d->id_file_sent)->nama_file_sent;
                                                              })->toArray();
                                                            
                                                              $servis_tambahan = App\Models\ServisTambahanPemesanan::where("id_pemesanan", $pemesanan->id_pemesanan)
                                                              ->get()
                                                              ->map(function($d) {
                                                                return App\Models\ServisTambahan::find($d->id_servis)->nama_servis;
                                                              })->toArray();
                                                            
                                                              $background = App\Models\PemesananBackground::where("id_pemesanan", $pemesanan->id_pemesanan)
                                                              ->get()
                                                              ->map(function($d) {
                                                                return App\Models\Background::find($d->id_background)->nama_background;
                                                              })->toArray();
                                                            @endphp
            
                                                            <ul class="list-unstyled">
                                                                <li><strong>Detail Pemesanan</strong></li>
                                                                <li>Paket Pilihan: {{ $pemesanan->paket->nama_paket }}</li>
                                                                <li>Tipe File Sent :</li>
                                                                <ul>
                                                                    @foreach($file_sent as $fs)
                                                                        <li>{{ $fs }}</li>
                                                                    @endforeach
                                                                </ul>
                                                                <li>Servis Tambahan :</li>
                                                                <ul>
                                                                    @foreach($servis_tambahan as $st)
                                                                        <li>{{ $st }}</li>
                                                                    @endforeach
                                                                </ul>
                                                                <li>Background : {{ implode(", ", $background) }}</li>
                                                                <li>Jam Booking: {{ $pemesanan->jam_booking }}</li>
                                                                <li>Tanggal Booking: {{ $pemesanan->tanggal_booking }}</li>
                                                                <li>Fotografer: {{ App\Models\User::where('id_user',$pemesanan->id_photographer)->count() ? App\Models\User::where('id_user',$pemesanan->id_photographer)->first()->nama : "Tidak Ada"}}</li>
                                                              </ul>
                                                          
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                  <a href="{{Route("invoice-index", App\Models\Invoice::where("id_pemesanan", $pemesanan->id_pemesanan)->first()->uuid)}}" class="btn btn-sm btn-primary">View Invoice</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
            
                                    {{-- Edit Modal --}}
                                    <div class="modal fade" id="modal-pemesanan-edit-{{ $pemesanan->id_pemesanan }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Pemesanan</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row gap-2">
                                                        <a href="{{ Route('pemesanan-edit-index', $pemesanan->id_pemesanan) }}" class="btn btn-primary">Edit Pemesanan</a>
                                                        <a href="{{ Route('pemesanan-bg-edit-index', $pemesanan->id_pemesanan) }}" class="btn btn-primary">Edit Background Pilihan</a>
                                                        <a href="{{ Route('pemesanan-servis-edit-index', $pemesanan->id_pemesanan) }}" class="btn btn-primary">Edit Servis Tambahan</a>
                                                        <a href="{{ Route('pemesanan-Fs-edit-index', $pemesanan->id_pemesanan) }}" class="btn btn-primary">Edit Tipe File Sent</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                {{-- Table Row --}}
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="mb-0 text-truncate" style="max-width:150px">{{ $pemesanan->pelanggan->nama_lengkap }}</h6>
                                <small>
                                    <a href="https://api.whatsapp.com/send/?phone={{ $pemesanan->pelanggan->no_wa }}&text&type=phone_number">
                                        {{ $pemesanan->pelanggan->no_wa }}
                                    </a>
                                </small>
                            </div>
                        </div>
                    </td>
                    <td class="text-truncate">{{ $pemesanan->paket->nama_paket }}</td>
                    <td class="text-truncate">{{ $pemesanan->tanggal_booking }} <br>{{ $pemesanan->jam_booking }}</td>
                    <td>
                        <span class='badge rounded-pill bg-label-{{ $pemesanan->status_pembayaran == "Belum DP" ? "danger" : ($pemesanan->status_pembayaran == "DP" ? "warning" : "success") }}'>
                            {{ $pemesanan->status_pembayaran }}
                        </span>
                    </td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="mdi mdi-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu">
                                <button data-bs-toggle="modal" class="dropdown-item" data-bs-target="#modal-pemesanan-{{ $pemesanan->id_pemesanan }}">
                                    <i class="mdi mdi-details me-2"></i> Detail
                                </button>
                                <button data-bs-toggle="modal" class="dropdown-item" data-bs-target="#modal-pemesanan-edit-{{ $pemesanan->id_pemesanan }}">
                                    <i class="mdi mdi-pencil-outline me-2"></i> Edit
                                </button>
                                <a href="{{ Route('hapus-pemesanan', $pemesanan->id_pemesanan) }}">
                                    <button class="dropdown-item">
                                        <i class="mdi mdi-delete-outline me-2"></i> Hapus
                                    </button>
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    {{-- Pagination Links --}}
    <div class="d-flex justify-content-end">
        {{ $data->links() }}
    </div>
</div>
