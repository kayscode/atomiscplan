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
        <div class="px-3 flex-1 py-4">
            @if(!empty($formations))
                <div class="grid grid-cols-3 gap-3">
                    @foreach($formations as $formation)
                        <div class="shadow-sm text-center border border-gray-200 pb-2 space-y-2">
                            <p class="text-xl font-semibold text-indigo-500 py-3">
                                {{$formation->name}}
                            </p>
                            <div class="">
                                @if(!empty($formation->image))
                                    <p> with picture</p>
                                @else
                                    <img src="{{asset("images/formation/formation.jpeg")}}" alt="no picture" class="object-cover h-48 w-full">
                                @endif
                            </div>
                            <div class="py-3 bg-gray-100 ">
                                {{$formation->start_date}} - {{$formation->end_date}}
                            </div>
                            <div class="py-2 text-right px-2 ">
                                <a href="{{route("show_formation_emp",["formation_id"=>$formation->id])}}" class="px-4 py-2 border border-indigo-400 text-indigo-500 font-semibold"> voir </a>
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


