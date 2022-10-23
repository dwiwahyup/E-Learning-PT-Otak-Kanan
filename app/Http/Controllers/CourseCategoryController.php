<?php

namespace App\Http\Controllers;

use App\Models\CourseCategory;
use Carbon\Carbon;
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
        // dd($query);
        // $data = DB::table('course_categories')->get();
        return view('dashboard.coursecategory.index', ['query' => $query]);
    }

    public function create()
    {
        return view('dashboard.coursecategory.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'introduction' => 'required',
            'images' => 'image'
        ]);

        $images = $request->file('image');
        if ($request->hasFile('image')) {
            $folder = 'courses';
            $image_name = $images->getClientOriginalName();
            $remove_path = pathinfo($image_name, PATHINFO_FILENAME);
            $newImageName = str_replace('', '_', $remove_path);
            $public_id = date('Y-m-d_His') . '_' . $newImageName;
            $image_id = $folder . '/' . $public_id;
            $result = Cloudinary::upload($images->getRealPath(), ['folder' => $folder, 'public_id' => $public_id])->getSecurePath();
            // dd($image_id);


            // $images->move(public_path('/coursecategory/courseimage/'), $filename);
            // $path = $images->store('public/imagecontent');
        } else {
            $filename = null;
        }

        DB::table('course_categories')->insert([
            'name' => $request->name,
            'image_url' => $result,
            'image_id' => $image_id,
            'introduction' => $request->introduction,
            'slug' => SlugService::createSlug(CourseCategory::class, 'slug', $request->name),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect('/dashboard/coursecategory')->with('success', 'new course category has been added');
    }

    public function edit($slug)
    {
        $data = DB::table('course_categories')->where('slug', $slug)
            ->get();

        return view('dashboard.coursecategory.edit', ['data' => $data]);
    }

    public function update(Request $request, $id)
    {

        $data = DB::table('course_categories')->find($id);
        // dd($data);
        if ($request->hasFile('image')) {
            $path = public_path() . '/coursecategory/courseimage/';

            if ($data->image_url != '' && $data->image_url) {
                $file_old = $path . $data->image_url;
                unlink($file_old);
            }

            $images = $request->file('image');
            $filename = $images->getClientOriginalName();
            $images->move(public_path('/coursecategory/courseimage/'), $filename);

            DB::table('course_categories')
                ->where('id', $request->id)
                ->update([
                    'name' => $request->name,
                    'introduction' => $request->introduction,
                    'image_url' => $filename,
                    'updated_at' => Carbon::now()
                ]);
        }
        DB::table('course_categories')
            ->where('id', $request->id)
            ->update([
                'name' => $request->name,
                'introduction' => $request->introduction,
                // 'image' => $filename,
                'updated_at' => Carbon::now()
            ]);
        return redirect('/dashboard/coursecategory')->with('success', 'course category has been updated');
    }

    public function delete($slug)
    {
        $data = DB::table('course_categories')->where('slug', $slug)->first();
        $image_id = $data->image_id;
        // dd($image_id);
        Cloudinary::destroy($image_id);
        DB::table('course_categories')->where('slug', $slug)->delete();

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
}
