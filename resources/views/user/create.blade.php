@extends('layout.main')

@section('content')
<div class="container-fluid px-4">
    <div class="mt-4">
        <h3>Form Tambah Data</h3>
        @if(!empty($user))
        <form action="{{route('useredit')}}" method="post" class="mb-3">
            @else
            <form method="post" action="{{route('usertambah')}}" class="mb-3">
                @endif
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="nama_user" class="form-label">Nama User</label>
                    @if(!empty($user))
                    <input type="text" name="nama_user" class="form-control" id="nama_user" placeholder="Nama User" value="{{ $user->nama }}">
                    @else
                    <input type="text" name="nama_user" class="form-control" id="nama_user" placeholder="Nama User">
                    @endif
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email User</label>
                    @if(!empty($user))
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email User" value="{{ $user->email }}">
                    @else
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email User">
                    @endif
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password User</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password User">
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Role User</label>
                    <select class="form-select" name="role" id="role">
                        <option selected value="" disabled>Pilih role user</option>
                        @foreach($role as $rl)
                        @if(!empty($user) && $user->role == $rl->id)
                        <option selected value="{{ $rl->id }}">{{ $rl->name }}</option>
                        @else
                        <option value="{{ $rl->id }}">{{ $rl->name }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <input type="hidden" name="id" value="<?php if (!empty($user)) echo $user->id ?>">
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
    </div>
</div>
@endsection