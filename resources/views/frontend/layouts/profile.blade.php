@extends('frontend/layouts.template')

@section('content')

<main>
		<!--/hero_in-->
        <div class="container margin_80_55">
           <div class="content mx-3">
		</div>
		<div class="box_general padding_bottom">
			<div class="header_box version_2">
				<h2><i class="fa fa-user"></i>Profile Details</h2>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<form action="" class="dropzone"></form>
				    </div>
                    <div class="row mb-5">
                     <div class="card-body profile-card">
                            <center class="mt-6"> <img src="https://res.cloudinary.com/djbbzawzs/image/upload/v1669355293/picture_assets_frontend/avatar_twx4zp.jpg" class="rounded-circle" width="175">
                            </center>
                        </div>
						<input type="file"   name="filename" required>
                </div>
				</div>
                
				<div class="col-md-8 add_top_30">
					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<label>Name</label>
								<input type="text" class="form-control" placeholder="Your name">
							</div>
						</div>
	
					</div>
					<!-- /row-->
					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<label>Email</label>
								<input type="email" class="form-control" placeholder="Your email">
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
            <p><a href="#0" class="btn_1 medium">Save</a></p>
		</div>
        
	</main>




@endsection
