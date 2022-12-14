@extends('layouts.dashboard')

@section('content')

{{-- @dd($data); --}}

<div class="content-wrapper">
    <div class="container-fluid">
        <a class="btn btn-link mb-2" href="{{URL::previous()}}">
            <i class="fa fa-chevron-left" aria-hidden="true"></i> Back
        </a>

        @if ($errors->any())
            <div class="mb-5" role="alert">
                <div class="alert alert-danger" role="alert">
                    <p>
                        <ul>
                            @foreach ($errors->all() as $eror)
                                <li>{{$eror}}</li>
                            @endforeach
                        </ul>
                    </p>
                </div>
            </div>
        @endif

        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i></i>Update Content
            </div>
            <div class="card-body">
                {{-- @dd($data); --}}
                <form action="{{route('coursecategory.chapter.content.update', ['coursecategory' => $coursecategory->id, 'chapter' => $chapter->id, 'content' => $content->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Content Name</label>
                                <input name="title" value="{{old('title') ?? $content->title}}" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Link Vidio</label>
                                <input type="text" name="vidio" value="{{old('vidio') ?? $content->vidio}}" class="form-control">
                                <small class="form-text mb-3 text-danger">Please input link form youtube like : https://www.youtube.com/embed/tgbNymZ7vqY</small>
                                @if ($content->vidio != null)
                                    <iframe style="width : 765px; height: 405px; border: none;"
                                    src="{{$content->vidio}}">
                                    </iframe>
                                @else
                                    
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Thumbnaile</label>
                                <input type="file" name="thumbnaile" class="form-control">
                                <small class="form-text mb-3 text-danger">Please input image in size 400X800</small>
                                @if ($content->thumbnaile_url != null)
                                    <p><img alt="" class="img-fluid" style="width: 800px; height: 400px;" src="{{$content->thumbnaile_url}}"></p>
                                @else
                                    
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Text</label>
                                <textarea class="editor" name="text">{{old('text') ?? $content->text}}</textarea>
                            </div>
                        </div>
                        
                        </div>
                        <button type="submit" class="btn btn-primary plus float-left">Update</button>
                </form>
                    {{-- <p><a href="#0" class="btn btn-primary plus float-left">Update</a></p>    --}}
                </div>
                
        <!-- /tables-->
    </div>
</div>

@endsection
