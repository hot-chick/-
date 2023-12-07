<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\CourseController;
use App\Models\Course;
use App\Models\Application;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {

        $applications = Application::all(); // [[id=>1],[id=>2],....]

            foreach($applications as $key=>$item){
                $applications[$key]->course_id = $this->get_course_from_id($item->course_id);
            }


        return view("admin.admin",[
            "all_applications"=>$applications,
            "categories"=>Category::all()
        ]);
    }
    protected function get_course_from_id($id_course){
        return Course::find($id_course)->title;
    }
}
