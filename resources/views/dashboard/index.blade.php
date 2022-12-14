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
            <li class="breadcrumb-item active">My Dashboard</li>
        </ol>
        <!-- Icon Cards-->
        <div class="row">
            <div class="col-xl-4 col-sm-6 mb-6">
                <div class="card dashboard text-white bg-info o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-user-circle" aria-hidden="true"></i>
                        </div>
                        <div class="mr-5">
                            <h5>Users {{$userr}}</h5>
                        </div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="{{url('dashboard/user')}}">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                            <i class="fa fa-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-6">
                <div class="card dashboard text-white bg-info o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-address-card-o" aria-hidden="true"></i>
                        </div>
                        <div class="mr-5">
                            <h5>Courses {{$courses}}</h5>
                        </div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="{{url('dashboard/user')}}">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                            <i class="fa fa-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-6">
                <div class="card dashboard text-white bg-info o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fas fa-users" aria-hidden="true"></i>
                        </div>
                        <div class="mr-5">
                             <h5>Mentors {{$mentors}}</h5>
                        </div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="{{url('dashboard/mentors')}}">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                            <i class="fa fa-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div>
            {{-- <div class="col-xl-4 col-sm-6 mb-6">
                <div class="card dashboard text-white bg-success o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-calendar-check-o"></i>
                        </div>
                        <div class="mr-5">
                            <h5>Mentors {{$courses}}</h5>
                        </div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="{{url('dashboard/coursecategory')}}">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                            <i class="fa fa-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div> --}}
        </div>     

@endsection
