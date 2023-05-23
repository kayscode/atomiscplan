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
                <a href="" class="formation-option block">travailleur</a>
            </div>
            <div class="">
                <a href="" class="formation-option block">plan de carriere </a>
            </div>
            <div class="">
                <a href="" class="formation-option block">postes</a>
            </div>
            <div class="">
                <a href="" class="formation-option block">utilisateur</a>
            </div>
        </div>
    </div>
@endsection
