<div class="flex flex-col" style="height: 607px">
    <div class="flex-1 py-3 pl-10">
        <ul class="space-y-3 flex flex-col px-2">
            {{-- check if user type an makes option availbalde        --}}
            @if(!empty(\Illuminate\Support\Facades\Auth::user()))
                    @if(strtoupper(\Illuminate\Support\Facades\Auth::user()->user_type)  === "HR_DIRECTOR")
                        <li><a href="{{route("employees.main.dashboard")}}" class="left-navigation-opt"><span>travailleurs</span> </a></li>
                        <li><a href="{{route("career_plan_dashboard")}}" class="left-navigation-opt"> plan de carriere </a></li>
                        <li><a href="{{route("job_dashboard")}}" class="left-navigation-opt"> postes </a></li>
                        <li><a href="{{route("settings")}}" class="left-navigation-opt"> parametres </a></li>
                    @elseif(strtoupper(\Illuminate\Support\Facades\Auth::user()->user_type)=== "TRAINING_PLANNER" )
                        <li><a href="{{route("formation_main_dashboard")}}" class="left-navigation-opt"> formations</a></li>
                        <li><a href="{{route("track_formation_dashboard")}}" class="left-navigation-opt"> suivi de formation </a></li>
                    @elseif(strtoupper(\Illuminate\Support\Facades\Auth::user()->user_type)=== "EMPLOYEE")
                        <li><a href="{{route("employee_career_plans")}}" class="left-navigation-opt"> plan de cariere</a></li>
                        <li><a href="{{route("formation_board")}}" class="left-navigation-opt"> panneau de formation </a></li>
                        <li><a href="{{route("list_enrolled_formation")}}" class="left-navigation-opt"> mes formations </a></li>
                    @endif
            @else
                <li> no user connected </li>
            @endif
        </ul>
    </div>
    <div>
        <a href="{{route("logout")}}" class="py-3 text-center font-medium border-t block hover:bg-red-500 hover:text-white hover:font-medium"> logout </a>
    </div>
</div>
