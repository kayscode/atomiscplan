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
    <div class="flex flex-col overflow-auto h-full">
        <div>
            @include('formation.formation-navigation')
        </div>
        <div class="px-3 flex-1 flex items-center justify-center py-4">
            add formation
        </div>
    </div>
@endsection

