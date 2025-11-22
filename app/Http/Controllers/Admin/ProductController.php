<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;

class ProductController extends Controller
{
    // MENAMPILKAN DAFTAR PRODUK
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    // FORM TAMBAH PRODUK
    public function create()
    {
        $categories = Category::all(); // Ambil semua kategori
        return view('admin.products.create', compact('categories'));
    }

    // SIMPAN PRODUK BARU
    public function store(Request $request)
    {
        $request->validate([
            'image'       => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'name'        => 'required|min:3',
            'category'    => 'required', // Tambahkan Validasi Kategori
            'description' => 'required',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer',
        ]);

        // Upload Gambar
        $image = $request->file('image');
        $image->storeAs('products', $image->hashName(), 'public');

        Product::create([
            'image'       => $image->hashName(),
            'name'        => $request->name,
            'category'    => $request->category, // Simpan Kategori
            'description' => $request->description,
            'price'       => $request->price,
            'stock'       => $request->stock,
        ]);

        return redirect()->route('admin.products.index')->with(['success' => 'Hore! Kopi baru berhasil ditambahkan! ☕']);
    }

    // FORM EDIT PRODUK
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    // UPDATE DATA PRODUK
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required|min:3',
            'category'    => 'required', // Tambahkan Validasi Kategori
            'description' => 'required',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer',
            'image'       => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {

            Storage::disk('public')->delete('products/' . $product->image);
            $image = $request->file('image');
            $image->storeAs('products', $image->hashName(), 'public');

            $product->update([
                'image'       => $image->hashName(),
                'name'        => $request->name,
                'category'    => $request->category, // Update Kategori
                'description' => $request->description,
                'price'       => $request->price,
                'stock'       => $request->stock,
            ]);

        } else {
            $product->update([
                'name'        => $request->name,
                'category'    => $request->category, // Update Kategori
                'description' => $request->description,
                'price'       => $request->price,
                'stock'       => $request->stock,
            ]);
        }

        return redirect()->route('admin.products.index')->with(['success' => 'Data kopi berhasil diupdate! ✨']);
    }

    // HAPUS PRODUK
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Hapus file gambarnya (Gunakan disk 'public')
        Storage::disk('public')->delete('products/' . $product->image);

        $product->delete();

        return redirect()->route('admin.products.index')->with(['success' => 'Yah, produk berhasil dihapus. 👋']);
    }
}
