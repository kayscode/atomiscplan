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
    <div class="flex flex-col overflow-auto" style="height: 600px;">
        <div>
            @include('formation.formation-navigation')
        </div>
        <div class="px-3 flex-1 grid grid-cols-6 items-center justify-center py-4">
            <div class="col-start-2 col-span-4 p-4 border border-gray-200  divide-y space-y-2">
                <h1 class="text-indigo-500 font-semibold text-center py-3 capitalize text-lg" > formation</h1>
                <form action="{{route("store_formation")}}" class="py-2 text-gray-700 space-y-3" method="post" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="border border-gray-100 rounded-lg p-2">
                        <legend> information generale </legend>

                        <div class="form-field-container">
                            @error("name")
                            <span class="text-red-500"> {{$message}}  </span>
                            @enderror
                            <label for="name" class="form-label"> nom </label>
                            <input type="text" name="name" id="name" class="form-input">
                        </div>
                        @error("description")
                        <span class="text-red-500"> {{$message}}  </span>
                        @enderror
                        <div class="form-field-container">
                            <label for="description" class="form-label"> description </label>
                            <textarea type="text" name="description" id="description" class="form-input"></textarea>
                        </div>
                    </fieldset>
                    <fieldset class="border border-gray-100 rounded-lg p-2 ">
                        <legend> duree de la formation </legend>

                        <div class="grid grid-cols-2 gap-2">
                            <div class="form-field-container">
                                @error("start_date")
                                <span class="text-red-500"> {{$message}}  </span>
                                @enderror
                                <label for="start_date" class="form-label"> date de debut </label>
                                <input type="date" name="start_date" id="start_date" class="form-input">
                            </div>
                            <div class="form-field-container">
                                @error("end_date")
                                <span class="text-red-500"> {{$message}}  </span>
                                @enderror
                                <label for="end_date" class="form-label"> date de fin  </label>
                                <input type="date" name="end_date" id="end_date" class="form-input">
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="border border-gray-100 rounded-lg p-2">
                        <legend> competences </legend>

                        @error("hard_skills")
                        <span class="text-red-500"> {{$message}}  </span>
                        @enderror
                        <div class="form-field-container">
                            <label for="hard_skills" class="form-label"> competences techniques </label>
                            <textarea type="text" name="hard_skills" id="hard_skills" class="form-input"></textarea>
                        </div>

                        @error("soft_skills")
                        <span class="text-red-500"> {{$message}}  </span>
                        @enderror
                        <div class="form-field-container">
                            <label for="soft_skills" class="form-label"> competences non techniques </label>
                            <textarea type="text" name="soft_skills" id="soft_skills" class="form-input"></textarea>
                        </div>

                    </fieldset>
                    <fieldset class="border border-gray-100 rounded-lg p-2">
                        <legend> autres </legend>

                        @error("image")
                        <span class="text-red-500"> {{$message}}  </span>
                        @enderror
                        <div class="form-field-container">
                            <label for="image" class="form-label"> image  </label>
                            <input type="file" name="image" id="image" class="form-input">
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

