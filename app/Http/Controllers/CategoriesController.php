<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function categories($id)
    {
        $categories_find = Category::find($id)->categories;
        return view('category', ['categories' => $categories_find]);
    }
}
