<?php


use App\Http\Controllers\EmployeeCareerPlanController;
use App\Http\Controllers\EmployeeControlleur;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeFormationController;

Route::controller(EmployeeControlleur::class)->middleware("auth")->prefix("/dashboard/employee-manager")->group(function(){

    // dashboard of employee register management
    Route::get("","dashboard")->name("employees.main.dashboard");

    // render the form for creating a new employee
    Route::get("/create-employee/","create")->name("create_employee");

    // store the created employee
    Route::post("/store-employee/","store")->name("store_employee");

    // get list of all employee
    Route::get("/employees/","index")->name("employees_list");

    // get employee details
    Route::get("/employees/{employee_code}/details","show")->name("show_employee");

    // get edit form
    Route::get("/employees/{employee_code}/edit","edit")->name("edit_employee");

    // delete employee
    Route::get("/employees/{employee_code}/delete","destroy")->name("delete_employee");

    // update existing employee
    Route::post("/employee/{employee_code}/update","update")->name("update_employee");

});

// route for connected employee
Route::middleware("auth")->prefix("/dashboard/employee")->group(function(){

    Route::controller(EmployeeFormationController::class)->prefix('/formations')->group(function(){

        // formation board of published formation
        Route::get('/board','formation_board')->name("formation_board");

        Route::get('/formations-en-cours','enrolled_formation')->name("list_enrolled_formation");

        // detail about one formation
        Route::get('/{formation_id}','show_formation')->name("show_formation_emp")->whereNumber('formation_id');

        Route::get('/{formation_id}/participate','participate')->name("participate")->whereNumber('formation_id');

    });

    Route::controller(EmployeeCareerPlanController::class)->prefix("/career-plans")->group(function(){

        Route::get('','index')->name("employee_career_plans");

    });


});
