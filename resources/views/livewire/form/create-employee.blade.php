<div>

    @if($errors->any())
        @foreach($errors->all() as $error)
            <p>
                {{$error}}
            </p>
        @endforeach
    @endif
    <form action="{{@route("store_employee")}}" method="post">
        @csrf
        <div>
            <label for="employee_mat">
                matricule
            </label>
            <input type="text" name="employee_mat" id="employee_mat" class="input">
        </div>
        <div>
            <label for="first_name">
                prenom
            </label>
            <input type="text" name="first_name" id="first_name" class="input">
        </div>
        <div>
            <label for="middle_name">
                nom
            </label>
            <input type="text" name="middle_name" id="middle_name" class="input">
        </div>
        <div>
            <label for="last_name">
                postnom
            </label>
            <input type="text" name="last_name" id="last_name" class="input">
        </div>
        <div>
            <label for="hard_skills">
                competences techniques
            </label>
            <textarea type="text" name="hard_skills" id="hard_skills" class="input">

            </textarea>
        </div>
        <div>
            <label for="soft_skills">
                competences non technique
            </label>
            <textarea type="text" name="soft_skills" id="soft_skills" class="input"></textarea>
        </div>
        <div>
            <label for="ambitions">
                ambitions
            </label>
            <textarea type="text" name="ambitions" id="ambitions" class="input"></textarea>
        </div>
        <div>
            <label for="profile_picture">
                photo de profile
            </label>
            <input type="file" name="profile_picture" id="profile_picture">
        </div>
        <div>
            <input value=" enregistrer " type="submit">
        </div>
    </form>
</div>
