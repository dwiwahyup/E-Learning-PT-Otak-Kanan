@extends('layouts.dashboard')
@section('content')


<div class="content-wrapper">
    <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Add listing</li>
    </ol>
		<div class="box_general padding_bottom">
			<div class="header_box version_2">
				<h2><i class="fa fa-user"></i>Profile details</h2>
			</div>
			<div class="row">
                <div class="col-lg-4 add_top_30">
                    <div class="card">
                        <div class="card-body profile-card">
                            <center class="mt-6"> <img src="{{url('frontend/img/avatar3.jpg')}}" class="rounded-circle" width="175" />
                                <h4 class="card-title mt-2">Name</h4>
                                <h6>Course</h6>
                            </center>
                        </div>
                    </div>
                </div>
				{{-- <div class="col-md-4">
					<div class="form-group">
					<label>Your photo</label>
						<form action="/file-upload" class="dropzone"></form>
				    </div>
				</div> --}}
				<div class="col-md-8 add_top_15">
					<div class="row">
						<div class="col-md-7">
							<div class="form-group">
								<label>Full Name</label>
								<input type="text" class="form-control">
							</div>
						</div>
					</div>
                    <div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Username</label>
								<input type="text" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Asal Kampus</label>
								<input type="email" class="form-control">
							</div>
						</div>
					</div>
					<!-- /row-->
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Phone Number</label>
								<input type="text" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Email</label>
								<input type="email" class="form-control">
							</div>
						</div>
					</div>
                    <div class="row">
						<div class="col-md-7">
							<div class="form-group">
								<label>Role</label>
								<input type="text" class="form-control">
							</div>
						</div>
					</div>
					<!-- /row-->
					{{-- <div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Personal info</label>
								<textarea style="height:100px;" class="form-control" placeholder="Personal info"></textarea>
							</div>
						</div>
					</div> --}}
					<!-- /row-->
				</div>
			</div>
		</div>
		<!-- /box_general-->
		
		<!-- /row-->
    </div>
    <!-- /.container-fluid-->
</div>
@endsection



