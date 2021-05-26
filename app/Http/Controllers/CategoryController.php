<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

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

    }
}
