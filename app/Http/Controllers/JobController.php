<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobPostRequest;
use App\Repository\JobRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class JobController extends Controller
{

    private JobRepository $jobRepository;
    public function __Construct(JobRepository $jobRepository)
    {
        $this->jobRepository = $jobRepository;
    }

    /**
     *get the main dashboard for managing job
    */
    public function dashboard(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $last_created_jobs = $this->jobRepository->findLastCreatedJobByLimit();
       return view("poste.job-post-dashboard",["jobs"=>$last_created_jobs]);
    }

    /**
     * Display all job post list
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $jobs = $this->jobRepository->findAll();
        return view("poste.job-post-list",["jobs"=>$jobs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("poste.add-job-post");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobPostRequest $request): RedirectResponse | string | array
    {

        $validated = $request->validated();
        try {
            $this->jobRepository->create($validated);
        }catch (\Exception $exception){
            return back()->with(["error"=>"la creation du poste a echoué, un poste existe deja avec le code"]);
        }

        return back()->with(["success"=>"la creation du poste a reussi"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $jon_post_id)
    {
        $job = $this->jobRepository->read($jon_post_id);
        return view("poste.show-job-post",["job"=>$job]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $post_id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $job = $this->jobRepository->read($post_id);
        return view("poste.edit-job-post",["job"=>$job]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobPostRequest $request, int $post_id)
    {
        $validated = $request->validated();
        try {
            $this->jobRepository->update($post_id,$validated);
        }catch (\Exception $exception)
        {
            return back()->withErrors(["error_message"=>$exception->getMessage()]);
        }
        return redirect(route("show_job",["post_id"=>$post_id]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $job_post_id)
    {
        //
    }
}
