<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormationPostRequest;
use App\Models\FormationParticipant;
use App\Repository\FormationRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    private FormationRepository $formationRepository;

    public function __construct(FormationRepository $formationRepository)
    {
        $this->formationRepository = $formationRepository;
    }

    public function dashboard(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view("formation.dashboard");
    }

    public function track_formation(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $formations = $this->formationRepository->fetchPublishedFormation();
        return view('formation.track-formation',["formations"=>$formations]);
    }

    // list of formations
    public function index(){
        $formations = $this->formationRepository->findAll();
        return view('formation.list-formation',['formations'=>$formations]);
    }

    public function show(Request $request, int $formation_id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $formation = $this->formationRepository->read($formation_id);
        return view("formation.show-formation",["formation"=>$formation]);
    }

    public function create()
    {
        return view("formation.create-formation");
    }

    public function edit()
    {
        return view("formation.edit-formation");
    }

    public function store(FormationPostRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $this->formationRepository->create($validated);
        return redirect()->route("list_formations");
    }

    public function publish(int $formation_id): RedirectResponse
    {
        $this->formationRepository->publish($formation_id);
        return redirect()->route("show_formation",["formation_id"=>$formation_id]);
    }

    public function formation_participants(int $formation_id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $formation = $this->formationRepository->read($formation_id);
        $participants = $formation->participants;
        return view('formation.formation_participants',["participants"=>$participants,"formation_id"=>$formation_id]);
    }

    public function confirm_participation(Request $request, int $formation_id): mixed
    {
        $validated = $request->validate([
            "employee_id" => "required"
        ]);

        $this->formationRepository->confirmParticipation($formation_id,$validated["employee_id"]);
        return redirect()->route("formation_participants",["formation_id"=>$formation_id]);
    }
}
