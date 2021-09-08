<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', ['users' => $users]);
    }

    public function create(){
//        $this->authorize('create', User::class);
        return view('admin.users.create');
    }
    public function store()
    {
//        $this->authorize('create', User::class);

        $inputs = \request()->validate([
            'name' => 'required|min:8|max:255',
            'email' => 'required',
            'username' => 'required|min:3',
            'password' => 'required|confirmed|min:8',
        ]);

        if (\request('avatar')) {
            $inputs['avatar'] = \request('avatar')->store('images');
        }

        auth()->user()->create($inputs);
//        session()->flash('post-created-message', 'Post with title ' . $inputs['title'] . ' was created');


        return redirect()->route('user.index');


    }
    public function show(User $user)
    {


        return view('admin.users.profile', [
            'user' => $user,
            'roles' => Role::all()
        ]);
    }


    public function update(User $user)
    {

        $inputs = \request()->validate([
            'username' => ['required', 'string', 'max:255', 'alpha_dash'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'avatar' => ['file'],

        ]);

        if (\request('avatar')) {
            $inputs['avatar'] = \request('avatar')->store('images');
            $user->avatar = $inputs['avatar'];
        }

        $user->username = $inputs['username'];
        $user->name = $inputs['name'];
        $user->email = $inputs['email'];

        $user->save();


        return back();
    }

    public function attach(User $user)
    {
        $user->roles()->attach(\request('role'));
        return back();
    }
    public function detach(User $user)
    {
        $user->roles()->detach(\request('role'));
        return back();
    }

    public function destroy(User $user)
    {

//        $this->authorize('destroy', $user);

        $user->delete();

        Session::flash('message', 'User was deleted');

        return back();
    }


}
