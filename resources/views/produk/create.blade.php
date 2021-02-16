@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-white"><h4 class="font-weight-bold">Produk</h4>

                </div>
                <div class="card-body">
                   
                    <form action="{{route('produk.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- <input type="hidden" name="id"> --}}
                        <div class="form-group">
                            <label for="product">Nama Produk</label>
                            <input type="text" class="form-control" name="nama" id="nama">
                            {{-- @include('layouts.error', ['name' => 'nama']) --}}
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="price">Harga</label>
                                    <input type="number" class="form-control" name="harga" id="harga">
                                    {{-- @include('layouts.error', ['name' => 'harga']) --}}
                                </div>
                               
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="qty">Qty</label>
                                    <input type="number" class="form-control" name="qty" id="qty">
                                    {{-- @include('layouts.error', ['name' => 'qty']) --}}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Submit Produk</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
