@extends('layouts.app')

@section('content')
<style>
    .laporan-harian-container {
        padding: 20px;
        background-color: #f7f7f7;
    }
    .laporan-tanggal {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 20px;
    }
    .laporan-box {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }
    .laporan-title {
        font-size: 18px;
        font-weight: bold;
        color: #2c3e50;
        margin-bottom: 15px;
    }
    .dropdown-container {
        margin-bottom: 20px;
    }
    .dropdown-label {
        font-weight: bold;
        display: block;
        margin-bottom: 10px;
    }
    .search-container {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }
    .search-input {
        margin-right: 10px;
    }
    .wa-link {
        margin-left: 10px;
        color: green;
        text-decoration: none;
    }
    .wa-link:hover {
        text-decoration: underline;
    }
    .footer-laporan {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 15px;
    }
    .footer-laporan span {
        font-weight: bold;
    }
    .footer-laporan img {
        width: 30px;
        cursor: pointer;
    }
        .header-laporan span {
        font-weight: bold;
    }
    .header-laporan img {
        width: 30px;
        cursor: pointer;
    }
</style>
<div class="laporan-harian-container">
    
    <div class="search-container">
        <input type="date" class="search-input">
        <button type="button" onclick="searchDate()">Pencarian Tanggal</button>
        <a href="https://wa.me/08888680667" class="wa-link" target="_blank">Hubungi via WA</a>
    </div>

    <div class="dropdown-container">
        <label class="dropdown-label" for="laporanDropdown2">Laporan Harian</label>
        <select class="form-control" id="laporanDropdown2">
            <option>Pilih</option>
            <option>Semua</option>
            <option>Kecamatan Sukajadi</option>
            <option>Kelurahan Pasteur</option>
            <option>Kelurahan Cipedes</option>
            <option>Kelurahan Sukawarna</option>
        </select>
    </div>
    <div class="laporan-box">
        <!-- Tanggal dan Logo WA -->
        <div class="header-laporan">
            <span>TANGGAL_ANDA_DISINI</span>
            <a href="https://wa.me/08888680667" target="_blank">
                <img src="PATH_TO_YOUR_WA_LOGO" alt="WhatsApp Logo">
            </a>
        </div>
    <div class="laporan-box">
        <div class="laporan-title">Kecamatan Sukajadi</div>
        <img src="URL_GAMBAR_ANDA" alt="Gambar Kegiatan" class="laporan-image">
        <p>Assalamualaikum warahmatullahi wabarakatuh</p>
        <p>Kepada Yth. Bapak Camat Sukajadi</p>
        <p>Izin melaporkan,</p>
        <p>Giat OPS. Yustisi gakplin serta woro woro Sosialisasi PPKM dan pembagian masker yang bertempat di jalan Sukagalih tanggal 13-09-2021</p>
        <p>Dihadiri oleh :</p>
        <ol>
            <li>Jajaran POLSEK SUKAJADI</li>
            <li>Bapak Kasie. Trantib</li>
            <li>Bapak Lurah Cipedes beserta jajaran ASN Kelurahan Cipedes</li>
            <li>SATGAS LINMAS Kecamatan Sukajadi dan SATLINMAS Kelurahan Cipedes</li>
        </ol>
        <p>Dengan teguran lisan 10</p>
        <p>Pembagian masker 30</p>
    </div>
    <div class="laporan-box">
        <div class="laporan-title">Kecamatan Sukajadi</div>
        <img src="URL_GAMBAR_ANDA" alt="Gambar Kegiatan" class="laporan-image">
        <p>Assalamualaikum warahmatullahi wabarakatuh</p>
        <p>Kepada Yth. Bapak Camat Sukajadi</p>
        <p>Izin melaporkan,</p>
        <p>Giat OPS. Yustisi gakplin serta woro woro Sosialisasi PPKM dan pembagian masker yang bertempat di jalan Sukagalih tanggal 13-09-2021</p>
        <p>Dihadiri oleh :</p>
        <ol>
            <li>Jajaran POLSEK SUKAJADI</li>
            <li>Bapak Kasie. Trantib</li>
            <li>Bapak Lurah Cipedes beserta jajaran ASN Kelurahan Cipedes</li>
            <li>SATGAS LINMAS Kecamatan Sukajadi dan SATLINMAS Kelurahan Cipedes</li>
        </ol>
        <p>Dengan teguran lisan 10</p>
        <p>Pembagian masker 30</p>
    </div>
    
    <div class="laporan-box">
        <div class="laporan-title">Kecamatan Sukajadi</div>
        <img src="URL_GAMBAR_ANDA" alt="Gambar Kegiatan" class="laporan-image">
        <p>Assalamualaikum warahmatullahi wabarakatuh</p>
        <p>Kepada Yth. Bapak Camat Sukajadi</p>
        <p>Izin melaporkan,</p>
        <p>Giat OPS. Yustisi gakplin serta woro woro Sosialisasi PPKM dan pembagian masker yang bertempat di jalan Sukagalih tanggal 13-09-2021</p>
        <p>Dihadiri oleh :</p>
        <ol>
            <li>Jajaran POLSEK SUKAJADI</li>
            <li>Bapak Kasie. Trantib</li>
            <li>Bapak Lurah Cipedes beserta jajaran ASN Kelurahan Cipedes</li>
            <li>SATGAS LINMAS Kecamatan Sukajadi dan SATLINMAS Kelurahan Cipedes</li>
        </ol>
        <p>Dengan teguran lisan 10</p>
        <p>Pembagian masker 30</p>
    </div>
    <script>
        function searchDate() {
        let date = document.querySelector('.search-input').value;
        if (!date) {
        alert('Pilih tanggal terlebih dahulu!');
        return;
        }
        console.log(date); // Hanya untuk contoh. Anda bisa mengganti logika ini dengan fungsi pencarian yang sesungguhnya.
        }
    </script>
</div>
@endsection
