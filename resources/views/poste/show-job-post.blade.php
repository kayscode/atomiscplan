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
                <p> <span class="uppercase text-xl font-medium"> {{$job->title}} | [ {{$job->department}} ]</span></p>
            </div>
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
        <div class="px-3 py-4">
            <section>
                <div class="py-4">
                    <fieldset class="p-3 border border-gray-200">
                        <legend> competences techniques </legend>
                        <div class="flex gap-2">
                            @foreach( explode(',',$job->hard_skills) as $skill)
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
                            @if(!empty($job->soft_skills))
                                @foreach( explode(',',$job->soft_skills) as $skill)
                                    <p class="p-3 bg-indigo-50">
                                        {{$skill}}
                                    </p>
                                @endforeach
                            @else
                                <p class="p-3 bg-indigo-50">
                                    pas des competences requises
                                </p>
                            @endif
                        </div>
                    </fieldset>
                </div>
                <div class="flex justify-end px-2 gap-2">
                    <a href="{{route("edit_job",["post_id"=>$job->id])}}" class="px-5 py-3 border border-indigo-400 text-indigo-500 hover:font-semibold"> modifier </a>
                    <a href="" class="px-5 py-3 border border-indigo-400 text-indigo-500 hover:font-semibold"> travailleurs </a>
                </div>
            </section>
        </div>
    </div>
@endsection


