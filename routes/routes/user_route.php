<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix("dashboard/settings/users")->controller(UserController::class)->group(function (){

    // list of users
    Route::get("","index")->name("index_users");

    //
    Route::get("/user","create")->name("create_user");

    Route::post("/user","store")->name("store_user");

    Route::delete("/user","destroy")->name("destroy_user");

    Route::get("/user/{user_id}","show")->name("show_user");

    Route::get("/user/{user_id}","edit")->name("edit_user");

    Route::post("/user/{user_id}","update")->name("update_user");
});
