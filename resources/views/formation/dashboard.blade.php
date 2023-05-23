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
                <a href="{{route("create_formation")}}" class="formation-option block">creer une formation</a>
            </div>
            <div class="">
                <a href="{{route("list_formations")}}" class="formation-option block"> formations </a>
            </div>
        </div>
    </div>
@endsection

