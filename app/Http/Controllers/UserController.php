<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobPostRequest;
use App\Http\Requests\UserPostRequest;
use App\Repository\UserRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class UserController extends Controller
{

    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepository->findAll();
        return view("users.user-list",["users"=>$users]);
    }

    public function create(Request $request)
    {
        return view("users.create-user");
    }

    public function store(UserPostRequest $request)
    {
        try{
            $validated = $request->validated();
            $this->userRepository->create($validated);
        }catch (\Exception $exception)
        {
            return back()->with("error",$exception->getMessage());
        }

        return back()->with("success","l'utilisateur crée utilisateur");
    }

    public function update(JobPostRequest $request, int $user_id)
    {
        try{
            $validated = $request->validated();
            $this->userRepository->update($user_id, $validated);
        }catch (\Exception $exception)
        {
            return back()->with("error",$exception->getMessage());
        }

        return redirect(route("show_user",["user_id"=>$user_id]));
    }

    public function show(int $user_id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = $this->userRepository->read($user_id);
        return view("users.show-user",["user"=>$user]);
    }

    public function edit(int $user_id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = $this->userRepository->read($user_id);
        return view("users.edit-user", ["user"=>$user]);
    }

    public function destroy(int $user_id): Application|Redirector|\Illuminate\Contracts\Foundation\Application|RedirectResponse
    {
        try{
            $this->userRepository->delete($user_id);
        }catch (\Exception $exception)
        {
            return back()->with("error",$exception->getMessage());
        }

        return redirect(route("index_users"));
    }

}
