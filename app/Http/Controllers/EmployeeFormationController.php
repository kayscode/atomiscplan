<?php

namespace App\Http\Controllers;

use App\Repository\EmployeeRepository;
use App\Repository\FormationRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeFormationController extends Controller
{
    private EmployeeRepository $employeeRepository;
    private FormationRepository $formationRepository;

    public function __construct(EmployeeRepository $employeeRepository, FormationRepository $formationRepository)
    {
        $this->employeeRepository = $employeeRepository;
        $this->formationRepository = $formationRepository;
    }

    // render all published formations
    public function formation_board(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $formations = $this->formationRepository->fetchPublishedFormation();
        return view('employee.employee-formations-board',["formations"=>$formations]);
    }

    public function show_formation(int $formation_id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $formation = $this->formationRepository->read($formation_id);
        $employee = Auth::user()->employee;
        $participant = $formation->participants->where('employee_id',$employee->id)->first();
        return view("formation.show-formation",["formation"=>$formation, "participant"=>$participant]);
    }

    public function participate(int $formation_id): RedirectResponse
    {
        $employee = Auth::user()->employee;
        $this->formationRepository->addParticipant($formation_id,$employee);
        return redirect()->route("show_formation_emp",["formation_id"=>$formation_id]);
    }

    public function enrolled_formation(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $formations = $this->formationRepository->fetchPublishedFormation();
        $enrolled_formations = new Collection();
        $employee = Auth::user()->employee;

        foreach ($formations as $formation){
            $participant = $formation->participants->where('employee_id',$employee->id)->first();
            if($participant){
                $enrolled_formations->add($formation);
            }
        }

        return view("employee.employee-formations-board",["formations"=>$enrolled_formations]);
    }
}
