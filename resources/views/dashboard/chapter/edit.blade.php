@extends('layouts.dashboard')

@section('content')


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

        <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <h2><i class="fa fa-file"></i>Edit Chapter</h2>
            </div>

            {{-- @dd($id); --}}
            <form
                action="{{route('coursecategory.chapter.update', ['coursecategory' => $coursecategory->id, 'chapter' => $chapter->id])}}"
                method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Chapter Name</label>
                            <input type="text" name="name" value="{{$chapter->name}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Abstract</label>
                            <textarea type="text" class="form-control" name="abstract">{{$chapter->abstract}}</textarea>
                        </div>
                    </div>
                </div>
                <!-- /row-->
                <!-- /row-->
                <p><button type="submit" class="btn btn-primary plus float-right">Save</button></p>
            </form>
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
