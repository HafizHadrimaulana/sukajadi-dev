@component('mail::message')
Hello!
<br/>
{{ $data->nama }}
<br/>
Terimakasih Pengajuan Permintaan data {{ $data->jenis }} telah disetujui.<br>
Data Bisa dilihat pada lampiran email ini,

<br/>
<br/>

Terimakasih,<br>
Portal Kec Sukajadi, Kota Bandung
@endcomponent