<table class="table table-compact table-stripped" id="data-barang">
    <thead>
        <tr>
            <th>No.</th>
            <th>Kode Barang/th>
            <th>Produk</th>
            <th>Nama Barang</th>
            <th>Satuan</th>
            <th>Harga Barang</th>
            <th>Stok</th>
            <th>Ditarik</th>
            <th>User</th>
            <th>Tools</th>
        </tr>
    </thead>
    <tbody>
        @foreach($barang as $b)
        <tr>
            <td>{{ $i = !isset($i)?$i=1:++$i}}</td>
            <td>{{ $b->kode_barang}}</td>
            <td>{{ $b->produk_id}}</td>
            <td>{{ $b->nama_barang}}</td>
            <td>{{ $b->satuan}}</td>
            <td>{{ $b->harga_jual}}</td>
            <td>{{ $b->stok}}</td>
            <td>{{ $b->ditarik}}</td>
            <td>{{ $b->user_id}}</td>
            <td>
                <button class="btn btn-primary" data-toggle="modal" data-target="#formBarangModal"
                    data-mode = "edit"
                    data-id = "{{ $b->id}}"
                    data-kode_barang="{{ $b->kode_barang}}"
                    data-produk_id="{{ $b->produk_id}}"
                    data-nama_barang="{{ $b->nama_barang}}"
                    data-satuan="{{ $b->satuan}}"
                    data-harga_jual="{{ $b->harga_jual}}"
                    data-stok="{{ $b->stok}}"
                    data-ditarik="{{ $b->ditarik}}"
                    data-user_id="{{ $b->user_id}}"
                    >
                    <i class="fas fa-edit"></i>
                </button>
                <form action="{{ route('barang.destroy', $b->id) }}" method="post" style="display: inline">
                @csrf
                @method('DELETE')
                <button type="button" class="btn delete-data btn-danger " data-nama_barang="{{ $b->nama_barang}}"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>