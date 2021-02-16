@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Data Domisili</h3>
        </div>
        <div class="card-body">
            <a href="{{route('domisili.create')}}">Tambah Data Domisili</a>
            <table class="table table-bordered tabel-striped">
                <tr style="text-align: center">
                    <th>Alamat</th>
                    <th>Kelurahan</th>
                    <th>Kecamatan</th>
                    <th>Kota</th>
                    <th>Aksi</th>
                </tr>
                @foreach($domisili as $d)
                <tr style="text-align: justify">
                    <td>{{$d->alamat}}</td>
                    <td>{{$d->kelurahan}}</td>
                    <td>{{$d->kecamatan}}</td>
                    <td>{{$d->kota}}</td>
                    <td>
                        <ul class="nav">
                            <a class="btn btn-success mr-2" href="{{route('domisili.show', $d->id)}}">Show</a>
                            <a class="btn btn-primary mr-2" href="{{route('domisili.edit', $d->id)}}">Edit</a>
                            <form action="{{route('domisili.destroy', $d->id)}}" method="POST">
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