@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Manajemen User</h3>
        </div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <a class="btn btn-success mr-2" href="{{route('user.create')}}">Tambah Data User</a>
            <table class="table table-bordered tabel-striped">
                <tr>
                    <th>Nama</th>
                    <th>Role</th>
                    <th>Email</th>
                    <th>AKSI</th>
                </tr>
                @foreach($user as $u)
                <tr>
                    <td>{{$u->name}}</td>
                    <td>{{$u->role}}</td>
                    <td>{{$u->email}}</td>
                    <td>
                        <ul class="nav">
                            <a class="btn btn-primary mr-2" href="{{route('user.edit', $u->id)}}">Edit</a>
                            <form action="{{route('user.destroy', $u->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-warning">Delete</button>
                            </form>
                        </ul>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

</div>
@endsection