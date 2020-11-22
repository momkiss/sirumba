@extends('layouts.master')
@section('content')
<h3><i class="fa fa-edit"></i> <strong>PERMOHONAN</strong></h3>
<div class="mb15"></div>


@if(session()->has('pesan'))
    <div class="alert alert-warning">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <strong>Pemberitahuan!</strong> {{ session()->get('pesan') }}
    </div>
@endif

<div class="row">
<div class="col-md-12">            
    <!-- Nav tabs -->
    <ul class="nav nav-tabs nav-success">
        <li class="active"><a href="#tab1" data-toggle="tab"><strong>Data Pemohon</strong></a></li>
        <li><a href="#tab2" data-toggle="tab"><strong>Kelengkapan Berkas</strong></a></li>
        <li ><a href="#tab3" data-toggle="tab"><strong>Prasarana</strong></a></li>
        <li ><a href="#tab4" data-toggle="tab"><strong>Sarana</strong></a></li>
        <li ><a href="#tab5" data-toggle="tab"><strong>Utilitas</strong></a></li>
        <li><a href="#tab6" data-toggle="tab"><strong>Jumlah Unit</strong></a></li>
        @if($form == "tambah")
            <li><a href="#tab7" data-toggle="tab"><strong>Selesai</strong></a></li>
        @endif
    </ul>

    <!-- Tab panes -->
    <div class="tab-content mb20">
        <div class="tab-pane active" id="tab1">
            <div class="panel">
                <div class="panel-heading nopaddingbottom">
                    <h4 class="panel-title">Data Permohonan</h4>
                    <p><em> Tanda (*) wajib diisi</em></p>
                </div>
                <input type="hidden" name="id" id="id_permohonan" @isset($id_permohonan) value="{{ $id_permohonan }}" @endisset>
                @include('admin.common.pemohon')
        </div><!-- panel -->

        </div>
        <div class="tab-pane" id="tab2">
           {{-- @include('admin.common.berkas')  --}}
        </div>
        <div class="tab-pane" id="tab3">
            @include('admin.common.prasarana')
        </div>

        <div class="tab-pane" id="tab4">
            @include('admin.common.sarana')
        </div>
        <div class="tab-pane" id="tab5">
            @include('admin.common.utilitas')
        </div>
        <div class="tab-pane" id="tab6">
            @include('admin.common.ukuran')
        </div>
        @if($form == "tambah")
            <div class="tab-pane" id="tab7">
                <label class="ckbox ckbox-primary">
                    <input type="checkbox" class="ml10" id="cb-permohonan"><span><strong> CENTANG UNTUK MENYELESAIKAN PENGISIAN
                            DATA</strong></span>
                </label>
            </div>
        @endif
      
    </div>
</div><!-- col-md-6 -->
</div><!-- row -->


<!-- Modal file persyaratan-->
<div class="modal" id="modal-file-berkas" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-edit"></i> FILE PERSYARATAN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
            <iframe class="file-berkas"  frameborder="0" width="100%" height="500px" type="application/pdf"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal hapus file persyaratan-->
<div class="modal" id="modal-file-hapus" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-edit"></i> </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="row text-center">
                        <button id="btn-hapus-berkas" class="btn btn-danger btn-lg">HAPUS</button> 
                    <button class="btn btn-primary btn-lg" data-dismiss="modal">BATAL</button>
                </div>
            </div>
        </div>
    </div>
