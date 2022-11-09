<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Content;
use App\Models\CourseCategory;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContentController extends Controller
{
    public function index($coursecategory, $chapter)
    {
        $chapter = Chapter::where('slug', $chapter)->first();
        $chapter_id = $chapter->id;
        $coursecategory = CourseCategory::where('slug', $coursecategory)->first();
        $data = Content::where('chapters_id', $chapter_id)->get();
        $chapters_id = DB::table('contents')
            ->Join('chapters', function ($join) use ($chapter_id) {
                $join->on('contents.chapters_id', '=', 'chapters.id')
                    ->where('contents.chapters_id', '=', $chapter_id);
            })
            ->select('chapters.course_categories_id')
            ->first();
        // dd($coursecategory);
        // dd($name);
        return view('dashboard.content.index', [
            'data' => $data,
            'coursecategory' => $coursecategory,
            'chapters_id' => $chapters_id,
            'chapters' => $chapter
        ]);
    }

    public function create($coursecategory, $chapter)
    {
        $chapter = Chapter::where('slug', $chapter)->first();
        $coursecategory = CourseCategory::where('slug', $coursecategory)->first();

        return view('dashboard.content.create', compact('chapter', 'coursecategory'));
    }

    public function store(Request $request, CourseCategory $coursecategory, Chapter $chapter)
    {
        $this->validate($request, [
            'title' => 'required|max:50',
            'text' => 'required',
            'thumbnail' => 'image',
            'vidio' => 'max:50',
        ]);

        $thumbnile = $request->file('thumbnaile');
        if ($request->hasFile('thumbnaile')) {
            $folder = 'thumbnile_contents';
            $imageName = $thumbnile->getClientOriginalName();
            $remove_path = pathinfo($imageName, PATHINFO_FILENAME);
            $newFilename = str_replace(' ', '_', $remove_path);
            $public_id = date('Y-m-d_His') . '_' . $newFilename;
            $thumbnaile_id = $folder . '/' . $public_id;
            $result = Cloudinary::upload($thumbnile->getRealPath(), ['folder' => $folder, 'public_id' => $public_id])->getSecurePath();
        } else {
            $result = null;
            $thumbnaile_id = null;
        }

        $text = $request->text;
        $dom = new \DOMDocument();
        $dom->loadHTML($text, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('img');
        $folder_image_content = 'image_contents';

        foreach ($imageFile as $item => $image) {
            $data = $image->getAttribute('src');
            $image_content = Cloudinary::upload($data, ['folder' => $folder_image_content])->getSecurePath();
            $image->removeAttribute('src');
            $image->setAttribute('src', $image_content);
        }

        $content = $dom->saveHTML();

        $data = $request->all();
        $data['thumbnaile_id'] = $thumbnaile_id;
        $data['thumbnaile_url'] = $result;
        $data['text'] = $content;
        $data['chapters_id'] = $chapter->id;
        $data['slug'] = SlugService::createSlug(Content::class, 'slug', $request->title);
        Content::create($data);

        return redirect()->route('coursecategory.chapter.content.index', ['coursecategory' => $coursecategory->slug, 'chapter' => $chapter->slug])->with('success', 'new content has been added');
    }

    public function edit($coursecategory, $chapter, $content)
    {
        $coursecategory = CourseCategory::where('slug', $coursecategory)->first();
        $chapter = Chapter::where('slug', $chapter)->first();
        $content = Content::where('slug', $content)->first();
        // dd($content);
        return view('dashboard.content.edit', compact('coursecategory', 'chapter', 'content'));
    }

    public function update(Request $request, CourseCategory $coursecategory, Chapter $chapter, Content $content)
    {
        $this->validate($request, [
            'title' => 'required|max:50',
            'text' => 'required',
            'thumbnail' => 'image|max:50',
            'vidio' => 'max:50',
        ]);

        if ($request->hasFile('thumbnaile')) {
            if ($content->thumbnaile_id != '' && $content->thumbnaile_id) {
                $thumbnaile_old = $content->thumbnaile_id;
                // delete image from cloudinary
                Cloudinary::destroy($thumbnaile_old);
            }

            // check file and get original name and create id for image
            $thumbnaile = $request->file('thumbnaile');
            $folder = 'thumbnile_contents';
            $imageName = $thumbnaile->getClientOriginalName();
            $remove_path = pathinfo($imageName, PATHINFO_FILENAME);
            $newFilename = str_replace(' ', '_', $remove_path);
            $public_id = date('Y-m-d_His') . '_' . $newFilename;
            $thumbnaile_id = $folder . '/' . $public_id;
            $result = Cloudinary::upload($thumbnaile->getRealPath(), ['folder' => $folder, 'public_id' => $public_id])->getSecurePath();

            $text = $request->text;
            $dom = new \DOMDocument();
            $dom->loadHTML($text, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $imageFile = $dom->getElementsByTagName('img');
            $folder_image_content = 'image_contents';

            // insert image in cloudinary from the somernote
            foreach ($imageFile as $item => $image) {
                $data = $image->getAttribute('src');
                $image_content = Cloudinary::upload($data, ['folder' => $folder_image_content])->getSecurePath();
                $image->removeAttribute('src');
                $image->setAttribute('src', $image_content);
            }

            $content_text = $dom->saveHTML();

            // update content if user update new image
            $data = $request->all();
            $data['thumbnaile_url'] = $result;
            $data['thumbnaile_id'] = $thumbnaile_id;
            $data['text'] = $content_text;
            $data['slug'] = SlugService::createSlug(Content::class, 'slug', $request->title);
            $data['chapters_id'] = $chapter->id;
            $content->update($data);
        }

        $text = $request->text;
        $dom = new \DOMDocument();
        $dom->loadHTML($text, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('img');
        $folder_image_content = 'image_contents';

        // insert image in cloudinary from the somernote
        foreach ($imageFile as $item => $image) {
            $data = $image->getAttribute('src');
            $image_content = Cloudinary::upload($data, ['folder' => $folder_image_content])->getSecurePath();
            $image->removeAttribute('src');
            $image->setAttribute('src', $image_content);
        }

        $content_text = $dom->saveHTML();

        // update content without nrw umage
        $data = $request->all();
        $data['text'] = $content_text;
        $data['slug'] = SlugService::createSlug(Content::class, 'slug', $request->title);
        $content->update($data);

        return redirect()->route('coursecategory.chapter.content.index', ['coursecategory' => $coursecategory->slug, 'chapter' => $chapter->slug])->with('success', 'content has been updated');
    }

    public function destroy(CourseCategory $coursecategory, Chapter $chapter, Content $content)
    {
        // check thumbnile id in table null or not
        if ($content->thumbnaile_id != null) {
            // delete thumbnaile from cloudinary
            Cloudinary::destroy($content->thumbnaile_id);
        }
        $content->delete();
        return redirect()->back()->with('success', 'content has been deleted');
    }

    public function preview($slug)
    {
        $query = DB::table('contents')->where('slug', $slug)->get();

        return view('dashboard.content.preview', ['query' => $query]);
    }
}
