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
            <!-- Icon Cards-->
            <div class="box-general">
                <div class="header_box">
                    <h2 class="d-inline-block">Course Name : {{$course_name->name}}</h2>
                </div>
                <div class="list_general">
                    @foreach ($query as $index => $data)
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#data{{$data->id}}"
                                        aria-expanded="true" aria-controls="collapseOne">
                                        {{$index+1}}. {{$data->name}}
                                    </button>
                                </h5>
                                <h5 class="mb-0">
                                    <a class="btn btn-link">
                                        Total Content : {{$data->contents_count}}
                                    </a>
                                </h5>
                            </div>

                            <div id="data{{$data->id}}" class="collapse" aria-labelledby="headingOne"
                                data-parent="#accordion">
                                <div class="card-body ml-3">
                                    {{-- <p> --}}
                                    {{$data->abstract}}
                                    {{-- </p> --}}
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete chapter</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true"></span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are you sure to delete this chapter ?
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
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
                    @endforeach
                </div>
            </div>


            <div id="faq">
            <h4 class="nomargin_top">Payments</h4>
            <div role="tablist" class="add_bottom_45 accordion_2" id="payment">
                <div class="card">
                    <div class="card-header" role="tab">
                        <h5 class="mb-0">
                            <a class="collapsed" data-toggle="collapse" href="#collapseOne_payment" aria-expanded="false"><i
                                    class="indicator ti-plus"></i>Introdocution</a>
                        </h5>
                    </div>

                    <div id="collapseOne_payment" class="collapsed" role="tabpanel" data-parent="#payment">
                        <div class="card-body">
                            <p>Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea
                                proident. Ad
                                vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim
                                aesthetic
                                synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                            <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                                squid. 3
                                wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                                nesciunt laborum
                                eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                                coffee nulla
                                assumenda shoreditch et.</p>
                        </div>
                    </div>
                </div>
                <!-- /card -->
                {{-- <div class="card">
                    <div class="card-header" role="tab">
                        <h5 class="mb-0">
                            <a class="collapsed" data-toggle="collapse" href="#collapseTwo_payment"
                                aria-expanded="false">
                                <i class="indicator ti-plus"></i>Generative Modeling Review
                            </a>
                        </h5>
                    </div>
                    <div id="collapseTwo_payment" class="collapse" role="tabpanel" data-parent="#payment">
                        <div class="card-body">
                            <p>Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea
                                proident. Ad
                                vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim
                                aesthetic
                                synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                            <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                                squid. 3
                                wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                                nesciunt laborum
                                eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                                coffee nulla
                                assumenda shoreditch et.</p>
                        </div>
                    </div>
                </div>
                <!-- /card -->
                <div class="card">
                    <div class="card-header" role="tab">
                        <h5 class="mb-0">
                            <a class="collapsed" data-toggle="collapse" href="#collapseThree_payment"
                                aria-expanded="false">
                                <i class="indicator ti-plus"></i>Variational Autoencoders
                            </a>
                        </h5>
                    </div>
                    <div id="collapseThree_payment" class="collapse" role="tabpanel" data-parent="#payment">
                        <div class="card-body">
                            <p>Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea
                                proident. Ad
                                vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim
                                aesthetic
                                synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                            <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                                squid. 3
                                wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                                nesciunt laborum
                                eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                                coffee nulla
                                assumenda shoreditch et.</p>
                        </div>
                    </div>
                </div> --}}
                <!-- /card -->
            </div>
        </div>


        </div>
    </div>
</div>

<!-- BASE CSS -->
<link href="{{ url('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ url('frontend/css/style.css')}}" rel="stylesheet">
<link href="{{ url('frontend/css/vendors.css')}}" rel="stylesheet">

<!-- YOUR CUSTOM CSS -->

<script src="{{ url('frontend/js/common_scripts.js')}}"></script>
<script src="{{ url('frontend/js/main.js')}}"></script>
<script src="{{ url('frontend/assets/validate.js')}}"></script>
@endsection
