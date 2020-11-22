
<style>
    td,th {
        padding: 5px 10px !important;
    }
</style>

<!-- Modal file persyaratan-->
<div class="modal" id="modal-rekap-berkas" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-edit"></i> </h5>
                <button type="button" class="close tutup-modal"  aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe id="file-rekap-berkas" frameborder="0" width="100%" height="500px" type="application/pdf"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger tutup-modal" >Tutup</button>
            </div>
        </div>
    </div>
</div>
    <table width="100%" border="1" cellspacing="5" cellpadding="3">
            <tbody>
                <tr class="bg-primary">
                    <th>NO</th>
                    <th>BERKAS</th>
                    <th>ADA</th>
                    <th>TIDAK</th>
                    <th>KETERANGAN</th>
                </tr>
                @php
                    $no = 1
                @endphp
                @foreach ($permohonan->berkas as $berkas)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td><a href="#" data-toggle="modal" data-target="#modal-rekap-berkas" data-file="{{ $berkas->path }}" data-title="{{ $berkas->nama }}" data-id="{{ $berkas->id }}">{{ $berkas->nama }}</a></td>
                        <td>@if ($berkas->tersedia == "Ada")
                            <center>&#x2714;</center>
                        @endif</td>
                        <td>@if ($berkas->tersedia == "Tidak")
                        <center>&#x2714;</center>
                        @endif</td>
                        <td>&nbsp;</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <script>
            $(document).ready(function () {
                $(".tutup-modal").on("click", function(){
                    $("#modal-rekap-berkas").modal('hide');
                });
               // Modal rekap berkas
                $('#modal-rekap-berkas').on('show.bs.modal', function (e) {
                    var data = $(e.relatedTarget)
                    var file = data.data('file')
                    var title = data.data('title');
                    if(file == "")
                    {
                        // alert("Berkas tidak ada");
                        alertError('Berkas tidak ada.');
                        return false;
                    }else{
                        $(this).find(".modal-title").html('<i class="fa fa-edit"></i> '+title);
                        $(this).find('#file-rekap-berkas').attr('src', BASE_URL + '/uploads/' + file);
                    }
                });
            });
        </script>