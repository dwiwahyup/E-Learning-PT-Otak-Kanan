<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'phone_numbers' => 'required|numeric',
            'gender' => 'required',
            'address' => 'required',
            'campus' => 'required|max:75',
            'NIM' => 'required|max:50',
        ]);

        $user_detail = UserDetails::where('users_id', $user)->first();
        $user_detail->phone_numbers = $request->phone_numbers;
        $user_detail->address = $request->address;
        $user_detail->gender = $request->gender;
        $user_detail->campus = $request->campus;
        $user_detail->NIM = $request->NIM;
        $user_detail->save();


        return redirect()->route('MyProfile.index');
    }
}
