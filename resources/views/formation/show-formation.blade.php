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
        @if(\Illuminate\Support\Facades\Auth::user()->user_type === "training_planner")
            <div>
                @include('formation.formation-navigation')
            </div>
        @endif
        <div class="px-3 flex-1 py-4 grid grid-cols-6">
            @if($formation)
                <div class="col-start-2 col-span-4 space-y-2">
                    <div>
                        @if($formation->image)
                            <img src="{{asset($formation->image)}}" alt="" class="object-cover h-16 w-full">
                        @else
                            <img src="{{asset("images/formation/formation.jpeg")}}" alt="" class="object-cover w-full" style="height: 300px">
                        @endif
                    </div>
                    <div>
                        <p class="text-2xl font-black">{{$formation->name}}</p>
                    </div>
                    <div class="p-4 border border-gray-200">
                        <p class="">{{$formation->description}}</p>
                    </div>
                    @if(\Illuminate\Support\Facades\Auth::user()->user_type === "training_planner")
                        <div class="p-4 border border-gray-200">
                            <p class="">participants : {{$formation->participants->count()}}</p>
                        </div>
                        <div class="p-4 border border-gray-200">
                            <p class=""> publié : {{$formation->is_published ? "oui" : "non"}}</p>
                        </div>
                    @endif
                    <div class="space-y-2 p-4 border border-gray-200">
                        <h1> competences</h1>
                        <div class="space-y-3 py-2 bg-gray-100 rounded-sm px-2">
                            <h2 class="py-2"> competences techniques </h2>
                            <div class="py-3">
                                @if($formation->hard_skills)
                                    @foreach(explode(',',$formation->hard_skills) as $skill)
                                        <span class="p-3 bg-white"> {{$skill}}</span>
                                    @endforeach
                                @else
                                    <span> pas de competence </span>
                                @endif
                            </div>
                        </div>
                        <div class="space-y-3 py-2 bg-gray-100 rounded-sm px-2">
                            <h2 class="py-2"> competences douces </h2>
                            <div class="py-3">
                                @if($formation->soft_skills)
                                    @foreach(explode(',',$formation->soft_skills) as $skill)
                                        <span class="p-3 bg-indigo-50"> {{$skill}}</span>
                                    @endforeach
                                @else
                                    <span> pas de competence </span>
                                @endif
                            </div>
                        </div>
                        <div class="flex justify-end gap-3">

                            @if(\Illuminate\Support\Facades\Auth::user()->user_type === "training_planner")
                                <a href="" class="px-3 py-2 border border-red-500 text-red-500"> supprimer </a>
                                <a href="" class="px-3 py-2 border border-indigo-500 text-indigo-500"> modifier  </a>
                                <a href="{{route("publish_formation",["formation_id"=>$formation->id])}}" class="px-3 py-2 border border-indigo-500 text-indigo-500"> publier  </a>
                                <a href="{{route("formation_participants",["formation_id"=>$formation->id])}}" class="px-3 py-2 border border-indigo-500 text-indigo-500"> participants </a>
                            @elseif(\Illuminate\Support\Facades\Auth::user()->user_type === "employee")
                                @if($participant)
                                    <a href="{{route("participate",["formation_id"=>$formation->id])}}" class="px-3 py-2 border border-indigo-500 text-indigo-500"> annuler </a>
                                @else
                                    <a href="{{route("participate",["formation_id"=>$formation->id])}}" class="px-3 py-2 border border-indigo-500 text-indigo-500"> participer </a>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            @else
                <p>
                    pas des donnees
                </p>
            @endif
        </div>
    </div>
@endsection

