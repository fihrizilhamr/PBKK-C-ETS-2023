<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Models\Kondisi;
use Illuminate\Http\Request;
use App\Models\Product;

class FormProductController extends Controller
{
    public function showForm()    {
        $jenis = Jenis::all();
        $kondisi = Kondisi::all();
        return view('form_product', compact('jenis'), compact('kondisi'));
    }
    public function submitForm(Request $request)
    {
        $request->validate([
            'Jenis' => 'required',
            'Kondisi' => 'required|in:Baik,Layak,Rusak', 
            'Keterangan' => 'required|string',
            'Kecacatan' => 'required|string',
            'Jumlah' => 'required|numeric',
            'Image' => 'required|image|mimes:jpeg,png,jpg',
        ]);        
        $request->Image->storeAs('public/images', $request->Image->getClientOriginalName());

        $results = [
            'Jenis' => $request->input('Jenis'),
            'Kondisi' => $request->input('Kondisi'),
            'Keterangan' => $request->input('Keterangan'),
            'Kecacatan' => $request->input('Kecacatan'),
            'Jumlah' => $request->input('Jumlah'),
            'Image' => $request->Image->getClientOriginalName(),
        ];
        Product::create($results);
        return view('form_product_result');
    }    
    

}
