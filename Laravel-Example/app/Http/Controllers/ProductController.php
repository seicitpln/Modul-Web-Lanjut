<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view("product.index", [
            'product' => Product::all()
        ]);
    }

    public function add()
    {
        return view('product.add');
    }

    public function edit($id)
    {
        return view('product.edit', [
            'product' => Product::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'price' => 'required|numeric|min:100'
        ]);

        $product = Product::findOrFail($id);
        $product->name = trim($request->name);
        $product->price = trim($request->price);
        $product->description = trim($request->description);
        try {
            $product->save();
            return redirect()->to(route('product'))->with('status', 'Data berhasil disimpan');
        } catch (\Throwable $th) {
            return redirect()->to(route('product.edit', $id))->with('status', 'Data gagal disimpan');
        }
    }

    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'price' => 'required|numeric|min:100'
        ]);

        try {
            Product::create([
                'name' => trim($request->name),
                'price' => trim($request->price),
                'description' => trim($request->description)
            ]);
            return redirect()->to(route('product'))->with('status', 'Data berhasil disimpan');
        } catch (\Throwable $th) {
            return redirect()->to(route('product.add'))->with('status', 'Data gagal disimpan');
        }
    }

    public function delete($id)
    {
        try {
            Product::destroy($id);
            return redirect()->to(route('product'))->with('status', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->to(route('product'))->with('status', 'Data gagal dihapus');
        }
    }
}
