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
            @include('career-plan.career-plan-navigation')
        </div>
        <div class="px-3 flex-1 py-4 grid grid-cols-6">
            @if(!is_null($skill))
                <div class="col-start-2 col-span-4 space-y-2">
                    <div class="py-3">
                        <p class="text-2xl font-black">{{$skill->name}}</p>
                    </div>
                    <div class="border p-4 space-y-3 divide divide-y">
                        <div class="text-right py-2">
                            <span class="text-2xl font-black">{{$career_plan->year}}</span>
                        </div>
                        <div class="py-2">
                            <div class="flex justify-between">
                                <p class="font-medium"> plan de carriere </p>
                                <p class="pl-3">{{$career_plan->goal_title}}</p>
                            </div>
                        </div>
                        <div class="py-2">
                            <div class="flex justify-between">
                                <p class="font-medium"> type de competence </p>
                                <p class="pl-3 uppercase">{{ str_replace('_',' ',$skill->skill_type) }}</p>
                            </div>
                        </div>
                        <div class="py-2">
                            <div class="flex justify-between" >
                                <p class="font-medium" > etat de la competence </p>
                                @if($skill->state)
                                    <p class="pl-3 text-green-500">{{'acquise' }}</p>
                                @else
                                    <p class="pl-3 text-red-500">{{'non acquise' }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="py-2">
                            <div class="flex justify-between" >
                                <p class="font-medium" > acquis par  </p>
                                <p class="pl-3">{{$skill->skill_access_by }}</p>
                            </div>
                        </div>
                        @if(!empty($skill->actions_plan))
                            <div class="py-2 space-y-2">
                                <p class="font-medium" > plan d'actions </p>
                                <div class="grid grid-cols-3 gap-2">
                                    @foreach(explode(',',$skill->actions_plan) as $action)
                                        <span class="px-3 py-2 bg-indigo-50">{{$action}}</span>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <div class="py-2">
                            <div class="flex justify-between" >
                                <p class="font-medium" > date de creation  </p>
                                <p class="pl-3">{{$skill->created_at }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end gap-3">
                        <a href="{{route('edit_skill',["employee_id"=>$career_plan->employee->id,"career_plan_id"=>$career_plan->id,"skill_id"=>$skill->id])}}" class="py-2 px-3 border border-indigo-500 text-indigo-500 hover:bg-indigo-500 hover:text-white"> modifier </a>
                        @if(!$skill->state)
                            <form action="{{route('master_skill',["employee_id"=>$career_plan->employee->id,"career_plan_id"=>$career_plan->id,"skill_id"=>$skill->id])}}" method="post">
                                @method('put')
                                @csrf
                                <input type="text" value="{{$skill->id}}" hidden="hidden" name="skill_id">
                                <input type="submit" class="py-2 px-3 border border-indigo-500 text-indigo-500 hover:bg-indigo-500 hover:text-white" value="acquerir"/>
                            </form>
                        @endif
                        <form action="{{route('destroy_skill',["employee_id"=>$career_plan->employee->id,"career_plan_id"=>$career_plan->id,"skill_id"=>$skill->id])}}" method="post">
                            @method('delete')
                            @csrf
                            <input type="text" value="{{$skill->id}}" hidden="hidden" name="skill_id">
                            <input type="submit" class="py-2 px-3 border border-red-500 text-red-500 hover:bg-red-500 hover:text-white" value="supprimer"/>
                        </form>
                    </div>
                </div>
            @else
                <p>
                    pas des detaiks
                </p>
            @endif
        </div>
    </div>
@endsection

