<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * get login form
    */
    public function login(Request $request): mixed
    {
        if(Auth::check())
        {
            return redirect(route("dashboard"));
        }

        return view("auth.login");
    }

    /**
     * authenticate user
    */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'employee_mat' => ['required', 'string'],
            'password' => ['required'],
        ]);

//        if (Auth::attempt(["employee_mat"=>$credentials["employee_mat"],"password"=>$credentials["password"]])) {
//            $request->session()->regenerate();
//
//            return redirect(route("dashboard"));
//        }

        $user = User::where("employee_mat",$credentials["employee_mat"])->first();

        if($user){
            if($user->password === $credentials["password"]){
                Auth::login($user);

//                return ["user"=>$user, "auth"=>Auth::getUser()];
                return redirect(route("dashboard"));
            }else{
                return back()->withErrors([
                    'password' => 'The provided credentials do not match our records.',
                ]);
            }
        }else{
            return back()->withErrors([
                'employee_mat' => 'employee mat or password is invalid.',
            ])->onlyInput('employee_mat');
        }
    }
}
