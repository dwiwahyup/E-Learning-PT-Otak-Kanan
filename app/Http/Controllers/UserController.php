<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;


class UserController extends Controller
{

    public function index()
    {
        $dataa = User::all();

        return view('dashboard.user.index', ['data' => $dataa]);
    }
    public function create()
    {
        return view('dashboard.user.create');
    }
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required'],
        ]);

        $data = $request->all();
        $data['roles'] = 'MENTOR';
        $data['password'] = Hash::make($request->password);

        User::create($data);

        return redirect('/dashboard/user')->with('success', 'new user has been added');
    }
    public function edit(User $user)
    {
        return view('dashboard.user.edit', ['data' => $user]);
    }
    public function update(Request $request, User $user)
    {
        // dd($request);
        $this->validate($request, [
            'roles' => 'required'
        ]);

        $data = $request->all();
        $user->update($data);

        return redirect('/dashboard/user')->with('success', 'User has been updated');
    }
    public function destroy(User $user)
    {
        if (Auth::user()->id == $user->id) {
            return redirect(route('user.index'))->with('error', 'you cant delete your own account');
        }
        $user->delete();

        return redirect('/dashboard/user')->with('success', 'User has been deleted');
    }
}
