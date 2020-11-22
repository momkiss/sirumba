
<link rel="stylesheet" href="{{ asset('lib/jquery.gritter/jquery.gritter.css') }}">
    @php
    $no = 1
    @endphp

@if ($form == "edit")

    <div class="col-md-12">
        <h3 class="mb20"><i class="fa fa-edit"></i> EDIT JUMLAH UNIT</h3><hr style="margin-bottom: 10px">
    </div>
    <div class="panel-body">
        <div class="row">
        @if (count($tipe) > 0 && count($pemohon->jumlah) > 0)
                <form id="form-ukuran-update" action="{{ route('ukuran.update', $pemohon->id) }}" method="POST">
                    @php
                    $lastElement = count($pemohon->jumlah) - 1;
                    @endphp
                        <div class="wrap_ukuran">
                    @csrf
                    {{-- @foreach ($tipe as $key => $tp) --}}
                            @foreach ($pemohon->jumlah as $index => $jumlah)
                                {{-- @if ($tp->nama == $jumlah->tipe) --}}
                                        <input type="hidden" name="id[]" value="{{ $jumlah->id }}" >                    
                                        <div class="form-group">
                                            <div class="row mb20">
                                                <div class="col-sm-1">
                                                    <label class="control-label center-block"><strong>TIPE</strong></label>
                                                    <input type="text" name="tipe[]" class="form-control" value="{{ $jumlah->tipe }}">
                                                </div>
                                                <div class="col-sm-2">
                                                    <label class="control-label center-block"><strong>LUAS KAVLING</strong></label>
                                                    <input id="ukuran-luas-update" type="text" name="luas[]" class="form-control" placeholder="Luas bangunan" value="{{ $jumlah->luas  }}">
                                                </div>
                                                <div class="col-sm-2">
                                                    <label class="control-label center-block"><strong>JUMLAH</strong></label>
                                                <input type="text" name="jumlah[]" class="form-control" placeholder="Jumlah unit" value="{{ $jumlah->jumlah  }}">
                                                </div>
                                                <div class="col-sm-2">
                                                    <label class="control-label center-block"><strong>KATEGORI</strong></label>
                                                    @php
                                                        $kategori = ['Subsidi','Komersil'];
                                                    @endphp
                                                    <select name="kategori[]" class="form-control">
                                                        <option value="">---</option>
                                                        @foreach ($kategori as $ktg)
                                                            <option value="{{ $ktg }}" @if($jumlah->kategori === $ktg ) selected @endif>{{ $ktg }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @if ($index == $lastElement)
                                                <div class="col-md-1">
                                                    <label class="control-label center-block"><strong>&nbsp;</strong></label>
                                                    <i class="fa fa-2x fa-plus text-success" id="tambah_ukuran" style="margin: 5px 0; cursor: pointer" ></i>
                                                </div>
                                                @else 
                                                <div class="col-md-1">
                                                    <label class="control-label center-block"><strong>&nbsp;</strong></label>
                                                    <i class="fa fa-2x fa-close text-dark hapus_ukuran_edit" id="hapus_baris_ukuran" style="margin: 5px 0; cursor: pointer" onclick="hapusBarisUkuran({{ $jumlah->id }})"></i>
                                                </div>
                                                @endif
                                            </div>
                                        </div>  
                                {{-- @endif --}}
                            @endforeach
                    {{-- @endforeach --}}
                    </div>
                <button class="btn btn-danger btn-lg btn-block" type="submit">UPDATE</button>
                </form>
        @endif

        
        @if(count($pemohon->jumlah) == 0)
            <form id="form-ukuran" action="{{ route('ukuran.store') }}" method="POST">
                @php
                    $lastElement =  count($tipe) - 1;
                @endphp
                <div class="wrap_ukuran">
                @csrf
                <input type="hidden" name="pemohon_id" value="@isset($id_permohonan) {{ $id_permohonan }} @endisset" id="ukuran_id_permohonan">
                @foreach ($tipe as $key => $tp)
                        <div class="form-group">
                            <div class="row mb20">
                                <div class="col-sm-1">
                                    <label class="control-label center-block"><strong>TIPE</strong></label>
                                    <input type="text" name="tipe[]" class="form-control" value="{{ $tp->nama }}" >
                                </div>
                                <div class="col-sm-2">
                                    <label class="control-label center-block"><strong>LUAS KAVLING (m<sup>2</sup>)</strong></label>
                                    <input type="text" name="luas[]" class="form-control" placeholder="Luas Tanah/Lahan">
                                </div>
                                <div class="col-sm-2">
                                    <label class="control-label center-block"><strong>JUMLAH</strong></label>
                                    <input type="text" name="jumlah[]" class="form-control" placeholder="Jumlah unit">
                                </div>
                                <div class="col-sm-2">
                                    <label class="control-label center-block"><strong>KATEGORI</strong></label>
                                    <select name="kategori[]" class="form-control">
                                        <option value="">---</option>
                                        <option value="Subsidi">Subsidi</option>
                                        <option value="Komersil">Komersil</option>
                                    </select>
                                </div>
                                @if ($key == $lastElement)
                                <div class="col-md-1">
                                    <label class="control-label center-block"><strong>&nbsp;</strong></label>
                                    <i class="fa fa-2x fa-plus text-success" id="tambah_ukuran" style="margin: 5px 0"></i>
                                </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                    </div>
                 <button class="btn btn-danger btn-lg btn-block btn-next-tipe" type="submit">UPDATE >></button>
                </form>
        @endif
  </div>    
</div>    

@else 
    @if (isset($tipe))
        @if (count($tipe) > 0)
        <form id="form-ukuran" action="{{ route('ukuran.store') }}" method="POST">
            @php
                $lastElement =  count($tipe) - 1;
            @endphp
            <div class="wrap_ukuran">
             <input type="hidden" name="pemohon_id" value="@isset($id_permohonan) {{ $id_permohonan }} @endisset" id="ukuran_id_permohonan">                    
            @csrf
            @foreach ($tipe as $key => $tp)
               
                    <div class="form-group">
                        <div class="row mb20">
                            <div class="col-sm-1">
                                <label class="control-label center-block"><strong>TIPE</strong></label>
                                <input type="text" name="tipe[]" class="form-control" value="{{ $tp->nama }}">
                            </div>
                            <div class="col-sm-2">
                                <label class="control-label center-block"><strong>LUAS KAVLING (m<sup>2</sup>)</strong></label>
                                <input type="text" name="luas[]" class="form-control" placeholder="Luas kavling" >
                            </div>
                            <div class="col-sm-2">
                                <label class="control-label center-block"><strong>JUMLAH</strong></label>
                                <input type="text" name="jumlah[]" class="form-control" placeholder="Jumlah unit">
                            </div>
                            <div class="col-sm-2">
                                <label class="control-label center-block"><strong>KATEGORI</strong></label>
                                <select name="kategori[]" class="form-control">
                                    <option value="">---</option>
                                    <option value="Subsidi">Subsidi</option>
                                    <option value="Komersil">Komersil</option>
                                </select>
                            </div>
                            @if ($key == $lastElement)
                                <div class="col-md-1">
                                    <label class="control-label center-block"><strong>&nbsp;</strong></label>
                                    <i class="fa fa-2x fa-plus text-success" id="tambah_ukuran" style="margin: 5px 0"></i>
                                </div>
                            @endif
                        
                        </div>
                    </div>   
               
            @endforeach
            </div>
        @else
            <td colspan="6">Data master tipe masih kosong.</td>
        @endif
    @endif
    <button class="btn btn-danger btn-lg btn-block btn-next-tipe" type="submit"><i class="glyphicon glyphicon-floppy-save"></i> SIMPAN</button>
    </form>

@endif


<script src="{{ asset('lib/jquery/jquery.js') }}"></script>
<script src="{{ asset('lib/bootstrap/js/bootstrap.js') }}"></script>
<script src="{{ asset('js/jquery.form.js') }}"></script>
<script src="{{ asset('lib/jquery.gritter/jquery.gritter.js') }}"></script>
<script>

    $(document).ready(function () {
        $("#form-ukuran").on("submit", function(event){
            var data = $("#form-ukuran").serialize();
            $.ajax({
                method: "POST",
                url: BASE_URL+"/admin/ukuran",
                data: data,
                success: function (response) {
                    $.gritter.add({
                        title: 'PEMBERITAHUAN',
                        text: response.pesan,
                        class_name: 'with-icon question-circle primary'
                    });
                    $('.nav-tabs a[href="#tab7"]').tab('show');
                }
            });
            event.preventDefault();
        });

        var max_fields = 10; 
        var x = 1; 

        var wrap_ukuran     = $(".wrap_ukuran"); 
        var tambah_ukuran   = $("#tambah_ukuran"); 
        var html            = '<div class="form-group"><div class="row mb20"><div class="col-sm-1"><label class="control-label center-block"><strong>TIPE</strong></label><input type="text" name="tipe[]" class="form-control"></div><div class="col-sm-2"><label class="control-label center-block"><strong>LUAS KAVLING (m<sup>2</sup>)</strong></label><input type="text" name="luas[]" class="form-control" placeholder=""></div><div class="col-sm-2"><label class="control-label center-block"><strong>JUMLAH</strong></label><input type="text" name="jumlah[]" class="form-control" placeholder=""></div><div class="col-sm-2"><label class="control-label center-block"><strong>KATEGORI</strong></label><select name="kategori[]" class="form-control"><option value="">---</option><option value="Subsidi">Subsidi</option><option value="Komersil">Komersil</option></select></div><div class="col-md-1"><label class="control-label center-block"><strong>&nbsp;</strong></label><i class="fa fa-2x fa-minus text-danger hapus_ukuran" style="margin:5px 0"></i></div></div></div>';

       tambah_ukuran.on('click', function(){ 
            if(x < max_fields){ 
                wrap_ukuran.append(html); 
            }
        });

        wrap_ukuran.on("click",".hapus_ukuran", function(e){ 
            e.preventDefault();
            $(this).parent('div').parent().remove(); x--;
        });

        $(document).on("click",".hapus_ukuran_edit", function(e){ 
            // alert('tes');
            // e.preventDefault();
            // $(e.target).remove();
            $(e.target).parent('div').parent().remove();
        });

        $(".btn-next-tipe").on('click', function(){
            $('.nav-tabs a[href="#tab7"]').tab('show');
        });
    });

    function hapusBarisUkuran(id)
    {
        $.ajax({
            type: "method",
            url: "url",
            data: "data",
            dataType: "dataType",
            success: function (response) {
                
            }
        });
    }
</script>