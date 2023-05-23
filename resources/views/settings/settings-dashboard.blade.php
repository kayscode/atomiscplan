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
    <div class="flex justify-center items-center h-full">
        <div class="grid grid-cols-2 gap-5 text-center">
            <div class="">
                <a href="{{route("create_user")}}"  class="formation-option block">creer utilisateur</a>
            </div>
            <div class="">
                <a href="{{route("index_users")}}" class="formation-option block"> utilisateurs </a>
            </div>
        </div>
    </div>
@endsection

