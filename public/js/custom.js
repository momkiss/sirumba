$(document).ready(function () {

  $('#pemohon-pengembang').on('change', function(){
      var id = $(this).children("option:selected").val();
        $.ajax({
            url: BASE_URL+"/admin/permohonan/pengembang/"+id,
            dataType: "json",
            success: function (data) {
                console.log(data);
                $('#pemohon-nama').val(data.direktur);
                $('#pemohon-jabatan').val("Direktur");
                $('#pemohon-kontak').val(data.telp);
                $('#pemohon-jalan').val(data.jalan);
                $('#pemohon-rt').val(data.rt);
                $('#pemohon-kelurahan').val(data.kelurahan);
                $('#pemohon-kecamatan').val(data.kecamatan);
                $('#pemohon-ktp').val(data.no_ktp);
                $('#pemohon-kode-pos').val(data.kode_pos);
            }
        });
  });

    var tabelPermohonan = $('#tabel-permohonan').DataTable({
        processing: true,
        serverSide: true,
        paging: true,
        pageLength: 50,
        ajax: {
            url: BASE_URL+"/admin/permohonan/rekap",
            type: 'GET',
        },
        columns: [
            // { data: 'id', name: 'id', 'visible': false },
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'perusahaan', name: 'perusahaan' },
            { data: 'nama_perumahan', name: 'nama_perumahan' },
            { data: 'alamat', name: 'alamat'},
            { data: 'nomor_surat_pengesahan', name: 'nomor_surat_pengesahan' },
            { data: 'tanggal_pengesahan', name: 'tanggal_pengesahan' },
            { data: 'luas_lahan', name: 'luas_lahan' },
            { data: 'status', name: 'status' },
            { data: 'aksi', name: 'aksi', orderable: false },
        ],
        columnDefs: [
            {
                targets: -1,
                className:'text-nowrap'
            }
        ],
        order: [[0, 'desc']]
    });

    $('#tabel-permohonan tbody').on('click', 'a.hapus', function () {
        var id = $(this).data('id');
        hapus(id, 'permohonan');
    });

  
    // Mask
     var kelurahan = $('#kelurahan2-update');   
    
    $('#kecamatan2-update').on('change', function () {
        
        $('#kecamatan2-update').removeAttr('selected');
        var kode = $('#kecamatan2-update').find(":selected").data("kode");
        console.log(kode);

        
        $.ajax({
            url: BASE_URL+'/admin/getkelurahan/'+kode,
            method: 'GET',
            success: function (data) {
                kelurahan.select2("val", "");
                var html = $.map(data, function (lcn) {
                    return '<option value="' + lcn.id + '">' + lcn.nama + '</option>'
                }).join('');
                kelurahan.html(html)
            }
        });
    });

    var kelurahan2 = $('.kelurahan2');
    $('.kecamatan2').change(function () {
        var kode = $('.kecamatan2').select2().find(":selected").data("kode");
        $.ajax({
            url: BASE_URL+'/admin/getkelurahan/'+kode,
            method: 'GET',
            success: function (data) {
                var html = $.map(data, function (lcn) {
                    return '<option value="' + lcn.id + '">' + lcn.nama + '</option>'
                }).join('');
                kelurahan2.html(html)
            }
        });
    });

 


    $('#modal-detail-pemohon').on('shown.bs.modal', function (e) {
        data = $(e.relatedTarget)
        id = data.data('id')
        $("#rekap-cetak-permohonan").attr('href',BASE_URL+'/admin/laporan/permohonan/'+id);
        $("#rekap-cetak-kelengkapan").attr('href',BASE_URL+'/admin/laporan/kelengkapan/'+id);
        $.ajax({
            type: "POST",
            url: BASE_URL+"/admin/permohonan/detail/"+id,
            success: function (pemohon) {
                $('#detail-isi-pemohon').html(pemohon);
            }
        });
        $.ajax({
            type: "POST",
            url: BASE_URL+"/admin/berkas/detail/"+id,
            success: function (berkas) {
                $('#detail-isi-berkas').html(berkas);
            }
        });
        $.ajax({
            type: "POST",
            url: BASE_URL+"/admin/prasarana/detail/"+id,
            success: function (prasarana) {
                $('#detail-isi-prasarana').html(prasarana);
            }
        });
        $.ajax({
            type: "POST",
            url: BASE_URL+"/admin/sarana/detail/"+id,
            success: function (sarana) {
                $('#detail-isi-sarana').html(sarana);
            }
        });
        $.ajax({
            type: "POST",
            url: BASE_URL+"/admin/utilitas/detail/"+id,
            success: function (utilitas) {
                $('#detail-isi-utilitas').html(utilitas);
            }
        });
        $.ajax({
            type: "POST",
            url: BASE_URL+"/admin/ukuran/detail/"+id,
            success: function (ukuran) {
                $('#detail-isi-ukuran').html(ukuran);
            }
        });
    })

// Form edit permohonan
    $("#form-update-permohonan").on('submit', function(e){
        var id = $("#id_permohonan").val();
        $.ajax({
            type: "POST",
            data: $(this).serialize(),
            url: BASE_URL+"/admin/permohonan/update/"+id,
            success: function (res) {
                console.log(res);
                $.gritter.add({
                    title: 'PEMBERITAHUAN',
                    text: res.pesan,
                    class_name: 'with-icon question-circle primary'
                });
            }
        });
        e.preventDefault();
    });


    // Form edit jalan masuk
    $("#form-jalan-masuk-update").submit(function (event) {
        var id = $("#prasarana_id_permohonan").val();
        var data = $(this).serialize();
        $.ajax({
            method: "POST",
            url: BASE_URL + "/admin/prasarana/jalan-masuk/update/"+id,
            data: data,
            success: function (response) {
                $.gritter.add({
                    title: 'PEMBERITAHUAN',
                    text: response.pesan,
                    class_name: 'with-icon question-circle primary'
                });
            }
        });
        event.preventDefault();
    });

    $("#form-jalan-utama-update").submit(function (event) {
        var id = $("#prasarana_id_permohonan").val();
        var data = $(this).serialize();
        $.ajax({
            method: "POST",
            url: BASE_URL + "/admin/prasarana/jalan-utama/update/"+id,
            data: data,
            success: function (response) {
                $.gritter.add({
                    title: 'PEMBERITAHUAN',
                    text: response.pesan,
                    class_name: 'with-icon question-circle primary'
                });
            }
        });
        event.preventDefault();
    });

    // Form edit jalan pembantu
    $("#form-jalan-pembantu-update").submit(function (event) {
        var id = $("#prasarana_id_permohonan").val();
        var data = $(this).serialize();
        $.ajax({
            method: "POST",
            url: BASE_URL+"/admin/prasarana/jalan-pembantu/update/"+id,
            data: data,
            success: function (response) {
                $.gritter.add({
                    title: 'PEMBERITAHUAN',
                    text: response.pesan,
                    class_name: 'with-icon question-circle primary'
                });
            }
        });
        event.preventDefault();
    });

    // Form edit jalan pembagi
    $("#form-jalan-pembagi-update").submit(function (event) {
        var id = $("#prasarana_id_permohonan").val();
        var data = $(this).serialize();
        $.ajax({
            method: "POST",
            url: BASE_URL+"/admin/prasarana/jalan-pembagi/update/"+id,
            data: data,
            success: function (response) {
                $.gritter.add({
                    title: 'PEMBERITAHUAN',
                    text: response.pesan,
                    class_name: 'with-icon question-circle primary'
                });
            }
        });
        event.preventDefault();
    });

    // Form edit culdesac
    $("#form-culdesac-update").submit(function (event) {
        var id = $("#prasarana_id_permohonan").val();
        var data = $(this).serialize();
        $.ajax({
            method: "POST",
            url: BASE_URL+"/admin/prasarana/culdesac/update/"+id,
            data: data,
            success: function (response) {
                $.gritter.add({
                    title: 'PEMBERITAHUAN',
                    text: response.pesan,
                    class_name: 'with-icon question-circle primary'
                });
            }
        });
        event.preventDefault();
    });

    // Form edit drainase
    $("#form-drainase-update").submit(function (event) {
        var id = $("#prasarana_id_permohonan").val();
        var data = $(this).serialize();
        $.ajax({
            method: "POST",
            url: BASE_URL+"/admin/prasarana/drainase/update/"+id,
            data: data,
            success: function (response) {
                $.gritter.add({
                    title: 'PEMBERITAHUAN',
                    text: response.pesan,
                    class_name: 'with-icon question-circle primary'
                });
            }
        });
        event.preventDefault();
    });

    // Form edit limbah
    $("#form-limbah-update").submit(function (event) {
        var id = $("#prasarana_id_permohonan").val();
        var data = $(this).serialize();
        $.ajax({
            method: "POST",
            url: BASE_URL + "/admin/prasarana/limbah/update/" + id,
            data: data,
            success: function (response) {
                $.gritter.add({
                    title: 'PEMBERITAHUAN',
                    text: response.pesan,
                    class_name: 'with-icon question-circle primary'
                });
            }
        });
        event.preventDefault();
    });


    // Form edit sampah
    $("#form-sampah-update").submit(function (event) {
        var id = $("#prasarana_id_permohonan").val();
        var data = $(this).serialize();
        $.ajax({
            method: "POST",
            url: BASE_URL+"/admin/prasarana/sampah/update/"+id,
            data: data,
            success: function (response) {
                $.gritter.add({
                    title: 'PEMBERITAHUAN',
                    text: response.pesan,
                    class_name: 'with-icon question-circle primary'
                });
            }
        });
        event.preventDefault();
    });

// Form edit jumlah/ukuran
    $('#form-ukuran-update').on('submit', function (e) {
        var id = $("#id_permohonan").val();
        $.ajax({
            type: "POST",
            data: $(this).serialize(),
            url: BASE_URL + "/admin/jumlah/update/"+id,
            success: function (res) {
                console.log(res);
                $.gritter.add({
                    title: 'PEMBERITAHUAN',
                    text: res.pesan,
                    class_name: 'with-icon question-circle primary'
                });
            }
        });
        e.preventDefault();
    });

    // Form edit sarana
    $('#form-sarana-update').on('submit', function (e) {
        var id = $("#sarana_id_permohonan_update").val();
        $.ajax({
            type: "POST",
            data: $(this).serialize(),
            url: BASE_URL + "/admin/sarana/update/" + id,
            success: function (res) {
                console.log(res);
                $.gritter.add({
                    title: 'PEMBERITAHUAN',
                    text: res.pesan,
                    class_name: 'with-icon question-circle primary'
                });
            }
        });
        e.preventDefault();
    });


// Form edit utilitas
    $('#form-utilitas-update').on('submit', function (e) {
        var id = $("#utilitas_id_permohonan_update").val();
        $.ajax({
            type: "POST",
            data: $(this).serialize(),
            url: BASE_URL + "/admin/utilitas/update/"+id,
            success: function (res) {
                console.log(res);
                $.gritter.add({
                    title: 'PEMBERITAHUAN',
                    text: res.pesan,
                    class_name: 'with-icon question-circle primary'
                });
            }
        });
        e.preventDefault();
    });

    // Form edit dynamic jalan utama
    var number_jalan_utama = $('.wrap_jalan_utama_edit').find(".form-group").length;
    $(".add_jalan_utama_edit").on('click', function(){ 
        if(number_jalan_utama < 10){ //max input box allowed
            number_jalan_utama++; //text box increment
            $(".wrap_jalan_utama_edit").append('<div><div class="row"><div class="col-sm-2"><label class="control-label center-block"><strong>PANJANG</strong></label><input type="text" name="jalanutama_panjang[]" class="form-control" placeholder="Panjang"></div><div class="col-sm-2"><label class="control-label center-block"><strong>LEBAR</strong></label><input type="text" name="jalanutama_lebar[]" class="form-control" placeholder="Lebar"></div><div class="col-sm-3"><label class="control-label center-block"><strong>KETERANGAN</strong></label><input type="text" name="jalanutama_keterangan[]" class="form-control" placeholder="Keterangan"></div><div class="col-sm-2"><div class="form-group"><label class="control-label center-block"><strong>MEDIAN</strong></label><label class="rdiobox-inline mr20"><input type="radio" data-number="'+number_jalan_utama+'" name="jalanutama_median[]['+number_jalan_utama+']" value="Ada"><span> Ada</span></label><label class="rdiobox-inline"><input type="radio" data-number="'+number_jalan_utama+'" name="jalanutama_median[]['+number_jalan_utama+']" value="Tidak"><span> Tidak</span></label></div></div><div class="col-sm-1"><i class="fa fa-2x fa-minus text-danger remove_jalan_utama_edit mt20"></i></div><div class="col-md-4"></div> </div><div class="row"><div class="median-jalan-utama-field'+number_jalan_utama+'" style="display:none"><div class="col-sm-2 mt20"><div class="form-group"><label class="control-label"><strong>JENIS KONSTRUKSI</strong></label><select name="jalanutama_jenis_konstruksi_id[]" class="form-control">'+getDataKonstruksi()+'</select></div></div><div class="col-sm-2 mt20"><div class="form-group"><label class="control-label"><strong>UKURAN</strong></label><input type="text" name="jalanutama_ukuran[]" class="form-control" placeholder="Isikan ukuran"></div></div></div></div></div>'); //add input box
        }
    });
    $("#form-jalan-utama-update").on('click', 'input[type="radio"]' ,function() { 
        var number = $(this).data("number");
            if(this.value === "Ada"){
                $('.median-jalan-utama-field'+number).css('display','block');
            }else{
                $('.median-jalan-utama-field'+number).css('display','none');
            }
    });  
    $('.wrap_jalan_utama_edit').on("click",".remove_jalan_utama_edit", function(e){ //user click on remove text
        e.preventDefault(); 
        $(this).parent('div').parent().parent().remove(); 
        number_jalan_utama--;
    });


    // Form edit dynamic sampah
    var jumlah_field = $('.wrap_sampah_edit').find(".row").length;
    var jumlah_field = 0;
    $(".add_sampah_edit").on('click', function(){ 
        if (jumlah_field < 10){ //max input box allowed
            jumlah_field++; //text box increment
            $('.wrap_sampah_edit').append('<div><div class="row"><div class="col-sm-1"><label class="control-label center-block"><strong>&nbsp;</strong></label><input type="text" name="sampah_panjang[]" class="form-control" placeholder="Panjang"></div><div class="col-sm-1"><label class="control-label center-block"><strong>&nbsp;</strong></label><input type="text" name="sampah_lebar[]" class="form-control" placeholder="Lebar"></div><div class="col-sm-1"><label class="control-label center-block"><strong>&nbsp;</strong></label><input type="text" name="sampah_tinggi[]" class="form-control" placeholder="Tinggi"></div><div class="col-sm-2"><div class="form-group"><label class="control-label"><strong>&nbsp;</strong></label><select name="sampah_jenis_konstruksi_id[]" class="form-control konstruksi">' + getDataKonstruksi() + '</select></div></div><div class="col-sm-2"><label class="control-label center-block"><strong>&nbsp;</strong></label><input type="text" name="sampah_jarak[]" class="form-control" placeholder="Jarak (m)"></div><div class="col-sm-2 mt20"><div class="form-group"><label class="control-label center-block"><strong>&nbsp;</strong></label><label class="rdiobox rdiobox-inline mr20"><input type="radio" name="sampah_terpilah[][' + jumlah_field + ']" value="Ya"><span>Ya</span> </label> <label class="rdiobox rdiobox-inline"> <input type="radio" name="sampah_terpilah[][' + jumlah_field + ']" value="Tidak"><span>Tidak</span></label></div></div><div class="col-sm-1 mt20"><i class="fa fa-2x fa-minus text-danger remove_sampah_edit mt20"></i></div></div></div></div>'); //add input box
        }
    });

    $('.wrap_sampah_edit').on("click",".remove_sampah_edit", function(e){ //user click on remove text
        e.preventDefault(); 
        $(this).parent('div').parent().parent().remove(); 
        jumlah_field--;
    });
    
});

