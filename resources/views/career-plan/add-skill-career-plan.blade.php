
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
        <div class="px-3 grid grid-cols-5 items-center justify-center py-4">
            <div class="col-start-2 col-span-3 p-4 shadow-lg rounded-lg  divide-y space-y-2">
                <h1 class="text-indigo-500 font-semibold text-center py-3 capitalize text-lg" > competence </h1>
                <form action="{{route('store_skill',["career_plan_id"=>$career_plan_id,'employee_id'=>$employee_id])}}" class="py-2 text-gray-700 space-y-3" method="post">
                    @csrf
                    <fieldset class="border border-gray-100 rounded-lg p-2 ">
                        <legend> information generale </legend>

                        <input type="number" name="career_plan_id" id="career_goal_id" value="{{$career_plan_id}}" hidden="hidden">

                        @error('name')
                        <div class="text-red-500 px-2 pt-1">{{ $message }}</div>
                        @enderror
                        <div class="form-field-container">
                            <label for="name" class="form-label"> nom competence </label>
                            <input type="text" name="name" id="name" class="form-input">
                        </div>

                        @error('state')
                        <div class="text-red-500 px-2 pt-1">{{ $message }}</div>
                        @enderror
                        <div class="form-field-container">
                            <label for="state" class="form-label"> etat </label>
                            <select name="state" id="state" class="form-input">
                                <option value="0"> non acquise </option>
                                <option value="1"> acquise </option>
                            </select>
                        </div>
                    </fieldset>
                    <fieldset class="border border-gray-100 rounded-lg p-2 ">
                        <legend> information competence </legend>

                        @error('skill_type')
                        <div class="text-red-500 px-2 pt-1">{{ $message }}</div>
                        @enderror
                        <div class="form-field-container">
                            <label for="skill_type" class="form-label"> type de competence </label>
                            <select name="skill_type" id="skill_type" class="form-input">
                                <option value="soft_skill"> competence douce </option>
                                <option value="hard_skill"> competence technique </option>
                            </select>
                        </div>

                        @error('skill_access_by')
                        <div class="text-red-500 px-2 pt-1">{{ $message }}</div>
                        @enderror
                        <div class="form-field-container">
                            <label for="skill_access_by" class="form-label"> moyen d'obtention </label>
                            <select name="skill_access_by" id="skill_access_by" class="form-input">
                                <option value="training"> training  </option>
                                <option value="bootcamp"> bootcamp </option>
                                <option value="conference"> conference </option>
                                <option value="certification"> certification </option>
                                <option value="work experience"> experience travail</option>
                            </select>
                        </div>

                        @error("actions_plan")
                        <div class="text-red-500 px-2 pt-1">{{ $message }}</div>
                        @enderror
                        <div class="form-field-container">
                            <label for="actions_plan" class="form-label"> plan d'actions </label>
                            <textarea class="form-input" name="actions_plan" id="actions_plan"></textarea>
                            <span class="text-gray-500 text-sm"> ex : lire livre, certification , bootcamp</span>
                        </div>
                    </fieldset>
                    <div class="mt-3 text-center">
                        <input type="submit" value="ajouter" class="bg-indigo-500 text-white font-semibold rounded-lg px-5 py-3">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
