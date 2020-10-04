<table width="100%" border="0" cellpadding="5" cellspacing="3" style="border-collapse: collapse;">
      <tbody>
        <tr>
          <td colspan="9" align="right"><em style="font-size: 9px !important">Dinas Perumahan dan Permukiman Kab.
            Banjar | {{ $permohonan->tanggal_surat_permohonan->format('d M Y') }}</em></td>
        </tr>
        <tr>
          <td align="left">&nbsp;</td>
          <td colspan="5" align="left"><strong><h4>PEMOHON</h4></strong></td>
          <td colspan="3" align="left"><strong><h4>PERUMAHAN</h4></strong></td>
        </tr>
        <tr>
          <td width="2%" align="center"><strong>1.</strong></td>
          <td width="14%"><strong>TAHUN</strong></td>
          <td width="2%">:</td>
          <td width="32%">{{ $permohonan->tahun  }}</td>
          <td width="1%">&nbsp;</td>
          <td width="2%" align="right"><strong>1.</strong></td>
          <td width="23%"><strong>NAMA PERUMAHAN</strong></td>
          <td width="1%">:</td>
          <td width="23%">{{ $permohonan->nama_perumahan  }}</td>
        </tr>
        <tr>
          <td align="center"><strong>2.</strong></td>
          <td><strong>PENGEMBANG</strong></td>
          <td>:</td>
          <td>{{ $permohonan->pengembang->nama_perusahaan ?? "" }}</td>
          <td>&nbsp;</td>
          <td align="right"><strong>2.</strong></td>
          <td><strong>ALAMAT PERUMAHAN</strong></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="center"><strong>3.</strong></td>
          <td><strong>NAMA PEMOHON</strong></td>
          <td>:</td>
          <td>{{ $permohonan->nama_lengkap_pengembang }}</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>- Kecamatan</td>
          <td>:</td>
          <td>{{ $permohonan->kecamatan_perumahan->nama ?? ""  }} </td>
        </tr>
        <tr>
          <td align="center"><strong>4.</strong></td>
          <td><strong>PEKERJAAN</strong></td>
          <td>: </td>
          <td>{{ $permohonan->pekerjaan }}</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>- Kelurahan</td>
          <td>:</td>
          <td>{{ $permohonan->kelurahan_perumahan->nama ?? ""  }}</td>
        </tr>
        <tr>
          <td align="center"><strong>5.</strong></td>
          <td><strong>JABATAN</strong></td>
          <td>:</td>
          <td>{{ $permohonan->jabatan }}</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>- RT/RW</td>
          <td>:</td>
          <td>{{ $permohonan->alamat_rt_perumahan }}</td>
        </tr>
        <tr>
          <td align="center"><strong>6.</strong></td>
          <td><strong>ALAMAT</strong></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>- Jalan</td>
          <td>:</td>
          <td>{{ $permohonan->alamat_jalan_perumahan }}</td>
        </tr>
        <tr>
          <td align="center">&nbsp;</td>
          <td>- Kecamatan</td>
          <td>:</td>
          <td>@if (strlen((string)$permohonan->alamat_kecamatan_pengembang) > 2)
          {{ $permohonan->alamat_kecamatan_pengembang }}
          @else
          {{ $permohonan->kecamatan_pengembang->nama ?? ""  }}
          @endif</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>- Kode Pos</td>
          <td>:</td>
          <td>{{ $permohonan->alamat_kodepos_perumahan }}</td>
        </tr>
        <tr>
          <td align="center">&nbsp;</td>
          <td>- Kelurahan / Desa</td>
          <td>:</td>
          <td>@if (strlen((string)$permohonan->alamat_kelurahan_pengembang) > 2)
              {{ $permohonan->alamat_kelurahan_pengembang }}
            @else
              {{ $permohonan->kelurahan_pengembang->nama ?? ""  }}
          @endif</td>
          <td>&nbsp;</td>
          <td align="right"><strong>3.</strong></td>
          <td><strong>LUAS LAHAN</strong></td>
          <td>:</td>
          <td>{{ $permohonan->luas_lahan }} m2</td>
        </tr>
        <tr>
          <td align="center">&nbsp;</td>
          <td>- RT/RW</td>
          <td>:</td>
          <td>{{ $permohonan->alamat_rt_pengembang }}</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>- Luas Prasarana</td>
          <td>:</td>
          <td>{{ $permohonan->luas_prasarana }} m2</td>
        </tr>
        <tr>
          <td align="center">&nbsp;</td>
          <td>- Jalan</td>
          <td>:</td>
          <td>{{ $permohonan->alamat_jalan_pengembang }}</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>- Luas Sarana</td>
          <td>:</td>
          <td>{{ $permohonan->luas_sarana }} m2</td>
        </tr>
        <tr>
          <td align="center">&nbsp;</td>
          <td>- Kode Pos</td>
          <td>:</td>
          <td>{{ $permohonan->alamat_kodepos_pengembang }}</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>

          <td>- Luas RTH </td>
          <td>:</td>
          <td>{{ $permohonan->luas_rth }} m2</td>
        </tr>
        <tr>
          <td align="center"><strong>7.</strong></td>
          <td><strong>NIK.</strong></td>
          <td>:</td>
          <td>{{ $permohonan->nomor_ktp }}</td>
          <td>&nbsp;</td>
          <td align="right"><strong>4.</strong></td>
          <td colspan="3"><strong>JUMLAH RUMAH/UKURAN KAPLING</strong></td>
        </tr>
		  
	@foreach ($permohonan->jumlah as $jumlah)
     	@if ($jumlah->luas != NULL && $jumlah->jumlah != NULL)
            <tr>
                @if ($loop->first)
                <td  align="center"><strong>8.</strong></td>
                <td><strong>TELP.</strong></td>
                <td>:</td>
                <td>{{ $permohonan->telp }}</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>  
                @else
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                @endif
                <td>- Tipe {{ $jumlah->tipe }}/{{ $jumlah->luas }}</td>
                <td>:</td>
                <td>{{ $jumlah->jumlah }} unit</td>
            </tr>
		@endif
    @endforeach
 </tbody>
</table>