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
            <ul class="flex gap-x-3 sticky">
                <li>
                    <a href="{{route("job_dashboard")}}" class="content-nav-opt-blue-bg"> accueil </a>
                </li>
                <li>
                    <a href="{{route("create_job")}}" class="content-nav-opt-blue-bg"> creer un poste</a>
                </li>
                <li>
                    <a href="{{route("index_jobs")}}" class="content-nav-opt-blue-bg">liste des postes</a>
                </li>
            </ul>
        </div>
        <div class="flex-1 px-3 flex items-center">
            <div class="w-full space-y-3">
                <h1 class="font-bold text-xl text-blue-500">liste des postes recement ajoutés</h1>
                <div>
                    @If($jobs)
                        <div class="grid grid-cols-3 gap-3">
                            @foreach( $jobs as $job)
                                <div class="border border-gray-100 p-2 rounded-lg space-y-2 ">
                                    <hr>
                                    {{-- description  --}}
                                    <div class="space-y-2">
                                        <p class="capitalize grid grid-cols-1">
                                            <span> poste </span> <span class="font-semibold text-lg">{{$job->title}}</span>
                                        </p>
                                        <p class="capitalize flex justify-between pt-3">
                                            <span> poste code </span><span class="font-medium text-lg">{{$job->position_code}}</span>
                                        </p>
                                        <p class="text-xl flex justify-between">
                                            <span>departement </span><span>{{$job->department}}</span>
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <div class="text-right">
                        <a href="{{route("index_jobs")}}" class="text-blue-500 underline"> voir tous les postes </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

