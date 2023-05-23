<?php


use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::prefix("dashboard/job-post-manager/")->controller(JobController::class)->group(function(){

    // get the job manager dashboard
    Route::get("","dashboard")->name("job_dashboard");

    // get list of all job
    Route::get("job-posts/","index")->name("index_jobs");

    // get job creation form
    Route::get("job-post/create/","create")->name("create_job");

    // store job in database
    Route::post("job-post/store/","store")->name("store_job");

    // update job
    Route::post("jobs/{post_id}/update","update")->name("update_job");

    // get job detail
    Route::get("jobs/{post_id}/details","show")->name("show_job");

    // edit job ( receive the form for edition)
    Route::get("jobs/{post_id}/edit", "edit")->name("edit_job");

    Route::get("jobs/{post_id}/delete", "delete")->name("delete_job");

    // find employee who matched job skills
//    Route::get("jobs/{job_code}/employees-skills-matched","findEmployeesWithJobSkills")->name("employees_with_job_skills");
});
