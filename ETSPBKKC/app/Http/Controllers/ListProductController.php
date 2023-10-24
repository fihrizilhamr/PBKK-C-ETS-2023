<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Models\Kondisi;
use App\Models\Product;
use Illuminate\Http\Request;

class ListProductController extends Controller
{
    public function showUsers(){
        $products = Product::all();
        return view('list_product', compact('products'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $jenis = Jenis::all();
        $kondisi = Kondisi::all();
        return view('edit_product', compact('product'), compact('jenis'), compact('kondisi'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'Jenis' => 'required',
            'Kondisi' => 'required|in:Baik,Layak,Rusak', 
            'Keterangan' => 'required|string',
            'Kecacatan' => 'required|string',
            'Jumlah' => 'required|numeric',
            'Image' => 'required|image|mimes:jpeg,png,jpg',
        ]);     
        // Update the user in the database
        Product::where('id', $id)->update($validatedData);

        return redirect()->route('list_product');
    }

    public function delete($id)
    {
        // Delete the user from the database
        Product::destroy($id);

        return redirect()->route('list_product'); // Redirect to home or wherever you want
    }
}
