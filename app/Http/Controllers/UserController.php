<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\Return_;

class UserController extends Controller
{
    public function signin(){
        return view("signin");
    }
    public function signin_valid(Request $request){
        $request->validate([
            "email"=>"required|email",
            "pass"=>"required"
        ],[
            "email.required"=>"Поле обязательно для заполнения",
            "email.email"=>"Введите корректный email",
            "pass.required"=>"Поле обязательно для заполнения",
        ]);

        $user = $request->only("email","pass");

        if(Auth::attempt([
            'email' => $user['email'],
            'pass' => $user['pass']
            ])
            ){
                return redirect("/signin")->with("success", "");
            }
            return redirect()->back()->with("error", "Произошла ошибка, попробуйте снова");

    }
    public function signup(){
        return view("signup");
    }
    public function signup_valid(Request $request){
        $request->validate([
            "email"=>"required|unique:users|email",
            "user_name"=>"required",
            "pass"=>"required",
            "confirm_pass"=>"required|same:pass"
        ],[
            "email.required"=>"Поле обязательно для заполнения",
            "email.email"=>"Введите корректный email",
            "email.unique"=>"Данный email уже занят",
            "user_name"=>"Поле обязательно для заполнения",
            "pass.required"=>"Поле обязательно для заполнения",
            "confirm_pass.required"=>"Поле обязательно для заполнения",
            "confirm_pass.required"=>"Поле обязательно для заполнения",
        ]);

        $userInfo = $request->all();

        $user_create = User::create([
            "email"=>$userInfo["email"],
            "name"=>$userInfo["user_name"],
            "password"=> Hash::make($userInfo["pass"]),
        ]);
        if($user_create)
        return redirect("/signin")->with("success","");
        return redirect()->back()->with("error", "Неверный логин или пароль");
    }
    public function signout(){
        Session::flush();
        Auth::logout();
        return redirect("/");
    }


}
