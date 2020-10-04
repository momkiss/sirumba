<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Kelengkapan Berkas {{ $permohonan->nama_lengkap_pengembang }}</title>
    <style>
        @font-face {
            font-family: 'customFont';
            font-style: normal;
            font-weight: normal;
            src: url('fonts/ArialUnicodeMS.ttf') format('truetype');
        }
        body {
            /* font-family: Arial, Helvetica, sans-serif; */
            font-family: "customFont";
        }
    
        table {
            border-collapse: collapse;
            font-size: 12px;
        }
    </style>
</head>
<body>
   
<table width="100%" border="0" cellspacing="5" cellpadding="5" style="table-layout:fixed;">
    <tbody>
        <tr>
            <td colspan="3" style="text-align: center">
                <h2>KELENGKAPAN BERKAS</h2>
            </td>
        </tr>
        <tr>
            <td width="23%">Nama Perusahaan</td>
            <td width="1%">:</td>
            <td width="76%">@if($permohonan->pengembang()->exists())
                        {{ $perusahaan = $permohonan->pengembang->nama_perusahaan ?? "-" }}
                @else
                   {{  $perusahaan = "-" }}
            @endif</td>
        </tr>
        <tr>
            <td>Klasifikasi Bangunan</td>
            <td>:</td>
            <td>-</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
        <td>{{  $permohonan->alamat_jalan_perumahan.' - '.$permohonan->kelurahan_perumahan->nama ?? "".' - '.$permohonan->kecamatan_perumahan->nama ?? "" }}</td>
        </tr>
        <tr>
            <td>No. Telp.</td>
            <td>:</td>
            <td>{{ $permohonan->telp }}</td>
        </tr>
        <tr>
            <td>No. Disposisi / No. Berkas</td>
            <td>:</td>
            <td>-</td>
        </tr>
    </tbody>
</table>
<br>
<table width="100%" border="1" cellspacing="5" cellpadding="5" >
    <tbody>
        <tr style="text-align: center; background-color: #b2b2b2">
            <td><strong>NO.</strong></td>
            <td><strong>BERKAS</strong></td>
            <td><strong>ADA </strong></td>
            <td><strong>TIDAK ADA</strong></td>
            <td><strong>KETERANGAN</strong></td>
        </tr>

        @if (isset($permohonan))
        @if (count($permohonan->berkas) > 0)

        @php
        $no = 1
        @endphp
        @foreach ($permohonan->berkas as $berkas)

        <tr>
            <td align="center">{{ $no++ }}</td>
            <td>

                <label>{{ $berkas->nama }}</label>
            </td>
            <td style="text-align: center;">
                @if ($berkas->tersedia === "Ada")
                &#x2714;
                @endif
            </td>
            <td style="text-align: center; ">
                @if ($berkas->tersedia === "Tidak")
                &#x2714;
                @endif
            </td>

          
            <td>&nbsp;</td>
        </tr>

        @endforeach

        @else
        <td colspan="6">Berkas tidak ada</td>
        @endif
        @else
        <td colspan="6">
            <center><strong style="font-size:16px">BERKAS TIDAK ADA</strong></center>
        </td>
        @endif


    </tbody>
</table>
<br>
<table width="100%" border="0" cellspacing="5" cellpadding="3">
    <tbody>
        <tr>
            <td width="9%">Keterangan</td>
            <td width="2%">:</td>
            <td width="89%">&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>* </td>
            <td>Menyediakan lokasi pemakaman yang terpisah dari lokasi perumahan MBR seluas 2% dari luas lahan perumahan
                MBR yang direncanakan atau menyediakan dana untuk lahan pemakaman pada lokasi yang ditetapkan oleh
                Pemerintah Daerah sebesar 2% dari nilai perolehan lahan perumahan MBR yang direncanakan.</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>** </td>
            <td>Skala menyesuaikan agar gambar dan notasi terlihat jelas.</td>
        </tr>
    </tbody>
</table>
<p>&nbsp;</p> 
</body>
</html>
