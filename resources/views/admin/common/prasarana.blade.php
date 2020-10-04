

@if ($form == "edit")
<div class="row">
    <div class="col-md-12">
        <h3><i class="fa fa-edit"></i> EDIT PRASARANA</h3>
        <hr style="margin: 0">
    </div>
</div>

@if(count($pemohon->jalanmasuk) > 0)
    <div class="panel-body">
        <div class="row">
            <input type="hidden" name="id_pemohon" value="{{$pemohon->id}}" id="prasarana_id_permohonan">
            <div class="panel-group" id="accordion8">
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" class="collapsed" data-parent="#accordion8" href="#collapseOne8">
                                JALAN MASUK
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne8" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="row">
                                <form action="{{ route('jalan-masuk.update', $pemohon->id) }}" method="POST"
                                    id="form-jalan-masuk-update">
                                    @csrf
                                    <div class="wrap_jalan_masuk">
                                        <div class="form-group">
                                            @foreach ($pemohon->jalanmasuk as $jalanmasuk)
                                            <div class="row">
                                                <input type="hidden" name="id[]" value="{{$jalanmasuk->id}}">
                                                <div class="col-sm-2">
                                                    <label class="control-label center-block"><strong>@if($loop->first)PANJANG @else &nbsp; @endif</strong></label>
                                                    <input type="text" name="jalanmasuk_panjang[]" class="form-control"
                                                        value="{{ $jalanmasuk->panjang }}">
                                                </div>
                                                <div class="col-sm-2">
                                                    <label class="control-label center-block"><strong>@if ($loop->first)
                                                            LEBAR @else &nbsp; @endif</strong></label>
                                                    <input type="text" name="jalanmasuk_lebar[]" class="form-control"
                                                        value="{{ $jalanmasuk->lebar }}">
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="control-label center-block"><strong>@if ($loop->first)
                                                            KETERANGAN @else &nbsp; @endif</strong></label>
                                                    <input type="text" name="jalanmasuk_keterangan[]" class="form-control"
                                                        value="{{ $jalanmasuk->keterangan }}">
                                                </div>
                                                @if ($loop->first)
                                                <div class="col-sm-1">
                                                    <label
                                                        class="control-label center-block"><strong>&nbsp;</strong></label>
                                                    <i class="fa fa-2x fa-plus text-success" id="tambah-jalan-masuk"></i>
                                                </div>
                                                <div class="col-md-3">
                                                    <br>
                                                    <button type="submit" class="btn btn-danger pull-right"><i
                                                            class="fa fa-cloud-upload"></i> UPDATE</button>
                                                </div>
                                                @else
                                                <div class="col-sm-1">
                                                    <label
                                                        class="control-label center-block"><strong>&nbsp;</strong></label>
                                                    <i class="fa fa-2x fa-minus text-danger remove_jalan_masuk"
                                                        onclick="hapusData('{{ route('jalan-masuk.hapus', $jalanmasuk->id) }}')"></i>
                                                </div>
                                                @endif

                                            </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" class="collapsed" data-parent="#accordion8" href="#collapseTwo8">
                                JALAN UTAMA
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo8" class="panel-collapse collapse">
                        <div class="panel-body">
                            <form action="{{ route('jalan-utama.update', $pemohon->id) }}" method="POST"
                                id="form-jalan-utama-update">
                                <div class="row">
                                    @csrf
                                    <div class="wrap_jalan_utama_edit">
                                        @foreach ($pemohon->jalanutama as $i => $jalanutama)
                                        <div class="form-group">
                                            <div class="row">
                                                <input type="hidden" name="id[]" value="{{$jalanutama->id}}">
                                                <div class="col-sm-2">
                                                    <label
                                                        class="control-label center-block"><strong>PANJANG</strong></label>
                                                    <input type="text" class="form-control" placeholder="Panjang"
                                                        name="jalanutama_panjang[]" value="{{ $jalanutama->panjang }}">
                                                </div>
                                                <div class="col-sm-2">
                                                    <label class="control-label center-block"><strong>LEBAR</strong></label>
                                                    <input type="text" class="form-control" placeholder="Lebar"
                                                        name="jalanutama_lebar[]" value="{{ $jalanutama->lebar }}">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label
                                                        class="control-label center-block"><strong>KETERANGAN</strong></label>
                                                    <input type="text" class="form-control"
                                                        placeholder="misal: di jalur 1/2/3/4" name="jalanutama_keterangan[]"
                                                        value="{{ $jalanutama->keterangan }}">
                                                </div>
                                                <div class="col-sm-2">
                                                    <label
                                                        class="control-label center-block"><strong>MEDIAN</strong></label>
                                                    <label class="rdiobox-inline mr20">
                                                        <input type="radio" name="jalanutama_median[][{{ $i+1 }}]"
                                                            value="Ada" @if ($jalanutama->median == "Ada")
                                                        checked
                                                        @endif
                                                        onclick="click_first_radio_button('jalanutama_median{{ $i+1 }}','median-jalan-utama-field{{ $i+1 }}','Ada');">
                                                        <span>Ada</span>
                                                    </label>
                                                    <label class="rdiobox-inline">
                                                        <input type="radio" name="jalanutama_median[][{{ $i+1 }}]"
                                                            value="Tidak" @if ($jalanutama->median == "Tidak")
                                                        checked
                                                        @endif
                                                        onclick="click_first_radio_button('jalanutama_median{{ $i+1 }}','median-jalan-utama-field{{ $i+1 }}','Tidak');">
                                                        <span>Tidak</span>
                                                    </label>
                                                </div>
                                                @if ($loop->first)
                                                <div class="col-sm-1">
                                                    <label
                                                        class="control-label center-block"><strong>&nbsp;</strong></label>
                                                    <i class="fa fa-2x fa-plus text-success add_jalan_utama_edit"></i>
                                                </div>

                                                <div class="col-md-2">
                                                    <br>
                                                    <button type="submit" class="btn btn-danger pull-right"><i
                                                            class="fa fa-cloud-upload"></i>
                                                        UPDATE</button>
                                                </div>
                                                @else
                                                <div class="col-sm-1">
                                                    <label
                                                        class="control-label center-block"><strong>&nbsp;</strong></label>
                                                    <i class="fa fa-2x fa-minus text-danger remove_jalan_utama_edit"
                                                        onclick="hapusData('{{ route('jalan-utama.hapus', $jalanutama->id) }}')"></i>
                                                </div>
                                                @endif

                                            </div>

                                            <div class="row">
                                                <div class="median-jalan-utama-field{{$i+1}}" @if ($jalanutama->median ==
                                                    "Ada")
                                                    style="display:block"
                                                    @else
                                                    style="display: none"
                                                    @endif
                                                    >
                                                    <div class="col-sm-2 mt20">
                                                        <label class="control-label"><strong>JENIS
                                                                KONSTRUKSI</strong></label>
                                                        <input type="text" class="form-control"
                                                            name="jalanutama_jenis_konstruksi[]"
                                                            placeholder="Isikan Jenis Konstruksi"
                                                            value="{{ $jalanutama->jenis_konstruksi }}">
                                                    </div>

                                                    <div class="col-sm-2 mt20">
                                                        <label class="control-label"><strong>UKURAN</strong></label>
                                                        <input type="text" class="form-control" name="jalanutama_ukuran[]"
                                                            placeholder="Isikan ukuran" value="{{ $jalanutama->ukuran }}">

                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                        @endforeach
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" class="collapsed" data-parent="#accordion8"
                                href="#collapseJalanPembagi">
                                JALAN PEMBAGI
                            </a>
                        </h4>
                    </div>
                    <div id="collapseJalanPembagi" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="row">
                                <form action="{{ route('jalan-pembagi.update', $pemohon->id) }}" method="POST"
                                    id="form-jalan-pembagi-update">
                                    @csrf
                                    <div class="wrap_jalan_pembagi">
                                        <div class="form-group">
                                            @foreach ($pemohon->jalanpembagi as $jalanpembagi)
                                            <div class="row">
                                                <input type="hidden" name="id[]" value="{{$jalanpembagi->id}}">
                                                <div class="col-sm-2">
                                                    <label class="control-label center-block"><strong>@if ($loop->first)
                                                            PANJANG @else
                                                            &nbsp; @endif</strong></label>
                                                    <input type="text" name="jalanpembagi_panjang[]" class="form-control"
                                                        placeholder="Panjang" value="{{$jalanpembagi->panjang}}">
                                                </div>
                                                <div class="col-sm-2">
                                                    <label class="control-label center-block"><strong>@if ($loop->first)
                                                            LEBAR @else
                                                            &nbsp; @endif</strong></label>
                                                    <input type="text" name="jalanpembagi_lebar[]" class="form-control"
                                                        placeholder="Lebar" value="{{$jalanpembagi->lebar}}">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="control-label center-block"><strong>@if ($loop->first)
                                                            KETERANGAN
                                                            @else &nbsp; @endif</strong></label>
                                                    <input type="text" name="jalanpembagi_keterangan[]" class="form-control"
                                                        value="{{$jalanpembagi->keterangan}}" placeholder="Keterangan">
                                                </div>
                                                @if ($loop->first)
                                                <div class="col-sm-1">
                                                    <label
                                                        class="control-label center-block"><strong>&nbsp;</strong></label>
                                                    <i class="fa fa-2x fa-plus text-success add_jalan_pembagi"></i>
                                                </div>
                                                <div class="col-md-4">
                                                    <br>
                                                    <button type="submit" class="btn btn-danger pull-right"><i
                                                            class="fa fa-cloud-upload"></i>
                                                        UPDATE</button>
                                                </div>
                                                @else
                                                <div class="col-sm-1">
                                                    <label
                                                        class="control-label center-block"><strong>&nbsp;</strong></label>
                                                    <i class="fa fa-2x fa-minus text-danger remove_jalan_pembagi"
                                                        onclick="hapusData('{{ route('jalan-pembagi.hapus', $jalanpembagi->id) }}')"></i>
                                                </div>
                                                @endif
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" class="collapsed" data-parent="#accordion8" href="#collapseThree8">
                                JALAN PEMBANTU
                            </a>
                        </h4>
                    </div>
                    <div id="collapseThree8" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="row">
                                <form action="{{ route('jalan-pembantu.update', $pemohon->id) }}" method="POST"
                                    id="form-jalan-pembantu-update">
                                    @csrf
                                    <div class="wrap_jalan_pembantu">
                                        <div class="form-group">
                                            @foreach ($pemohon->jalanpembantu as $jalanpembantu)
                                            <div class="row">
                                                <input type="hidden" name="id[]" value="{{$jalanpembantu->id}}">
                                                <div class="col-sm-2">
                                                    <label class="control-label center-block"><strong>@if ($loop->first)
                                                            PANJANG @else &nbsp; @endif</strong></label>
                                                    <input type="text" name="jalanpembantu_panjang[]" class="form-control"
                                                        placeholder="Panjang" value="{{$jalanpembantu->panjang}}">
                                                </div>
                                                <div class="col-sm-2">
                                                    <label class="control-label center-block"><strong>@if ($loop->first)
                                                            LEBAR @else &nbsp; @endif</strong></label>
                                                    <input type="text" name="jalanpembantu_lebar[]" class="form-control"
                                                        placeholder="Lebar" value="{{$jalanpembantu->lebar}}">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="control-label center-block"><strong>@if ($loop->first)
                                                            KETERANGAN @else &nbsp; @endif</strong></label>
                                                    <input type="text" name="jalanpembantu_keterangan[]"
                                                        class="form-control" placeholder="Keterangan"
                                                        value="{{$jalanpembantu->keterangan}}">
                                                </div>
                                                @if ($loop->first)
                                                <div class="col-sm-1">
                                                    <label
                                                        class="control-label center-block"><strong>&nbsp;</strong></label>
                                                    <i class="fa fa-2x fa-plus text-success add_jalan_pembantu"></i>
                                                </div>
                                                <div class="col-md-4">
                                                    <br>
                                                    <button type="submit" class="btn btn-danger pull-right"><i
                                                            class="fa fa-cloud-upload"></i>
                                                        UPDATE</button>
                                                </div>
                                                @else
                                                <div class="col-sm-1">
                                                    <label
                                                        class="control-label center-block"><strong>&nbsp;</strong></label>
                                                    <i class="fa fa-2x fa-minus text-danger remove_jalan_pembantu"
                                                        onclick="hapusData('{{ route('jalan-pembantu.hapus', $jalanpembantu->id) }}')"></i>
                                                </div>
                                                @endif
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" class="collapsed" data-parent="#accordion8" href="#collapseCuldesac">
                                RUANG BERPUTAR (CULDESAC)
                            </a>
                        </h4>
                    </div>
                    <div id="collapseCuldesac" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="row">
                                <form action="{{ route('culdesac.update', $pemohon->id) }}" method="POST"
                                    id="form-culdesac-update">
                                    @csrf
                                    <div class="wrap_culdesac">
                                        <div class="form-group">
                                            @foreach ($pemohon->culdesac as $culdesac)
                                            <div class="row">
                                                <input type="hidden" name="id[]" value="{{$culdesac->id}}">
                                                <div class="col-sm-2">
                                                    <label class="control-label center-block"><strong>@if ($loop->first)
                                                            PANJANG @else &nbsp; @endif</strong></label>
                                                    <input type="text" name="culdesac_panjang[]" class="form-control"
                                                        placeholder="Panjang" value="{{ $culdesac->panjang }}">
                                                </div>
                                                <div class="col-sm-2">
                                                    <label class="control-label center-block"><strong>@if ($loop->first)
                                                            LEBAR @else &nbsp; @endif</strong></label>
                                                    <input type="text" name="culdesac_lebar[]" class="form-control"
                                                        placeholder="Lebar" value="{{ $culdesac->lebar }}">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="control-label center-block"><strong>@if ($loop->first)
                                                            KETERANGAN @else &nbsp; @endif</strong></label>
                                                    <input type="text" name="culdesac_keterangan[]" class="form-control"
                                                        placeholder="Keterangan" value="{{ $culdesac->keterangan }}">
                                                </div>
                                                @if ($loop->first)
                                                <div class="col-sm-1">
                                                    <label
                                                        class="control-label center-block"><strong>&nbsp;</strong></label>
                                                    <i class="fa fa-2x fa-plus text-success add_culdesac"></i>
                                                </div>
                                                <div class="col-md-4">
                                                    <br>
                                                    <button type="submit" class="btn btn-danger pull-right"><i
                                                            class="fa fa-cloud-upload"></i>
                                                        UPDATE</button>
                                                </div>
                                                @else
                                                <div class="col-sm-1">
                                                    <label
                                                        class="control-label center-block"><strong>&nbsp;</strong></label>
                                                    <i class="fa fa-2x fa-minus text-danger remove_culdesac"
                                                        onclick="hapusData('{{ route('culdesac.hapus', $culdesac->id) }}')"></i>
                                                </div>
                                                @endif
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" class="collapsed" data-parent="#accordion8" href="#collapseLimbah">
                                SALURAN PEMBUANGAN AIR LIMBAH
                            </a>
                        </h4>
                    </div>
                    <div id="collapseLimbah" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="row">
                                <form action="{{ route('limbah.update', $pemohon->id) }}" method="POST"
                                    id="form-limbah-update">
                                    @csrf
                                    <div class="wrap_limbah">
                                        @foreach ($pemohon->limbah as $limbah )
                                        <div class="row">
                                            <input type="hidden" name="id[]" value="{{$limbah->id}}">
                                            <div class="col-sm-2">
                                                <label class="control-label center-block"><strong>@if ($loop->first) PANJANG
                                                        @else &nbsp; @endif</strong></label>
                                                <input type="text" name="limbah_panjang[]" class="form-control"
                                                    placeholder="Panjang" value="{{ $limbah->panjang }}">
                                            </div>
                                            <div class="col-sm-2">
                                                <label class="control-label center-block"><strong>@if ($loop->first) LEBAR
                                                        @else &nbsp; @endif</strong></label>
                                                <input type="text" name="limbah_lebar[]" class="form-control"
                                                    placeholder="Lebar" value="{{ $limbah->lebar }}">
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label class="control-label"><strong>@if ($loop->first) JENIS KONSTRUKSI
                                                            @else &nbsp; @endif</strong></label>
                                                    <input type="text" name="limbah_jenis_konstruksi[]" class="form-control"
                                                        placeholder="Isikan jenis konstruksi"
                                                        value="{{ $limbah->jenis_konstruksi }}">

                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="control-label center-block"><strong>@if ($loop->first)
                                                        KETERANGAN @else &nbsp; @endif</strong></label>
                                                <input type="text" name="limbah_keterangan[]" class="form-control"
                                                    placeholder="Keterangan" value="{{ $limbah->keterangan }}">
                                            </div>

                                            @if ($loop->first)
                                            <div class="col-sm-1">
                                                <label class="control-label center-block"><strong>&nbsp;</strong></label>
                                                <i class="fa fa-2x fa-plus text-success add_limbah"></i>
                                            </div>

                                            <div class="col-md-2">
                                                <br>
                                                <button type="submit" class="btn btn-danger pull-right"><i
                                                        class="fa fa-cloud-upload"></i>UPDATE</button>
                                            </div>
                                            @else
                                            <div class="col-sm-1">
                                                <label class="control-label center-block"><strong>&nbsp;</strong></label>
                                                <i class="fa fa-2x fa-minus text-danger remove_limbah"
                                                    onclick="hapusData('{{ route('limbah.hapus', $limbah->id) }}')"></i>
                                            </div>
                                            @endif

                                        </div>
                                        @endforeach
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" class="collapsed" data-parent="#accordion8" href="#collapseSampah">
                                TEMPAT PEMBUANGAN SAMPAH
                            </a>
                        </h4>
                    </div>
                    <div id="collapseSampah" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="row">
                                <form action="{{ route('sampah.update', $pemohon->id) }}" method="POST"
                                    id="form-sampah-update">
                                    @csrf
                                    <div class="wrap_sampah_edit">
                                        @foreach ($pemohon->sampah as $i => $sampah )
                                        <div class="row">
                                            <input type="hidden" name="id[]" value="{{$sampah->id}}">
                                            <div class="col-sm-2">
                                                <label class="control-label center-block"><strong>@if ($loop->first) UKURAN
                                                        @else &nbsp; @endif</strong></label>
                                                <input type="text" name="sampah_ukuran[]" class="form-control"
                                                    placeholder="PxLxT / contoh: 5x3x2" value="{{ $sampah->volume }}">
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label class="control-label"><strong>@if ($loop->first) JENIS @else
                                                            &nbsp; @endif</strong></label>
                                                    <select name="sampah_jenis_tps[]" class="form-control">
                                                        <option value="Permanen">Permanen</option>
                                                        <option value="Non Permanen">Non Permanen</option>
                                                        <option value="Pengelolaan">Pengelolaan</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label class="control-label"><strong>@if ($loop->first) JENIS KONSTRUKSI
                                                            @else &nbsp; @endif</strong></label>
                                                    <input type="text" name="sampah_jenis_konstruksi[]" class="form-control"
                                                        placeholder="Jenis konstruksi"
                                                        value="{{ $sampah->jenis_konstruksi }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-1">
                                                <label class="control-label center-block"><strong>@if ($loop->first) RADIUS
                                                        @else &nbsp; @endif</strong></label>
                                                <input type="text" name="sampah_jarak[]" class="form-control"
                                                    placeholder="Jarak (m)" value="{{ $sampah->jarak_rumah_terdekat }}">
                                            </div>
                                            <div class="col-sm-2">
                                                <label class="control-label center-block"><strong>@if ($loop->first)
                                                        KETERANGAN @else &nbsp; @endif</strong></label>
                                                <input type="text" name="sampah_keterangan[]" class="form-control"
                                                    placeholder="Keterangan jika ada" value="{{ $sampah->keterangan }}">
                                            </div>
                                            <div class="col-sm-1">
                                                <div class="form-group">
                                                    <label class="control-label center-block"><strong>@if ($loop->first)
                                                            TERPILAH @else &nbsp; @endif</strong></label>
                                                    <label class="rdiobox rdiobox-success rdiobox-inline mr20">
                                                        <input type="radio" name="sampah_terpilah[][{{ $i+1 }}]" value="Ya"
                                                            @if ($sampah->terpilah == "Ya")
                                                        checked
                                                        @endif>
                                                        <span>Ya</span>
                                                    </label>
                                                    <label class="rdiobox rdiobox-danger rdiobox-inline">
                                                        <input type="radio" name="sampah_terpilah[][{{ $i+1 }}]"
                                                            value="Tidak" @if ($sampah->terpilah == "Tidak")
                                                        checked
                                                        @endif>
                                                        <span>Tidak</span>
                                                    </label>
                                                </div>
                                            </div>
                                            @if ($loop->first)
                                            <div class="col-sm-1">
                                                <label class="control-label center-block"><strong>&nbsp;</strong></label>
                                                <i class="fa fa-2x fa-plus text-success add_sampah_edit"></i>
                                            </div>
                                            <div class="col-md-1">
                                                <br>
                                                <button type="submit" class="btn btn-danger pull-right"><i
                                                        class="fa fa-cloud-upload"></i> UPDATE</button>
                                            </div>
                                            @else
                                            <div class="col-sm-1">
                                                <label class="control-label center-block"><strong>&nbsp;</strong></label>
                                                <i class="fa fa-2x fa-minus text-danger remove_sampah_edit"
                                                    onclick="hapusData('{{ route('sampah.hapus', $sampah->id) }}')"></i>
                                            </div>
                                            @endif
                                        </div>
                                        @endforeach
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else 
    <div class="panel-body">
        <div class="row">
            <div class="panel-group" id="accordion8">
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" class="collapsed" data-parent="#accordion8" href="#collapseOne8">
                                JALAN MASUK
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne8" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="row">
                                <form action="{{ route('jalan-masuk.simpan') }}" method="POST" id="form-jalan-masuk">
                                    @csrf
                                    <div class="wrap_jalan_masuk">
                                        <div class="form-group">
                                            <div class="row">
                                                <input type="hidden" name="pemohon_id"
                                                    value="@isset($id_permohonan) {{ $id_permohonan }} @endisset"
                                                    class="prasarana_id_permohonan">
                                                <div class="col-sm-2">
                                                    <label
                                                        class="control-label center-block"><strong>PANJANG</strong></label>
                                                    <input type="text" name="jalanmasuk_panjang[]" class="form-control"
                                                        placeholder="Panjang">
                                                </div>
                                                <div class="col-sm-2">
                                                    <label class="control-label center-block"><strong>LEBAR</strong></label>
                                                    <input type="text" name="jalanmasuk_lebar[]" class="form-control"
                                                        placeholder="Lebar">
                                                </div>
                                                <div class="col-sm-4">
                                                    <label
                                                        class="control-label center-block"><strong>KETERANGAN</strong></label>
                                                    <input type="text" name="jalanmasuk_keterangan[]" class="form-control"
                                                        placeholder="misal: terhubung jalan A/B">
                                                </div>
                                                <div class="col-sm-1">
                                                    <label
                                                        class="control-label center-block"><strong>&nbsp;</strong></label>
                                                    <i class="fa fa-2x fa-plus text-success" id="tambah-jalan-masuk"></i>
                                                </div>
                                                <div class="col-md-3">
                                                    <br>
                                                    <button type="submit" class="btn btn-primary pull-right"><i
                                                            class="fa fa-cloud-upload"></i> SIMPAN</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" class="collapsed" data-parent="#accordion8" href="#collapseTwo8">
                                JALAN UTAMA
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo8" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="row">
                                <form action="{{ route('jalan-utama.simpan') }}" method="POST" id="form-jalan-utama">
                                    @csrf
                                    <div class="wrap_jalan_utama">
                                        <div class="form-group">
                                            <div class="row">
                                                <input type="hidden" name="pemohon_id"
                                                    value="@isset($id_permohonan) {{ $id_permohonan }} @endisset"
                                                    class="prasarana_id_permohonan">
                                                <div class="col-sm-2">
                                                    <label
                                                        class="control-label center-block"><strong>PANJANG</strong></label>
                                                    <input type="text" class="form-control" placeholder="Panjang"
                                                        name="jalanutama_panjang[]">
                                                </div>
                                                <div class="col-sm-2">
                                                    <label class="control-label center-block"><strong>LEBAR</strong></label>
                                                    <input type="text" class="form-control" placeholder="Lebar"
                                                        name="jalanutama_lebar[]">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label
                                                        class="control-label center-block"><strong>KETERANGAN</strong></label>
                                                    <input type="text" class="form-control"
                                                        placeholder="misal: di jalur 1/2/3/4"
                                                        name="jalanutama_keterangan[]">
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label
                                                            class="control-label center-block"><strong>MEDIAN</strong></label>
                                                        <label class="rdiobox-inline mr20">
                                                            <input type="radio" name="jalanutama_median[][1]" value="Ada"
                                                                onclick="click_first_radio_button('jalanutama_median0','median-jalan-utama-field0','Ada');">
                                                            <span>Ada</span>
                                                        </label>
                                                        <label class="rdiobox-inline">
                                                            <input type="radio" name="jalanutama_median[][1]" value="Tidak"
                                                                onclick="click_first_radio_button('jalanutama_median0','median-jalan-utama-field0','Tidak');">
                                                            <span>Tidak</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-1">
                                                    <label
                                                        class="control-label center-block"><strong>&nbsp;</strong></label>
                                                    <i class="fa fa-2x fa-plus text-success add_jalan_utama"></i>
                                                </div>

                                                <div class="col-md-2">
                                                    <br>
                                                    <button type="submit" class="btn btn-primary pull-right"><i
                                                            class="fa fa-cloud-upload"></i>
                                                        SIMPAN</button>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="median-jalan-utama-field0" style="display:none">
                                                    <div class="col-sm-2 mt20">
                                                        <div class="form-group">
                                                            <label class="control-label"><strong>JENIS
                                                                    KONSTRUKSI</strong></label>
                                                            <input type="text" class="form-control"
                                                                name="jalanutama_jenis_konstruksi[]"
                                                                placeholder="Isikan Jenis Konstruksi">

                                                        </div>
                                                    </div>

                                                    <div class="col-sm-2 mt20">
                                                        <div class="form-group">
                                                            <label class="control-label"><strong>UKURAN</strong></label>
                                                            <input type="text" class="form-control"
                                                                name="jalanutama_ukuran[]" placeholder="Isikan ukuran">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" class="collapsed" data-parent="#accordion8"
                                href="#collapseJalanPembagi">
                                JALAN PEMBAGI
                            </a>
                        </h4>
                    </div>
                    <div id="collapseJalanPembagi" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="row">
                                <form action="{{ route('jalan-pembagi.simpan') }}" method="POST" id="form-jalan-pembagi">
                                    @csrf
                                    <div class="wrap_jalan_pembagi">
                                        <div class="form-group">
                                            <div class="row">
                                                <input type="hidden" name="pemohon_id"
                                                    value="@isset($id_permohonan) {{ $id_permohonan }} @endisset"
                                                    class="prasarana_id_permohonan">
                                                <div class="col-sm-2">
                                                    <label
                                                        class="control-label center-block"><strong>PANJANG</strong></label>
                                                    <input type="text" name="jalanpembagi_panjang[]" class="form-control"
                                                        placeholder="Panjang">
                                                </div>
                                                <div class="col-sm-2">
                                                    <label class="control-label center-block"><strong>LEBAR</strong></label>
                                                    <input type="text" name="jalanpembagi_lebar[]" class="form-control"
                                                        placeholder="Lebar">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label
                                                        class="control-label center-block"><strong>KETERANGAN</strong></label>
                                                    <input type="text" name="jalanpembagi_keterangan[]" class="form-control"
                                                        placeholder="Keterangan">
                                                </div>
                                                <div class="col-sm-1">
                                                    <label
                                                        class="control-label center-block"><strong>&nbsp;</strong></label>
                                                    <i class="fa fa-2x fa-plus text-success add_jalan_pembagi"></i>
                                                </div>
                                                <div class="col-md-4">
                                                    <br>
                                                    <button type="submit" class="btn btn-primary pull-right"><i
                                                            class="fa fa-cloud-upload"></i>
                                                        SIMPAN</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" class="collapsed" data-parent="#accordion8" href="#collapseThree8">
                                JALAN PEMBANTU
                            </a>
                        </h4>
                    </div>
                    <div id="collapseThree8" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="row">
                                <form action="{{ route('jalan-pembantu.simpan') }}" method="POST" id="form-jalan-pembantu">
                                    @csrf
                                    <div class="wrap_jalan_pembantu">
                                        <div class="form-group">
                                            <div class="row">
                                                <input type="hidden" name="pemohon_id"
                                                    value="@isset($id_permohonan) {{ $id_permohonan }} @endisset"
                                                    class="prasarana_id_permohonan">
                                                <div class="col-sm-2">
                                                    <label
                                                        class="control-label center-block"><strong>PANJANG</strong></label>
                                                    <input type="text" name="jalanpembantu_panjang[]" class="form-control"
                                                        placeholder="Panjang">
                                                </div>
                                                <div class="col-sm-2">
                                                    <label class="control-label center-block"><strong>LEBAR</strong></label>
                                                    <input type="text" name="jalanpembantu_lebar[]" class="form-control"
                                                        placeholder="Lebar">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label
                                                        class="control-label center-block"><strong>KETERANGAN</strong></label>
                                                    <input type="text" name="jalanpembantu_keterangan[]"
                                                        class="form-control" placeholder="Keterangan">
                                                </div>
                                                <div class="col-sm-1">
                                                    <label
                                                        class="control-label center-block"><strong>&nbsp;</strong></label>
                                                    <i class="fa fa-2x fa-plus text-success add_jalan_pembantu"></i>
                                                </div>
                                                <div class="col-md-4">
                                                    <br>
                                                    <button type="submit" class="btn btn-primary pull-right"><i
                                                            class="fa fa-cloud-upload"></i>
                                                        SIMPAN</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" class="collapsed" data-parent="#accordion8" href="#collapseCuldesac">
                                RUANG BERPUTAR (CULDESAC)
                            </a>
                        </h4>
                    </div>
                    <div id="collapseCuldesac" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="row">
                                <form action="{{ route('culdesac.simpan') }}" method="POST" id="form-culdesac">
                                    @csrf
                                    <div class="wrap_culdesac">
                                        <div class="form-group">
                                            <div class="row">
                                                <input type="hidden" name="pemohon_id"
                                                    value="@isset($id_permohonan) {{ $id_permohonan }} @endisset"
                                                    class="prasarana_id_permohonan">
                                                <div class="col-sm-2">
                                                    <label
                                                        class="control-label center-block"><strong>PANJANG</strong></label>
                                                    <input type="text" name="culdesac_panjang[]" class="form-control"
                                                        placeholder="Panjang">
                                                </div>
                                                <div class="col-sm-2">
                                                    <label class="control-label center-block"><strong>LEBAR</strong></label>
                                                    <input type="text" name="culdesac_lebar[]" class="form-control"
                                                        placeholder="Lebar">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label
                                                        class="control-label center-block"><strong>KETERANGAN</strong></label>
                                                    <input type="text" name="culdesac_keterangan[]" class="form-control"
                                                        placeholder="Keterangan">
                                                </div>
                                                <div class="col-sm-1">
                                                    <label
                                                        class="control-label center-block"><strong>&nbsp;</strong></label>
                                                    <i class="fa fa-2x fa-plus text-success add_culdesac"></i>
                                                </div>
                                                <div class="col-md-4">
                                                    <br>
                                                    <button type="submit" class="btn btn-primary pull-right"><i
                                                            class="fa fa-cloud-upload"></i>
                                                        SIMPAN</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" class="collapsed" data-parent="#accordion8" href="#collapseLimbah">
                                SALURAN PEMBUANGAN AIR LIMBAH
                            </a>
                        </h4>
                    </div>
                    <div id="collapseLimbah" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="row">
                                <form action="{{ route('limbah.simpan') }}" method="POST" id="form-limbah">
                                    @csrf
                                    <div class="wrap_limbah">
                                        <div class="row">
                                            <input type="hidden" name="pemohon_id"
                                                value="@isset($id_permohonan) {{ $id_permohonan }} @endisset"
                                                class="prasarana_id_permohonan">
                                            <div class="col-sm-2">
                                                <label class="control-label center-block"><strong>PANJANG</strong></label>
                                                <input type="text" name="limbah_panjang[]" class="form-control"
                                                    placeholder="Panjang">
                                            </div>
                                            <div class="col-sm-2">
                                                <label class="control-label center-block"><strong>LEBAR</strong></label>
                                                <input type="text" name="limbah_lebar[]" class="form-control"
                                                    placeholder="Lebar">
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label class="control-label"><strong>JENIS KONSTRUKSI</strong></label>
                                                    <input type="text" name="limbah_jenis_konstruksi[]" class="form-control"
                                                        placeholder="Isikan jenis konstruksi">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <label
                                                    class="control-label center-block"><strong>KETERANGAN</strong></label>
                                                <input type="text" name="limbah_keterangan[]" class="form-control"
                                                    placeholder="Keterangan">
                                            </div>

                                            <div class="col-sm-1">
                                                <label class="control-label center-block"><strong>&nbsp;</strong></label>
                                                <i class="fa fa-2x fa-plus text-success add_limbah"></i>
                                            </div>

                                            <div class="col-md-2">
                                                <br>
                                                <button type="submit" class="btn btn-primary pull-right"><i
                                                        class="fa fa-cloud-upload"></i>
                                                    SIMPAN</button>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" class="collapsed" data-parent="#accordion8" href="#collapseSampah">
                                TEMPAT PEMBUANGAN SAMPAH
                            </a>
                        </h4>
                    </div>
                    <div id="collapseSampah" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="row">
                                <form action="{{ route('sampah.simpan') }}" method="POST" id="form-sampah">
                                    @csrf
                                    <div class="wrap_sampah">
                                        <div class="row">
                                            <input type="hidden" name="pemohon_id"
                                                value="@isset($id_permohonan) {{ $id_permohonan }} @endisset"
                                                class="prasarana_id_permohonan">
                                            <div class="col-sm-2">
                                                <label class="control-label center-block"><strong>UKURAN</strong></label>
                                                <input type="text" name="sampah_ukuran[]" class="form-control"
                                                    placeholder="PxLxT / contoh: 5x3x2">
                                            </div>
                                            {{-- <div class="col-sm-1">
                                                    <label class="control-label center-block"><strong>LEBAR</strong></label>
                                                    <input type="text" name="sampah_lebar[]" class="form-control" placeholder="Lebar">
                                                </div>
                                                <div class="col-sm-1">
                                                    <label class="control-label center-block"><strong>TINGGI</strong></label>
                                                    <input type="text" name="sampah_tinggi[]" class="form-control" placeholder="Tinggi">
                                                </div> --}}
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label class="control-label"><strong>JENIS</strong></label>
                                                    <select name="sampah_jenis_tps[]" class="form-control">
                                                        <option value="">---</option>
                                                        <option value="Permanen">Permanen</option>
                                                        <option value="Non Permanen">Non Permanen</option>
                                                        <option value="Pengelolaan">Pengelolaan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label class="control-label"><strong>JENIS KONSTRUKSI</strong></label>
                                                    <input type="text" name="sampah_jenis_konstruksi[]" class="form-control"
                                                        placeholder="Jenis konstruksi">
                                                </div>
                                            </div>
                                            <div class="col-sm-1">
                                                <label class="control-label center-block"><strong>RADIUS</strong></label>
                                                <input type="text" name="sampah_jarak[]" class="form-control"
                                                    placeholder="Jarak (m)">
                                            </div>
                                            <div class="col-sm-2">
                                                <label
                                                    class="control-label center-block"><strong>KETERANGAN</strong></label>
                                                <input type="text" name="sampah_keterangan[]" class="form-control"
                                                    placeholder="Keterangan jika ada">
                                            </div>
                                            <div class="col-sm-1">
                                                <div class="form-group">
                                                    <label
                                                        class="control-label center-block"><strong>TERPILAH</strong></label>
                                                    <label class="rdiobox rdiobox-success rdiobox-inline mr20">
                                                        <input type="radio" name="sampah_terpilah[][1]" value="Ya">
                                                        <span>Ya</span>
                                                    </label>
                                                    <label class="rdiobox rdiobox-danger rdiobox-inline">
                                                        <input type="radio" name="sampah_terpilah[][1]" value="Tidak">
                                                        <span>Tidak</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-1">
                                                <label class="control-label center-block"><strong>&nbsp;</strong></label>
                                                <i class="fa fa-2x fa-plus text-success add_sampah"></i>
                                            </div>
                                            <div class="col-md-1">
                                                <br>
                                                <button type="submit" class="btn btn-primary pull-right"><i
                                                        class="fa fa-cloud-upload"></i> SIMPAN</button>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-danger btn-lg btn-block btn-next-prasarana">UPDATE</button>
            </div>
        </div>
    </div>
