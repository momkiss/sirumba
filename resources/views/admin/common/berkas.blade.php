
<link rel="stylesheet" href="{{ asset('lib/jquery.gritter/jquery.gritter.css') }}">
@php
$no = 1
@endphp
<div id="print-error-msg" class="alert " style="display:none">
    <ul></ul>
</div>

<ul class="nav nav-tabs nav-line" id="tab-kelengkapan-berkas">
    <li><a href="#tab-berkas-administrasi" data-toggle="tab"><strong>Administrasi</strong></a></li>
    <li><a href="#tab-berkas-teknis" data-toggle="tab"><strong>Teknis</strong></a></li>
</ul>

<div class="tab-content mb20">
    <div class="tab-pane active" id="tab-berkas-administrasi">
        @if(isset($berkas))
            @if(count($berkas) > 0)
                @foreach ($berkas as $key => $bks)
                   
                        @if ($key >= 0 && $key <= 8)
                        <form id="form-berkas{{ $key }}" action="{{ route('berkas.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="panel">
                                    <div class="panel-heading" style="padding-bottom: 5px !important">
                                        <h4 class="panel-title @if ($bks->tersedia === "Ada" && $bks->path != NULL) text-dark @else text-danger
                                            @endif"><strong>{{ $no++ }}. {{ $bks->nama }}</strong>
                                            @if ($bks->tersedia === "Tidak")
                                            <i class="fa fa-close text-danger"></i>
                                            @endif
                                            @if ($bks->tersedia === "Ada")
                                            <i class="fa fa-check text-success"></i>
                                            @endif
                                        </h4>
                                        <p>@if ($bks->tersedia === "Ada" && $bks->path != NULL)
                                            <a href="javascript:;" data-toggle="modal" data-target="#modal-file-berkas" data-file="{{ $bks->path }}"
                                                data-title="{{ $bks->nama }}"> [LIHAT]</a>
                                            <a href="javascript:;" class="text-danger" data-toggle="modal" data-target="#modal-file-hapus"
                                                data-id-pemohon="{{ $bks->pemohon_id }}" data-id="{{ $bks->id }}" data-file="{{ $bks->path }}"
                                                data-title="{{ $bks->nama }}"> [HAPUS]</a>
                                            @else
                                            <span style="color: red"></span>
                                            @endif</p>
                                    </div>
                                    <div class="panel-body">
                                        <div class="input-group">
                                            <input type="hidden" name="id" value="{{ $bks->id }}">
                                            <input class="form-control  mr15 ml15" type="file" name="file">
                                            <span class="input-group-btn">
                                                <button data-num = {{$key}} onclick="upload('{{$key}}')" type="button" class="btn btn-sm btn-danger btn-upload-berkas"><i class="fa fa-cloud-upload"></i> UPLOAD</button>
                                                {{-- <button data-num = {{$key}}  type="button" class="btn btn-sm btn-danger btn-upload-berkas"><i class="fa fa-cloud-upload"></i> UPLOAD</button> --}}
                                            </span>
                                        </div>
                                    </div>
                            </div>
                            </form>
                        @endif
                @endforeach
            @else
                <td colspan="6">Berkas tidak ada</td>
            @endif
        @else
            <td colspan="6"><center><strong style="font-size:16px">BERKAS TIDAK ADA</strong></center></td>
        @endif
    </div>
    <div class="tab-pane" id="tab-berkas-teknis">
        @if(isset($berkas))
            @if(count($berkas) > 0)
                @foreach ($berkas as $key => $bks)
                    
                        @if ($key >= 9)
                        <form id="form-berkas{{ $key }}" action="{{ route('berkas.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="panel">
                                    <div class="panel-heading" style="padding-bottom: 5px !important">
                                        <h4 class="panel-title @if ($bks->tersedia === "Ada" && $bks->path != NULL) text-dark @else text-danger
                                            @endif"><strong>{{ $no++ }}. {{ $bks->nama }}</strong>
                                            @if ($bks->tersedia === "Tidak")
                                            <i class="fa fa-close text-danger"></i>
                                            @endif
                                            @if ($bks->tersedia === "Ada")
                                            <i class="fa fa-check text-success"></i>
                                            @endif
                                        </h4>
                                        <p>@if ($bks->tersedia === "Ada" && $bks->path != NULL)
                                            <a href="javascript:;" data-toggle="modal" data-target="#modal-file-berkas" data-file="{{ $bks->path }}"
                                                data-title="{{ $bks->nama }}"> [LIHAT]</a>
                                            <a href="javascript:;" class="text-danger" data-toggle="modal" data-target="#modal-file-hapus"
                                                data-id-pemohon="{{ $bks->pemohon_id }}" data-id="{{ $bks->id }}" data-file="{{ $bks->path }}"
                                                data-title="{{ $bks->nama }}"> [HAPUS]</a>
                                            @else
                                            <span style="color: red"></span>
                                            @endif</p>
                                    </div>
                                    <div class="panel-body">
                                        <div class="input-group">
                                            <input type="hidden" name="id" value="{{ $bks->id }}">
                                            <input class="form-control mr15 ml15" type="file" name="file">
                                            <span class="input-group-btn">
                                                <button data-num = {{$key}} onclick="upload('{{$key}}')" type="button" class="btn btn-sm btn-danger btn-upload-berkas"><i class="fa fa-cloud-upload"></i> UPLOAD</button>
                                                {{-- <button data-num = {{$key}}  type="button" class="btn btn-sm btn-danger btn-upload-berkas"><i class="fa fa-cloud-upload"></i> UPLOAD</button> --}}
                                            </span>
                                        </div>
                                    </div>
                            </div>
                            </form>
                        @endif
                
                @endforeach
            @else
                <td colspan="6">Berkas tidak ada</td>
            @endif
        @else
            <td colspan="6"><center><strong style="font-size:16px">BERKAS TIDAK ADA</strong></center></td>
        @endif
    </div> 


