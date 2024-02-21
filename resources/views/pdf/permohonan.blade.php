<html>

<head>
    <title>
        Surat Pengantar {{ $title }}</title>

    <link rel="stylesheet" href="/css/bootstrap.css">
</head>

<body>
    <div class="container">
        <table width="100%" style="font-family:'Times New Roman', Times, serif;">
            <tr>
                <td width="100px" class="text-center">
                    <img src="/images/logo.png" width="80pt"/>
                </td>
                <td class="text-center">
                    <h2 class="h4 text-center" style="font-size: 20pt;font-weight:bold;">PEMERINTAH KOTA BANDUNG</h2>
                    <h2 class="h5 text-center" style="font-size: 18pt;font-weight:bold;">KELURAHAN {{ strtoupper($data->nama_j_kelurahan) }} KECAMATAN SUKAJADI</h2>
                </td>
            </tr>
        </table>
        <hr/>
        <h3 class="text-center" style="font-size:16pt;font-weight: bold; margin-top:0px;margin-bottom:0px;text-decoration:underline;font-family:'Times New Roman', Times, serif;">SURAT PENGANTAR</h3>
        <h3 class="text-center" style="font-size:13pt;font-weight: medium; margin-top:0px;font-family:'Times New Roman', Times, serif;">
        NOMOR : {{ $data->nomor }}
        </h3>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <div style="padding:0 30px;font-family:'Times New Roman', Times, serif;">
            <p style="font-size: 12pt; text-indent: 50px;">
                Yang bertanda tangan pada surat ini adalah Lurah {{ $data->nama_j_kelurahan }}, kecamatan Sukajadi Kota Bandung, dengan ini dengan ini menerangkan bahwa:
            </p>
            <table style="width: 100%;font-family:'Times New Roman', Times, serif;">
                <tr>
                    <td>Nama</td>
                    <td>: <b>{{ $data->nama }}</b></td>
                </tr>
                <tr>
                    <td>Tempat / Tanggal Lahir</td>
                    <td>: {{ $data->tmp_lahir }} / {{ \Carbon\Carbon::parse($data->tgl_lahir)->translatedFormat('d F Y') }}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>: {{ $data->jk }}</td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>: {{ $data->pekerjaan }}</td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>: {{ $data->agama }}</td>
                </tr>
                <tr>
                    <td>Status Perkawinan</td>
                    <td>: {{ $data->status_pernikahan }}</td>
                </tr>
                <tr>
                    <td>Kewarganegaraan</td>
                    <td>: {{ $data->kewarganegaraan }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>: {{ $data->alamat }} RT {{ sprintf("%03s", $data->rt) }}, RW {{ sprintf("%03s", $data->rw) }}</td>
                </tr>
            </table>
            <br/>
            <p style="font-size: 12pt; text-indent: 50px;">
                adalah benar-benar warga kelurahan {{ $data->nama_j_kelurahan }} Kecamatan Sukajadi, Kota Bandung. Surat pengantar ini dibuat sebagai
                kelengkapan pengurusan <b>{{ $title }}</b>
            </p>
            <p style="font-size: 12pt; text-indent: 50px;">
                Demikian surat pengantar ini kami buat, untuk dapat dipergunakan sebagaimana mestinya.
            </p>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <table style="width: 100%; text-align:right;float: right;font-family:'Times New Roman', Times, serif;">
                <tr>
                    <td>Kota Bandung, {{ \Carbon\Carbon::parse($data->created_at)->translatedFormat('d F Y') }}</td>
                </tr>
                <tr>
                    <td>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                    </td>
                </tr>
                <tr>
                    <td>{{ $data->lurah }}</td>
                </tr>
            </table>
        </div>
    </div>

</body>

</html>