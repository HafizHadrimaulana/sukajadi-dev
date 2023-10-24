@extends('layouts.app')

@section('content')
    <h1>Kegiatan</h1>
    <p>Ini adalah halaman untuk kegiatan.</p>
    
    <!-- Mulai dari sini adalah konten laporan kegiatan -->
    <div class="laporan-section">
        <h2>Laporan Harian Kegiatan - 24 Oktober 2023</h2>
        
        <!-- Laporan Kelurahan Sukawarna -->
        <div class="laporan">
            <h3>Kelurahan Sukawarna</h3>
            <p><strong>Topik:</strong> Jalan protokol yang bebas sampah</p>
            <p><strong>Waktu:</strong> 16:35 - 24 Oktober 2023</p>
            <img src="link_gambar_1.jpg" alt="Petugas Kebersihan">
            <p>Petugas kebersihan terlihat sedang bekerja dengan tekun membersihkan sampah dan daun kering yang berserakan di jalan Surya Sumantri.</p>
        </div>
        
        <!-- Laporan Kecamatan Sukajadi -->
        <div class="laporan">
            <h3>Kecamatan Sukajadi</h3>
            <p><strong>Topik:</strong> Rapat Koordinasi</p>
            <p><strong>Waktu:</strong> 16:24 - 24 Oktober 2023</p>
            <img src="link_gambar_2.jpg" alt="Rapat Koordinasi">
            <p>Rapat koordinasi sedang berlangsung dengan serius di Kecamatan Sukajadi. Dari gambar, tampak beberapa peserta rapat sedang mendiskusikan hal-hal penting yang berkaitan dengan pengembangan kecamatan.</p>
        </div>
    </div>
@endsection
