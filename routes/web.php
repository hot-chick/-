<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', [CourseController::class, "index"]);

Route::get("/signin", [UserController::class, "signin"]);
Route::post("/signin-valid", [UserController::class, "signin_valid"]);
Route::get("/signup", [UserController::class, "signup"]);
Route::post("/signup-valid", [UserController::class, "signup_valid"]);

Route::get("/signout", [UserController::class,"signout"]);

Route::post("enroll",[ApplicationController::class, "new_application"]);

Route::get("/admin", [AdminController::class, "index"]);

Route::get("/application/{id_application}/confirm",[ApplicationController::class, "confirm"]);

Route::post("/course/create",[CourseController::class, "create"]);
Route::post("/category/create",[CategoryController::class, "create"]);

