<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::paginate(4);
        $categories = Category::all();
        return view(
            'index',
            compact("courses"),
            ['categories' => $categories]
        );
    }
    // public function index()
    // {
    //     $courses = Course::paginate(4);
    //     return view("index", compact("courses"));
    // }
    public function create(Request $request)
    {
        $course_info = $request->all();

        $file = $request->file("image");

        $file_name = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();

        Storage::putFileAs("public/image", $file, $file_name);

        Course::create([
            "title" => $course_info["title"],
            "description" => $course_info["description"],
            "duration" => $course_info["duration"],
            "cost" => $course_info["cost"],
            "category_id" => $course_info["category_id"],
            "image" => $file_name
        ]);
        return redirect()->back();
    }
}
