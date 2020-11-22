<table border="1" style="border-collapse:collapse" width="100%">
    <tbody>
        <tr class="bg-primary">
            <td align="center" style="width:1%"><strong>1.</strong></td>
            <td colspan="3"><strong>RUANG TERBUKA HIJAU</strong></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td colspan="3"> Jenis : {{ $permohonan->rth->jenis ?? "-" }}</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td colspan="3"> Ukuran Bangunan : {{ $permohonan->rth->ukuran ?? "-" }} m</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td colspan="3"> Luas Lahan : {{ $permohonan->rth->luas_lahan ?? "-" }} m<sup>2</sup></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td colspan="3"> Keterangan : {{ $permohonan->rth->keterangan ?? "-" }} </td>
        </tr>
        <tr>
            <td colspan="4" align="center">&nbsp;</td>
        </tr>
            <tr class="bg-primary">
                <td align="center"><strong>2.</strong></td>
                <td colspan="3"><strong>PERIBADATAN</strong></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="3"> Jenis : {{ $permohonan->peribadatan->jenis ?? "-" }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="3"> Ukuran Bangunan : {{ $permohonan->peribadatan->ukuran ?? "-" }} m</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="3"> Luas Lahan : {{ $permohonan->peribadatan->luas_lahan ?? "-" }} m<sup>2</sup></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="3"> Keterangan : {{ $permohonan->peribadatan->keterangan ?? "-" }}</td>
            </tr>
            <tr>
                <td colspan="4" align="center">&nbsp;</td>
            </tr>
            
            <tr class="bg-primary">
                <td align="center"><strong>3.</strong></td>
                <td colspan="3"><strong>REKREASI DAN OLAHRAGA</strong></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="3"> Jenis : {{ $permohonan->rekreasi->jenis ?? "-" }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="3"> Ukuran Bangunan : {{ $permohonan->rekreasi->ukuran ?? "-" }} m</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="3"> Luas lahan : {{ $permohonan->rekreasi->luas_lahan ?? "-" }} m<sup>2</sup></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="3"> Keterangan : {{ $permohonan->rekreasi->keterangan ?? "-" }} </td>
            </tr>
            <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
            <tr class="bg-primary">
                    <td align="center"><strong>4.</strong></td>
                    <td colspan="3"><strong>PENDIDIKAN</strong></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="3"> Jenis : {{ $permohonan->pendidikan->jenis ?? "-" }}</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="3"> Ukuran Bangunan: {{ $permohonan->pendidikan->ukuran ?? "-" }} m</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="3"> Luas lahan : {{ $permohonan->pendidikan->luas_lahan ?? "-" }} m<sup>2</sup></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="3"> Keterangan : {{ $permohonan->pendidikan->keterangan ?? "-" }} </td>
                </tr>
                <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>
            <tr class="bg-primary">
                    <td align="center"><strong>5.</strong></td>
                    <td colspan="3"><strong>KESEHATAN</strong></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="3"> Jenis : {{ $permohonan->kesehatan->jenis ?? "-" }}</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="3"> Ukuran Bangunan: {{ $permohonan->kesehatan->ukuran ?? "-" }} m</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="3"> Luas lahan : {{ $permohonan->kesehatan->luas_lahan ?? "-" }} m<sup>2</sup></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="3"> Keterangan : {{ $permohonan->kesehatan->keterangan ?? "-" }} </td>
                </tr>
                <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>
            <tr class="bg-primary">
                    <td align="center"><strong>6.</strong></td>
                    <td colspan="3"><strong>PERNIAGAAN</strong></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="3"> Jenis : {{ $permohonan->perniagaan->jenis ?? "-" }}</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="3"> Ukuran Bangunan: {{ $permohonan->perniagaan->ukuran ?? "-" }} m</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="3"> Luas lahan : {{ $permohonan->perniagaan->luas_lahan ?? "-" }} m<sup>2</sup></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="3"> Keterangan : {{ $permohonan->perniagaan->keterangan ?? "-" }} </td>
                </tr>
                <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>
            <tr class="bg-primary">
                <td align="center"><strong>7.</strong></td>
                <td colspan="3"><strong>PELAYANAN UMUM DAN PEMERINTAHAN</strong></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="3"> Jenis : {{ $permohonan->pelayananumum->jenis ?? "-" }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="3"> Ukuran Bangunan : {{ $permohonan->pelayananumum->ukuran ?? "-" }} m</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="3"> Luas lahan : {{ $permohonan->pelayananumum->luas_lahan ?? "-" }} m<sup>2</sup> </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="3"> Keterangan : {{ $permohonan->pelayananumum->keterangan ?? "-" }}</td>
            </tr>
            <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
            <tr class="bg-primary">
                <td align="center"><strong>8.</strong></td>
                <td colspan="3"><strong>PARKIR</strong></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="3"> Jenis : {{ $permohonan->parkir->jenis ?? "-" }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="3"> Ukuran Bangunan: {{ $permohonan->parkir->ukuran ?? "-" }} m </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="3"> Luas lahan : {{ $permohonan->parkir->luas_lahan ?? "-" }} m<sup>2</sup> </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="3"> Keterangan : {{ $permohonan->parkir->keterangan ?? "-" }}</td>
            </tr>
        </tbody>
	</table>