
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
            <ul class="flex gap-x-3">
                <li>
                    <a href="{{route("settings")}}" class="content-nav-opt-blue-bg"> accueil </a>
                </li>
                <li>
                    <a href="{{route("create_user")}}" class="content-nav-opt-blue-bg"> creer user </a>
                </li>
                <li>
                    <a href="{{route("index_users")}}" class="content-nav-opt-blue-bg"> users </a>
                </li>
            </ul>
        </div>
        <div class="px-3 grid grid-cols-5 items-center justify-center py-4">
            <div class="col-start-2 col-span-3 p-4 shadow-lg rounded-lg  divide-y space-y-2">
                <h1 class="text-indigo-500 font-semibold text-center py-3 capitalize text-lg" > creer un utilisateur </h1>
                @if(\Illuminate\Support\Facades\Session::has("error"))
                    <p class="bg-red-100 text-red-500 p-2">
                        {{\Illuminate\Support\Facades\Session::get("error")}}
                    </p>
                @endif
                @if(\Illuminate\Support\Facades\Session::has("success"))
                    <p class="bg-green-100 text-green-500 p-2">
                        {{\Illuminate\Support\Facades\Session::get("success")}}
                    </p>
                @endif
                <form action="{{route('store_user')}}" class="py-2 text-gray-700" method="post">
                    @csrf
                    <div class="form-field-container">
                        <label for="employee_mat" class="form-label"> matricule  </label>
                        <input type="text" name="employee_mat" id="employee_mat" class="form-input">
                        @error("employee_mat")
                        <span class="text-red-500"> {{$message}}  </span>
                        @enderror
                    </div>

                    <div class="form-field-container">
                        <label for="password" class="form-label"> password </label>
                        <input type="password" name="password" id="password" class="form-input">
                        @error("password")
                        <span class="text-red-500"> {{$message}}  </span>
                        @enderror
                    </div>

                    <div class="form-field-container">
                        <label for="is_activated" class="form-label">   </label>
                        <select name="is_activated" id="is_activated" class="form-input" >
                            <option value="0"> activer </option>
                            <option value="1"> non activer </option>
                        </select>
                        @error("is_activated")
                        <span class="text-red-500"> {{$message}}  </span>
                        @enderror
                    </div>

                    <div class="form-field-container">
                        <label for="user_type" class="form-label"> role  </label>
                        <select name="user_type" id="user_type" class="form-input" >
                            <option value="employee"> employé </option>
                            <option value="training_planner"> charge de formation </option>
                            <option value="hr_director"> Directeur RH</option>
                        </select>
                        @error("user_type")
                        <span class="text-red-500"> {{$message}}  </span>
                        @enderror
                    </div>
                    <div class="mt-3 text-center">
                        <input type="submit" value="creer" class="bg-indigo-500 text-white font-semibold rounded-lg px-5 py-3">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
