@extends('layout.main')

@section('content')

<div class="container-fluid px-4">
    <div class="mt-4">
        <h3>Form Tambah Data</h3>
        @if(!empty($barang))
        <form action="{{route('editbarang')}}" method="post" class="mb-3">
            @else
            <form action="{{route('simpanbarang')}}" method="post" class="mb-3" enctype="multipart/form-data">
                @endif
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="gudang" class="form-label">Asal Gudang</label>
                    <select class="form-select" name="gudang" id="gudang">
                        <option selected value="" disabled>Pilih Asal Gudang</option>
                        @foreach($gudang as $gd)
                        @if(!empty($barang) && $barang->id_gudang == $gd->id_gudang)
                        <option selected value="{{ $gd->id_gudang }}">{{ $gd->nama_gudang}}</option>
                        @else
                        <option value="{{ $gd->id_gudang }}">{{ $gd->nama_gudang}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="jenis" class="form-label">Jenis Barang</label>
                    <select class="form-select" name="jenis_barang" id="jenis">
                        <option selected value="" disabled>Pilih jenis barang</option>
                        @foreach($jenis as $js)
                        @if(!empty($barang) && $barang->jenis_barang == $js->id_jenis_barang)
                        <option selected value="{{ $js->id_jenis_barang }}">{{ $js->nama_jenis_barang }}</option>
                        @else
                        <option value="{{ $js->id_jenis_barang }}">{{ $js->nama_jenis_barang }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    @if(!empty($barang))
                    <input type="text" name="nama_barang" class="form-control" id="nama_barang" placeholder="Nama Barang" value="{{ $barang->nama_barang }}">
                    @else
                    <input type="text" name="nama_barang" class="form-control" id="nama_barang" placeholder="Nama Barang">
                    @endif
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga Satuan</label>
                    @if(!empty($barang))
                    <input type="number" name="harga" class="form-control" id="harga" placeholder="Harga satuan barang" value="{{ $barang->harga_satuan }}">
                    @else
                    <input type="number" name="harga" class="form-control" id="harga" placeholder="Harga satuan barang">
                    @endif
                </div>
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah Barang</label>
                    @if(!empty($barang))
                    <input type="number" name="jumlah" class="form-control" id="jumlah" placeholder="Jumlah barang" value="{{ $barang->jumlah_barang }}">
                    @else
                    <input type="number" name="jumlah" class="form-control" id="jumlah" placeholder="Jumlah barang">
                    @endif
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    @if(!empty($barang))
                    <input type="file" name="foto" class="form-control" id="foto" placeholder="Foto" value="{{ $barang->jumlah_barang }}" accept="image/*">
                    @else
                    <input type="file" name="foto" class="form-control" id="foto" placeholder="Foto" accept="image/*">
                    @endif
                </div>
                <div class="mb-3">
                    @if(!empty($barang))
                    <img src="{{ asset('images/foto_barang/'.$barang->foto) }}" style="height:100px ; width: 100px;" id="hasilfoto">
                    @else
                    <img src="" style="height:100px ; width: 100px;" id="hasilfoto">
                    @endif
                </div>
                <input type="hidden" name="id" value="<?php if (!empty($barang)) echo $barang->id_barang ?>">
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
    </div>
</div>
@endsection

@section('js')
<script>
    document.getElementById("foto").addEventListener("change", myFunction);

    function myFunction() {
        preview = document.getElementById('hasilfoto');
        const [file] = document.getElementById("foto").files
        preview.src = URL.createObjectURL(file)
    }
</script>
@endsection