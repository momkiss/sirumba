	<table border="1" style="border-collapse: collapse">
    <tr class="bg-primary">
        <td align="center">1.</td>
        <td><strong>JALAN MASUK</strong></td>
    </tr>

    <tr>
        <td align="center">&nbsp;</td>
        <td>
            <table width="100%" border="0" cellspacing="3" cellpadding="2" style="border-collapse: collapse;">
                <tbody>
                    @php
                    $num_jalan_masuk = 1
                    @endphp
                    @foreach ($permohonan->jalanmasuk as $jalanmasuk)
                    <tr>
                        <td width="1%"  >{{ $num_jalan_masuk++ }}.</td>
                        <td width="13%"  align="left">Panjang : {{ $jalanmasuk->panjang ?? "-" }} m</td>
                        <td width="10%" >Lebar : {{ $jalanmasuk->lebar ?? "-" }} m</td>
                        <td width="16%" >Keterangan : {{ $jalanmasuk->keterangan ?? "-" }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </td>
    </tr>
    <tr class="bg-primary">
        <td align="center">2.</td>
        <td><strong>JALAN UTAMA</strong></td>
    </tr>
    <tr>
        <td align="center">&nbsp;</td>
        <td>
            <table width="100%" border="0" cellspacing="3" cellpadding="0"
                style="border-collapse: collapse; table-layout:fixed;">
                <tbody>
                    @php
                    $num_jalan_utama = 1
                    @endphp
                    @foreach ($permohonan->jalanutama as $jalanutama)
                    <tr>
                        <td valign="top" width="1%" >{{ $num_jalan_utama++ }}.</td>
                        <td valign="top" width="5%"  align="left">Panjang : {{ $jalanutama->panjang ?? "-" }} m</td>
                        <td valign="top" width="4%" >Lebar : {{ $jalanutama->lebar ?? "-" }} m</td>
                        <td valign="top" width="5%" >Median : {{ $jalanutama->median ?? "-" }}</td>
                        <td valign="top" width="7%" >Jenis konstruksi : {{ $jalanutama->jenis_konstruksi ?? "-" }}</td>
                        <td valign="top" width="7%" >Keterangan : {{ $jalanutama->keterangan ?? "-" }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </td>
    </tr>
    <tr class="bg-primary">
            <td align="center">3.</td>
            <td><strong>JALAN PEMBAGI</strong></td>
        </tr>
        <tr>
            <td align="center">&nbsp;</td>
            <td>
                <table width="100%" border="0" cellspacing="3" cellpadding="2" style="border-collapse: collapse">
                    <tbody>
                        @php
                        $num_jalan_pembagi = 1
                        @endphp
                        @foreach ($permohonan->jalanpembagi as $jalanpembagi)
                        <tr>
                            <td width="1%">{{ $num_jalan_pembagi++ }}.</td>
                            <td width="13%">Panjang : {{ $jalanpembagi->panjang ?? "-" }} m</td>
                            <td width="10%">Lebar : {{ $jalanpembagi->lebar ?? "-" }} m</td>
                            <td width="16%">Keterangan : {{ $jalanpembagi->keterangan ?? "-" }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </td>
        </tr>
    <tr class="bg-primary">
        <td align="center">4.</td>
        <td><strong>JALAN PEMBANTU</strong></td>
    </tr>
    <tr>
        <td align="center">&nbsp;</td>
        <td>
            <table width="100%" border="0" cellspacing="3" cellpadding="2" style="border-collapse: collapse;">
                <tbody>
                    @php
                    $num_jalan_pembantu = 1
                    @endphp
                    @foreach ($permohonan->jalanpembantu as $jalanpembantu)
                    <tr>
                        <td width="1% " >{{ $num_jalan_pembantu++ }}.</td>
                        <td width="13%" >Panjang : {{ $jalanmasuk->panjang ?? "-" }} m</td>
                        <td width="10%" >Lebar : {{ $jalanpembantu->lebar ?? "-" }} m</td>
                        <td width="16%" >Keterangan : {{ $jalanpembantu->keterangan ?? "-" }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </td>
    </tr>

    <tr class="bg-primary">
        <td align="center">5.</td>
        <td><strong>RUANG UNTUK BERPUTAR (CULDESAC)</strong></td>
    </tr>
    <tr>
        <td align="center">&nbsp;</td>
        <td>
            <table width="100%" border="0" cellspacing="3" cellpadding="2" style="border-collapse: collapse">
                <tbody>
                    @php
                    $num_culdesac = 1
                    @endphp
                    @foreach ($permohonan->culdesac as $culdesac)
                    <tr>
                        <td width="1% " >{{ $num_culdesac++ }}.</td>
                        <td width="13%" >Panjang : {{ $culdesac->panjang ?? "-" }} m</td>
                        <td width="10%" >Lebar : {{ $culdesac->lebar ?? "-" }} m</td>
                        <td width="16%" >Keterangan : {{ $culdesac->keterangan ?? "-" }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </td>
    </tr>
    <tr class="bg-primary">
        <td align="center">6.</td>
        <td><strong>SALURAN PEMBUANGAN AIR LIMBAH</strong></td>
    </tr>
    <tr>
        <td align="center">&nbsp;</td>
        <td>
            <table width="100%" border="0" cellspacing="3" cellpadding="2" style="border-collapse: collapse">
                <tbody>
                    @php
                    $num_limbah = 1
                    @endphp
                    @foreach ($permohonan->limbah as $limbah)
                    <tr>
                        <td width="1%" >{{ $num_limbah++ }}.</td>
                        <td width="7%">Panjang : {{ $limbah->panjang ?? "-" }} m</td>
                        <td width="6%">Lebar : {{ $limbah->panjang ?? "-" }} m</td>
                        <td width="11%">Jenis konstruksi : {{ $limbah->jenis_konstruksi ?? "-" }}</td>
                        <td width="11%">Keterangan : {{ $limbah->keterangan ?? "-" }}</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </td>
    </tr>
    <tr class="bg-primary">
        <td align="center">7.</td>
        <td><strong>TEMPAT PEMBUANGAN SAMPAH</strong></td>
    </tr>
    <tr>
        <td align="center">&nbsp;</td>
        <td>
            <table class="sub" width="100%" border="0" cellspacing="3" cellpadding="2" style="border-collapse: collapse">
                <tbody>
                    @php
                    $num_sampah = 1
                    @endphp
                    @foreach ($permohonan->sampah as $sampah)
                    <tr>
                        <td valign="top" width="1%" >{{ $num_sampah++ }}.</td>
                        <td valign="top" width="10%"  align="left">Volume : {{ $sampah->volume ?? "-" }} m<sup>3</sup></td>
                        <td valign="top" width="20%" >Jenis konstruksi:
                            {{ $sampah->jenis_konstruksi ?? "-" }}</td>
                        <td valign="top" width="10%" >Terpilah : {{ $sampah->terpilah ?? "-" }}</td>
                        <td valign="top" width="20%" >Jarak dengan rumah terdekat:
                            {{ $sampah->jarak_rumah_terdekat ?? "-" }} m</td>
                        <td valign="top" width="15%" >Keterangan : {{ $sampah->keterangan ?? "-" }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </td>
    </tr>
</table>