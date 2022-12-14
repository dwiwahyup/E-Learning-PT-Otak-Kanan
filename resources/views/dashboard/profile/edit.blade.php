@extends('layouts.dashboard')
@section('content')


<div class="content-wrapper">
    <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('profile.index')}}">{{$users->name}}</a>
        </li>
        <li class="breadcrumb-item active">Edit Profile</li>
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
	@if ($message = Session::get('success'))
	<div class="mb-10">
		<div class="alert alert-success" role="alert">
			<p>{{$message}}</p>
		</div>
	@endif
	@if ($message = Session::get('wrong'))
	<div class="mb-10">
		<div class="alert alert-danger" role="alert">
			<p>{{$message}}</p>
		</div>
	@endif
		<div class="box_general padding_bottom">
			<div class="header_box version_2">
				<h2><i class="fa fa-user"></i>Profile Details</h2>
			</div>
			<div class="row">
				<div class="col-lg-4 add_top_30">
					<div class="card">
						<div class="card-body profile-card">
							<center class="mt-6"> <img src="{{$users->user_details->profile_photo ?? "https://res.cloudinary.com/djbbzawzs/image/upload/v1669355293/picture_assets_frontend/avatar_twx4zp.jpg"}}" class="rounded-circle" width="175">
                            </center>
                        </div>
						<form action="/dashboard/profile/update/profile_image" method="post" enctype="multipart/form-data">
							@csrf
							<div class="card-body">
								<input type="file" class="form-control" name="image_profile">
								<p><button type="submit" class="btn btn-primary plus float-right mt-2 mb-2">Save</button></p>
							</div>
						</form>
                    </div>
                </div>
				<div class="col-md-8 add_top_35">
					<form action="{{route('profile.update', $users_id)}} " method="post">
						@csrf
						@method('PUT')
						<div class="row">
							<div class="col-md-8">
								<div class="form-group">
									<label>Name</label>
									<input type="text" name="name" value="{{old('name') ?? $users->name}}" class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<div class="form-group">
									<label>Email</label>
									<input type="text" class="form-control" disabled value="{{$users->email}}">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<div class="form-group">
									<label>Phone Number</label>
									<input type="text" class="form-control" name="phone_number" value="{{old('phone_number') ?? $users->user_details->phone_numbers ?? ""}}">
								</div>
							</div>
						</div>
						@if ($users->courses()->exists())
							<div class="row">
								<div class="col-md-8">
									<div class="form-group">
										<label>Course</label>
										<input type="text" class="form-control" disabled value="{{old('course') ?? $users->courses->name}}">
									</div>
								</div>
							</div>
						@endif
							<div class="row">
								<div class="col-md-8">
									<div class="form-group">
										<label>Alamat</label>
										<input type="text" class="form-control" name="address" value="{{old('address') ?? $users->user_details->address ?? ""}}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-8">
									<div class="form-group">
										<label for="inputState">Jenis Kelamin</label>
										<select id="inputState" class="form-control" name="gender">
											<option value="{{$users->user_details->gender}}">
												@if ($users->user_details()->exists())@if ($users->user_details->gender === 0)laki-laki @else perempuan
												@endif
												@endif</option>
											<option value="">--------------</option>
											<option value="0">Laki-laki</option>
											<option value="1">Perempuan</option>
										</select>
									</div>
								</div>
							</div>
							<p><button type="submit" class="btn btn-primary plus float-right mt-2">Save</button></p>
					</form>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="box_general padding_bottom">
					<div class="header_box version_2">
						<h2><i class="fa fa-lock"></i>Change password</h2>
					</div>
					<form action="/dashboard/profile/update/password" method="post" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label>Old password</label>
							<input class="form-control" type="password" name="old_password">
						</div>
						<div class="form-group">
							<label>New password</label>
							<input class="form-control" type="password" name="new_password">
						</div>
						<div class="form-group">
							<label>Confirm new password</label>
							<input class="form-control" type="password" name="confirm_password">
							<p><button type="submit" class="btn btn-primary plus float-right mt-2">Save</button></p>
						</div>
					</form>
				</div>
			</div>
			<div class="col-md-6">
				<div class="box_general padding_bottom">
					<div class="header_box version_2">
						<h2><i class="fa fa-envelope"></i>Change email</h2>
					</div>
					<form action="/dashboard/profile/update/email" method="post" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label>Old email</label>
							<input class="form-control" name="old_email" type="email">
						</div>
						<div class="form-group">
							<label>New email</label>
							<input class="form-control" name="new_email" type="email">
						</div>
						<div class="form-group">
							<label>Confirm new email</label>
							<input class="form-control" name="confirm_new_email" type="email">
							<p><button type="submit" class="btn btn-primary plus float-right mt-2">Save</button></p>
						</div>
					</form>
				</div>
			
			</div>
            
		</div>
    </div>
    <!-- /.container-fluid-->
		
	
</div>
@endsection



