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
        <div class="bg-indigo-400 py-4 text-white rounded-t-sm px-3 grid justify-end gap-4">
            <ul class="flex gap-x-3 sticky">
                <li>
                    <a href="{{route("create_career_plan")}}" class="content-nav-opt-blue-bg"> soumettre plan de carriere</a>
                </li>
            </ul>
        </div>
        <div class="px-3  py-4">
            @if($career_plans)
                <div class="grid grid-cols-3 gap-3">
                    @foreach($career_plans as $career_plan)
                        <div class="grid grid-cols-1 p-2 space-y-5 shadow-md">
                            {{-- career plan section --}}
                            <div class="space-y-2 py-2 flex flex-col">
                                <div class="flex-1 space-y-5 px-5">
                                    <h1 class="text-indigo-400 flex justify-between border-b border-indigo-200 py-2"> <span class="text-xl uppercase font-semibold">plan de carriere </span><strong class="text-xl">{{ $career_plan->year }}</strong></h1>
                                    <div class="text-lg space-y-1">
                                        <span class="block text-lg font-medium"> objectif :</span>
                                        <h2>{{$career_plan->goal_title}}</h2>
                                    </div>
                                    <div class="space-y-2">
                                        <span class="block text-lg font-medium">description :</span>
                                        <p>
                                            @if(empty($career_plan->description))
                                                pas de description pour ce plan de carriere
                                            @else
                                                {{ $career_plan->description }}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                {{-- option --}}
                                <div class="flex justify-end p-1 items-center gap-x-2">
                                    <a href="{{route('show_employee_career_plan',["career_plan_id"=>$career_plan->id])}}" class="text-indigo-400 font-medium rounded-lg px-5 py-2 hover:bg-indigo-400 hover:text-white shadow-md"> voir </a>
                                </div>
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