</div>

        <button class="btn btn-danger btn-lg btn-block btn-next-berkas">SIMPAN</button>

        <script src="{{ asset('lib/jquery/jquery.js') }}"></script>
        <script src="{{ asset('lib/bootstrap/js/bootstrap.js') }}"></script>
        <script src="{{ asset('js/jquery.form.js') }}"></script>
        <script src="{{ asset('lib/jquery.gritter/jquery.gritter.js') }}"></script>
        <script>

            function upload(key){           
                var form = $("#form-berkas"+key);
                    var formdata = false;
                    if (window.FormData){
                        formdata = new FormData(form[0]);
                }

                var id = $.trim($("#id_permohonan").val());
                
                $.ajax({
                    url:BASE_URL+"/admin/berkas/upload",
                    data: formdata ? formdata : form.serialize(),
                    contentType: false,
                    type : 'POST',
                    cache: false,
                    processData: false,
                        success:function(data)
                        {   
                            $.gritter.add({
                                    title: 'PEMBERITAHUAN',
                                    text: data.pesan,
                                    class_name: 'with-icon question-circle success'
                            });

                            
                            $.ajax({
                                    type: "get",
                                    url: BASE_URL+"/admin/berkas/show/"+id,
                                    success: function (res) {
                                        $("#tab2").html(res);
                                            if(key >= 0 && key <= 8){ 
                                                $('#tab-kelengkapan-berkas a[href="#tab-berkas-administrasi" ]').tab('show'); 
                                            } 
                                        
                                            if(key > 8){
                                                $('#tab-kelengkapan-berkas a[href="#tab-berkas-teknis"]').tab('show');
                                            }
                                        
                                    }
                                });
                           
                        }
                });

              
            }


            

            $(document).ready(function () {
                
                $(".btn-next-berkas").on('click', function(){
                    $('.nav-tabs a[href="#tab3"]').tab('show');
                });
            });
        </script>