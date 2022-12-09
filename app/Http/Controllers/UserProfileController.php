<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class UserProfileController extends Controller
{
    public function index()
    {
        $user = User::with('courses', 'user_details')->where('id', Auth::user()->id)->first();
        // dd($user);

        return view('frontend.profile.index', compact('user'));
    }

    public function create()
    {
        return view('frontend.profile.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'phone_numbers' => 'required|numeric',
            'gender' => 'required',
            'address' => 'required',
            'campus' => 'required|max:75',
            'NIM' => 'required|max:50',
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

        return redirect(route('MyProfile.index'))->with('success', 'profile has been updated');
    }

    public function edit($profile)
    {
        // dd($profile);
        $users = User::with('courses', 'user_details')->where('id', Auth::user()->id)->first();
        // dd($users);
        return view('frontend.profile.edit', compact('users'));
    }

    public function update(Request $request, $user)
    {
        // dd($user_detail);
        $this->validate($request, [
            'name' => 'required|max:50',
            'phone_numbers' => 'required|numeric',
            'gender' => 'required',
            'address' => 'required',
            'campus' => 'required|max:75',
            'NIM' => 'required|max:50',
        ]);

        $users = User::find($user);
        $users->name = $request->name;
        $users->save();

        $user_detail = UserDetails::where('users_id', $user)->first();
        $user_detail->phone_numbers = $request->phone_numbers;
        $user_detail->address = $request->address;
        $user_detail->gender = $request->gender;
        $user_detail->campus = $request->campus;
        $user_detail->NIM = $request->NIM;
        $user_detail->save();


        return redirect()->route('MyProfile.index')->with('success', 'profile has been updated');
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
        // dd(Auth::user()->email);
        $this->validate($request, [
            'old_email' => 'required|string',
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'confirm_new_email' => 'required'
        ]);
        if (Auth::user()->email != $request->old_email) {
            return redirect()->back()->with('wrong', 'your email is wrong');
        }
        if ($request->new_email != $request->confirm_new_email) {
            return redirect()->back()->with('wrong', 'your email not match');
        }

        $user = User::find(Auth::user()->id);
        $user->email = $request->email;
        $user->save();

        return redirect()->back()->with('succcess', 'new email has been updated');
    }
}
