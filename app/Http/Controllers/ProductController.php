<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    
    public function product_form() {

        $categories = Category::all();

        return view('create')->with('categories' , $categories);
    }

    public function save_product(Request $request) {

        $request->validate([
            'name' => 'required|alpha_num',
            'price' => 'required|integer|min:0',
            'category' => 'required',
            'desc' => 'required',
            'img' => 'required|image'
        ]);
        
        $toStore = "AA";

        if ($request->hasFile('img')) {

            $image = $request->file('img');

            $filename = $image->getClientOriginalName();

            $toStore = time().'_' . $filename;

            $image->move('uploads' , $toStore);
        }


        $product = new Product;
        $product->user_id = Auth::id();
        $product->image = $toStore;
        $product->category_id = $request->category;
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

        if ($request->category) {

            $filter[] = ['category_id' , '=' , $request->category];

        }


        if ($request->order && count($filter) === 0) {

            $products = Product::orderBy('price' , $request->order )->get();

        } else if ($request->order && count($filter) > 0) {

            $products = Product::where($filter)->orderBy('price' , $request->order)->get();

        } else {

            $products = Product::where($filter)->get();

        }

        if (count($filter) === 0 && !($request->order) && !($request->category)) {
            $products = Product::paginate(5);
        }

        $categories = Category::all();

        return view('main')->with('products' , $products)->with('categories' , $categories);

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

        if ($product->user_id === Auth::id()) {
            return view('edit' , ['product' => $product]);
        }

        return redirect()->route('products.index.user');
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
