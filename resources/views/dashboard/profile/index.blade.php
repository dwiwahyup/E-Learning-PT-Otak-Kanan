@extends('layouts.dashboard')
@section('content')


<div class="content-wrapper">
    <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Profile</li>
    </ol>
		<div class="box_general padding_bottom">
			<div class="header_box version_2">
				<h2><i class="fa fa-user"></i>Profile Details</h2>
			</div>
			<div class="row">
                <div class="col-lg-4 add_top_30">
                    <div class="card">
                        <div class="card-body profile-card">
                            <center class="mt-6"> <img src="{{url('frontend/img/avatar3.jpg')}}" class="rounded-circle" width="175">
                            </center>
                        </div>
                    </div>
					 <input type="file" class="form-control" name="filename" required>
                </div>
				<div class="col-md-8 add_top_35">
					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<label>Name</label>
								<input type="text" class="form-control">
							</div>
						</div>
					</div>
                    <div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<label>Email</label>
								<input type="text" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<label>Phone Number</label>
								<input type="text" class="form-control">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="box_general padding_bottom">
					<div class="header_box version_2">
						<h2><i class="fa fa-lock"></i>Change password</h2>
					</div>
					<div class="form-group">
						<label>Old password</label>
						<input class="form-control" type="password">
					</div>
					<div class="form-group">
						<label>New password</label>
						<input class="form-control" type="password">
					</div>
					<div class="form-group">
						<label>Confirm new password</label>
						<input class="form-control" type="password">
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="box_general padding_bottom">
					<div class="header_box version_2">
						<h2><i class="fa fa-envelope"></i>Change email</h2>
					</div>
					<div class="form-group">
						<label>Old email</label>
						<input class="form-control" name="old_email" id="old_email" type="email">
					</div>
					<div class="form-group">
						<label>New email</label>
						<input class="form-control" name="new_email" id="new_email" type="email">
					</div>
					<div class="form-group">
						<label>Confirm new email</label>
						<input class="form-control" name="confirm_new_email" id="confirm_new_email" type="email">
					</div>
				</div>
			
			</div>
            
		</div>
		 <p><a href="#0" class="btn_1 medium"> Edit</a></p>
    </div>
    <!-- /.container-fluid-->
		
	
</div>
@endsection



