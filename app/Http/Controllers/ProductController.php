<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
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
        return redirect()->route('products.index.user');

    }

    public function index_all(Request $request) {

        $filter = [];

        if ($request->name) {

            $filter[] = ['name' , 'like' , '%'.$request->name.'%'];

        }


        if ($request->order && count($filter) === 0) {

            $products = Product::orderBy('price' , $request->order )->get();

        } else if ($request->order && count($filter) > 0) {

            $products = Product::where($filter)->orderBy('price' , $request->order)->get();

        } else {

            $products = Product::where($filter)->get();

        }

        if (count($filter) === 0 && !($request->order)) {
            $products = Product::paginate(5);
        }

        return view('main')->with('products' , $products);

    }

    public function index_one($id) {

        $product = Product::where('id' , $id )->first();
        return view('details')->with('product' , $product); 

    }

    public function index_user() {

        $products = Product::where('user_id' , Auth::id())->get();
        return view('manage')->with('products' , $products);

    }

    public function delete($id) {

        Product::whereId($id)->delete();
        return $this->index_user();
    }

    public function update_form($id) {

        $product = Product::where('id' , $id )->first();
        return view('edit' , ['product' => $product]);

    }

    public function update_product(Request $request , $id) {

     $product = Product::find($id);   
     $product->name = $request->name;
     $product->description = $request->desc;
     $product->price = $request->price;
     
    $product->save();

     return redirect()->route('products.index' , $product->id);
    }

}
