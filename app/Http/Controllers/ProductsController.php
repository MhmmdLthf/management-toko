<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\retails;
use App\Models\wholesales;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    // READ: Tampilkan list produk
    public function index()
    {
        $products = Product::with(['retails', 'wholesales'])->paginate(10);
        return view('product', compact('products'));
    }

    public function show($id)
{
    $product = Product::with(['retails', 'wholesales'])->findOrFail($id);
    return view('DetailProduct', compact('product'));
}

    // CREATE: Form tambah produk
    public function create()
    {
        return view('CreateProduct');
    }

    // STORE: Simpan produk baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang'   => 'required|string|max:255',
            'stok'          => 'required|integer|min:0',
            'qty_per_grosir'=> 'required|integer|min:0',
            'gambar'        => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        // Default nilai gambar
        $gambarPath = null;

        // Upload gambar jika ada
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $gambarPath = 'images/' . $filename;
        }

        // Simpan produk
        $product = Product::create([
            'nama_barang' => $request->nama_barang,
            'stok'        => $request->stok, // stok grosir
            'gambar'      => $gambarPath
        ]);

        // Simpan retail
        retails::create([
            'product_id'    => $product->id,
            'harga_ecer'    => $request->harga_ecer,
            'satuan'        => $request->satuan_ecer,
            'qty_per_grosir'=> $request->qty_per_grosir,
        ]);

        // Simpan grosir
        Wholesales::create([
            'product_id'    => $product->id,
            'harga_grosir'  => $request->harga_grosir,
            'satuan'        => $request->satuan_grosir,
        ]);

        return redirect()->route('product.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    // EDIT: Form edit produk
    public function edit($id)
    {
        $product = Product::with(['retails', 'wholesales'])->findOrFail($id);
        return view('UpdateProduct', compact('product'));
    }

    // UPDATE: Simpan perubahan
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang'   => 'required|string|max:255',
            'stok'          => 'required|integer|min:0',
            'qty_per_grosir'=> 'required|integer|min:1',
            'gambar'        => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        $product = Product::findOrFail($id);

        // Cek apakah ada upload gambar baru
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $product->gambar = 'images/' . $filename;
        }

        // Update produk
        $product->nama_barang = $request->nama_barang;
        $product->stok        = $request->stok;
        $product->save();

        // Update retail
        if ($product->retails) {
            $product->retails->update([
                'harga_ecer'    => $request->harga_ecer,
                'satuan'        => $request->satuan_ecer,
                'qty_per_grosir'=> $request->qty_per_grosir
            ]);
        }

        // Update grosir
        if ($product->wholesales) {
            $product->wholesales->update([
                'harga_grosir'  => $request->harga_grosir,
                'satuan'        => $request->satuan_grosir,
            ]);
        }

        return redirect()->route('product.index')->with('success', 'Produk berhasil diperbarui.');
    }

    // DELETE: Hapus produk
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Hapus relasi retail & grosir
        $product->retails()->delete();
        $product->wholesales()->delete();

        // (Opsional) hapus file gambar dari folder public/images
        if ($product->gambar && file_exists(public_path($product->gambar))) {
            unlink(public_path($product->gambar));
        }

        $product->delete();

        return redirect()->route('product.index')->with('success', 'Produk berhasil dihapus.');
    }
}
