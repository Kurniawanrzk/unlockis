<h1>Pemesanan Baru</h1>
<p>Detail Pemesanan:</p>
<ul>
    <li>Nama: {{ $pemesanan->pelanggan->nama_lengkap }}</li>
    <li>No Whatsapp: {{ $pemesanan->pelanggan->no_wa }}</li>
    <li>Instagram: {{ $pemesanan->pelanggan->instagram }}</li>
    <li>Rekening: {{ $pemesanan->pelanggan->no_rekening }} ({{ $pemesanan->pelanggan->nama_bank }})</li>
    <li>Paket Pilihan: {{ $pemesanan->paket->nama_paket }}</li>
    <li>Jam Booking: {{ $pemesanan->jam_booking }}</li>
    <li>Tanggal Booking: {{ $pemesanan->tanggal_booking }}</li>
    <li>Total Orang Foto: {{ $pemesanan->total_orang_foto }}</li>
    <li>Catatan: {{ $pemesanan->catatan }}</li>
    <li>Total Harga: {{ 'Rp ' . number_format((int) $pemesanan->total_harga, 0, ',', '.') }}</li>
</ul>
