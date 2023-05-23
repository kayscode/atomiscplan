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
            <ul class="flex gap-x-3">
                <li>
                    <a href="{{route("settings")}}" class="content-nav-opt-blue-bg"> accueil </a>
                </li>
                <li>
                    <a href="{{route("create_user")}}" class="content-nav-opt-blue-bg"> creer user </a>
                </li>
                <li>
                    <a href="{{route("index_users")}}" class="content-nav-opt-blue-bg"> users </a>
                </li>
            </ul>
        </div>
        <div class="px-3 py-4">
            <div class="grid grid-cols-3 gap-3">
                @foreach( $users as $user)
                    <div class="border border-gray-100 p-2 rounded-lg space-y-2 ">

                        <div class="flex justify-between">
                            <a href="{{route("destroy_user",["user_id"=>$user->id])}}" class="text-red-400 font-medium rounded-lg px-5 py-2 hover:bg-red-400 hover:text-white"> supprimer </a>
                            <a href="{{route("edit_user",["user_id"=>$user->id])}}" class="text-indigo-400 font-medium rounded-lg px-5 py-2 hover:bg-indigo-400 hover:text-white">modifier</a>
                        </div>
                        <hr>
                        {{-- description  --}}
                        <div class="space-y-2">
                            <p class="capitalize grid grid-cols-1">
                                <span class="font-semibold text-lg">{{$user->employee_mat}}</span>
                            </p>
                            <p class="text-right p-2">
                                <a href="{{route("show_user",["user_id"=>$user->id])}}" class="text-indigo-400 text-md px-4 py-2  rounded-lg border border-indigo-400 font-medium hover:text-white hover:bg-indigo-400"> detail </a>
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection

