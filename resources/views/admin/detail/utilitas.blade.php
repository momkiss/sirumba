<table border="0" style="border-collapse: collapse" width="100%">
		<tbody>
            <tr>
                <td align="center" style="width: 1%"><strong>1.</strong></td>
                <td width="20%">Penerangan Jalan Umum</td>
                <td>: {{ $permohonan->peneranganjalan->tersedia ?? "-" }}</td>
                <td>Keterangan: {{ $permohonan->peneranganjalan->keterangan ?? "-" }}</td>
            </tr>
            <tr>
                <td align="center"><strong>2.</strong></td>
                <td> Jaringan Air Bersih</td>
                <td>: {{ $permohonan->airbersih->tersedia ?? "-" }}</td>
                <td>Keterangan: {{ $permohonan->airbersih->keterangan ?? "-" }}</td>
            </tr>
            <tr>
                <td align="center"><strong>3.</strong></td>
                <td> Pemadam Kebakaran</td>
                <td>: {{ $permohonan->pemadamkebakaran->tersedia ?? "-" }}</td>
                <td>Keterangan: {{ $permohonan->pemadamkebakaran->keterangan ?? "-" }}</td>
            </tr>
            <tr>
                <td align="center"><strong>4.</strong></td>
                <td> Jaringan Listrik</td>
                <td>: {{ $permohonan->listrik->tersedia ?? "-" }}</td>
                <td>Keterangan: {{ $permohonan->listrik->keterangan ?? "-" }}</td>
            </tr>
            <tr>
                <td align="center"><strong>5.</strong></td>
                <td> Jaringan Telepon</td>
                <td>: {{ $permohonan->telepon->tersedia ?? "-" }}</td>
                <td>Keterangan: {{ $permohonan->telepon->keterangan ?? "-" }}</td>
            </tr>

            <tr>
                <td align="center"><strong>6.</strong></td>
                <td> Jaringan Gas</td>
                <td>: {{ $permohonan->gas->tersedia ?? "-" }}</td>
                <td>Keterangan: {{ $permohonan->gas->keterangan ?? "-" }}</td>
            </tr>
            <tr>
                <td align="center"><strong>7.</strong></td>
                <td> Jaringan Transportasi</td>
                <td>: {{ $permohonan->transportasi->tersedia ?? "-" }}</td>
                <td>Keterangan: {{ $permohonan->transportasi->keterangan ?? "-" }}</td>
            </tr>
            <tr>
                <td align="center"><strong>8.</strong></td>
                <td> Gorong-gorong</td>
                <td>: {{ $permohonan->gorong->tersedia ?? "-" }}</td>
                <td>Keterangan: {{ $permohonan->gorong->keterangan ?? "-" }}</td>
            </tr>
            <tr>
                <td align="center"><strong>8.</strong></td>
                <td> Drainase</td>
                <td>: {{ $permohonan->drainase->tersedia ?? "-" }}</td>
                <td>Keterangan: {{ $permohonan->drainase->keterangan ?? "-" }}</td>
            </tr>
		</tbody>
	</table>