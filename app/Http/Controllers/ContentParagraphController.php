<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContentParagraphController extends Controller
{
    public function index($id)
    {
        $query = DB::table('content_paragraphs')->where('contents_id', $id)->get();

        return view('dashboard.paragraph.index', ['query' => $query,  'id' => $id]);
    }

    public function create($id)
    {
        return view('dashboard.paragraph.create', ['id' => $id]);
    }

    public function store(Request $request)
    {
        // dd($request);

        $id = $request->contents_id;

        $this->validate($request, [
            'images' => 'image',
            'text' => 'required'
        ]);

        $images = $request->file('image');

        if ($request->hasFile('image')) {
            $filename = $images->getClientOriginalName();
            $images->move(public_path('/paragraph/imagecontent/'), $filename);
            // $path = $images->store('public/imagecontent');
        } else {
            $filename = null;
        }

        DB::table('content_paragraphs')->insert([
            'contents_id' => $request->contents_id,
            'vidio_url' => $request->vidio,
            'image_url' => $filename,
            'text' => $request->text
        ]);

        return redirect()->action(
            [ContentParagraphController::class, 'index'],
            ['id' => $id]
        )->with('success', 'new paragraph has been added');
    }

    public function edit($id)
    {
        $query = DB::table('content_paragraphs')->where('id', $id)->get();

        // dd($query);

        return view('dashboard.paragraph.edit', ['query' => $query]);
    }

    public function update(Request $request, $id)
    {
        $data = DB::table('content_paragraphs')->find($id);
        // dd($request);
        $contents_id = $request->contents_id;


        $this->validate($request, [
            'images' => 'image',
            'text' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $path = public_path() . '/paragraph/imagecontent/';
            // dd($path);

            if ($data->image_url != '' && $data->image_url) {
                $file_old = $path . $data->image_url;
                unlink($file_old);
            }
            $images = $request->file('image');
            $filename = $images->getClientOriginalName();
            $images->move(public_path('/paragraph/imagecontent/'), $filename);

            DB::table('content_paragraphs')
                ->where('id', $request->id)
                ->update([
                    'contents_id' => $request->contents_id,
                    'vidio_url' => $request->vidio,
                    'image_url' => $filename,
                    'text' => $request->text
                ]);
        }
        return redirect()->action(
            [ContentParagraphController::class, 'index'],
            ['id' => $contents_id]
        )->with('success', 'new paragraph has been updated');
        // return redirect()->back();
    }

    public function delete($id)
    {
        $data = DB::table('content_paragraphs')->find($id);
        // dd($data);

        if ($data->image_url != null) {
            $path = public_path() . '/paragraph/imagecontent/';
            $file_old = $path . $data->image_url;
            unlink($file_old);
        }

        DB::table('content_paragraphs')->where('id', $id)->delete();

        return redirect()->back();
    }
}
