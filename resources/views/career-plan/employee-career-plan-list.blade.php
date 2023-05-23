
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
                    {{$employee->first_name}} {{$employee->middle_name}} {{$employee->last_name}} | @if($employee->job) {{$employee->job->title}} @else {{"pas de poste"}}  @endif
                </div>
                <div>
                    <a href="{{route('employee_all_skills',["employee_id"=>$employee->id])}}" class="py-2 px-3 border border-indigo-500 text-indigo-500 hover:bg-indigo-500 hover:text-white"> Toute Competence </a>
                </div>
            </div>
            {{-- list of all employee career paln--}}
            <div class="text-md text-gray-500 py-2 border-b">
                liste des plans de cariere
            </div>
            <div class="grid grid-cols-1 px-2 py-4 rounded-md border gap-y-3">
                @if(sizeof($career_plans))
                    <div class="py-5 px-3 text-gray-500 font-medium grid grid-cols-6 items-center border-b text-green-500">
                        <p class="col-span-2"> objectif </p>
                        <p> année </p>
                        <p> date de creation </p>
                        <p> date de mise à jour</p>
                        <p class="text-center">
                            action
                        </p>
                    </div>
                    @foreach($career_plans as $career_plan)
                        <div class="shadow-sm rounded-md py-5 px-3 text-gray-500 font-medium grid grid-cols-6 items-center">
                            <p class="col-span-2">{{$career_plan->goal_title}}</p>
                            <p>{{$career_plan->year}}</p>
                            <p>{{$career_plan->created_at}}</p>
                            <p>{{$career_plan->updated_at}}</p>
                            <p class="flex justify-center gap-x-2">
                                <a href="{{route('index_skills',["employee_id"=>$employee->id,"career_plan_id"=>$career_plan->id])}}" class="py-2 px-3 border border-green-500 text-green-500 hover:bg-green-500 hover:text-white"> details </a>
                                <a href="{{route('destroy_career_plan',["employee_id"=>$employee->id,"career_plan_id"=>$career_plan->id])}}" class="py-2 px-3 border border-red-500 text-red-500 hover:bg-red-500 hover:text-white"> delete </a>
                            </p>
                        </div>
                    @endforeach
                @else
                    <p> No career plan </p>
                @endif
            </div>
        </div>
    </div>
@endsection

