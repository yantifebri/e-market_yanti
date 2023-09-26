<table class="table table-compact table-stripped" id="data-user">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Password</th>
            <th>Tools</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $u)
        <tr>
            <td>{{ $i = !isset($i)?$i=1:++$i}}</td>
            <td>{{ $u->name}}</td>
            <td>{{ $u->email}}</td>
            <td>{{ $u->password}}</td>
        
            <td>
                <button class="btn btn-primary" data-toggle="modal" data-target="#formUserEdit"
                    data-mode = "edit"
                    data-id = "{{ $u->id}}"
                    data-name="{{ $u->name}}"
                    data-email="{{ $u->email}}"
                    data-email="{{ $u->password}}"
                  
                    >
                    <i class="fas fa-edit"></i>
                </button>
                <form action="{{ route('users.destroy', $u->id) }}" method="post" style="display: inline">
                @csrf
                @method('DELETE')
                <button type="button" class="btn delete-data btn-danger " data-name="{{ $u->id}}"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>