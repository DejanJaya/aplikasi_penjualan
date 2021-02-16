@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="min-height:85vh">
                <div class="card-header bg-white">
                    <form action="{{ url('/transaksi') }}" method="get">
                        <div class="row">
                            <div class="col">
                                <h4 class="font-weight-bold">Produk</h4>
                            </div>
                            <div class="col text-right">
                                <select name="" id="" class="form-control from-control-sm" style="font-size: 12px">
                                    <option value="" holder>Filter Category</option>
                                    <option value="1">All Category...</option>
                                    
                                </select>
                            </div>
                            <div class="col"><input type="text" name="search"
                                    class="form-control form-control-sm col-sm-12 float-right"
                                    placeholder="Search Produk..." onblur="this.form.submit()"></div>
                            <div class="col-sm-3">
                                <button type="submit" class="btn btn-primary btn-sm float-right btn-block">Cari Product</button>
                            </div>
                        
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($products as $product)
                        <div style="width: 16.66%;border:1px solid rgb(243, 243, 243)" class="mb-4">
                            <div class="productCard">
                                <div class="view overlay">
                                   
                                </div>
                                <div class="card-body">
                                    <label class="card-text text-center font-weight-bold"
                                        style="text-transform: capitalize;">
                                        {{ Str::words($product->nama) }} ({{$product->qty}}) </label>
                                    <p class="card-text text-center">Rp. {{ number_format($product->harga,2,',','.') }}
                                    </p>
                                   
                                </div>
                               
                            </div>
                            
                        </div>
                        @endforeach
                    </div>
                </div>
                <div>{{ $products->links() }}</div>
                <button class="btn btn-success btn-sm float-right btn-block" style="padding:1rem!important"
                                data-toggle="modal" data-target="#fullHeightModalRight">Beli Produk</button>
            </div>
        </div>
        
    </div>

    <div class="modal fade right" id="fullHeightModalRight" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">

        <!-- Add class .modal-full-height and then add class .modal-right (or other classes from list above) to set a position to the modal -->
        <div class="modal-dialog modal-full-height modal-right" role="document">

        <!-- Sorry campur2 bahasa indonesia sama inggris krn kebiasaan make b.inggris eh ternyata buat aplikasi buat indonesia jadi gini deh  -->
            <div class="modal-content">
                <div class="modal-header indigo">
                    <h6 class="modal-title w-100 text-light" id="myModalLabel">Billing Information</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('transaksi/pembayaran') }}" method="POST">
                    @csrf
                    
                    <div class="form-group">
                        <label for="oke">Barang</label>
                        <select name="nama" id="nama" class="form-control from-control-sm" style="font-size: 13px">
                            @foreach($products as $p)
                            <option value="{{$p->id}}">{{$p->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="oke">Jumlah yang dibeli</label>
                        <input id="oke" class="form-control" type="number" name="jumlah" autofocus />
                    </div>
                    <div class="form-group">
                        <label for="oke">Total Harga</label>
                        <input id="oke" class="form-control" type="number" name="subtotal" value="{{$jumlah * $harga}}" />
                    </div>
                    <div class="form-group">
                        <label for="oke">Bayar</label>
                        <input id="oke" class="form-control" type="number" name="bayar" autofocus />
                    </div>
                    <div class="form-group">
                        <label for="oke">Kembalian</label>
                        <input id="oke" class="form-control" type="number" name="kembalian" autofocus />
                    </div>
                   
                </div>
                
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="saveButton" onClick="openWindowReload(this)">Save transcation</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
    
    
