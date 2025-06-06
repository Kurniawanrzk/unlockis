<div>
    <div class="mb-3">
        <input type="text" wire:model="search" class="form-control" placeholder="Cari berdasarkan nama pelanggan atau paket">
    </div>
    <div class="table-responsive text-nowrap">
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
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="mb-0 text-truncate" style="max-width:150px">{{ $pemesanan->pelanggan->nama_lengkap }}</h6>
                                <small>
                                    <a href="https://api.whatsapp.com/send/?phone={{ $pemesanan->pelanggan->no_wa }}&text&type=phone_number">{{ $pemesanan->pelanggan->no_wa }}</a>
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
                        <button class="btn btn-sm btn-primary" wire:click="$emit('showDetail', {{ $pemesanan->id_pemesanan }})">Detail</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $data->links() }}
</div>
