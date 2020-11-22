<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>{{ $permohonan->nama_lengkap_pengembang }}</title>
    <style>
        @font-face {
            font-family: 'customFont';
            font-style: normal;
            font-weight: normal;
            src: url('fonts/ArialUnicodeMS.ttf') format('truetype');
        }

        body {
            /* font-family: Arial, Helvetica, sans-serif; */
            /* font-family: "customFont"; */
            /* font-size: 14px; */
        }

        table {
            border-collapse: collapse;
            font-size: 13px;
        }

        .sub {
            font-size: 11px !important;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>

    <table width="100%" border="0" cellspacing="3" cellpadding="5" style="border-collapse: collapse; table-layout:fixed;">
        <tbody>
            <tr style="text-align: center">
                <td colspan="4">
                    <h2>PERMOHONAN PENGEMBANG PERUMAHAN</h2>
                    <hr style="margin: 0 !important">
                </td>
            </tr>
            <tr>
                <td colspan="4" align="right"><em style="font-size: 9px !important">Tanggal permohonan : {{ $permohonan->tanggal_surat_permohonan->format('d M Y') }}</em>
                </td>
            </tr>
            <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
            <tr>
                <td style="width: 5%;" align="right"><strong>1.</strong></td>
                <td style="width: 40%;"><strong>TAHUN</strong></td>
                <td style="width: 3%;">:</td>
                <td style="width: 52%;">{{ $permohonan->tahun  }}</td>
            </tr>
            <tr>
                <td align="right"><strong>2.</strong></td>
                <td><strong>NAMA PERUMAHAN</strong></td>
                <td>:</td>
                <td>{{ $permohonan->nama_perumahan  }}</td>
            </tr>
            <tr>
                <td align="right"><strong>3.</strong></td>
                <td><strong>ALAMAT PERUMAHAN</strong></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td>- Kecamatan</td>
                <td>:</td>
                <td>{{ $permohonan->kecamatan_perumahan->nama ?? ""  }}</td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td>- Kelurahan</td>
                <td>:</td>
                <td>{{ $permohonan->kelurahan_perumahan->nama ?? ""  }}</td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td>- RT/RW</td>
                <td>:</td>
                <td>{{ $permohonan->alamat_rt_perumahan }}</td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td>- Jalan</td>
                <td>:</td>
                <td>{{ $permohonan->alamat_jalan_perumahan }}</td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td>- Kode Pos</td>
                <td>:</td>
                <td>{{ $permohonan->alamat_kodepos_perumahan }}</td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td align="right"><strong>4.</strong></td>
                <td><strong>PENGEMBANG</strong></td>
                <td>:</td>
                <td>{{ $permohonan->pengembang->nama_perusahaan ?? "" }}</td>
            </tr>
            <tr>
                <td align="right"><strong>5.</strong></td>
                <td><strong>NAMA PEMOHON</strong></td>
                <td>:</td>
                <td>{{ $permohonan->nama_lengkap_pengembang }}</td>
            </tr>
            <tr>
                <td align="right"><strong>6.</strong></td>
                <td><strong>ALAMAT</strong></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td>- Kecamatan</td>
                <td>:</td>
                <td>{{ $permohonan->kecamatan_pengembang->nama ?? "" }}</td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td>- Kelurahan / Desa</td>
                <td>:</td>
                <td>{{ $permohonan->kelurahan_pengembang->nama ?? "" }}</td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td>- RT/RW</td>
                <td>:</td>
                <td>{{ $permohonan->alamat_rt_pengembang }}</td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td>- Jalan</td>
                <td>:</td>
                <td>{{ $permohonan->alamat_jalan_pengembang }}</td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td>- Kode Pos</td>
                <td>:</td>
                <td>{{ $permohonan->alamat_kodepos_pengembang }}</td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td align="right"><strong>7.</strong></td>
                <td><strong>LUAS LAHAN</strong></td>
                <td>:</td>
                <td>{{ $permohonan->luas_lahan }} m2</td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td>- Luas Kavling</td>
                <td>:</td>
                <td>{{ $permohonan->luas_kavling }} m2</td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td>- Luas Prasarana</td>
                <td>:</td>
                <td>{{ $permohonan->luas_prasarana }} m2</td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td>- Luas Sarana</td>
                <td>:</td>
                <td>{{ $permohonan->luas_sarana }} m2</td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td>- Luas RTH </td>
                <td>:</td>
                <td>{{ $permohonan->luas_rth }} m2</td>
            </tr>
           
            <div style="page-break-before: always !important"></div>
            <tr>
                <td align="center">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td align="right"><strong>8.</strong></td>
                <td colspan="3"><strong>JUMLAH UNIT</strong></td>
            </tr>
            @foreach ($permohonan->jumlah as $jumlah)
                @if ($jumlah->luas != NULL && $jumlah->jumlah != NULL)
                    <tr>
                        <td align="center">&nbsp;</td>
                        <td>- Tipe {{ $jumlah->tipe }}/{{ $jumlah->luas }}</td>
                        <td>:</td>
                        <td>{{ $jumlah->jumlah }} unit</td>
                    </tr>
                @endif
            @endforeach
            <div class="page-break"></div>
            <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
            <tr>
                <td align="right"><strong>9.</strong></td>
                <td><strong>PRASARANA</strong></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td><strong>JALAN</strong></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td colspan="3"><strong>- JALAN MASUK</strong></td>
            </tr>

            <tr>
                <td align="center">&nbsp;</td>
                <td colspan="3">
                    <table width="100%" border="0" cellspacing="3" cellpadding="2" style="border-collapse: collapse;">
                        <tbody>
                            @php
                            $num_jalan_masuk = 1
                            @endphp
                            @foreach ($permohonan->jalanmasuk as $jalanmasuk)
                            <tr>
                                <td width="2%" scope="col">{{ $num_jalan_masuk++ }}.</td>
                                <td width="13%" scope="col">Panjang :</td>
                                <td width="15%" scope="col">{{ $jalanmasuk->panjang ?? "-" }}</td>
                                <td width="10%" scope="col">Lebar :</td>
                                <td width="15%" scope="col">{{ $jalanmasuk->lebar ?? "-" }}</td>
                                <td width="16%" scope="col">Keterangan :</td>
                                <td width="66%" scope="col">{{ $jalanmasuk->keterangan ?? "-" }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </td>
            </tr>

            <tr>
                <td></td>
                <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td colspan="3"><strong>- JALAN UTAMA</strong></td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td colspan="3">
                    <table width="100%" border="0" cellspacing="3" cellpadding="0" style="border-collapse: collapse; table-layout:fixed;">
                        <tbody>
                            @php
                            $num_jalan_utama = 1
                            @endphp
                            @foreach ($permohonan->jalanutama as $jalanutama)
                            <tr>
                                <td valign="top" width="1%" scope="col">{{ $num_jalan_utama++ }}.</td>
                                <td valign="top" width="5%" scope="col">Panjang :</td>
                                <td valign="top" width="4%" scope="col">{{ $jalanutama->panjang ?? "-" }}</td>
                                <td valign="top" width="4%" scope="col">Lebar :</td>
                                <td valign="top" width="2%" scope="col">{{ $jalanutama->lebar ?? "-" }}</td>
                                <td valign="top" width="5%" scope="col">Median :</td>
                                <td valign="top" width="4%" scope="col">{{ $jalanutama->median ?? "-" }}</td>
                                <td valign="top" width="7%" scope="col">Jenis konstruksi :</td>
                                <td valign="top" width="8%" scope="col">{{ $jalanutama->konstruksi->nama ?? "-" }}</td>
                                <td valign="top" width="7%" scope="col">Keterangan :</td>
                                <td valign="top" width="8%">{{ $jalanutama->keterangan ?? "-" }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </td>
            </tr>

<tr>
                <td align="center">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td colspan="3"><strong>- JALAN PEMBAGI</strong></td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td colspan="3">
                    <table width="100%" border="0" cellspacing="3" cellpadding="2" style="border-collapse: collapse">
                        <tbody>
                            @php
                            $num_jalan_pembagi = 1
                            @endphp
                            @foreach ($permohonan->jalanpembagi as $jalanpembagi)
                            <tr>
                                <td width="2%" scope="col">{{ $num_jalan_pembagi++ }}.</td>
                                <td width="13%" scope="col">Panjang :</td>
                                <td width="13%" scope="col">{{ $jalanpembagi->panjang ?? "-" }}</td>
                                <td width="10%" scope="col">Lebar :</td>
                                <td width="15%" scope="col">{{ $jalanpembagi->lebar ?? "-" }}</td>
                                <td width="16%" scope="col">Keterangan :</td>
                                <td width="66%" scope="col">{{ $jalanpembagi->keterangan ?? "-" }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td colspan="3"><strong>- JALAN PEMBANTU</strong></td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td colspan="3">
                    <table width="100%" border="0" cellspacing="3" cellpadding="2" style="border-collapse: collapse;">
                        <tbody>
                            @php
                            $num_jalan_pembantu = 1
                            @endphp
                            @foreach ($permohonan->jalanpembantu as $jalanpembantu)
                            <tr>
                                <td width="2% " scope="col">{{ $num_jalan_pembantu++ }}.</td>
                                <td width="13%" scope="col">Panjang :</td>
                                <td width="15%" scope="col">{{ $jalanmasuk->panjang ?? "-" }}</td>
                                <td width="10%" scope="col">Lebar :</td>
                                <td width="15%" scope="col">{{ $jalanpembantu->lebar ?? "-" }}</td>
                                <td width="16%" scope="col">Keterangan :</td>
                                <td width="66%" scope="col">{{ $jalanpembantu->keterangan ?? "-" }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </td>
            </tr>


            {{-- <tr>
                <td align="center">&nbsp;</td>
                <td colspan="3"><strong>RUANG UNTUK BERPUTAR (CULDESAC)</strong></td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td colspan="3">
                    <table width="100%" border="0" cellspacing="3" cellpadding="2" style="border-collapse: collapse">
                        <tbody>
                            @php
                            $num_culdesac = 1
                            @endphp
                            @foreach ($permohonan->culdesac as $culdesac)
                            <tr>
                                <td width="2% " scope="col">{{ $num_culdesac++ }}.</td>
                                <td width="13%" scope="col">Panjang :</td>
                                <td width="13%" scope="col">{{ $culdesac->panjang ?? "-" }}</td>
                                <td width="10%" scope="col">Lebar :</td>
                                <td width="15%" scope="col">{{ $culdesac->lebar ?? "-" }}</td>
                                <td width="16%" scope="col">Keterangan :</td>
                                <td width="66%" scope="col">{{ $culdesac->keterangan ?? "-" }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </td>
            </tr> --}}

            {{--  <tr>
                <td align="center">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td colspan="3"><strong>SALURAN PEMBUANGAN AIR HUJAN (DRAINASE)</strong></td>

            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td colspan="3">
                    <table width="100%" border="0" cellspacing="3" cellpadding="2" style="border-collapse: collapse">
                        <tbody>
                            @php
                            $num_drainase = 1
                            @endphp
                            @foreach ($permohonan->drainase as $drainase)
                            <tr>
                                <td width="1%" scope="col">{{ $num_drainase++ }}.</td>
                                <td width="6%" scope="col">Panjang :</td>
                                <td width="5%" scope="col">{{ $drainase->panjang ?? "-" }}</td>
                                <td width="5%" scope="col">Lebar :</td>
                                <td width="5%" scope="col">{{ $drainase->panjang ?? "-" }}</td>
                                <td width="9%" scope="col">Jenis konstruksi :</td>
                                <td width="10%" scope="col">{{ $drainase->konstruksi->nama ?? "-" }}</td>
                                <td width="7%" scope="col">Keterangan :</td>
                                <td width="10%" scope="col">{{ $drainase->keterangan ?? "-" }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </td>
            </tr>  --}}

            <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td colspan="3"><strong>SALURAN PEMBUANGAN AIR LIMBAH</strong></td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td colspan="3">
                    <table width="100%" border="0" cellspacing="3" cellpadding="2" style="border-collapse: collapse">
                        <tbody>
                            @php
                            $num_limbah = 1
                            @endphp
                            @foreach ($permohonan->limbah as $limbah)
                            <tr>
                                <td width="1%" scope="col">{{ $num_limbah++ }}.</td>
                                <td width="6%" scope="col">Panjang :</td>
                                <td width="5%"  scope="col">{{ $limbah->panjang ?? "-" }}</td>
                                <td width="5%" scope="col">Lebar :</td>
                                <td width="5%" scope="col">{{ $limbah->panjang ?? "-" }}</td>
                                <td width="9%"  scope="col">Jenis konstruksi :</td>
                                <td width="10%" scope="col">{{ $limbah->konstruksi->nama ?? "-" }}</td>
                                <td width="7%" scope="col">Keterangan :</td>
                                <td width="10%" scope="col">{{ $limbah->keterangan ?? "-" }}</td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </td>
            </tr>

            <tr>
                <td align="center">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td colspan="3"><strong>TEMPAT PEMBUANGAN SAMPAH</strong></td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td colspan="3">
                    <table class="sub" width="100%" border="0" cellspacing="3" cellpadding="2" style="border-collapse: collapse">
                        <tbody>
                            @php
                            $num_sampah = 1
                            @endphp
                            @foreach ($permohonan->sampah as $sampah)
                            <tr>
                                <td valign="top" width="1%" scope="col">{{ $num_sampah++ }}.</td>
                                <td valign="top" width="13%" scope="col">Panjang : {{ $sampah->panjang ?? "-" }}</td>
                                <td valign="top" width="11%" scope="col">Lebar : {{ $sampah->lebar ?? "-" }}</td>
                                <td valign="top" width="13%" scope="col">Tinggi : {{ $sampah->tinggi ?? "-" }}</td>
                                <td valign="top" width="15%" scope="col">Jenis konstruksi: {{ $sampah->jeniskonstruksi->nama ?? "-" }}</td>
                                <td valign="top" width="10%" scope="col">Terpilah : {{ $sampah->terpilah ?? "-" }}</td>
                                <td valign="top" width="17%" scope="col">Radius: {{ $sampah->jarak_rumah_terdekat ?? "-" }}</td>
                                <td valign="top" width="15%" scope="col">Keterangan : {{ $sampah->keterangan ?? "-" }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td align="right"><strong>10.</strong></td>
                <td><strong>SARANA</strong></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
             <tr>
                <td align="center">&nbsp;</td>
                <td colspan="3"><strong>- RUANG TERBUKA HIJAU</strong></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="3"> Jenis : {{ $permohonan->rth->jenis ?? "-" }}
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="3"> Ukuran Bangunan : {{ $permohonan->rth->jeniskonstruksi->ukuran ?? "-" }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="3"> Luas Lahan : {{ $permohonan->rth->luas_lahan ?? "-" }} </td>
            </tr>
            <div style="page-break-before: always !important"></div>
            <tr>
                <td align="center">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td colspan="3"><strong>- PERIBADATAN</strong></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="3"> Jenis : {{ $permohonan->peribadatan->jenis ?? "-" }}
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="3"> Ukuran Bangunan : {{ $permohonan->peribadatan->ukuran ?? "-" }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="3"> Luas Lahan : {{ $permohonan->peribadatan->luas_lahan ?? "-" }} </td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>

            <tr>
                <td align="center">&nbsp;</td>
                <td colspan="3"><strong>- REKREASI DAN OLAHRAGA</strong></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="3"> Jenis : {{ $permohonan->rekreasi->jenis ?? "-" }}
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="3"> Ukuran Bangunan : {{ $permohonan->rekreasi->ukuran ?? "-" }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="3"> Luas Lahan : {{ $permohonan->rekreasi->luas_lahan ?? "-" }} </td>
            </tr>
>
            <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td colspan="3"><strong>- PENDIDIKAN</strong></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="3"> Jenis : {{ $permohonan->pendidikan->jenis ?? "-" }}
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="3"> Ukuran Bangunan : {{ $permohonan->pendidikan->ukuran ?? "-" }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="3"> Luas Lahan : {{ $permohonan->pendidikan->luas_lahan ?? "-" }} </td>
            </tr>
            
            <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td colspan="3"><strong>- KESEHATAN</strong></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="3"> Jenis : {{ $permohonan->kesehatan->jenis ?? "-" }}
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="3"> Ukuran Bangunan : {{ $permohonan->kesehatan->ukuran ?? "-" }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="3"> Luas Lahan : {{ $permohonan->kesehatan->luas_lahan ?? "-" }} </td>
            </tr>
            
            <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                    <td colspan="3"><strong>- PERNIAGAAN</strong></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="3"> Jenis : {{ $permohonan->perniagaan->jenis?? "-" }}
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="3"> Ukuran Bangunan : {{ $permohonan->perniagaan->ukuran ?? "-" }}</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="3"> Luas Lahan : {{ $permohonan->perniagaan->luas_lahan ?? "-" }} </td>
                </tr>
                
                <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td colspan="3"><strong>- PELAYANAN UMUM DAN PEMERINTAHAN</strong></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="3"> Jenis : {{ $permohonan->pelayananumum->jenis ?? "-" }}
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="3"> Ukuran Bangunan : {{ $permohonan->pelayananumum->ukuran ?? "-" }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="3"> Luas Lahan : {{ $permohonan->pelayananumum->luas_lahan ?? "-" }} </td>
            </tr>
            <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td colspan="3"><strong>- PARKIR</strong></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="3"> Jenis : {{ $permohonan->parkir->jenis ?? "-" }}
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="3"> Luas Bangunan : {{ $permohonan->parkir->ukuran ?? "-" }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="3"> Luas Lahan : {{ $permohonan->parkir->luas_lahan ?? "-" }} </td>
            </tr>
           <div style="page-break-before: always !important"></div>
            <tr>
                <td align="center">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td align="right"><strong>11.</strong></td>
                <td colspan="3"><strong>UTILITAS</strong></td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td>- Penerangan Jalan Umum</td>
                <td>:</td>
                <td>{{ $permohonan->peneranganjalan->tersedia ?? "-" }}</td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td>- Jaringan Air Bersih</td>
                <td>:</td>
                <td>{{ $permohonan->airbersih->tersedia ?? "-" }}</td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td>- Pemadam Kebakaran</td>
                <td>:</td>
                <td>{{ $permohonan->pemadamkebakaran->tersedia ?? "-" }}</td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td>- Jaringan Listrik</td>
                <td>:</td>
                <td>{{ $permohonan->listrik->tersedia ?? "-" }}</td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td>- Jaringan Telepon</td>
                <td>:</td>
                <td>{{ $permohonan->telepon->tersedia ?? "-" }}</td>
            </tr>

            <tr>
                <td align="center">&nbsp;</td>
                <td>- Jaringan Gas</td>
                <td>:</td>
                <td>{{ $permohonan->gas->tersedia ?? "-" }}</td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td>- Jaringan Transportasi</td>
                <td>:</td>
                <td>{{ $permohonan->transportasi->tersedia ?? "-" }}</td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td>- Gorong-gorong</td>
                <td>:</td>
                <td>{{ $permohonan->gorong->tersedia ?? "-" }}</td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td>- Drainase</td>
                <td>:</td>
                <td>{{ $permohonan->drainase->tersedia ?? "-" }}</td>
            </tr>
            <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
</body>
</html>