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
            <div class="grid grid-cols-4 gap-3">
                @foreach( $employees as $employee)
                    <div class="border border-gray-100 p-2 rounded-lg space-y-2 ">
                        {{-- picture--}}
                        <div class="flex justify-between p-1">
                            <a href="{{route("delete_employee",["employee_code"=>$employee->id])}}" class="text-red-400 font-medium rounded-lg px-5 py-2 hover:bg-red-400 hover:text-white"> supprimer </a>
                            <a href="{{route("edit_employee",["employee_code"=>$employee->id])}}" class="text-indigo-400 font-medium rounded-lg px-5 py-2 hover:bg-indigo-400 hover:text-white">modifier</a>
                        </div>
                        <div>
                            @if($employee->profile_picture)
                                <div>
                                    <img src="{{$employee->profile_picture}}" alt="">
                                </div>
                            @else
                                <div class="text-center p-3 flex justify-center">
                                    <span class="rounded-full text-4xl font-bold uppercase bg-indigo-200 p-3 block flex justify-center items-center" style="width:100px;height: 100px">
                                        {{$employee->first_name[0]}} {{$employee->last_name[0]}}
                                    </span>
                                </div>
                            @endif
                        </div>
                        {{-- description  --}}
                        <div class="space-y-2">
                            <p class="capitalize text-center text-xl">
                                {{$employee->first_name}} {{$employee->middle_name}}  {{$employee->last_name}}
                            </p>
                            <p class="text-xl text-center">
                                {{$employee->employee_mat}}
                            </p>
                            <p class="text-center">
                                pas de poste
                            </p>
                            <p class="text-right p-2">
                                <a href="{{route("show_employee",["employee_code"=>$employee->id])}}" class="text-indigo-400 text-md px-4 py-2  rounded-lg border border-indigo-400 font-medium hover:text-white hover:bg-indigo-400"> detail </a>
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection

