@extends("base")


@section("main")
    <div class="h-screen flex justify-center items-center bg-gray-100">
        <div class="p-5 bg-indigo-400 grid grid-cols-5 gap-x-4 h-full w-full">
            <div class="col-span-2 text-white flex items-center justify-center">
                <div class="p-4">
                    <span class="text-5xl font-black block"> Bienvue sur  </span>
                    <span class="text-7xl font-black block">
                        Andia Career
                    </span>
                </div>
            </div>
            <div class="col-span-3 p-2 bg-gray-50 grid grid-cols-5 items-center rounded-lg">
                <div class="p-4 divide-y space-y-2 shadow-lg col-start-2 col-span-3 rounded-lg bg-white">
                    <h1 class="text-indigo-500 font-semibold text-center py-3 capitalize text-lg" > connexion </h1>
                    <form action="{{route("login")}}" class="py-2 text-gray-700" method="post" enctype="multipart/form-data">
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
                        <div class="mt-3 text-center">
                            <input type="submit" value="se connecter" class="bg-indigo-500 text-white font-semibold rounded-lg px-5 py-3">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
