
@extends("layouts.base-dashboard")

@section("top-navigation")
    <div>
        @include("layouts.top-navigation-bar")
    </div>
@endsection

@section("left-side-navigation")
    <div>
        @include("layouts.left-side-navigation")
    </div>
@endsection

@section("dashboard-main-content")
    <div class="flex flex-col overflow-auto" style="height: 600px">
        <div class="bg-indigo-500 py-4 text-white rounded-t-sm px-3 grid justify-end gap-4">
            @include('career-plan.career-plan-navigation')
        </div>
        <div class="flex-1 px-3 py-4 space-y-4">
            <div class="py-5 rounded bg-gray-50 px-2 flex">
                <div class="flex-1 text-xl font-medium capitalize ">
                    {{$employee->first_name}} {{$employee->middle_name}} {{$employee->last_name}} | @if(!empty($employee->job)) {{$employee->job->title}} @else {{"pas de poste"}}  @endif
                </div>
                <div class="space-x-2">
                    <a href="{{route('create_skill',["career_plan_id"=>$career_plan->id,'employee_id'=>$employee->id])}}" class="py-2 px-3 border border-indigo-500 text-indigo-500 hover:bg-indigo-500 hover:text-white"> ajouter competence </a>
                    <a href="{{route('employee_all_skills',["employee_id"=>$employee->id])}}" class="py-2 px-3 border border-indigo-500 text-indigo-500 hover:bg-indigo-500 hover:text-white"> Toute Competence </a>
                </div>
            </div>
            {{-- list of all employee career paln--}}
            <div class="text-md text-gray-500 py-2 border-b">
                liste des competences plan de cariere :  <strong>{{$career_plan->goal_title}}</strong>
            </div>
            <div class="grid grid-cols-1 px-2 py-4 rounded-md border gap-y-3">
                @if(sizeof($career_plan_skills))
                    <div class="py-5 px-3 text-gray-500 font-medium grid grid-cols-6 items-center border-b text-green-500">
                        <p class="col-span-2"> nom  </p>
                        <p> type de competence </p>
                        <p> acquis par </p>
                        <p> etat </p>
                        <p class="text-center">
                            action
                        </p>
                    </div>
                    @foreach($career_plan_skills as $career_plan_skill)
                        <div class="shadow-sm rounded-md py-5 px-3 text-gray-500 font-medium grid grid-cols-6 items-center">
                            <p class="col-span-2">{{$career_plan_skill->name}}</p>
                            <p>{{$career_plan_skill->skill_type}}</p>
                            <p>{{$career_plan_skill->skill_access_by}}</p>
                            @if($career_plan_skill->state )
                                <p class="text-green-500">{{'acquise'}}</p>
                            @else
                                <p class="text-red-500">{{'non acquise'}}</p>
                            @endif
                            <div class="grid grid-cols-2 gap-x-2">
                                <a href="{{route('show_skill',["skill_id"=>$career_plan_skill->id, 'employee_id'=>$employee->id,'career_plan_id'=> $career_plan_skill->careerPlan->id])}}" class="py-2 px-3 border border-green-500 text-green-500 hover:bg-green-500 hover:text-white col-span-1"> details </a>
                                <form class="col-span-1" action="{{route('destroy_skill',["employee_id"=>$employee->id,"career_plan_id"=>$career_plan_skill->careerPlan->id,"skill_id"=>$career_plan_skill->id])}}" method="post">
                                    @method('delete')
                                    @csrf
                                    <input type="text" value="{{$career_plan_skill->id}}" class="hidden" hidden="hidden" name="skill_id">
                                    <input type="submit" class="py-2 px-3 border border-red-500 text-red-500 hover:bg-red-500 hover:text-white" value="supprimer"/>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p> pas des competences  </p>
                @endif
            </div>
        </div>
    </div>
@endsection

