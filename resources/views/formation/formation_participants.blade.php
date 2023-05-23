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
            <ul class="flex gap-x-3 sticky">
                <li>
                    <a href="{{route("track_formation_dashboard")}}" class="content-nav-opt-blue-bg"> accueil </a>
                </li>
            </ul>
        </div>
        @if(!empty($participants))
          <div class="grid grid-cols-2 p-3">
              @foreach($participants as $participant)
                  {{-- display information about particpants of the formation --}}
                  <div class="flex items-center border px-2 rounded-md">
                      <div>
                          @if($participant->employee->profile_picture)
                              <img src="{{$participant->employee->profile_picture}}" alt="">
                          @else
                              <div class="text-center p-3 flex justify-center">
                              <span class="rounded-full text-md font-bold uppercase bg-indigo-200 p-3 block flex justify-center items-center h-12 w-12">
                                  {{$participant->employee->first_name[0]}} {{$participant->employee->last_name[0]}}
                              </span>
                              </div>
                          @endif
                      </div>
                      <div class="text-lg capitalize flex-1">
                          {{$participant->employee->first_name}} {{$participant->employee->middle_name}} {{$participant->employee->last_name}}
                      </div>
                      <div class="">
                          @if(!$participant->participate)
                              <form action="{{route("confirm_participation",["formation_id"=>$formation_id])}}" method="post">
                                  @csrf
                                  <input type="text" name="employee_id" value="{{$participant->employee_id}}" hidden="hidden">
                                  <input type="submit" value="confirmer" class="px-3 py-2 text-green-400 border border-green-400 hover:text-white hover:bg-green-400 rounded-md">
                              </form>
                          @else
                              <span class="text-green-400 uppercase font-semibold"> confimer </span>
                          @endif
                      </div>
                  </div>
              @endforeach
          </div>
        @endif

        @if(sizeof( $participants) == 0)
            <div class="flex-1 flex justify-center items-center text-lg font-bold"> pas des participants</div>
        @endif
    </div>
@endsection

