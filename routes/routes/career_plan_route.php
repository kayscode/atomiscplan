<?php


// routes for managing career plan
use App\Http\Controllers\CareerPlanController;
use App\Http\Controllers\EmployeeCareerPlanController;
use App\Http\Controllers\EmployeeCareerPlanSkillController;
use Illuminate\Support\Facades\Route;

Route::prefix("/dashboard/career-plan/")
    ->middleware("auth")
    ->controller(EmployeeCareerPlanController::class)
    ->group(function(){

        // get career plan creation form
        Route::get("create/","create")->name("create_career_plan");

        // create new career plan
        Route::post("store/","store")->name("store_career_plan");

        // get form for editing exiting career plan
        Route::get("/{career_plan_id}/edit","show_employee_career_plan")->name("edit_career_plan");

        // update an existing career plan
        Route::post("/{employee_id}/{employee_plan_id}/update","update")->name("update_career_plan");
    });

Route::prefix("/dashboard/career-plan/")
    ->middleware("auth")
    ->group(function(){
        Route::controller(CareerPlanController::class)->group(function (){
            // career main dashboard
            Route::get("","dashboard")->name("career_plan_dashboard");

            // render all employees career plan for a specific year
            Route::get("all-careers-plan/{year}","dashboard")->name("year_career_plan");

            // render all employees career plan
            Route::get("all-careers-plan/","list_careers_plan")->name("employees_career_plan");

            // list all employees who possess career plan
            Route::get("employees/","list_employees_with_career_plan")->name("list_employees_career_plan");

            // list all employee skills
            Route::get("employees/{employee_id}/all-skills","get_all_skills")->name("employee_all_skills");

            // get employee career plan list
            Route::get("employees/{employee_id}/","listEmployeeCareerPlan")->name("employee_career_plan_list");
        });

        // get details about a career plan
        Route::controller(EmployeeCareerPlanController::class)->group(function(){
//            Route::get("employees/{employee_id}/career_plans/{career_plan_id}","show")->name("show_career_plan");
            Route::get("employees/{employee_id}/career_plans/{career_plan_id}","destroy")->name("destroy_career_plan");
        });

        // routes for adding managing career plan skills
        Route::prefix("employees/{employee_id}/career_plans/{career_plan_id}")
            ->controller(EmployeeCareerPlanSkillController::class)
            ->group(function (){

                // get list of all existing skills
                Route::get('/skills',"index")->name("index_skills");

                // get form for adding skills
                Route::get("/skill","create")->name("create_skill");

                // store skill
                Route::post("/skill","store")->name("store_skill");

                // get form for editing skill
                Route::get("/skills/{skill_id}/edit","edit")->name("edit_skill");

                Route::get("/skills/{skill_id}","show")->name("show_skill");

                // update edited skill
                Route::put("/skills/{skill_id}","update")->name("update_skill");

                // delete existing skill
                Route::delete("/skills/{skill_id}/delete","destroy")->name("destroy_skill");

                Route::put("/skills/{skill_id}/master-skill","masterSkill")->name("master_skill");
            });

    });


