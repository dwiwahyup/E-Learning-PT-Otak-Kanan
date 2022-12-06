@extends('layouts.dashboard')

@section('content')

{{-- @dd ($materi) --}}

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{('/dashboard')}}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{('/dashboard/coursecategory')}}">Course</a>
            </li>
            <li class="breadcrumb-item active">Chapter</li>
        </ol>
        {{-- @dd($id) --}}
        @if ($message = Session::get('success'))
        <div class="mb-10">
            <div class="alert alert-success" role="alert">
                <p>{{$message}}</p>
            </div>
            @endif
            <p>
                <a href="{{route('coursecategory.chapter.create', $course_name->slug)}}" class="btn btn-secondary plus">
                    Add Chapter</a>
            </p>
            {{-- @dd($data) --}}

            <div class="col-lg-12" id="faq">
                <h5 class="nomargin_top">Course Name : {{$course_name->name}}</h5>
                <div role="tablist" class="add_bottom_45 accordion_2" id="payment">
                    @foreach ($query as $index => $data)

                    <div class="card">
                        <div class="card-header" role="tab">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#{{$data->id}}" aria-expanded="true"><i
                                        class="indicator "><small><strong>Total Content : {{$data->contents_count}}</strong></small></i>
                                    {{$index+1}}. {{$data->name}}
                                </a>
                            </h5>
                        </div>
                        <div id="{{$data->id}}" class="collapse " role="tabpanel" data-parent="#payment">
                            <div class="card-body">
                                <p>
                                    {{$data->abstract}}
                                </p>
                                <div class="mt-3 font-weight-normal" role="group"
                                    aria-label="Basic mixed styles example">
                                    <a class="mr-2"
                                        href="{{route('coursecategory.chapter.edit', ['coursecategory' => $course_name->slug, 'chapter' => $data->slug])}}">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                    <a class="mr-2"
                                        href="{{route('coursecategory.chapter.content.index', ['coursecategory' => $course_name->slug, 'chapter' => $data->slug])}}">
                                        <i class="fa fa-list-alt" aria-hidden="true"></i> Content List</a>
                                    <a class="mr-2" href="/dashboard/quiz/{{$data->id}}">
                                        <i class="fa fa-question-circle" aria-hidden="true"></i> Quiz</a>
                                    <a href="" type="button" data-toggle="modal" data-target="#exampleModal">
                                        <i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                                </div>
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete chapter</h5>
                                                <button class="close" type="button" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true"></span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure to delete this chapter ?
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button"
                                                    data-dismiss="modal">Cancel</button>
                                                <form
                                                    action="{{route('coursecategory.chapter.destroy', ['coursecategory' => $course_name->id, 'chapter' => $data->id])}}"
                                                    class="d-inline" method="POST">
                                                    {{ csrf_field() }}
                                                    {{method_field('delete')}}
                                                    <button class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


<!-- BASE CSS -->
{{-- <link href="{{ url('frontend/css/bootstrap.min.css')}}" rel="stylesheet"> --}}
<link href="{{ url('frontend/css/style.css')}}" rel="stylesheet">
<link href="{{ url('frontend/css/vendors.css')}}" rel="stylesheet">

<!-- YOUR CUSTOM CSS -->

<script src="{{ url('frontend/js/common_scripts.js')}}"></script>
<script src="{{ url('frontend/js/main.js')}}"></script>
<script src="{{ url('frontend/assets/validate.js')}}"></script>


@endsection
