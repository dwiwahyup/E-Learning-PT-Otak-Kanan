<?php

namespace App\Http\Controllers;

use App\Models\CourseCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Cviebrock\EloquentSluggable\Services\SlugService;

class CourseCategoryController extends Controller
{
    public function index()
    {
        $query = DB::table('course_categories')
            ->leftJoin('chapters', function ($join) {
                $join->on('course_categories.id', '=', 'chapters.course_categories_id');
            })
            ->select('course_categories.id', 'course_categories.name', 'course_categories.image_url', 'course_categories.introduction', 'course_categories.slug', DB::raw('COUNT(chapters.course_categories_id) as chapters_count'))
            ->groupBy('course_categories.id')
            ->get();

        return view('dashboard.coursecategory.index', ['query' => $query]);
    }

    public function create()
    {
        return view('dashboard.coursecategory.create');
    }

    public function store(Request $request, CourseCategory $coursecategory)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'introduction' => 'required',
            'image' => 'required|image'
        ]);

        // check file is a image and get original name and create id for image
        $images = $request->file('image');
        if ($request->hasFile('image')) {
            $folder = SlugService::createSlug(CourseCategory::class, 'slug', $request->name);
            $image_name = $images->getClientOriginalName();
            $remove_path = pathinfo($image_name, PATHINFO_FILENAME);
            $newImageName = str_replace('', '_', $remove_path);
            $public_id = date('Y-m-d_His') . '_' . $newImageName;
            $image_id = $folder . '/' . $public_id;
            $result = Cloudinary::upload($images->getRealPath(), ['folder' => $folder, 'public_id' => $public_id])->getSecurePath();
        }

        // insert requst to table
        $data = $request->all();
        $data['image_url'] = $result;
        $data['image_id'] = $image_id;
        $data['slug'] = SlugService::createSlug(CourseCategory::class, 'slug', $request->name);
        CourseCategory::create($data);

        return redirect('/dashboard/coursecategory')->with('success', 'new course category has been added');
    }

    public function edit($slug)
    {
        $data = DB::table('course_categories')->where('slug', $slug)->first();

        return view('dashboard.coursecategory.edit', ['data' => $data]);
    }

    public function update(Request $request, CourseCategory $coursecategory)
    {
        // dd($coursecategory);
        $this->validate($request, [
            'name' => 'required|max:50',
            'introduction' => 'required'
        ]);

        if ($request->hasFile('image')) {
            if ($coursecategory->image_id != '' && $coursecategory->image_id) {
                // delete image from cloudinary
                $image_id = $coursecategory->image_id;
                Cloudinary::destroy($image_id);
            }
            // check file is a image and get original name and create id for image
            $image = $request->file('image');
            $folder = $coursecategory->slug;
            $image_name = $image->getClientOriginalName();
            $remove_path = pathinfo($image_name, PATHINFO_FILENAME);
            $new_images_name = str_replace('', '_', $remove_path);
            $public_id = date('Y-m-d_His') . '_' . $new_images_name;
            $image_id = $folder . '/' . $public_id;
            $result = Cloudinary::upload($image->getRealPath(), ['folder' => $folder, 'public_id' => $public_id])->getSecurePath();
            // update course if user update new image
            $data = $request->all();
            $data['image_url'] = $result;
            $data['image_id'] = $image_id;
            $coursecategory->update($data);
        }

        // update course without new image
        $data = $request->all();
        $coursecategory->update($data);

        return redirect('/dashboard/coursecategory')->with('success', 'course category has been updated');
    }

    public function destroy(CourseCategory $coursecategory)
    {
        // delete image from cloudinary
        Cloudinary::destroy($coursecategory->image_id);
        $coursecategory->delete();
        return redirect('/dashboard/coursecategory')->with('success', 'course category has been deleted');
    }

    public function preview($id)
    {
        $query = DB::table('users')
            ->where('users.course_categories_id', $id)
            ->orderBy('id')
            ->get();

        // dd($query);

        return view('dashboard.coursecategory.student', ['query' => $query]);
    }

    public function students($slug)
    {
        $data = CourseCategory::where('slug', $slug)->first();
        $id = $data->id;
        $students = User::with('courses')->where('course_categories_id', $id)->get();
        // dd($students);
        return view('dashboard.coursecategory.student', compact('students'));
    }
}
