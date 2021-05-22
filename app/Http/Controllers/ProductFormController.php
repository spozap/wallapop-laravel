<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductFormController extends Controller
{
    
    public function product_form() {
        return view('create');
    }

    public function save_product(Request $request) {

        $request->validate([
            'name' => 'required|alpha_num',
            'price' => 'required|integer|min:0',
            'desc' => 'required'
        ]);

        //$img = $request->file('image');
        //$extension = $cover->getClientOriginalExtension();
        //Storage::disk('public')->put($cover->)

        $product = new Product;
        $product->user_id = Auth::id();
        $product->image = "AASAD";
        $product->category_id = 1;
        $product->name = $request->name;
        $product->description = $request->desc;
        $product->price = $request->price;

        $product->save();
        return redirect()->route('dashboard');

    }

}
