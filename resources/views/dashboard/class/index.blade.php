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
            <li class="breadcrumb-item active">Kelas</li>
        </ol>
        <!-- Icon Cards-->
        <div class="row">
            {{-- @foreach ($course_categories as $item)
            @endforeach --}}
            <div class="col-xl-4 col-sm-6 mb-3">
                <div class="card dashboard text-white bg-primary o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-video-camera" aria-hidden="true"></i>
                        </div>
                        <div class="mr-5">
                            {{-- <h5>{{$item->name}}</h5> --}}
                            <h5>Digital Marketing</h5>
                        </div>
                    </div>
                <a class="card-footer text-white clearfix small z-1" href="{{url('/dashboard/class/class1')}}">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                            <i class="fa fa-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-3">
                <div class="card dashboard text-white bg-warning o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-code" aria-hidden="true"></i>
                        </div>
                        <div class="mr-5">
                            <h5>Digital & Online Business</h5>
                        </div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="{{url('/dashboard/class/class2')}}">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                            <i class="fa fa-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-3">
                <div class="card dashboard text-white bg-success o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-wrench" aria-hidden="true"></i>
                        </div>
                        <div class="mr-5">
                            <h5>Business Support</h5>
                        </div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="{{url('/dashboard/class/class3')}}">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                            <i class="fa fa-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div>
        </div>     

@endsection