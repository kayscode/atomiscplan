
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
                <h1 class="text-indigo-500 font-semibold text-center py-3 capitalize text-lg" > creer un plan de carriere </h1>
                <form action="{{route('store_career_plan')}}" class="py-2 text-gray-700" method="post">
                    @csrf
                    <fieldset class="border border-gray-100 rounded-lg p-2 ">
                        <legend> information plan carriere </legend>

                        @error('employee_id')
                            <div class="text-red-500 px-2 pt-1">{{ $message }}</div>
                        @enderror
                        <div class="form-field-container">
                            <label for="employee_id" class="form-label"> matricule  </label>
                            <input type="text" name="employee_id" id="employee_id" class="form-input">
                        </div>

                        @error('goal_title')
                        <div class="text-red-500 px-2 pt-1">{{ $message }}</div>
                        @enderror
                        <div class="form-field-container">
                            <label for="goal_title" class="form-label"> objectif </label>
                            <input type="text" name="goal_title" id="goal_title" class="form-input">
                        </div>

                        @error('year')
                        <div class="text-red-500 px-2 pt-1">{{ $message }}</div>
                        @enderror
                        <div class="form-field-container">
                            <label for="year" class="form-label"> annee </label>
                            <input type="number" name="year" id="year" class="form-input">
                        </div>
                        <div class="form-field-container">
                            <label for="description" class="form-label"> description </label>
                            <textarea class="form-input" name="description" id="description"></textarea>
                        </div>
                    </fieldset>
                    <div class="mt-3 text-center">
                        <input type="submit" value="creer" class="bg-indigo-500 text-white font-semibold rounded-lg px-5 py-3">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
