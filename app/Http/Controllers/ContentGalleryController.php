<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContentGalleryController extends Controller
{
    public function store(Request $request)
    {

        $this->validate($request, [
            // dd($request),
            'contents_id' => 'required',
            'images.*' => 'required|image'
        ]);

        $images = $request->file('images');
        if ($request->hasFile('images')) {
            foreach ($images as $image) {
                $path = $image->store('public/imagecontent');

                DB::table('content_pictures')->insert([
                    'contents_id' => $request->contents_id,
                    'pictures' => $path
                ]);

                return redirect()->back();
            }
        }
    }
}
