@extends('layouts.dashboard')

@section('content')

{{-- @dd ($materi) --}}

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Chapter</li>
        </ol>
        {{-- @dd($id) --}}
        <p>
            <a href="/dashboard/chapter/create/{{$id}}" class="btn btn-secondary plus"> Add Chapter</a>
        </p>
        <!-- Icon Cards-->
        <div class="row">
            @foreach ($data as $data)
            <div class="col-xl-6 col-sm-6 mb-3">
                <div class="card dashboard text-white bg-success o-hidden h-100">
                    <div class="card-body">
                        <div class="mr-5">
                            <h5>{{$data->name}}</h5>
                        </div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="">
                        <span class="float-left">View Details Materi</span>
                        {{-- <a href="">asdasd</a> --}}
                        <span class="float-right">
                            <i class="fa fa-angle-right"></i>
                        </span>
                    </a>
                    <a class="card-footer text-white clearfix small z-1" href="/dashboard/chapter/edit/{{$data->id}}">
                        <span class="float-left">Edit</span>
                        {{-- <a href="">asdasd</a> --}}
                        <span class="float-right">
                            <i class="fa fa-angle-right"></i>
                        </span>
                    </a>
                    <a class="card-footer text-white clearfix small z-1" href="/dashboard/chapter/delete/{{$data->id}}">
                        <span class="float-left">Delete</span>
                        {{-- <a href="">asdasd</a> --}}
                        <span class="float-right">
                            <i class="fa fa-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div>
            @endforeach
        </div>     

@endsection