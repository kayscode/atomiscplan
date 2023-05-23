<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(LoginController::class)->group(function(){
   Route::get("/",function (){
       return redirect(route("login"));
   });
   Route::get("/login","login")->name("login");
   Route::post("/login","authenticate")->name("authenticate");
});

// logout the user
Route::middleware("auth")->get("/logout",function (Request $request){
    Auth::logout();
    return redirect(\route("login"));
})->name("logout");

// routes for users

Route::middleware("auth")->prefix("/dashboard/")->group(function (){

    Route::controller(UserController::class)->group(function (){
        Route::get('users/',"index")->name("index_users");
        Route::get('users/user/{user_id}',"show")->name("show_user");
        Route::get("users/create","create")->name("create_user");
        Route::post("users/create","store")->name("store_user");
    });
});

Route::middleware('auth')->get('/dashboard',function(Request $request){

    $user = Auth::user();

    if($user->user_type === "employee"){
        // redirect to employee dashboard
        return view("dashboard.employee-dashboard",["user"=>$user]);

    }else if ($user->user_type === "training_planner")
    {
        // redirect to HR director
        return view("dashboard.training-planner-dashboard",["user"=>$user]);
    }else if($user->user_type === "hr_director")
    {
        // redirect to Training manager
        return view("dashboard.hr-director-dashboard",["user"=>$user]);
    }
})->name("dashboard");


Route::middleware('auth')->get("/dashboard/settings",function (){
   return view("settings.settings-dashboard");
})->name("settings");

// settings
require_once "routes/user_route.php";

// register employee routes
require_once "routes/employee_route.php";

// routes for managing job role
require_once "routes/job_post_route.php";

// routes for career plan
require_once  "routes/career_plan_route.php";

// routes for formation
require_once "routes/formation.php";
