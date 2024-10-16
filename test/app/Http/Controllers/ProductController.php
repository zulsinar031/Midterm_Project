<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(){
        $products = Product::paginate(3); 
        return view('products.index', compact('products'));   
    }
    
    public function create(){
        return view('products.create');
    }

    public function store(Request $request) 
    {
        $request->validate([
            'nama' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg'
        ]);
        
        $foto = $request->file('foto');      
        $foto->storeAs('public', $foto->getClientOriginalName());

        Product::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'foto'=> $foto->getClientOriginalName(),
            'user_id' => auth()->id()
        ]);

        return redirect()->route('products.index')->with('success', 'Product Successfully Added');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'nama' => 'required'
        ]);

        $product->nama = $request->nama;
        //$product->harga = $request->harga;
        $product->deskripsi = $request->deskripsi;

        if($request->file('foto')){
            Storage::disk('local')->delete('public/', $product->foto);
            $foto = $request->file('foto');      
            $foto->storeAs('public', $foto->getClientOriginalName());
            $product->foto = $foto->getClientOriginalName();
        }
        
        $product->update();
        return redirect()->route('products.index')->with('success', 'Update Successful');
    }

    public function destroy(Product $product)
    {
        if($product->foto !== "noimage.png"){
            Storage::disk('local')->delete('public/', $product->foto);
            
        }
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Delete Successful');
    }

}
