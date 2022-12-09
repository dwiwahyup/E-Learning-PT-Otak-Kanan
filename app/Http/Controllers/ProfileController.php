<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Profiler\Profile;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ProfileController extends Controller
{
    public function index()
    {
        $users = User::with(['user_details', 'courses'])->where('id', Auth::user()->id)->first();
        // dd($users);

        return view('dashboard.profile.index', compact('users'));
    }

    public function edit($profile)
    {
        $users = User::with('courses', 'user_details')->where('id', Auth::user()->id)->first();
        $users_id = User::where('slug', $profile)->first()->id;
        // dd($users_id);
        return view('dashboard.profile.edit', compact('users', 'users_id'));
    }

    public function update(Request $request, $user)
    {
        // dd($user);

        $this->validate($request, [
            'name' => 'required|max:50',
            'phone_number' => 'required|numeric',
            'address' => 'required',
            'gender' => 'required'
        ]);

        $users = User::find($user);
        $users->name = $request->name;
        $users->save();

        $users_detail = UserDetails::where('users_id', $users->id)->first();
        $users_detail->phone_numbers = $request->phone_number;
        $users_detail->address = $request->address;
        $users_detail->gender = $request->gender;
        $users_detail->save();

        return redirect()->back()->with('success', 'profile has been updated');
    }

    public function create()
    {
        return view('dashboard.profile.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'phone_numbers' => 'required|numeric',
            'gender' => 'required',
            'address' => 'required',
            'profile_image' => 'required|image'
        ]);

        $images = $request->file('profile_image');
        if ($request->hasFile('profile_image')) {
            $folder = 'profile';
            $image_name = $images->getClientOriginalName();
            $remove_path = pathinfo($image_name, PATHINFO_FILENAME);
            $newImageName = str_replace('', '_', $remove_path);
            $public_id = date('Y-m-d_His') . '_' . $newImageName;
            $image_id = $folder . '/' . $public_id;
            $result = Cloudinary::upload($images->getRealPath(), ['folder' => $folder, 'width' => 350, 'height' => 500, 'public_id' => $public_id])->getSecurePath();
        }

        $data = $request->all();
        $data['profile_photo_id'] = $image_id;
        $data['profile_photo'] = $result;
        $data['users_id'] = Auth::user()->id;
        UserDetails::create($data);

        return redirect(route('profile.index'))->with('success', 'Profile detail has ben created');
    }

    public function update_image(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'image_profile' => 'required|image'
        ]);

        $users = UserDetails::where('users_id', Auth::user()->id)->first();
        // dd($users);

        if ($request->hasFile('image_profile')) {
            if ($users->profile_photo_id != '' && $users->profile_photo_id) {
                Cloudinary::destroy($users->profile_photo_id);
            }

            $image = $request->file('image_profile');
            $folder = 'profile';
            $image_name = $image->getClientOriginalName();
            $remove_path = pathinfo($image_name, PATHINFO_FILENAME);
            $newImageName = str_replace('', '_', $remove_path);
            $public_id = date('Y-m-d_His') . '_' . $newImageName;
            $image_id = $folder . '/' . $public_id;
            $result = Cloudinary::upload($image->getRealPath(), ['folder' => $folder, 'width' => 350, 'height' => 550, 'public_id' => $public_id])->getSecurePath();

            $user_detail = UserDetails::find($users->id);

            $user_detail->profile_photo = $result;
            $user_detail->profile_photo_id = $image_id;

            $user_detail->save();
        }

        return redirect()->back();
    }

    public function update_password(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required'
        ]);

        // $rehash = Hash::needsRehash(Auth::user()->password);
        // dd($rehash);

        // check old password form request and password in table user is match
        if (Hash::check($request->old_password, Auth::user()->password)) {
            // check form request new password and confirm password is match
            if ($request->new_password != $request->confirm_password) {
                return redirect()->back()->with('wrong', 'new password is not match with confirm password');
            }
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request->confirm_password);
            $user->save();
            return redirect()->back()->with('success', 'new password has been updated');
        }
        return redirect()->back()->with('wrong', 'your password is wrong');
    }

    public function update_email(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'old_email' => 'required|string',
            'new_email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'confirm_new_email' => 'required'
        ]);
        if (Auth::user()->email != $request->old_email) {
            return redirect()->back()->with('wrong', 'your email is wrong');
        }
        if ($request->new_email != $request->confirm_new_email) {
            return redirect()->back()->with('wrong', 'your email not match');
        }

        $user = User::find(Auth::user()->id);
        $user->email = $request->new_email;
        $user->save();

        return redirect()->back()->with('success', 'new email has been updated');
    }
}
