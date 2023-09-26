<table class="table table-compact table-stripped" id="data-pelanggan">
    <thead>
        <tr>
            <th>No.</th>
            <th>Kode Pelanggan</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No Telepon</th>
            <th>Email/th>
            <th>Tools</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pelanggan as $p)
        <tr>
            <td>{{ $i = !isset($i)?$i=1:++$i}}</td>
            <td>{{ $p->kode_pelanggan}}</td>
            <td>{{ $p->nama}}</td>
            <td>{{ $p->alamat}}</td>
            <td>{{ $p->no_telp}}</td>
            <td>{{ $p->email}}</td>
            <td>
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalEditPelanggan"
                    data-mode = "edit"
                    data-id = "{{ $p->id}}"
                    data-kode_pelanggan="{{ $p->kode_pelanggan}}"
                    data-nama="{{ $p->nama}}"
                    data-alamat="{{ $p->alamat}}"
                    data-no_telp="{{ $p->no_telp}}"
                    data-email="{{ $p->email}}"
                    >
                    <i class="fas fa-edit"></i>
                </button>
                <form action="{{ route('pelanggan.destroy', $p->id) }}" method="post" style="display: inline">
                @csrf
                @method('DELETE')
                <button type="button" class="btn delete-data btn-danger " data-nama_pelanggan="{{ $p->nama_pelanggan}}"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>