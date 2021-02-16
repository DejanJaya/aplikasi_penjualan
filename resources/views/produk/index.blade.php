@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" style="min-height: 85vh">
                <div class="card-header bg-white">
                    <form action="{{ route('produk.index') }}" method="get">
                        <div class="row">  
                            <div class="col"><h4 class="font-weight-bold">Produk</h4></div>
                            <div class="col"><input type="text" name="search"
                                    class="form-control form-control-sm col-sm-10 float-right"
                                    placeholder="Search Product..." onblur="this.form.submit()"></div>
                            <div class="col-sm-2"><a href="{{ route('produk.create') }}"
                                    class="btn btn-primary btn-sm float-right btn-block">Add Produk</a></div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        @foreach ($produk as $p)
                        <div class="col-sm-3">
                            <div class="card mb-3">
                                <div class="view overlay">
                                     <img class="card-img-top gambar" src="{{ $p->image }}" {{--alt="Card image cap"--}}> 
                                    <a href="#!">
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-center font-weight-bold"
                                        style="text-transform: capitalize;">
                                        {{ Str::words($p->nama,6) }}</h5>
                                    <p class="card-text text-center">Rp. {{ number_format($p->harga,2,',','.') }}
                                    </p>
                                    {{-- <a href="{{ route('produk.edit', $p->id) }}" --}}
                                        {{-- <a class="btn btn-primary btn-block btn-sm">Details</a> --}}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div>{{ $produk->links() }}</div>
            </div>
        </div>
    </div>
    @endsection

    @push('style')
    <style>
        .gambar {
            width: 100%;
            height: 175px;
            padding: 0.9rem 0.9rem
        }

        @media only screen and (max-width: 600px) {
            .gambar {
                width: 100%;
                height: 100%;
                padding: 0.9rem 0.9rem
            }
        }

    </style>
    @endpush
