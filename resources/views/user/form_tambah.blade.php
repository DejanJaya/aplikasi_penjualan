@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Tambah User</h3>
        </div>
        <div class="card-body">
            <a href="{{route ('user.index')}}">Kembali</a>
            <form action="{{route('user.store')}}" method="POST">
                @csrf
                <ul class="list-group">
                    Nama <input type="text" name="name" required>
                    Role <input type="text" name="role" required>
                    Email <input type="text" name="email" required>
                    Password <input type="text" name="password" required>
                </ul>
                <input type="submit" value="Simpan Data" class="btn btn-success">
            </form>
        </div>
    </div>
</div>

@endsection