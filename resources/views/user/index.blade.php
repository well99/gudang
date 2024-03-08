@extends('layout.main')

@section('content')
<div class="container-fluid px-4">
    <div class=" mb-4 mt-2">
        <a href="/user/create" class="btn btn-primary">Tambah</a>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <h4>Data User</h4>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama User</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $b)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $b->nama }}</td>
                        <td>{{ $b->email }}</td>
                        <td>{{ $b->name }}</td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('user.destroy', $b->id) }}" method="POST">
                                <a href="/user/edit/{{$b->id}}" class="btn btn-warning">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection