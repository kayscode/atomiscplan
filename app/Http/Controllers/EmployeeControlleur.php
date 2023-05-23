<?php

namespace App\Http\Controllers;

use App\Repository\EmployeeRepository;
use App\Repository\JobRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class EmployeeControlleur extends Controller
{


    /**
     * return the employee management principal dashboard interface
    */
    public function dashboard(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view("hr-director.hr-dashboard-employees");
    }

    /**
     * Display a listing of the resource.
     */
    public function index(EmployeeRepository $employeeDTO,JobRepository $jobRepository)
    {
        $employees = $employeeDTO->findAll();

        return view("hr-director.employee-list-dashboard",["employees"=>$employees]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(JobRepository $jobRepository)
    {
        $postes = $jobRepository->findAll();
        return view("hr-director.employee-creation-dashboard",["postes"=>$postes]);
    }

    /**
     * Store a newly created resource in storage.
     * @throws \Exception
     */
    public function store(Request $request, EmployeeRepository $employeeRepository)
    {

        $employee = $request->validate([
            "first_name"=>"required|max:30",
            "last_name" =>"required|max:30",
            "middle_name" =>"required|max:30",
            "hard_skills" =>"required",
            "soft_skills"=>"required",
            "employee_mat" =>"required",
            "ambitions"=>"nullable",
            "job_id" => "nullable",
            "profile_picture"=>"nullable|file"]);

//        throw new \Exception("data some");
        $employeeRepository->create($employee);
        return redirect(route("employees_list"));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, EmployeeRepository $employeeRepository): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $employee = $employeeRepository->findEmployeeById($id);
        return \view("hr-director.employee-show-dashboard",["employee"=>$employee]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, EmployeeRepository $employeeRepository, JobRepository $jobRepository)
    {
        $employee = $employeeRepository->findEmployeeById($id);
        $postes = $jobRepository->findAll();
        return \view("hr-director.employee-edit-dashboard",["employee"=>$employee,"postes"=>$postes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $employee_code, EmployeeRepository $employeeRepository)
    {
        $employee = $request->validate([
            "first_name"=>"required|max:30",
            "last_name" =>"required|max:30",
            "middle_name" =>"required|max:30",
            "hard_skills" =>"required",
            "soft_skills"=>"required",
            "employee_mat" =>"required",
            "ambitions"=>"nullable",
            "job_id" => "nullable",
            "id"=>"required"]);

        $employee["profile_picture"] = $request->hasFile("profile_picture") ? $request->file("profile_picture") : null;
        $employeeRepository->update($employee["id"], $employee);
        return redirect(route("show_employee",["employee_code"=>$employee["id"]]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, EmployeeRepository $employeeRepository): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $employee = $employeeRepository->findEmployeeById($id);
        $employee->delete();

        return redirect(route("employees_list"));
    }
}
