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
        <div class="bg-indigo-500 py-4 text-white rounded-t-sm px-3 flex justify-between items-center gap-4">
            <div>
                <p> <span class="uppercase text-xl font-medium">{{$employee->first_name}} {{$employee->last_name}}</span></p>
            </div>
            <ul class="flex gap-x-3 sticky">
                <li>
                    <a href="{{route("employees.main.dashboard")}}" class="content-nav-opt-blue-bg"> accueil </a>
                </li>
                <li>
                    <a href="{{route("create_employee")}}" class="content-nav-opt-blue-bg">ajouter travailleur</a>
                </li>
                <li>
                    <a href="{{route("employees_list")}}" class="content-nav-opt-blue-bg">liste des travailleurs</a>
                </li>
            </ul>
        </div>
        <div class="px-3 py-4">
            <section>
                <div class=" flex justify-between gap-3">
                    <div>
                        @if($employee->profile_picture)
                            <div>
                                <img src="{{$employee->profile_picture}}" alt="">
                            </div>
                        @else
                            <div class="text-center flex justify-center">
                                    <span class="rounded-lg text-4xl font-bold uppercase bg-indigo-200 p-3 block flex justify-center items-center" style="width:100px;height: 100px">
                                        {{$employee->first_name[0]}} {{$employee->last_name[0]}}
                                    </span>
                            </div>
                        @endif
                    </div>
                    <div class="flex-1 bg-gray-50 rounded-lg p-2 uppercase space-y-2 text-indigo-400">
                        <p class="text-2xl font-semibold">{{$employee->first_name}} {{$employee->middle_name}} {{$employee->last_name}}</p>
                        <p class="text-2xl font-semibold"> {{$employee->employee_mat}}</p>
                    </div>
                </div>
                <div class="py-4">
                    <fieldset class="p-3 border border-gray-200">
                        <legend> competences techniques </legend>
                        <div class="flex gap-2">
                            @foreach( explode(',',$employee->hard_skills) as $skill)
                                <p class="p-3 bg-indigo-50">
                                    {{$skill}}
                                </p>
                            @endforeach
                        </div>
                    </fieldset>
                </div>
                <div class="py-4">
                    <fieldset class="p-3 border border-gray-200">
                        <legend> competences non techniques </legend>
                        <div class="flex gap-2">
                            @foreach( explode(',',$employee->soft_skills) as $skill)
                                <p class="p-3 bg-indigo-50">
                                    {{$skill}}
                                </p>
                            @endforeach
                        </div>
                    </fieldset>
                </div>
                <div class="flex justify-end px-2 gap-2">
                    <a href="{{route("edit_employee",["employee_code"=>$employee->id])}}" class="px-5 py-3 border border-indigo-400 text-indigo-500 hover:font-semibold"> modifier </a>
                    <a href="" class="px-5 py-3 bg-indigo-500 text-white hover:font-semibold"> plan de carriere </a>
                </div>
            </section>
        </div>
    </div>
@endsection