function hapusData(url){
    $.ajax({
        type: "GET",
        url: url,
        success: function (res) {
            console.log(res);
            $.gritter.add({
                title: 'PEMBERITAHUAN',
                text: res.pesan,
                class_name: 'with-icon question-circle primary'
            });
        }
    });
}


function statusVerifikasi(id,status)
{
    var table = $('#tabel-rekap').DataTable();

    $.ajax({
        type: "GET",
        url: BASE_URL+'/admin/permohonan/status/'+id+'/'+status,
        success: function (res) {
            $.gritter.add({
                title: 'PEMBERITAHUAN',
                text: res.pesan,
                class_name: 'with-icon question-circle primary'
            });
            table.ajax.reload();
        }
    });
}


function loadRekap()
{
    $.ajax({
        type: "GET",
        url: BASE_URL+"/admin/permohonan/result",
        success: function (response) {
            $('#result-rekap').html(response);
        }
    });
}

function submitJalanMasuk()
{
    $.ajax({
        method: "POST",
        url: BASE_URL + "/admin/prasarana/jalan-masuk/simpan",
        data: data,
        success: function (response) {
        }
    });
}


function submitJalanUtama()
{
    $.ajax({
        method: "POST",
        url: BASE_URL + "/admin/prasarana/jalan-utama/simpan",
        data: data,
        success: function (response) {
        }
    });
}


function submitJalanPembantu()
{
    $.ajax({
        method: "POST",
        url: BASE_URL + "/admin/prasarana/jalan-pembantu/simpan",
        data: data,
        success: function (response) {
           
        }
    });
}

function submitJalanPembagi()
{
    $.ajax({
        method: "POST",
        url: BASE_URL + "/admin/prasarana/jalan-pembagi/simpan",
        data: data,
        success: function (response) {
        }
    });
}

function submitLimbah()
{
    $.ajax({
        method: "POST",
        url: BASE_URL + "/admin/prasarana/limbah/simpan",
        data: data,
        success: function (response) {
           
        }
    });
}

function submitSampah()
{
    var data = $('#form-sampah').serialize();
    $.ajax({
        method: "POST",
        url: BASE_URL + "/admin/prasarana/sampah/simpan",
        data: data,
        success: function (response) {
        }
    });
}

function submitPrasarana(url,formData)
{
    $.ajax({
        method: "POST",
        url: url,
        data: formData,
        success: function () {
            $('.nav-tabs a[href="#tab4"]').tab('show');
        }
    });
}

