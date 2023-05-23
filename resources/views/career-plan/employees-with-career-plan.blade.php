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
            @include('career-plan.career-plan-navigation')
        </div>
        <div class="flex-1 p-3">
            <div class="p-4 grid grid-cols-3 border-b items-center">
                <div class="">
                    <h1>list of employees with career plan</h1>
                </div>
                <div class="col-start-3">
                    <form action="" method="" class="flex">
                        <input type="text" class="flex-1 p-2 border">
                        <input type="submit" class="px-3 py-2 bg-indigo-500 text-white" value="recherche">
                    </form>
                </div>
            </div>
            <div>
                @if(sizeof($employees))
                    <div class="p-4 space-y-2">
                        @foreach($employees as $employee)
                            <div class="flex items-center border px-2 rounded-md">
                                <div>
                                    @if($employee->profile_picture)
                                        <img src="{{$employee->profile_picture}}" alt="">
                                    @else
                                        <div class="text-center p-3 flex justify-center">
                                          <span class="rounded-full text-md font-bold uppercase bg-indigo-200 p-3 block flex justify-center items-center h-16 w-16">
                                              {{$employee->first_name[0]}} {{$employee->last_name[0]}}
                                          </span>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-1 grid grid-cols-3">
                                    <div class="text-lg font-medium">
                                        {{$employee->first_name}} {{$employee->middle_name}} {{$employee->last_name}}
                                    </div>
                                    <div class="text-lg">
                                        @if($employee->job)
                                            {{$employee->job->title}}
                                        @else
                                            pas de poste
                                        @endif
                                    </div>
                                </div>
                                <div class="">
                                    <a href="{{route('employee_career_plan_list',["employee_id"=>$employee->id])}}" class="border border-green-500 text-green-500 rounded-md hover:bg-green-500 hover:text-white font-sm px-3 py-2"> plan de carriere</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p>no employee with career plan</p>
                @endif
            </div>
        </div>
    </div>
@endsection
