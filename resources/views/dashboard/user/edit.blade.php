@extends('layouts.dashboard')

@section('content')

{{-- <body class="fixed-nav sticky-footer" id="page-top"> --}}
<div class="content-wrapper">
    <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">User</li>
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
            <h2><i class="fa fa-file"></i> Edit Roles User</h2>
        </div>

    <form action="{{route('user.update', $data->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Roles</label>
                    <div class="styled-select">
                        <select name="roles">
                            <option value="{{$data->roles}}">{{$data->roles}}</option>
                                <option value="ADMIN">ADMIN</option>
                                <option value="MENTOR">MENTOR</option>
                                <option value="USER">USER</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <!-- /row-->
    <p><button type="submit" class="btn btn-primary plus float-right">Update</button></p>
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