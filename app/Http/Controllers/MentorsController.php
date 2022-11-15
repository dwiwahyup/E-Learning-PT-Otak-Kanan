<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use Illuminate\Http\Request;
use App\Models\CourseCategory;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Cviebrock\EloquentSluggable\Services\SlugService;

class MentorsController extends Controller
{
    public function index()
    {
        $mentors = Mentor::with(['courses'])->get();

        // dd($mentors);

        return view('dashboard.profile.index', ['mentors' => $mentors]);
    }
    public function create()
    {
        $course = CourseCategory::all('id', 'name');
        // dd($course);

        return view('dashboard.mentors.create', ['course' => $course]);
    }

    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'name' => 'required|max:50',
            'motivation' => 'required',
            'image' => 'required',
            'course_categories_id' => 'required'
        ]);

        $image = $request->file('image');
        if ($request->hasFile('image')) {
            $folder = 'mentors';
            $image_name = $image->getClientOriginalName();
            $remove_path = pathinfo($image_name, PATHINFO_FILENAME);
            $new_images_name = str_replace('', '_', $remove_path);
            $public_id = date('Y-m-d_His') . '_' . $new_images_name;
            $image_id = $folder . '/' . $public_id;
            $result = Cloudinary::upload($image->getRealPath(), ['folder' => $folder, 'public_id' => $public_id])->getSecurePath();
        }

        $data = $request->all();
        $data['image_url'] = $result;
        $data['image_id'] = $image_id;
        $data['slug'] = SlugService::createSlug(Mentor::class, 'slug', $request->name);

        Mentor::create($data);

        return redirect()->route('mentors.index')->with('success', 'New mentors has been added');
    }

    public function edit($slug)
    {
        $data = Mentor::where('slug', $slug)->first();
        // dd($data);
        $course = CourseCategory::all('id', 'name');
        // dd($mentor);
        return view('dashboard.mentors.edit', ['item' => $data, 'course' => $course]);
    }

    public function update(Request $request, Mentor $mentor)
    {
        // dd($mentor->image_url);
        $this->validate($request, [
            'name' => 'required|max:50',
            'motivation' => 'required',
        ]);

        if ($request->hasFile('image')) {

            // destroy old image in cloudinary
            if ($mentor->image_id != '' && $mentor->image_id) {
                $image_id = $mentor->image_id;
                Cloudinary::destroy($image_id);
            }

            // check file is a image and get original name and create id for image
            $image = $request->file('image');
            $folder = 'mentors';
            $image_name = $image->getClientOriginalName();
            $remove_path = pathinfo($image_name, PATHINFO_FILENAME);
            $new_images_name = str_replace('', '_', $remove_path);
            $public_id = date('Y-m-d_His') . '_' . $new_images_name;
            $image_id = $folder . '/' . $public_id;
            $result = Cloudinary::upload($image->getRealPath(), ['folder' => $folder, 'public_id' => $public_id])->getSecurePath();

            // update image if user update new image
            $data = $request->all();
            $data['image_url'] = $result;
            $data['image_id'] = $image_id;
            $data['slug'] = SlugService::createSlug(Mentor::class, 'slug', $request->name);
            $mentor->update($data);
        }

        // update image without new image
        $data = $request->all();
        $mentor->update($data);


        return redirect()->route('mentors.index')->with('success', 'Mentors has been updated');
    }

    public function destroy(Mentor $mentor)
    {
        // delete image from cloudinary
        Cloudinary::destroy($mentor->image_id);
        // delete mentors
        $mentor->delete();

        return redirect()->route('mentors.index')->with('success', 'Mentors has been deleted');
    }
}
