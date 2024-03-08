@extends('layout.main')

@section('content')
<div class="container-fluid px-4">
    <div class=" mb-4 mt-2">
        <a href="/barang/create" class="btn btn-primary">Tambah</a>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <h4>Data Barang</h4>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Jenis Barang</th>
                        <th>Asal Barang</th>
                        <th>Harga Satuan</th>
                        <th>Stok</th>
                        <th>Foto</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barang as $b)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $b->nama_barang }}</td>
                        <td>{{ $b->nama_jenis_barang }}</td>
                        <td>{{ $b->nama_gudang }}</td>
                        <td>{{ $b->harga_satuan }}</td>
                        <td>{{ $b->jumlah_barang }}</td>
                        <td><img src="{{ asset('images/foto_barang/'.$b->foto) }}" alt="" style="height: 50px; width:50px"></td>
                        <td>{{ $b->jumlah_barang * $b->harga_satuan }}</td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('barang.destroy', $b->id_barang) }}" method="POST">
                                <a href="/barang/edit/{{$b->id_barang}}" class="btn btn-warning">Edit</a>
                                <!-- <button type="button" data-id="{{ $b->id_barang }}" class="btn btn-warning" onclick="btnEdit(this)">Edit</button> -->
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