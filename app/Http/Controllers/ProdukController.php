<?php

namespace App\Http\Controllers;

use File;
use App\Models\Produk;
use App\Models\Hadiah;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;


class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::when(request('search'), function ($query) {
            return $query->where('nama', 'like', '%' . request('search') . '%');
        })
            ->orderBy('created_at', 'desc')
            ->paginate(8);
        return view('produk.index', compact('produk'))->with('status', 'Data Berhasil ditambahkan!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $image = $request->file('image');
        // $input['imagename'] = time() . '.' . $image->extension();



        // $destinationPath = public_path('uploads/images');
        // $img = Image::make($image->path());
        // $img->resize(100, 100, function ($constraint) {

        //     $constraint->aspectRatio();
        // })->save($destinationPath . '/' . $input['imagename']);



        // $destinationPath = public_path('uploads/images');

        // $image->move($destinationPath, $input['imagename']);

        Produk::create([
            // 'image' => 'uploads/images/' . $new_gambar,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'qty' => $request->qty

        ]);
        return redirect()->route('produk.index')->with('status', 'Data Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataproduk = Produk::find($id);
        return view('produk/create', ['produk' => $dataproduk]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return redirect()->route('produk.index')->with('status', 'Data Berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::find($id);
        $produk->delete();

        return redirect()->route('produk.index')->with('status', 'Data Berhasil dihapus!');
    }
}
