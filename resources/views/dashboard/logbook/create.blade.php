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
        <li class="breadcrumb-item active">Add listing</li>
      </ol>
		<div class="box_general padding_bottom">
			<div class="header_box version_2">
				<h2><i class="fa fa-file"></i>Basic info</h2>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Listing Title</label>
						<input type="text" class="form-control" placeholder="Hotel Mariott">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Category</label>
						<div class="styled-select">
						<select>
							<option>Tour</option>
							<option>Hotel</option>
							<option>Restaurant</option>
							<option>Bar</option>
						</select>
						</div>
					</div>
				</div>
			</div>
			<!-- /row-->
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Keywords</label>
						<input type="text" class="form-control" placeholder="Keywords should be separated by commas">
					</div>
				</div>
			</div>
			<!-- /row-->
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label>Description</label>
						<div class="editor"></div>
					</div>
				</div>
			</div>
			<!-- /row-->
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label>Phone (Optional)</label>
						<input type="text" class="form-control">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Web site (Optional)</label>
						<input type="text" class="form-control">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Email (Optional)</label>
						<input type="text" class="form-control">
					</div>
				</div>
			</div>
			<!-- /row-->
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label>Photos</label>
						<form action="/file-upload" class="dropzone"></form>
					</div>
				</div>
			</div>
			<!-- /row-->
		</div>		
		<p><a href="#0" class="btn_1 medium">Save</a></p>
  </div>
  <!-- /.container-fluid-->
  </div>
    <!-- /.container-wrapper-->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
	
</body>

@endsection