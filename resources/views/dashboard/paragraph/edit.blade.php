@extends('layouts.dashboard')

@section('content')


<div class="content-wrapper">
    <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Content Paragraph</li>
    </ol>

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

    <div class="box_general padding_bottom">
        <div class="header_box version_2">
            <h2><i class="fa fa-file"></i>Update Paragraph</h2>
        </div>

    {{-- @dd($id); --}}
    @foreach ($query as $data)
        <form action="/dashboard/paragraph/update/{{$data->id}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="contents_id" value="{{$data->contents_id}}"> <br />
            <input type="hidden" name="id" value="{{$data->id}}"> <br />
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Link Vidio</label>
                        <input type="text" name="vidio" value="{{$data->vidio_url}}" class="form-control">
                        <small class="form-text mb-3 text-danger">Please input link form youtube like : https://www.youtube.com/embed/tgbNymZ7vqY</small>
                        @if ($data->vidio_url != null)
                            <iframe style="width : 765px; height: 405px; border: none;"
                            src="{{$data->vidio_url}}">
                            </iframe>
                        @else
                            
                        @endif
                    </div>
                    <div class="form-group">
                        <label>images</label>
                        <input type="file" name="image" class="form-control">
                        <small class="form-text mb-3 text-danger">Please input image in size 400X800</small>
                        @if ($data->image_url != null)
                            <p><img alt="" class="img-fluid" style="width: 800px; height: 400px;" src="{{url('paragraph/imagecontent/'.$data->image_url)}}"></p>
                        @else
                            
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Abstract</label>
                        <textarea class="editor" name="text">{{$data->text}}</textarea>
                    </div>
                </div>
            </div>
            <!-- /row-->
            <!-- /row-->
                <p><button type="submit" class="btn btn-primary plus float-right">Save</button></p>
            </form>
    @endforeach
    </div>	
    </div>
<!-- /.container-fluid-->
</div>
<!-- /.container-wrapper-->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fa fa-angle-up"></i>
</a>


@endsection