@extends('frontend/layouts.template')

@section('content')

<main>
		<!--/hero_in-->
        <div class="container margin_80_55">
           <div class="content mx-3">
    <div class="row">
        <div class="col-md-12">
                <div class="card card-user form-custom" style="border-radius: 2rem">
            <div class="card-header" style="border-radius: 2rem">
                <h5 class="card-title">Profil Mahasiswa</h5>
            </div>

            <div class="card-body">
            <form id="profile-student" action="update_profile"  method="post" enctype="multipart/form-data">
            <input type="hidden" name="" value="">
            
            <div class="container">
                <div class="row mb-5">
                    <div class="col-md-6">
                        <div class="col-md-4">
                            <div class="photo-frame">
                                <img class="photo-profile" src="{{url('/frontend/img/default_user.png')}}" height="200" width="200">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="name" class="form-control " value="Liga Bayu Herdianto">
                                
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" class="form-control" value="masligabayu@gmail.com">
                            </div>
                        </div>        
                    </div>
                </div>
            </div>
            <div class="container">
              </div>
                <div class="row">
                    <div class="ml-auto">
                        {{-- <button type="submit" class="btn btn-primary btn-round text-white">Simpan</button> --}}
                          {{-- <a href="{{url('/')}}" class="btn btn-success btn-md">Back</a> --}}
                          <td>
                                    <div class="d-flex">
                                        <a href="{{url('/')}}" class="btn btn-success btn-md">Back</a>
                                        <a href="{{url('/profile/update')}}" class="btn btn-danger btn-md ml-2" >Update</a>
                                    </div>
                                </td>
                    </div>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
			<!--/container-->
		</div>
		<!--/bg_color_1-->
	</main>




@endsection