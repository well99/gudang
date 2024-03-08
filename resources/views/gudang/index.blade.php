@extends('layout.main')

@section('content')
<div class="container-fluid px-4">
    <div class=" mb-4 mt-2">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahData">Tambah</button>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <h4>Data Gudang</h4>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Gudang</th>
                        <th>Alamat</th>
                        <th>Jumlah Barang</th>
                        <th>Salary</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($gudang as $gd)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $gd->nama_gudang }}</td>
                        <td>{{ $gd->alamat }}</td>
                        <td>100</td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('gudang.destroy', $gd->id_gudang) }}" method="POST">
                                <button type="button" data-id="{{ $gd->id_gudang }}" class="btn btn-warning" onclick="btnEdit(this)">Edit</button>
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

<div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('gudang.store') }}" method="post" id="myform">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <label for="nama1" class="form-label">Nama Gudang</label>
                        <input type="text" name="nama" class="form-control" id="nam1a" placeholder="Nama Gudang">
                    </div>
                    <div class="mb-3">
                        <label for="alamat1" class="form-label">Alamat Gudang</label>
                        <textarea name="alamat" class="form-control" id="alamat1" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('update')}}" method="post" id="editForm">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Gudang</label>
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Gudang">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat Gudang</label>
                        <textarea name="alamat" class="form-control" id="alamat" rows="3"></textarea>
                    </div>
                    <input type="hidden" name="id" id="idne">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    async function btnEdit(i) {
        idPilih = i.getAttribute('data-id')
        console.log(idPilih);
        var form = new FormData();
        url = `http://127.0.0.1:8000/gudang/edit/` + idPilih;
        ceKdata = await ambilData(form, url);
        console.log(ceKdata);
        document.getElementById("nama").value = ceKdata.nama_gudang;
        document.getElementById("alamat").value = ceKdata.alamat;
        document.getElementById("idne").value = ceKdata.id_gudang;
        $('#editData').modal('show');
    }

    function ambilData(form, url) {
        var requestOptions = {
            method: 'GET',
            redirect: 'follow'
        };
        return fetch(url, requestOptions)
            .then(response => response.json())
            .then(result => result)
            .catch(error => error);
    }
</script>
@endsection