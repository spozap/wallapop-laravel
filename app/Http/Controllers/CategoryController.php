<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Controllers\Product;

class CategoryController extends Controller
{
    public function create_form() {
        return view('addcategory');
    }

    public function create(Request $request) {

        $request->validate([
            'name' => 'required|alpha_num',
        ]);

        $category = new Category;
        $category->name = $request->name;

        $category->save();
        return redirect()->route('category.manage');

    }

    public function index() {

        $categories = Category::all();
        return view('mngcategory' , ['categories' => $categories]);
    }

    public function update_form($id) {

        $category = Category::find($id);

        return view('updcategory' , ['category' => $category]);

    }


    public function update_cat($id , Request $request) {

        $category = Category::find($id);

        if ($request->name) {

            $category->name = $request->name;

        }

        $category->save();
        return redirect()->route('category.manage');

    }

    public function delete($id) {

        Category::whereId($id)->delete();
        return $this->index();

    }
}
