<?php

use App\Http\Controllers\EmployeeCareerPlanController;
use App\Http\Controllers\EmployeeCareerPlanSkillController;
use App\Http\Controllers\EmployeeControlleur;
use App\Http\Controllers\JobController;
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

Route::get('/', function () {
    return view('welcome');
});


// register employee routes

Route::controller(EmployeeControlleur::class)->prefix("/dashboard/employee-manager/")->group(function(){

    // dashboard of employee register management
    Route::get("","dashboard")->name("dashboard");

    // render the form for creating a new employee
    Route::get("/create-employee/","create")->name("create_employee");

    // store the created employee
    Route::post("/store-employee/","store")->name("store_employee");

    // get list of all employee
    Route::get("/employees/","index");

    // get employee details
    Route::get("/employees/{employee_code}/details","show")->name("show_employee");

    // get edit form
    Route::get("/employees/{employee_code}/edit","edit")->name("edit_employee");

    // update existing employee
    Route::post("/employee/{employee_code}/update","update")->name("update_employee");

});

// routes for managing job role

Route::prefix("dashboard/job-manager/")->controller(JobController::class)->group(function(){

    // get the job manager dashboard
    Route::get("","dashboard")->name("job_manager_dashboard");

    // get list of all job
    Route::get("jobs/","index")->name("index_jobs");

    // get job creation form
    Route::get("jobs/create/","create")->name("create_job");

    // store job in database
    Route::post("jobs/store/","store")->name("store_job");

    // update job
    Route::post("jobs/{job_code}/update","update")->name("update_job");

    // get job detail
    Route::get("jobs/{job_code}/details","show")->name("show_job");

    // edit job ( receive the form for edition)
    Route::get("jobs/{job_code}/edit", "edit")->name("edit_job");

    // find employee who matched job skills
    Route::get("jobs/{job_code}/employees-skills-matched","findEmployeesWithJobSkills")->name("employees_with_job_skills");
});

// routes for managing career plan
Route::prefix("dashboard/employees/{employee_code}/career-plan/")
    ->controller(EmployeeCareerPlanController::class)
    ->group(function(){

        // principal dashboard for employee career where all existing career plan are saw
        Route::get('',"dashboard")->name("dashboard");

        // get detail about career plan
        Route::get("{career_plan_year}/","show")->name("show_career_plan");

        // get career plan creation form
        Route::get("create/","create")->name("create_career_plan");

        // create new career plan
        Route::post("store/","store")->name("store_career_plan");

        // get form for editing exiting career plan
        Route::get("{career_plan_year}/edit/","edit")->name("edit_career_plan");

        // update an existing career plan
        Route::post("{career_plan_year}/update/","update")->name("update_career_plan");
    });

// routes for adding managing career plan skills
Route::prefix("dashboard/employee/{employee_code}/career-plan/{career_plan_code}/skills")
    ->controller(EmployeeCareerPlanSkillController::class)
    ->group(function (){

        // get list of all existing skills
        Route::get('',"index")->name("index_skills");

        // get form for adding skills
        Route::get("/create","create")->name("create_skill");

        // store skill
        Route::post("/store","store")->name("store_skill");

        // get form for editing skill
        Route::get("/{skill_code}/edit","edit")->name("edit_skill");

        // update edited skill
        Route::post("/{skill_code}/update","update")->name("update_skill");

        // delete existing skill
        Route::delete("/{skill_code}/delete","destroy")->name("destroy_skill");
});
