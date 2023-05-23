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
    <div class="flex flex-col overflow-auto">
        <div class="bg-indigo-500 py-4 text-white rounded-t-sm px-3 grid justify-end gap-4">
            <ul class="flex gap-x-3 sticky">
                <li>
                    <a href="{{route("track_formation_dashboard")}}" class="content-nav-opt-blue-bg"> accueil </a>
                </li>
            </ul>
        </div>
        <div class="px-3 flex-1 py-4">
            @if(!empty($formations))
                <div class="grid grid-cols-1 gap-3">
                    @foreach($formations as $formation)
                        <div class="shadow-sm border border-gray-200 pb-2 space-y-2 flex px-2 items-center gap-x-2">
                            <div class="">
                                @if(!empty($formation->image))
                                    <p> with picture</p>
                                @else
                                    <img src="{{asset("images/formation/formation.jpeg")}}" alt="no picture" class="object-cover h-16 w-full">
                                @endif
                            </div>
                            <p class="text-xl font-semibold text-gray-500 py-3 pl-4 flex-1">
                                {{$formation->name}}
                            </p>
                            <div class="py-3 flex-1 text-center flex justify-around">
                                <span>
                                    {{$formation->start_date}}
                                </span>
                                <span>
                                    {{$formation->end_date}}
                                </span>
                            </div>
                            @if($formation->is_published)
                                <p class="py-2 p-1 text-lg text-green-500 font-semibold">
                                    publier
                                </p>
                            @else
                                <p class="py-2 p-1 text-lg uppercase bg-yellow-400 text-white">
                                    En attente
                                </p>
                            @endif
                            <div class="py-2 text-right px-2 ">
                                <a href="{{route("formation_participants",["formation_id"=>$formation->id])}}" class="px-4 py-2 border border-indigo-400 text-indigo-500 font-semibold"> participants </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p>
                    pas de formations
                </p>
            @endif
        </div>
    </div>
@endsection

