
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
        <div class="border-b py-4 text-xl px-4 font-black">
            {{$employee->first_name}} {{$employee->middle_name}} {{$employee->last_name}} | {{ $employee->job ? $employee->job->title : 'pas de poste' }}
        </div>
        <div class="py-4 px-4 space-y-4">
            @if(!empty($employee_skills))
                <div class="p-3 rounded-md shadow-md space-y-4">
                    <h1> competences initiales</h1>
                    @if(!empty($employee_skills["initial_skills"]["soft_skills"]))
                        <fieldset class="py-4 px-2 border">
                            <legend> competences douces </legend>
                                @foreach( explode(',',$employee_skills["initial_skills"]["soft_skills"]) as $skill)
                                    <span class="py-2 px-3 bg-indigo-50"> {{$skill}}</span>
                                @endforeach
                        </fieldset>
                    @endif
                    @if(!empty($employee_skills["initial_skills"]["hard_skills"]))
                        <fieldset class="py-4 px-2 border">
                            <legend> competences techniques </legend>
                                @foreach( explode(',',$employee_skills["initial_skills"]["hard_skills"]) as $skill)
                                    <span class="py-2 px-3 bg-indigo-50"> {{$skill}}</span>
                                @endforeach
                        </fieldset>
                    @endif
                </div>
                @if(!empty($employee_skills["career_plans"]))
                    <div class="p-3 rounded-md shadow-md space-y-4">
                        <h1> competences plans de carriere </h1>
                        @if(!empty($employee_skills["career_plans"]["soft_skills"]))
                            <fieldset class="py-4 px-2 border">
                                <legend> competences douces </legend>
                                @foreach( $employee_skills["career_plans"]["soft_skills"] as $skill)
                                    <span class="py-2 px-3 bg-indigo-50"> {{$skill}}</span>
                                @endforeach
                            </fieldset>
                        @endif
                        @if(!empty($employee_skills["career_plans"]["hard_skills"]))
                            <fieldset class="py-4 px-2 border">
                                <legend> competences techniques </legend>
                                @foreach($employee_skills["career_plans"]["hard_skills"] as $skill)
                                    <span class="py-2 px-3 bg-indigo-50"> {{$skill}}</span>
                                @endforeach
                            </fieldset>
                        @endif
                    </div>
                @endif
                @if(!empty($employee_skills["formations"]["soft_skills"]) || !empty($employee_skills["formations"]["hard_skills"]))
                    <div class="p-3 rounded-md shadow-md space-y-4">
                        <h1> competences formations  </h1>
                        @if(!empty($employee_skills["formations"]["soft_skills"]))
                            <fieldset class="py-4 px-2 border">
                                <legend> competences douces </legend>
                                @foreach($employee_skills["formations"]["soft_skills"] as $set_skill)
                                    @foreach(explode(',',$set_skill) as $skill)
                                        <span class="py-2 px-3 bg-indigo-50"> {{$skill}}</span>
                                    @endforeach
                                @endforeach
                            </fieldset>
                        @endif
                        @if(!empty($employee_skills["formations"]["hard_skills"]))
                            <fieldset class="py-4 px-2 border">
                                <legend> competences techniques </legend>
                                @foreach($employee_skills["formations"]["hard_skills"] as $set_skill)
                                    @foreach(explode(',',$set_skill) as $skill)
                                        <span class="py-2 px-3 bg-indigo-50"> {{$skill}}</span>
                                    @endforeach
                                @endforeach
                            </fieldset>
                        @endif
                    </div>
                @endif
            @else
                <p> no skill </p>
            @endif
        </div>
    </div>
@endsection

