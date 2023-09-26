<table class="table table-compact table-stripped" id="data-pemasok">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Pemasok</th>
            <th>Tools</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pemasok as $p)
        <tr>
            <td>{{ $i = !isset($i)?$i=1:++$i}}</td>
            <td>{{ $p->nama_pemasok}}</td>
            <td>
                <button class="btn btn-primary" data-toggle="modal" data-target="#formPemasokModal"
                    data-mode = "edit"
                    data-id = "{{ $p->id}}"
                    data-nama_pemasok="{{ $p->nama_pemasok}}"
                    >
                    <i class="fas fa-edit"></i>
                </button>
                <form action="{{ route('pemasok.destroy', $p->id) }}" method="post" style="display: inline">
                @csrf
                @method('DELETE')
                <button type="button" class="btn delete-data btn-danger " data-nama_pemasok="{{ $p->nama_pemasok}}"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>