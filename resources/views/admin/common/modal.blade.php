<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal-tambah-pengembang"
    class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-edit"></i> TAMBAH PENGEMBANG</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form role="form" action="{{ route('pengembang.store') }}" method="POST">
                    @csrf
                   <input type="hidden" name="form" value="{{ $form }}">
                    <div class="form-group">
                        <label for="nama"><strong>Nama</strong></label>
                        <input type="text" class="form-control" id="modal-pengembang-nama" placeholder="" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="alamat"><strong>Alamat</strong></label>
                        <input type="text" class="form-control" id="modal-pengembang-alamat" placeholder=""
                            name="alamat">
                    </div>
                    <div class="form-group">
                        <label for="kontak"><strong>Kontak</strong></label>
                        <input type="text" class="form-control" id="modal-pengembang-kontak" placeholder=""
                            name="kontak">
                    </div>
                    <button type="submit" class="btn btn-danger pull-right"><i class="fa fa-save"></i> Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>