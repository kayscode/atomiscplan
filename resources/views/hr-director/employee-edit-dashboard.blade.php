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
        <div class="bg-indigo-500 py-4 text-white rounded-t-sm px-3 flex justify-between items-center gap-4">
            <div>
                <p> <span class="uppercase text-xl font-medium">{{$employee->first_name}} {{$employee->last_name}}</span></p>
            </div>
            <ul class="flex gap-x-3 sticky">
                <li>
                    <a href="{{route("employees.main.dashboard")}}" class="content-nav-opt-blue-bg"> accueil </a>
                </li>
                <li>
                    <a href="{{route("create_employee")}}" class="content-nav-opt-blue-bg">ajouter travailleur</a>
                </li>
                <li>
                    <a href="{{route("employees_list")}}" class="content-nav-opt-blue-bg">liste des travailleurs</a>
                </li>
            </ul>
        </div>
        <div class="px-3 grid grid-cols-5 items-center justify-center py-4">
            <div class="col-start-2 col-span-3 p-4 shadow-lg rounded-lg  divide-y space-y-2">
                <h1 class="text-indigo-500 font-semibold text-center py-3 capitalize text-lg" > modifier travailleur</h1>
                <form action="{{route("update_employee",["employee_code"=>$employee->id])}}" class="py-2 text-gray-700 space-y-3" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="id" value="{{$employee->id}}" hidden="hidden"/>
                    <fieldset class="border border-gray-100 rounded-lg p-2 flex gap-x-3">
                        <legend> information personnelle </legend>

                        <div class="form-field-container">
                            @error("first_name")
                            <span class="text-red-500"> {{$message}}  </span>
                            @enderror
                            <label for="first_name" class="form-label"> prenom </label>
                            <input type="text" name="first_name" id="first_name" class="form-input" value={{$employee->first_name}}>
                        </div>

                        <div class="form-field-container">
                            @error("middle_name")
                            <span class="text-red-500"> {{$message}}  </span>
                            @enderror
                            <label for="middle_name" class="form-label"> nom </label>
                            <input type="text" name="middle_name" id="middle_name" class="form-input" value={{$employee->middle_name}}>
                        </div>

                        <div class="form-field-container">
                            @error("last_name")
                            <span class="text-red-500"> {{$message}}  </span>
                            @enderror
                            <label for="last_name" class="form-label"> post-nom </label>
                            <input type="text" name="last_name" id="last_name" class="form-input" value={{$employee->last_name}}>
                        </div>
                    </fieldset>
                    <fieldset class="border border-gray-100 rounded-lg p-2 grid grid-cols-2 gap-x-3">
                        <legend> information travailleur  </legend>

                        <div class="form-field-container">
                            @error("employee_mat")
                            <span class="text-red-500"> {{$message}}  </span>
                            @enderror
                            <label for="employee_mat" class="form-label"> matricule </label>
                            <input type="text" name="employee_mat" id="employee_mat" class="form-input" value={{$employee->employee_mat}}>
                        </div>

                        <div class="form-field-container">
                            @error("job_id")
                            <span class="text-red-500"> {{$message}}  </span>
                            @enderror
                            <label for="job_id" class="form-label"> poste occupe </label>
                            <select type="text" name="job_id" id="job_id" class="form-input block">
                                @foreach($postes as $poste)
                                    <option value={{$poste->id}} selected> {{$poste->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </fieldset>
                    <fieldset class="border border-gray-100 rounded-lg p-2">
                        <legend> competences </legend>

                        @error("hard_skills")
                        <span class="text-red-500"> {{$message}}  </span>
                        @enderror
                        <div class="form-field-container">
                            <label for="hard_skills" class="form-label"> competences techniques </label>
                            <textarea type="text" name="hard_skills" id="hard_skills" class="form-input">{{$employee->hard_skills}}</textarea>
                        </div>

                        @error("soft_skills")
                        <span class="text-red-500"> {{$message}}  </span>
                        @enderror
                        <div class="form-field-container">
                            <label for="soft_skills" class="form-label"> competences non techniques </label>
                            <textarea type="text" name="soft_skills" id="soft_skills" class="form-input">{{$employee->soft_skills}}</textarea>
                        </div>

                    </fieldset>
                    <fieldset class="border border-gray-100 rounded-lg p-2">
                        <legend> autres </legend>

                        @error("ambitions")
                        <span class="text-red-500"> {{$message}}  </span>
                        @enderror
                        <div class="form-field-container">
                            <label for="ambitions" class="form-label"> ambitions </label>
                            <textarea type="text" name="ambitions" id="ambitions" class="form-input">{{$employee->ambitions}}</textarea>
                        </div>
                        @error("profile_picture")
                        <span class="text-red-500"> {{$message}}  </span>
                        @enderror
                        <div class="form-field-container">
                            <label for="profile_picture" class="form-label"> photo profile </label>
                            <input type="file" name="profile_picture" id="profile_picture" class="form-input" value={{$employee->profile_picture}}>
                        </div>
                    </fieldset>
                    <div class="mt-3 text-center">
                        <input type="submit" value="modifier" class="bg-indigo-500 text-white font-semibold rounded-lg px-5 py-3">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

