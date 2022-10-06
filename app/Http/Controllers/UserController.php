<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $dataa = DB::table('users')->get();

        return view('dashboard.user.index', ['data' => $dataa]);
    }
    public function create()
    {
        return view('dashboard.user.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect('/dashboard/user')->with('success', 'new user has been added');
    }
    public function edit($id)
    {
        $dataa = DB::table('users')->where('id', $id)
            ->get();

        return view('dashboard.user.edit', ['data' => $dataa]);
    }
    public function update(Request $request)
    {
        DB::table('users')->where('id', $request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        return redirect('/dashboard/user')->with('success', 'User has been updated');
    }
    public function delete($id)
    {
        DB::table('users')->where('id', $id)->delete();

        return redirect('/dashboard/user')->with('success', 'User has been deleted');
    }
}
