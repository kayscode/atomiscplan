
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
        <div class="px-3  py-4">
            @if($careers_plan)
                <div class="grid grid-cols-2 gap-3">
                    @foreach($careers_plan as $career_plan)
                        <div class="grid grid-cols-2 border border-gray-100 p-2 rounded-lg space-y-5 ">
                            {{-- option --}}
                            <div class="col-span-2 flex justify-end p-1 items-center gap-x-2">
                                <a href="" class="text-red-400 font-medium rounded-lg px-5 py-2 hover:bg-red-400 hover:text-white"> supprimer </a>
                                <a href="{{route('show_employee_career_plan',["career_plan_id"=>$career_plan->id])}}" class="text-indigo-400 font-medium rounded-lg px-5 py-2 hover:bg-indigo-400 hover:text-white"> detail </a>
                            </div>

                            {{-- employee data--}}
                            <div class="">
                                {{-- picture--}}
                                <div>
                                    @if($career_plan->employee->profile_picture)
                                        <div>
                                            <img src="{{$career_plan->$employee->profile_picture}}" alt="">
                                        </div>
                                    @else
                                        <div class="text-center p-3 flex justify-center">
                                            <span class="rounded-full text-4xl font-bold uppercase bg-indigo-200 p-3 block flex justify-center items-center" style="width:100px;height: 100px">
                                                {{$career_plan->employee->first_name[0]}} {{$career_plan->employee->last_name[0]}}
                                            </span>
                                        </div>
                                    @endif
                                </div>
                                {{-- description  --}}
                                <div class="space-y-2">
                                    <p class="capitalize text-center text-xl">
                                        {{$career_plan->employee->first_name}} {{$career_plan->employee->middle_name[0]}}. {{$career_plan->employee->last_name}}
                                    </p>
                                    <p class="text-center">
                                        pas de poste
                                    </p>
{{--                                    <p class="text-right p-2">--}}
{{--                                        <a href="{{route("show_employee",["employee_code"=>$employee->id])}}" class="text-indigo-400 text-md px-4 py-2  rounded-lg border border-indigo-400 font-medium hover:text-white hover:bg-indigo-400"> detail </a>--}}
{{--                                    </p>--}}
                                </div>
                            </div>
                            {{-- career plan section --}}
                            <div class="space-y-3">
                                <h1 class="text-xl"> plan de carriere <strong class="text-xl">{{ $career_plan->year }}</strong></h1>
                                <div class="text-lg">
                                    <span class="block text-lg"> objectif :</span>
                                    <h2>{{$career_plan->goal_title}}</h2>
                                </div>
                                <div class="space-y-2">
                                    <span class="block text-lg">description :</span>
                                    <p>
                                        @if(empty($career_plan->description))
                                            pas de description pour ce plan de carriere
                                        @else
                                            {{ $career_plan->description }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="col-span-2 flex justify-end p-1 items-center gap-x-2">
                                <a href="{{route('create_skill',["career_goal_id"=>$career_plan->id])}}" class="text-indigo-400 font-medium rounded-lg px-5 py-2 border border-indigo-400 hover:bg-indigo-400 hover:text-white"> ajouter competence</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div>
                    there are not yet career plan
                </div>
            @endif
        </div>
    </div>
@endsection

