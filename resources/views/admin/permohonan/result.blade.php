<form action="{{ route('permohonan.destroy',$id) }}" method="POST">
    <div class="btn-group">
        {{-- <button type="button" class="btn btn-sm btn-primary"><i class="fa fa-check"></i></button> --}}
        <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown"
            aria-expanded="false">
            <i class="fa fa-check"></i>
            <span class="sr-only">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu" role="menu">
            <li><a href="#" onclick="statusVerifikasi('{{ $id }}','2')"><i class="fa fa-check"></i>
                    Disetujui</a></li>
            <li><a href="#" onclick="statusVerifikasi('{{ $id }}','3')"><i class="fa fa-close"></i>
                    Ditolak</a></li>
        </ul>
    </div>
    <a href="{{ route('permohonan.edit', $id) }}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i>
        </a>
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>
        </button>
</form>