@endif
        
@else 
    <div class="panel-body">
        <div class="row">
            <div class="panel-group" id="accordion8">
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" class="collapsed" data-parent="#accordion8" href="#collapseOne8">
                                JALAN MASUK 
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne8" class="panel-collapse collapse">
                    <div class="panel-body">
                    <div class="row">
                        <form action="{{ route('jalan-masuk.simpan') }}" method="POST" id="form-jalan-masuk">
                        @csrf
                            <div class="wrap_jalan_masuk">
                                <div class="form-group">
                                    <div class="row">
                                        <input type="hidden" name="pemohon_id" value="@isset($id_permohonan) {{ $id_permohonan }} @endisset" class="prasarana_id_permohonan">
                                        <div class="col-sm-2">
                                            <label class="control-label center-block"><strong>PANJANG</strong></label>
                                            <input type="text" name="jalanmasuk_panjang[]" class="form-control"
                                                placeholder="Panjang">
                                        </div>
                                        <div class="col-sm-2">
                                            <label class="control-label center-block"><strong>LEBAR</strong></label>
                                            <input type="text" name="jalanmasuk_lebar[]" class="form-control" placeholder="Lebar">
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="control-label center-block"><strong>KETERANGAN</strong></label>
                                            <input type="text" name="jalanmasuk_keterangan[]" class="form-control"
                                                placeholder="misal: terhubung jalan A/B">
                                        </div>
                                        <div class="col-sm-1">
                                            <label class="control-label center-block"><strong>&nbsp;</strong></label>
                                            <i class="fa fa-2x fa-plus text-success" id="tambah-jalan-masuk"></i>
                                        </div>
                                        <div class="col-md-3">
                                            <br>
                                            <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-cloud-upload"></i> SIMPAN</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" class="collapsed" data-parent="#accordion8" href="#collapseTwo8">
                                JALAN UTAMA
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo8" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="row">
                                <form action="{{ route('jalan-utama.simpan') }}" method="POST" id="form-jalan-utama">
                                    @csrf
                                    <div class="wrap_jalan_utama">
                                        <div class="form-group">
                                            <div class="row">
                                                <input type="hidden" name="pemohon_id" value="@isset($id_permohonan) {{ $id_permohonan }} @endisset"
                                                    class="prasarana_id_permohonan">
                                                <div class="col-sm-2">
                                                    <label class="control-label center-block"><strong>PANJANG</strong></label>
                                                    <input type="text" class="form-control" placeholder="Panjang" name="jalanutama_panjang[]">
                                                </div>
                                                <div class="col-sm-2">
                                                    <label class="control-label center-block"><strong>LEBAR</strong></label>
                                                    <input type="text" class="form-control" placeholder="Lebar" name="jalanutama_lebar[]">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="control-label center-block"><strong>KETERANGAN</strong></label>
                                                    <input type="text" class="form-control" placeholder="misal: di jalur 1/2/3/4" name="jalanutama_keterangan[]">
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label class="control-label center-block"><strong>MEDIAN</strong></label>
                                                        <label class="rdiobox-inline mr20">
                                                            <input type="radio" name="jalanutama_median[][1]" value="Ada"
                                                                onclick="click_first_radio_button('jalanutama_median0','median-jalan-utama-field0','Ada');">
                                                            <span>Ada</span>
                                                        </label>
                                                        <label class="rdiobox-inline">
                                                            <input type="radio" name="jalanutama_median[][1]" value="Tidak"
                                                                onclick="click_first_radio_button('jalanutama_median0','median-jalan-utama-field0','Tidak');">
                                                            <span>Tidak</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-1">
                                                    <label class="control-label center-block"><strong>&nbsp;</strong></label>
                                                    <i class="fa fa-2x fa-plus text-success add_jalan_utama"></i>
                                                </div>
                                                <div class="col-md-2">
                                                    <br>
                                                    <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-cloud-upload"></i>
                                                        SIMPAN</button>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="median-jalan-utama-field0" style="display:none">
                                                    <div class="col-sm-2 mt20">
                                                        <div class="form-group">
                                                            <label class="control-label"><strong>JENIS KONSTRUKSI</strong></label>
                                                            <input type="text" class="form-control" name="jalanutama_jenis_konstruksi[]" placeholder="Isikan Jenis Konstruksi">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2 mt20">
                                                        <div class="form-group">
                                                            <label class="control-label"><strong>UKURAN</strong></label>
                                                            <input type="text" class="form-control" name="jalanutama_ukuran[]" placeholder="Isikan ukuran">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" class="collapsed" data-parent="#accordion8" href="#collapseJalanPembagi">
                                JALAN PEMBAGI
                            </a>
                        </h4>
                    </div>
                    <div id="collapseJalanPembagi" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="row">
                                <form action="{{ route('jalan-pembagi.simpan') }}" method="POST" id="form-jalan-pembagi">
                                    @csrf
                                    <div class="wrap_jalan_pembagi">
                                        <div class="form-group">
                                            <div class="row">
                                                <input type="hidden" name="pemohon_id"
                                                    value="@isset($id_permohonan) {{ $id_permohonan }} @endisset"
                                                    class="prasarana_id_permohonan">
                                                <div class="col-sm-2">
                                                    <label class="control-label center-block"><strong>PANJANG</strong></label>
                                                    <input type="text" name="jalanpembagi_panjang[]" class="form-control"
                                                        placeholder="Panjang">
                                                </div>
                                                <div class="col-sm-2">
                                                    <label class="control-label center-block"><strong>LEBAR</strong></label>
                                                    <input type="text" name="jalanpembagi_lebar[]" class="form-control"
                                                        placeholder="Lebar">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="control-label center-block"><strong>KETERANGAN</strong></label>
                                                    <input type="text" name="jalanpembagi_keterangan[]" class="form-control"
                                                        placeholder="Keterangan">
                                                </div>
                                                <div class="col-sm-1">
                                                    <label class="control-label center-block"><strong>&nbsp;</strong></label>
                                                    <i class="fa fa-2x fa-plus text-success add_jalan_pembagi"></i>
                                                </div>
                                                <div class="col-md-4">
                                                    <br>
                                                    <button type="submit" class="btn btn-primary pull-right"><i
                                                            class="fa fa-cloud-upload"></i>
                                                        SIMPAN</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" class="collapsed" data-parent="#accordion8" href="#collapseThree8">
                                JALAN PEMBANTU
                            </a>
                        </h4>
                    </div>
                    <div id="collapseThree8" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="row">
                                <form action="{{ route('jalan-pembantu.simpan') }}" method="POST" id="form-jalan-pembantu">
                                    @csrf
                                    <div class="wrap_jalan_pembantu">
                                        <div class="form-group">
                                            <div class="row">
                                                <input type="hidden" name="pemohon_id" value="@isset($id_permohonan) {{ $id_permohonan }} @endisset"
                                                    class="prasarana_id_permohonan">
                                                <div class="col-sm-2">
                                                    <label class="control-label center-block"><strong>PANJANG</strong></label>
                                                    <input type="text" name="jalanpembantu_panjang[]" class="form-control" placeholder="Panjang">
                                                </div>
                                                <div class="col-sm-2">
                                                    <label class="control-label center-block"><strong>LEBAR</strong></label>
                                                    <input type="text" name="jalanpembantu_lebar[]" class="form-control" placeholder="Lebar">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="control-label center-block"><strong>KETERANGAN</strong></label>
                                                    <input type="text" name="jalanpembantu_keterangan[]" class="form-control" placeholder="Keterangan">
                                                </div>
                                                <div class="col-sm-1">
                                                    <label class="control-label center-block"><strong>&nbsp;</strong></label>
                                                    <i class="fa fa-2x fa-plus text-success add_jalan_pembantu"></i>
                                                </div>
                                                <div class="col-md-4">
                                                    <br>
                                                    <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-cloud-upload"></i>
                                                        SIMPAN</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" class="collapsed" data-parent="#accordion8" href="#collapseCuldesac">
                                RUANG BERPUTAR (CULDESAC)
                            </a>
                        </h4>
                    </div>
                    <div id="collapseCuldesac" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="row">
                                <form action="{{ route('culdesac.simpan') }}" method="POST" id="form-culdesac">
                                    @csrf
                                    <div class="wrap_culdesac">
                                        <div class="form-group">
                                            <div class="row">
                                                <input type="hidden" name="pemohon_id" value="@isset($id_permohonan) {{ $id_permohonan }} @endisset"
                                                    class="prasarana_id_permohonan">
                                                <div class="col-sm-2">
                                                    <label class="control-label center-block"><strong>PANJANG</strong></label>
                                                    <input type="text" name="culdesac_panjang[]" class="form-control" placeholder="Panjang">
                                                </div>
                                                <div class="col-sm-2">
                                                    <label class="control-label center-block"><strong>LEBAR</strong></label>
                                                    <input type="text" name="culdesac_lebar[]" class="form-control" placeholder="Lebar">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="control-label center-block"><strong>KETERANGAN</strong></label>
                                                    <input type="text" name="culdesac_keterangan[]" class="form-control" placeholder="Keterangan">
                                                </div>
                                                <div class="col-sm-1">
                                                    <label class="control-label center-block"><strong>&nbsp;</strong></label>
                                                    <i class="fa fa-2x fa-plus text-success add_culdesac"></i>
                                                </div>
                                                <div class="col-md-4">
                                                    <br>
                                                    <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-cloud-upload"></i>
                                                        SIMPAN</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" class="collapsed" data-parent="#accordion8" href="#collapseLimbah">
                                SALURAN PEMBUANGAN AIR LIMBAH
                            </a>
                        </h4>
                    </div>
                    <div id="collapseLimbah" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="row">
                                <form action="{{ route('limbah.simpan') }}" method="POST" id="form-limbah">
                                    @csrf
                                    <div class="wrap_limbah">
                                        <div class="row">
                                            <input type="hidden" name="pemohon_id" value="@isset($id_permohonan) {{ $id_permohonan }} @endisset"
                                                class="prasarana_id_permohonan">
                                            <div class="col-sm-2">
                                                <label class="control-label center-block"><strong>PANJANG</strong></label>
                                                <input type="text" name="limbah_panjang[]" class="form-control" placeholder="Panjang">
                                            </div>
                                            <div class="col-sm-2">
                                                <label class="control-label center-block"><strong>LEBAR</strong></label>
                                                <input type="text" name="limbah_lebar[]" class="form-control" placeholder="Lebar">
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label class="control-label"><strong>JENIS KONSTRUKSI</strong></label>
                                                    <input type="text" name="limbah_jenis_konstruksi[]" class="form-control" placeholder="Isikan jenis konstruksi">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="control-label center-block"><strong>KETERANGAN</strong></label>
                                                <input type="text" name="limbah_keterangan[]" class="form-control" placeholder="Keterangan">
                                            </div>
                                            <div class="col-sm-1">
                                                <label class="control-label center-block"><strong>&nbsp;</strong></label>
                                                <i class="fa fa-2x fa-plus text-success add_limbah"></i>
                                            </div>
                                            <div class="col-md-2">
                                                <br>
                                                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-cloud-upload"></i>
                                                    SIMPAN</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" class="collapsed" data-parent="#accordion8" href="#collapseSampah">
                                TEMPAT PEMBUANGAN SAMPAH
                            </a>
                        </h4>
                    </div>
                    <div id="collapseSampah" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="row">
                                <form action="{{ route('sampah.simpan') }}" method="POST" id="form-sampah">
                                    @csrf
                                    <div class="wrap_sampah">
                                        <div class="row">
                                            <input type="hidden" name="pemohon_id" value="@isset($id_permohonan) {{ $id_permohonan }} @endisset"
                                                class="prasarana_id_permohonan">                        
                                            <div class="col-sm-2">
                                                <label class="control-label center-block"><strong>UKURAN</strong></label>
                                                <input type="text" name="sampah_ukuran[]" class="form-control" placeholder="PxLxT / contoh: 5x3x2">
                                            </div>
                                            {{-- <div class="col-sm-1">
                                                <label class="control-label center-block"><strong>LEBAR</strong></label>
                                                <input type="text" name="sampah_lebar[]" class="form-control" placeholder="Lebar">
                                            </div>
                                            <div class="col-sm-1">
                                                <label class="control-label center-block"><strong>TINGGI</strong></label>
                                                <input type="text" name="sampah_tinggi[]" class="form-control" placeholder="Tinggi">
                                            </div> --}}
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label class="control-label"><strong>JENIS</strong></label>
                                                    <select name="sampah_jenis_tps[]" class="form-control">
                                                        <option value="">---</option>
                                                        <option value="Permanen">Permanen</option>
                                                        <option value="Non Permanen">Non Permanen</option>
                                                        <option value="Pengelolaan">Pengelolaan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label class="control-label"><strong>JENIS KONSTRUKSI</strong></label>
                                                    <input type="text" name="sampah_jenis_konstruksi[]" class="form-control" placeholder="Jenis konstruksi">
                                                </div>
                                            </div>
                                            <div class="col-sm-1">
                                                <label class="control-label center-block"><strong>RADIUS</strong></label>
                                                <input type="text" name="sampah_jarak[]" class="form-control" placeholder="Jarak (m)">
                                            </div>
                                            <div class="col-sm-2">
                                                <label class="control-label center-block"><strong>KETERANGAN</strong></label>
                                                <input type="text" name="sampah_keterangan[]" class="form-control" placeholder="Keterangan jika ada">
                                            </div>
                                            <div class="col-sm-1">
                                                <div class="form-group">
                                                    <label class="control-label center-block"><strong>TERPILAH</strong></label>
                                                    <label class="rdiobox rdiobox-success rdiobox-inline mr20">
                                                        <input type="radio" name="sampah_terpilah[][1]" value="Ya">
                                                        <span>Ya</span>
                                                    </label>
                                                    <label class="rdiobox rdiobox-danger rdiobox-inline">
                                                        <input type="radio" name="sampah_terpilah[][1]" value="Tidak">
                                                        <span>Tidak</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-1">
                                                <label class="control-label center-block"><strong>&nbsp;</strong></label>
                                                <i class="fa fa-2x fa-plus text-success add_sampah"></i>
                                            </div>
                                            <div class="col-md-1">
                                                <br>
                                                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-cloud-upload"></i> SIMPAN</button>
                                            </div>   
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-danger btn-lg btn-block btn-next-prasarana">SIMPAN</button>
            </div>
        </div>
    </div>
@endif