</div>




 @endsection

 @push('js')
    <script>

    function click_first_radio_button(selector_radio,selector_field,val)
    {
        if(val == "Ada"){
            $('.'+selector_field).css('display','block');
        }
        if(val == "Tidak"){
            $('.'+selector_field).css('display','none');
        }
    }

    // Menampilkan data master jenis konstruksi
    function getDataKonstruksi()
    {
        var elem = "";
        $.ajax({
            method: "GET",
            url: BASE_URL+"/admin/data-konstruksi",
            async: false,
            success: function (data) {
                elem += '<option value="">---</option>';
                $.each(data, function (k,v) {
                    elem += '<option value="'+v.id+'">'+v.nama+'</option>';   
                });
            }
        });
        return elem;
    }

    function loadHTMLBerkas(id)
    {
         $.ajax({
            type: "get",
            url: BASE_URL+"/admin/berkas/show/"+id,
            success: function (res) {
                $("#tab2").html(res);
            }
        });
    }

    $(function() {
        var id_permohonan = $("#id_permohonan").val();
        if(id_permohonan != ""){
            loadHTMLBerkas(id_permohonan);
        }
    // Modal persyaratan
    $('#modal-file-berkas').on('shown.bs.modal', function (e) {
        var data = $(e.relatedTarget);
                var id = data.data('id');
                var title = data.data('title');
        $(this).find(".modal-title").html('<i class="fa fa-edit"></i> '+title);
    });
    $('#modal-file-hapus').on('shown.bs.modal', function (e) {
        var data = $(e.relatedTarget);
                var id = data.data('id');
                var id_pemohon = data.data('id-pemohon');
                var title = data.data('title');
        $("#btn-hapus-berkas").attr({'data-id':id, 'data-id-pemohon':id_pemohon});
        $(this).find(".modal-title").html(title);
    });
    $("#btn-hapus-berkas").on('click', function(){
        var id = $(this).attr('data-id');
        var id_pemohon = $(this).attr('data-id-pemohon');
        $.ajax({
            url: BASE_URL+"/admin/berkas/hapus/"+id+"/"+id_pemohon,
            success: function (response) {
                $.gritter.add({
                        title: 'PEMBERITAHUAN',
                        text: response.pesan,
                        class_name: 'with-icon question-circle danger'
                });
               loadHTMLBerkas(id_pemohon);
                $('#modal-file-hapus').modal("hide");
                // $('body').removeClass('modal-open');
                // $('.modal-backdrop').remove();
            }
        });
    });
    // Textarea Auto Resize
    autosize($('#autosize'));
    // Select2 Box
    $('#select3').select2();
    $("#select4").select2({ maximumSelectionLength: 2 });
    $("#select5").select2({ minimumResultsForSearch: Infinity });
    $("#select6").select2({ tags: true });
    $('.select1,.select2').select2({ width: '100%' });

    $("#kelurahan2-update").select2({
        placeholder: "Pilih Kelurahan",
    });
    // Date Picker
    $('.datepicker').datepicker({
            changeYear: true
    });
    $('.tahun').datepicker({
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'yy',
        viewMode: "years",
        minViewMode: "years"
        // beforeShow: function(input) {
        //      $(this).datepicker('widget').addClass('hide-calendar');
        // },
        // onClose: function(dateText, inst) { 
        //     $(this).datepicker('widget').removeClass('hide-calendar');
        //     $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
        // }
    });
    $(".tahun").focus(function () {
            $(".ui-datepicker-month").hide();
        });
    $('#datepicker-inline').datepicker();
    $('#datepicker-multiple').datepicker({ numberOfMonths: 2 });
    var max_fields      = 10; //maximum input boxes allowed
    var x = 1; //initlal text box count
    // Dynamic form jalan masuk
    var wrap_jalan_masuk     = $(".wrap_jalan_masuk"); //Fields wrapper
    var add_jalan_masuk      = $("#tambah-jalan-masuk"); //Add button ID
    $(add_jalan_masuk).on('click', function(){ //on add input button click
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrap_jalan_masuk).append('<div class="form-group"><div class="row"><div class="col-sm-2"><input type="text" name="jalanmasuk_panjang[]" class="form-control" placeholder="Panjang"></div><div class="col-sm-2"><input type="text" name="jalanmasuk_lebar[]" class="form-control" placeholder="Lebar"></div><div class="col-sm-4"><input type="text" name="jalanmasuk_keterangan[]" class="form-control" placeholder="Keterangan"></div><div class="col-sm-1"><i class="fa fa-2x fa-minus text-danger remove_jalan_masuk"></i></div></div>'); //add input box
        }
    });
    $(wrap_jalan_masuk).on("click",".remove_jalan_masuk", function(e){ //user click on remove text
        e.preventDefault(); 
        $(this).parent('div').parent().remove(); x--;
    });
    // Dynamic form jalan utama
    var wrap_jalan_utama   	= $(".wrap_jalan_utama"); 
    var add_jalan_utama     = $(".add_jalan_utama"); 
    var number_jalan_utama  = 1;
    $(add_jalan_utama).on('click', function(){ //on add input button click
        if(number_jalan_utama < max_fields){ //max input box allowed
            number_jalan_utama++; //text box increment
            $(wrap_jalan_utama).append('<div><div class="row"><hr><div class="col-sm-2"><label class="control-label center-block"><strong>PANJANG</strong></label><input type="text" name="jalanutama_panjang[]" class="form-control" placeholder="Panjang"></div><div class="col-sm-2"><label class="control-label center-block"><strong>LEBAR</strong></label><input type="text" name="jalanutama_lebar[]" class="form-control" placeholder="Lebar"></div><div class="col-sm-3"><label class="control-label center-block"><strong>KETERANGAN</strong></label><input type="text" name="jalanutama_keterangan[]" class="form-control" placeholder="Keterangan"></div><div class="col-sm-2"><div class="form-group"><label class="control-label center-block"><strong>MEDIAN</strong></label><label class="rdiobox-inline mr20"><input type="radio" data-number="'+number_jalan_utama+'" name="jalanutama_median[]['+number_jalan_utama+']" value="Ada"><span> Ada</span></label><label class="rdiobox-inline"><input type="radio" data-number="'+number_jalan_utama+'" name="jalanutama_median[]['+number_jalan_utama+']" value="Tidak"><span> Tidak</span></label></div></div><div class="col-sm-1 mt20"><i class="fa fa-2x fa-minus text-danger remove_jalan_utama mt20"></i></div><div class="col-md-4"></div> </div><div class="row"><div class="median-jalan-utama-field'+number_jalan_utama+'" style="display:none"><div class="col-sm-2 mt20"><div class="form-group"><label class="control-label"><strong>JENIS KONSTRUKSI</strong></label><input type="text" class="form-control" name="jalanutama_jenis_konstruksi[]" placeholder="Isikan Jenis Konstruksi"></div></div><div class="col-sm-2 mt20"><div class="form-group"><label class="control-label"><strong>UKURAN</strong></label><input type="text" name="jalanutama_ukuran[]" class="form-control" placeholder="Isikan ukuran"></div></div></div></div></div>'); //add input box
        }
        
    });
   
    $("#form-jalan-utama").on('click', 'input[type="radio"]' ,function() { 
        var number = $(this).data("number");
                if(this.value === "Ada"){
                    $('.median-jalan-utama-field'+number).css('display','block');
                }else{
                    $('.median-jalan-utama-field'+number).css('display','none');
                }
    });  

    $(wrap_jalan_utama).on("click",".remove_jalan_utama", function(e){ //user click on remove text
        e.preventDefault(); 
        $(this).parent('div').parent().parent().remove(); x--;
    });
    // Dynamic form jalan pembantu
    var wrap_jalan_pembantu   	= $(".wrap_jalan_pembantu"); //Fields wrapper
    var add_jalan_pembantu     = $(".add_jalan_pembantu"); //Add button ID
    $(add_jalan_pembantu).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrap_jalan_pembantu).append('<div><div class="row"><div class="col-sm-2"><label class="control-label center-block"><strong>&nbsp;</strong></label><input type="text" name="jalanpembantu_panjang[]" class="form-control" placeholder="Panjang"></div><div class="col-sm-2"><label class="control-label center-block"><strong>&nbsp;</strong></label><input type="text" name="jalanpembantu_lebar[]" class="form-control" placeholder="Lebar"></div><div class="col-sm-3"><label class="control-label center-block"><strong>&nbsp;</strong></label><input type="text" name="jalanpembantu_keterangan[]" class="form-control" placeholder="Keterangan"></div><div class="col-sm-1 mt20"><i class="fa fa-2x fa-minus text-danger remove_jalan_pembantu mt20"></i></div><label class="col-sm-2 control-label">&nbsp;</label></div></div>'); //add input box
        }
    });
    $(wrap_jalan_pembantu).on("click",".remove_jalan_pembantu", function(e){ //user click on remove text
        e.preventDefault(); 
        $(this).parent('div').parent().remove(); x--;
    });
 // Dynamic form jalan pembagi
    var wrap_jalan_pembagi   	= $(".wrap_jalan_pembagi"); //Fields wrapper
    var add_jalan_pembagi     = $(".add_jalan_pembagi"); //Add button ID
    $(add_jalan_pembagi).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrap_jalan_pembagi).append('<div><div class="row"><div class="col-sm-2"><label class="control-label center-block"><strong>&nbsp;</strong></label><input type="text" name="jalanpembagi_panjang[]" class="form-control" placeholder="Panjang"></div><div class="col-sm-2"><label class="control-label center-block"><strong>&nbsp;</strong></label><input type="text" name="jalanpembagi_lebar[]" class="form-control" placeholder="Lebar"></div><div class="col-sm-3"><label class="control-label center-block"><strong>&nbsp;</strong></label><input type="text" name="jalanpembagi_keterangan[]" class="form-control" placeholder="Keterangan"></div><div class="col-sm-1 mt20"><i class="fa fa-2x fa-minus text-danger remove_jalan_pembagi mt20"></i></div><label class="col-sm-2 control-label">&nbsp;</label></div></div>'); //add input box
        }
    });
    $(wrap_jalan_pembagi).on("click",".remove_jalan_pembagi", function(e){ //user click on remove text
        e.preventDefault(); 
        $(this).parent('div').parent().remove(); x--;
    });
 // Dynamic form culdesac
    var wrap_culdesac   	= $(".wrap_culdesac"); //Fields wrapper
    var add_culdesac        = $(".add_culdesac"); //Add button ID
    $(add_culdesac).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrap_culdesac).append('<div><div class="row"><div class="col-sm-2"><label class="control-label center-block"><strong>&nbsp;</strong></label><input type="text" name="culdesac_panjang[]" class="form-control" placeholder="Panjang"></div><div class="col-sm-2"><label class="control-label center-block"><strong>&nbsp;</strong></label><input type="text" name="culdesac_lebar[]" class="form-control" placeholder="Lebar"></div><div class="col-sm-3"><label class="control-label center-block"><strong>&nbsp;</strong></label><input type="text" name="culdesac_keterangan[]" class="form-control" placeholder="Keterangan"></div><div class="col-sm-1 mt20"><i class="fa fa-2x fa-minus text-danger remove_culdesac mt20"></i></div><label class="col-sm-2 control-label">&nbsp;</label></div></div>'); //add input box
        }
    });
    $(wrap_culdesac).on("click",".remove_culdesac", function(e){ //user click on remove text
        e.preventDefault(); 
        $(this).parent('div').parent().remove(); x--;
    });
    // Dynamic form drainase
    var wrap_drainase   = $(".wrap_drainase"); //Fields wrapper
    var add_drainase     = $(".add_drainase"); //Add button ID
    $(add_drainase).click(function(e){ //on add input button click
        e.preventDefault();
        getDataKonstruksi();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            var num = x-1;
            $(wrap_drainase).append('<div><div class="row"><div class="col-sm-2"><label class="control-label center-block"><strong>&nbsp;</strong></label><input type="text" name="drainase_panjang[]" class="form-control" placeholder="Panjang"></div><div class="col-sm-2"><label class="control-label center-block"><strong>&nbsp;</strong></label><input type="text" name="drainase_lebar[]" class="form-control" placeholder="Lebar"></div><div class="col-sm-2"><div class="form-group"><label class="control-label"><strong>&nbsp;</strong></label><input type="text" name="drainase_jenis_konstruksi[]" class="form-control" placeholder="Isikan Jenis Konstruksi"></div></div><div class="col-sm-3"><label class="control-label center-block"><strong>&nbsp;</strong></label><input type="text" name="drainase_keterangan[]" class="form-control" placeholder="misal. terhubung jalur 1/2/3"></div><div class="col-sm-1"><label class="control-label center-block"><strong>&nbsp;</strong></label><i class="fa fa-2x fa-minus text-danger remove_drainase"></i></div><div class="col-sm-2"></div></div></div>'); //add input box
        }
    });
    $(wrap_drainase).on("click",".remove_drainase", function(e){ //user click on remove text
        e.preventDefault(); 
        $(this).parent('div').parent().remove(); x--;
    });
    // Dynamic form limbah
    var wrap_limbah   = $(".wrap_limbah"); //Fields wrapper
    var add_limbah     = $(".add_limbah"); //Add button ID
    $(add_limbah).click(function(e){ //on add input button click
        e.preventDefault();
        var num_median_field_limbah = 0;
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            var num_limbah = x-1;
            $(wrap_limbah).append('<div><div class="row mt10"><div class="col-sm-2"><label class="control-label center-block"><strong>&nbsp;</strong></label><input type="text" name="limbah_panjang[]" class="form-control" placeholder="Panjang"></div><div class="col-sm-2"><label class="control-label center-block"><strong>&nbsp;</strong></label><input type="text" name="limbah_lebar[]" class="form-control" placeholder="Lebar"></div><div class="col-sm-2"><div class="form-group"><label class="control-label"><strong>&nbsp;</strong></label><input type="text" name="limbah_jenis_konstruksi[]" class="form-control" placeholder="Isikan jenis konstruksi"></div></div><div class="col-sm-3"><label class="control-label center-block"><strong>&nbsp;</strong></label><input type="text" name="limbah_keterangan[]" class="form-control" placeholder="Keterangan"></div><div class="col-sm-3 mt20"><i class="fa fa-2x fa-minus text-danger remove_limbah mt20"></i></div></div><div class="row"><div class="limbah-median-field'+num_limbah+'" style="display:none"></div></div></div></div>'); //add input box
            num_median_field_limbah += num_limbah;
        }
    });
    $(wrap_limbah).on("click",".remove_limbah", function(e){ //user click on remove text
        e.preventDefault(); 
        $(this).parent('div').parent().parent().remove(); x--;
    });
    // Dynamic form sampah
    var wrap_sampah     = $(".wrap_sampah"); //Fields wrapper
    var add_sampah      = $(".add_sampah"); //Add button ID
    var number_sampah   = 1;
    $(add_sampah).click(function(e){ //on add input button click
        e.preventDefault();
        if(number_sampah < max_fields){ //max input box allowed
            number_sampah++; //text box increment
            $(wrap_sampah).append('<div><div class="row"><div class="col-sm-2"><label class="control-label center-block"><strong>&nbsp;</strong></label><input type="text" name="sampah_ukuran[]" class="form-control" placeholder="PxLxT / contoh: 5x3x2"></div><div class="col-sm-2"><div class="form-group"><label class="control-label"><strong>&nbsp;</strong></label><select name="sampah_jenis_tps[]" class="form-control"><option value="">---</option><option value="Permanen">Permanen</option><option value="Non Permanen">Non Permanen</option><option value="Pengelolaan">Pengelolaan</option></select></div></div><div class="col-sm-2"><div class="form-group"><label class="control-label"><strong>&nbsp;</strong></label><input type="text" name="sampah_jenis_konstruksi[]" class="form-control" placeholder="Isikan jenis konstruksi"></div></div><div class="col-sm-1"><label class="control-label center-block"><strong>&nbsp;</strong></label><input type="text" name="sampah_jarak[]" class="form-control" placeholder="Jarak (m)"></div><div class="col-sm-2"><label class="control-label center-block"><strong>&nbsp;</strong></label><input type="text" name="sampah_keterangan[]" class="form-control" placeholder="Keterangan jika ada"></div><div class="col-sm-1"><div class="form-group"><label class="control-label center-block"><strong>&nbsp;</strong></label><label class="rdiobox rdiobox-inline mr20"><input type="radio" name="sampah_terpilah[]['+number_sampah+']" value="Ya"><span>Ya</span> </label> <label class="rdiobox rdiobox-inline"> <input type="radio" name="sampah_terpilah[]['+number_sampah+']" value="Tidak"><span>Tidak</span></label></div></div><div class="col-sm-1 mt20"><i class="fa fa-2x fa-minus text-danger remove_sampah mt20"></i></div></div></div></div>'); //add input box
        }
    });
    $(wrap_sampah).on("click",".remove_sampah", function(e){ //user click on remove text
        e.preventDefault(); 
        $(this).parent('div').parent().parent().remove(); x--;
    });


        $(".btn-next-prasarana").on('click', function () {
            $('.nav-tabs a[href="#tab4"]').tab('show');
        });
        // $(".btn-next-sarana").on('click', function () {
        //     $('.nav-tabs a[href="#tab5"]').tab('show');
        // });
        // $(".btn-next-utilitas").on('click', function () {
        //     $('.nav-tabs a[href="#tab6"]').tab('show');
        // });
        $('.nav-tabs a').on('shown.bs.tab', function(event){
            var x = $(event.target).text();         // active tab
            var y = $(event.relatedTarget).text();  // previous tab
            console.log(x);
            $(".act span").text(x);
            $(".prev span").text(y);
        });
        
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            var target = $(e.target).attr("href") 
            var id = $.trim($("#id_permohonan").val());
                if(target == "#tab2"){
                    $.ajax({
                        type: "get",
                        url: BASE_URL+"/admin/berkas/show/"+id,
                        success: function (res) {
                            $("#tab2").html(res);
                        }
                    });
                }

            });


        // Ajax permohonan
         $('#form-permohonan').validate({
            highlight: function (element) {
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
                jQuery(element).closest('.form-group').removeClass('has-success').addClass('has-error');
            },
             success: function (element) {
                 $(element).closest('.form-group').removeClass('has-error');
                 jQuery(element).closest('.form-group').removeClass('has-error');
            },
            submitHandler: function(){
                var data = $("#form-permohonan").serialize();
                    $.ajax({
                        method: "POST",
                        url: BASE_URL+"/admin/permohonan/simpan",
                        data: data,
                        success: function (response) {
                            $.gritter.add({
                                title: 'PEMBERITAHUAN',
                                text: response.pesan,
                                class_name: 'with-icon question-circle success'
                            });
                            $("#id_permohonan,.prasarana_id_permohonan,#sarana_id_permohonan,#utilitas_id_permohonan,#ukuran_id_permohonan").val(response.id);
                            $('.nav-tabs a[href="#tab2"]').tab('show');
                            $.ajax({
                                type: "get",
                                url: BASE_URL+"/admin/berkas/show/"+response.id,
                                success: function (res) {
                                    $("#tab2").html(res);
                                }
                            });
                        }
                    });
            },
        });


        // Prasarana jalan masuk
        $("#form-jalan-masuk").submit(function( event ) {
            var data = $(this).serialize();
            $.ajax({
                method: "POST",
                url: BASE_URL+"/admin/prasarana/jalan-masuk/simpan",
                data: data,
                success: function (response) {
                     $.gritter.add({
                        title: 'PEMBERITAHUAN',
                        text: response.pesan,
                        class_name: 'with-icon question-circle primary'
                    });
                    $('.nav-tabs a[href="#tab3"]').tab('show');
                }
            });
            event.preventDefault();
        });

        // Prasarana jalan utama
        $("#form-jalan-utama").submit(function( event ) {
            var data = $(this).serialize();
            $.ajax({
                method: "POST",
                url: BASE_URL+"/admin/prasarana/jalan-utama/simpan",
                data: data,
                success: function (response) {
                     $.gritter.add({
                        title: 'PEMBERITAHUAN',
                        text: response.pesan,
                        class_name: 'with-icon question-circle primary'
                    });
                    $('.nav-tabs a[href="#tab3"]').tab('show');
                }
            });
            event.preventDefault();
        });

        // Prasarana jalan pembantu
        $("#form-jalan-pembantu").submit(function( event ) {
            var data = $(this).serialize();
            $.ajax({
                method: "POST",
                url: BASE_URL+"/admin/prasarana/jalan-pembantu/simpan",
                data: data,
                success: function (response) {
                     $.gritter.add({
                        title: 'PEMBERITAHUAN',
                        text: response.pesan,
                        class_name: 'with-icon question-circle primary'
                    });
                    $('.nav-tabs a[href="#tab3"]').tab('show');
                }
            });
            event.preventDefault();
        });

        // Prasarana jalan pembagi
        $("#form-jalan-pembagi").submit(function( event ) {
            var data = $(this).serialize();
            $.ajax({
                method: "POST",
                url: BASE_URL+"/admin/prasarana/jalan-pembagi/simpan",
                data: data,
                success: function (response) {
                     $.gritter.add({
                        title: 'PEMBERITAHUAN',
                        text: response.pesan,
                        class_name: 'with-icon question-circle primary'
                    });
                    $('.nav-tabs a[href="#tab3"]').tab('show');
                }
            });
            event.preventDefault();
        });

        // Prasarana limbah
         $("#form-limbah").submit(function( event ) {
            var data = $(this).serialize();
            $.ajax({
                method: "POST",
                url: BASE_URL+"/admin/prasarana/limbah/simpan",
                data: data,
                success: function (response) {
                     $.gritter.add({
                        title: 'PEMBERITAHUAN',
                        text: response.pesan,
                        class_name: 'with-icon question-circle primary'
                    });
                    $('.nav-tabs a[href="#tab3"]').tab('show');
                }
            });
            event.preventDefault();
        });
        
        // Prasarana sampah
         $("#form-sampah").submit(function( event ) {
            var data = $(this).serialize();
            $.ajax({
                method: "POST",
                url: BASE_URL+"/admin/prasarana/sampah/simpan",
                data: data,
                success: function (response) {
                     $.gritter.add({
                        title: 'PEMBERITAHUAN',
                        text: response.pesan,
                        class_name: 'with-icon question-circle primary'
                    });
                    $('.nav-tabs a[href="#tab3"]').tab('show');
                }
            });
            event.preventDefault();
        });


        // Ajax sarana
        $("#form-sarana").on("submit", function(event){
            // var isValid;
            //     $("#form-sarana").find("input").each(function() {
            //     var element = $(this);
            //         if (element.val() == "") {
            //             alert('Semua inputan masih kosong');
            //             return false;
            //         }
            //     });
                var data = $("#form-sarana").serialize();
                    $.ajax({
                        method: "POST",
                        url: BASE_URL+"/admin/sarana/simpan",
                        data: data,
                        success: function (response) {
                            $.gritter.add({
                                title: 'PEMBERITAHUAN',
                                text: response.pesan,
                                class_name: 'with-icon question-circle primary'
                            });
                            $('.nav-tabs a[href="#tab5"]').tab('show');
                        }
                    });
            event.preventDefault();
        });
        // Ajax utilitas
        $("#form-utilitas").on("submit", function(event){
        //    var isValid;
        //         $("#form-utilitas").find("input").each(function() {
        //         var element = $(this);
        //             if (element.val() == "") {
        //                 alert('Semua inputan masih kosong');
        //                 return false;
        //             }
        //         });
            var data = $("#form-utilitas").serialize();
            $.ajax({
                method: "POST",
                url: BASE_URL+"/admin/utilitas",
                data: data,
                success: function (response) {
                     $.gritter.add({
                        title: 'PEMBERITAHUAN',
                        text: response.pesan,
                        class_name: 'with-icon question-circle primary'
                    });
                    $('.nav-tabs a[href="#tab6"]').tab('show');
                }
            });
            event.preventDefault();
        });
        // Complete
        $('#cb-permohonan').change(function () {
            if (this.checked) {
                 var id = $("#id_permohonan").val();
                    $.ajax({
                        url: BASE_URL+"/admin/permohonan/selesai/"+id,
                        success: function (response) {
                            $.gritter.add({
                                title: 'PEMBERITAHUAN',
                                text: response.pesan,
                                class_name: 'with-icon question-circle primary'
                            });
                        }
                    });
                    window.location.href = BASE_URL+"/admin/permohonan/rekap";
            }
        });

    new AutoNumeric('#luas-lahan', {
        alwaysAllowDecimalCharacter: true,
        decimalPlace: "2",
        decimalCharacter: ",",
        digitGroupSeparator: "."
    });

    new AutoNumeric('#luas-kavling', {
        alwaysAllowDecimalCharacter: true,
        decimalPlace: "2",
        decimalCharacter: ",",
        digitGroupSeparator: "."
    });

    new AutoNumeric('#luas-prasarana', {
        alwaysAllowDecimalCharacter: true,
        decimalPlace: "2",
        decimalCharacter: ",",
        digitGroupSeparator: "."
    });

    new AutoNumeric('#luas-sarana', {
        alwaysAllowDecimalCharacter: true,
        decimalPlace: "2",
        decimalCharacter: ",",
        digitGroupSeparator: "."
    });

    new AutoNumeric('#luas-rth', {
        alwaysAllowDecimalCharacter: true,
        decimalPlace: "2",
        decimalCharacter: ",",
        digitGroupSeparator: "."
    });
});


</script>

 @endpush