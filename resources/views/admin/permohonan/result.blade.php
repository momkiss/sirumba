{{-- <form action="{{ route('permohonan.destroy',$id) }}" method="POST"> --}}
    <a href="#"  class="btn btn-sm btn-warning" data-id="{{ $id }}" data-toggle="modal" title="Pengesahan" data-target="#modalPengesahan"><i class="fa fa-check"></i></a>
    <a href="{{ route('permohonan.edit', $id) }}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i>
        </a>
    @csrf
    @method('DELETE')
    <a href="#" onclick="hapus('{{ $id }}','permohonan');"  class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
{{-- </form> --}}



