<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Carbon\Carbon;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    public function index($id)
    {
        $id = Crypt::decrypt($id);
        $data = DB::table('contents')->where('chapters_id', $id)->get();
        $chapters_name = DB::table('chapters')->where('id', $id)->first();
        $chapters_id = DB::table('contents')
            ->Join('chapters', function ($join) use ($id) {
                $join->on('contents.chapters_id', '=', 'chapters.id')
                    ->where('contents.chapters_id', '=', $id);
            })
            ->select('chapters.course_categories_id')
            ->first();
        // dd($chapters_id);
        // dd($name);

        return view('dashboard.content.index', [
            'data' => $data,
            'id' => $id,
            'chapters_id' => $chapters_id,
            'chapters_name' => $chapters_name
        ]);
    }

    public function create($id)
    {
        $id = Crypt::decrypt($id);
        return view('dashboard.content.create', ['id' => $id]);
    }

    public function store(Request $request)
    {
        // dd($request);
        $id = $request->chapters_id;
        $this->validate($request, [
            'name' => 'required|max:50',
            'text' => 'required',
            // 'slug' => 'required|unique:posts',
            'thumbnail' => 'image|max:50',
            'vidio' => 'max:50',
            'chapters_id' => 'required'
        ]);



        $thumbnile = $request->file('thumbnaile');
        if ($request->hasFile('thumbnaile')) {
            $folder = 'thumbnile_contents';
            $imageName = $thumbnile->getClientOriginalName();
            $remove_path = pathinfo($imageName, PATHINFO_FILENAME);
            $newFilename = str_replace(' ', '_', $remove_path);
            $public_id = date('Y-m-d_His') . '_' . $newFilename;
            $thumbnaile_id = $folder . '/' . $public_id;
            // dd($thumbnile_id);
            $result = Cloudinary::upload($thumbnile->getRealPath(), ['folder' => $folder, 'public_id' => $public_id])->getSecurePath();
            // dd($result);
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
            // dd($data);
            // list($type, $data) = explode(';', $data);
            // list(, $data) = explode(',', $data);
            // $imgData = base64_decode($data);
            // dd($imgData);
            $image_content = Cloudinary::upload($data, ['folder' => $folder_image_content])->getSecurePath();
            // dd($image_content);
            // $imageName = '/paragraph/imagecontent/' . time() . $item . '.png';
            // $path = public_path() . $imageName;
            // dd($path);
            // file_put_contents($path, $imgData);
            // file_put_contents($image_content);

            $image->removeAttribute('src');
            $image->setAttribute('src', $image_content);
        }

        $content = $dom->saveHTML();
        // $slug = SlugService::createSlug(Content::class, 'slug', $request->name);
        // dd($slug);

        DB::table('contents')->insert([
            'title' => $request->name,
            'thumbnaile_url' => $result,
            'vidio' => $request->vidio,
            'thumbnaile_id' => $thumbnaile_id,
            'text' => $content,
            'chapters_id' => $request->chapters_id,
            'slug' => SlugService::createSlug(Content::class, 'slug', $request->name),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);



        return redirect()->action(
            [ContentController::class, 'index'],
            ['id' => Crypt::encrypt($id)]
        )->with('success', 'new content has been added');
    }

    public function edit($slug)
    {
        // dd($slug);
        $data = DB::table('contents')->where('slug', $slug)->get();
        // dd($data);

        return view('dashboard.content.edit', ['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $data = DB::table('contents')->find($id);
        // dd($request);
        $chapters_id = $request->chapters_id;

        $this->validate($request, [
            'name' => 'required|max:50',
            'text' => 'required',
            'thumbnail' => 'image|max:50',
            'vidio' => 'max:50',
            'chapters_id' => 'required'
        ]);

        if ($request->hasFile('thumbnaile')) {
            // $path = public_path() . '/content/thumbnaile/';

            if ($data->thumbnaile_id != '' && $data->thumbnaile_id) {
                $thumbnaile_old = $data->thumbnaile_id;
                Cloudinary::destroy($thumbnaile_old);
                // dd($thumbnaile_old);
            }
            // dd($request->name);
            // $request['thumbnaile'] = $filename;
            $thumbnaile = $request->file('thumbnaile');
            $folder = 'thumbnile_contents';
            $imageName = $thumbnaile->getClientOriginalName();
            $remove_path = pathinfo($imageName, PATHINFO_FILENAME);
            $newFilename = str_replace(' ', '_', $remove_path);
            $public_id = date('Y-m-d_His') . '_' . $newFilename;
            $thumbnaile_id = $folder . '/' . $public_id;
            // dd($thumbnile_id);
            $result = Cloudinary::upload($thumbnaile->getRealPath(), ['folder' => $folder, 'public_id' => $public_id])->getSecurePath();
            // $filename = $thumbnaile->getClientOriginalName();
            // $thumbnaile->move(public_path('/content/thumbnaile/'), $filename);

            $text = $request->text;
            $dom = new \DOMDocument();
            $dom->loadHTML($text, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $imageFile = $dom->getElementsByTagName('img');
            $folder_image_content = 'image_contents';

            foreach ($imageFile as $item => $image) {
                $data = $image->getAttribute('src');
                // dd($data);
                // list($type, $data) = explode(';', $data);
                // list(, $data) = explode(',', $data);
                // $imgData = base64_decode($data);
                // dd($imgData);
                $image_content = Cloudinary::upload($data, ['folder' => $folder_image_content])->getSecurePath();
                // dd($image_content);
                // $imageName = '/paragraph/imagecontent/' . time() . $item . '.png';
                // $path = public_path() . $imageName;
                // dd($path);
                // file_put_contents($path, $imgData);
                // file_put_contents($image_content);

                $image->removeAttribute('src');
                $image->setAttribute('src', $image_content);
            }

            $content = $dom->saveHTML();

            DB::table('contents')->where('id', $request->id)->update([
                'title' => $request->name,
                'thumbnaile_url' => $result,
                'thumbnaile_id' => $thumbnaile_id,
                'vidio' => $request->vidio,
                'text' => $request->text,
                'slug' => SlugService::createSlug(Content::class, 'slug', $request->name),
                'chapters_id' => $request->chapters_id,
                'updated_at' => Carbon::now()
            ]);
        }

        $text = $request->text;
        $dom = new \DOMDocument();
        $dom->loadHTML($text, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('img');
        $folder_image_content = 'image_contents';

        foreach ($imageFile as $item => $image) {
            $data = $image->getAttribute('src');
            // dd($data);
            // list($type, $data) = explode(';', $data);
            // list(, $data) = explode(',', $data);
            // $imgData = base64_decode($data);
            // dd($imgData);
            $image_content = Cloudinary::upload($data, ['folder' => $folder_image_content])->getSecurePath();
            // dd($image_content);
            // $imageName = '/paragraph/imagecontent/' . time() . $item . '.png';
            // $path = public_path() . $imageName;
            // dd($path);
            // file_put_contents($path, $imgData);
            // file_put_contents($image_content);

            $image->removeAttribute('src');
            $image->setAttribute('src', $image_content);
        }

        DB::table('contents')->where('id', $request->id)->update([
            'title' => $request->name,
            // 'thumbnaile' => $filename,
            'vidio' => $request->vidio,
            'text' => $request->text,
            'chapters_id' => $request->chapters_id,
            'slug' => SlugService::createSlug(Content::class, 'slug', $request->name),
            'updated_at' => Carbon::now()
        ]);





        return redirect()->action(
            [ContentController::class, 'index'],
            ['id' => $chapters_id]
        )->with('success', 'this chapter has been update');
    }

    public function preview($slug)
    {
        $query = DB::table('contents')->where('slug', $slug)->get();

        return view('dashboard.content.preview', ['query' => $query]);
    }

    public function delete($slug)
    {
        $data = DB::table('contents')->where('slug', $slug)->first();
        // dd($data->thumbnaile_id);
        $public_id = $data->thumbnaile_id;
        Cloudinary::destroy($public_id);
        DB::table('contents')->where('slug', $slug)->delete();
        return redirect()->back()->with('success', 'content has been deleted');
    }
}
