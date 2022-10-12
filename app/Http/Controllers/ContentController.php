<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use PhpParser\Node\Expr\List_;

class ContentController extends Controller
{
    public function index($id)
    {
        $data = DB::table('contents')->where('chapters_id', $id)->get();
        // dd($data);
        return view('dashboard.content.index', ['data' => $data, 'id' => $id]);
    }

    public function create($id)
    {
        return view('dashboard.content.create', ['id' => $id]);
    }

    public function store(Request $request)
    {
        // dd($request);
        $id = $request->chapters_id;
        $this->validate($request, [
            'name' => 'required|max:50',
            'text' => 'required',
            'thumbnail' => 'image|max:50',
            'vidio' => 'max:50',
            'chapters_id' => 'required'
        ]);

        $thumbnile = $request->file('thumbnaile');
        if ($request->hasFile('thumbnaile')) {
            $imageName = $thumbnile->getClientOriginalName();
            $thumbnile->move(public_path('/content/thumbnaile/'), $imageName);
        } else {
            $imageName = null;
        }

        $text = $request->text;
        $dom = new \DOMDocument();
        $dom->loadHTML($text, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('img');

        foreach ($imageFile as $item => $image) {
            $data = $image->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data) = explode(',', $data);
            $imgData = base64_decode($data);
            $imageName = '/paragraph/imagecontent/' . time() . $item . '.png';
            $path = public_path() . $imageName;
            file_put_contents($path, $imgData);

            $image->removeAttribute('src');
            $image->setAttribute('src', $imageName);
        }

        $content = $dom->saveHTML();
        // dd($content);
        DB::table('contents')->insert([
            'name' => $request->name,
            'thumbnaile' => $imageName,
            'vidio' => $request->vidio,
            'text' => $content,
            'chapters_id' => $request->chapters_id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);



        return redirect()->action(
            [ContentController::class, 'index'],
            ['id' => $id]
        )->with('success', 'new content has been added');
    }

    public function edit($id)
    {
        $data = DB::table('contents')->where('id', $id)->get();
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
            $path = public_path() . '/content/thumbnaile/';

            if ($data->thumbnaile != '' && $data->thumbnaile) {
                $file_old = $path . $data->thumbnaile;
                unlink($file_old);
            }
            // dd($request->name);
            // $request['thumbnaile'] = $filename;
            $thumbnaile = $request->file('thumbnaile');
            $filename = $thumbnaile->getClientOriginalName();
            $thumbnaile->move(public_path('/content/thumbnaile/'), $filename);
            DB::table('contents')->where('id', $request->id)->update([
                'name' => $request->name,
                'thumbnaile' => $filename,
                'vidio' => $request->vidio,
                'text' => $request->text,
                'chapters_id' => $request->chapters_id,
                'updated_at' => Carbon::now()
            ]);
        }

        DB::table('contents')->where('id', $request->id)->update([
            'name' => $request->name,
            // 'thumbnaile' => $filename,
            'vidio' => $request->vidio,
            'text' => $request->text,
            'chapters_id' => $request->chapters_id,
            'updated_at' => Carbon::now()
        ]);





        return redirect()->action(
            [ContentController::class, 'index'],
            ['id' => $chapters_id]
        )->with('success', 'this chapter has been update');
    }

    public function preview($id)
    {
        $query = DB::table('contents')->where('id', $id)->get();

        return view('dashboard.content.preview', ['query' => $query]);
    }

    public function delete($id)
    {
        $data = DB::table('contents')->find($id);

        if ($data->thumbnaile != null) {
            $path = public_path() . '/content/thumbnaile/';
            $old_file = $path . $data->thumbnaile;
            unlink(($old_file));
        }

        DB::table('contents')->where('id', $id)->delete();

        return redirect()->back()->with('success', 'content has been deleted');
    }
}
