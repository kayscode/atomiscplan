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
    <div class="flex flex-col h-full">
        <div class="bg-indigo-500 py-4 text-white rounded-t-sm px-3 grid justify-end gap-4">
           @include('career-plan.career-plan-navigation')
        </div>
        <div class="flex-1 px-3 grid items-center ">
            <div>
                <div class="text-lg p-4 border-b border-gray-200">
                    liste des plan de carrieres recemment ajoutés
                </div>
                @if(sizeof($career_plans))
                    <div class="shadow-sm rounded-lg p-4">
                        <div class="grid grid-cols-4 gap-3 py-3">
                            @foreach($career_plans as $career_plan)
                                <div class="border rounded-md space-y-2 flex flex-col">
                                    <div class="flex-1 space-y-3">
                                        <div class="bg-green-500 text-white p-2">
                                            <div class="flex justify-between items-center rounded-lg rounded-t-md">
                                                <p class="text-xl text-center">
                                                    Plan de carriere
                                                </p>
                                                <p class="text-3xl text-center font-medium"> {{$career_plan->year}} </p>
                                            </div>
                                            <p class="font-medium text-xl"> {{$career_plan->employee->first_name}} {{$career_plan->employee->last_name}} </p>
                                        </div>
                                        <div class="p-4 space-y-3">
                                            <p class="font-medium text-lg text-green-500"> {{$career_plan->goal_title}}</p>
                                            <p class="text-justify ">{{$career_plan->description}}</p>
                                        </div>
                                    </div>
                                    <p class="py-4 px-2 text-right">
                                        <a href="" class="rounded-md px-4 py-2 border border-green-500 text-green-500 hover:bg-green-500 hover:text-white"> consulter </a>
                                    </p>
                                </div>
                            @endforeach
                        </div>
                        <div class="py-3 text-indigo-500 underline text-right">
                            <a href="{{route('employees_career_plan')}}"> voir tous plans de carriere recents </a>
                        </div>
                    </div>
                @else
                    <p> pas des plans de cariere</p>
                @endif
            </div>
        </div>
    </div>
@endsection
