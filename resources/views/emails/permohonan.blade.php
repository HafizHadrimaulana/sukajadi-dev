@component('mail::message')
Hello!
<br/>
{{ $data->nama }}
<br/>
Terimakasih telah melakukan permohonan surat pengantar pembuatan 
@if($data->kategori == 'ktp')
KTP
@elseif($data->kategori == 'kk')
KK
@elseif($data->kategori == 'pindah')
Surat Keterangan Pindah / Masuk
@elseif($data->kategori == 'usaha')
Surat Izin Usaha
@elseif($data->kategori == 'domisili')
Surat Domisili
@endif
 dan telah disetujui.<br>
Data Bisa dilihat pada lampiran email ini,

<br/>
<br/>

Terimakasih,<br>
Portal Kec Sukajadi, Kota Bandung
@endcomponent