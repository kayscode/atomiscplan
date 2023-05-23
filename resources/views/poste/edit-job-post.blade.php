
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
        <div class="px-3 grid grid-cols-5 items-center justify-center py-4">
            <div class="col-start-2 col-span-3 p-4 shadow-lg rounded-lg  divide-y space-y-2">
                <div>
                    @if(\Illuminate\Support\Facades\Session::has("error"))
                        <p class="bg-green-100 text-green-500 p-2">
                            {{\Illuminate\Support\Facades\Session::get("error")}}
                        </p>
                    @endif
                </div>
                <h1 class="text-indigo-500 font-semibold text-center py-3 capitalize text-lg" > modifier un poste </h1>
                <form action="{{route('update_job',["post_id"=>$job->id])}}" class="py-2 text-gray-700 space-y-1" method="post">
                    @csrf
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <div class="form-field-container">
                                <label for="title" class="form-label"> title </label>
                                <input type="text" name="title" value="{{$job->title}}" id="title" class="form-input">
                            </div>
                            @error('title')
                            <div class="text-red-500 px-2 pt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <div class="form-field-container">
                                <label for="year_of_experience" class="form-label"> annee d'exprience</label>
                                <input type="number" name="year_of_experience" value={{$job->year_of_experience}} id="year_of_experience" class="form-input">
                            </div>
                            @error('year_of_experience')
                            <div class="text-red-500 px-2 pt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-x-2">
                        <div>
                            <div class="form-field-container">
                                <label for="department" class="form-label"> departement </label>
                                <select name="department" id=department class="form-input" >
                                    <option value=""> pas de departement </option>
                                    <option value="IT"> IT ( inforamtique )</option>
                                    <option value="RH">  ressources humaines </option>
                                    <option value="Finance"> Finance </option>
                                    <option value="Accounting"> comptabilite </option>
                                    <option value="marketing"> marketing </option>
                                    <option value="production"> production </option>
                                </select>
                            </div>
                            @error('department')
                            <div class="text-red-500 px-2 pt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <div class="form-field-container">
                                <label for="position_code" class="form-label"> code poste </label>
                                <input type="text" name="position_code" value={{$job->position_code}} id="position_code" class="form-input">
                            </div>
                            @error('position_code')
                            <div class="text-red-500 px-2 pt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-field-container">
                        <label for="hard_skills" class="form-label"> competences techniques  </label>
                        <textarea name="hard_skills" id="hard_skills" class="form-input">{{$job->hard_skills}}</textarea>
                    </div>
                    @error("hard_skills")
                    <div class="text-red-500 px-2 pt-1">{{ $message }}</div>
                    @enderror

                    <div class="form-field-container">
                        <label for="soft_skills" class="form-label"> competences douces  </label>
                        <textarea name="soft_skills" id="soft_skills" class="form-input">{{$job->soft_skills}}</textarea>
                    </div>
                    @error("soft_skills")
                    <div class="text-red-500 px-2 pt-1">{{ $message }}</div>
                    @enderror

                    <div class="mt-3 text-center">
                        <input type="submit" value="modifier" class="bg-indigo-500 text-white font-semibold rounded-lg px-5 py-3">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

