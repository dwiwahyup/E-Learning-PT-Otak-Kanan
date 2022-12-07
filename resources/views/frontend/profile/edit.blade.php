@extends('frontend/layouts.template')

@section('content')

<section class="hero_in general">
    <div class="wrapper">
        <div class="container">
            <h1 class="fadeInUp"><span></span>Panagea blog</h1>
        </div>
    </div>
</section>

<div class="container margin_30_95">
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="{{$users->user_details->profile_photo ?? "https://res.cloudinary.com/djbbzawzs/image/upload/v1669355293/picture_assets_frontend/avatar_twx4zp.jpg"}}"
                            alt="Admin" class="rounded-circle" width="150" >
                        <div class="mt-3">
                            <input type="file" class="form-control mt-5" name="profile_image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                        <h6 class="heading-small text-muted mb-4">User information</h6>
                        <div class="pl-lg-4">
                            <form action="{{route('MyProfile.update', $users->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-last-name">Phone Numbber</label>
                                        <input type="text" name="phone_numbers" value="{{old('phone_numbers') ?? $users->user_details->phone_numbers}}"
                                            class="form-control form-control-alternative">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-first-name">Campus</label>
                                        <input type="text" name="campus" value="{{old('campus') ?? $users->user_details->campus}}" class="form-control form-control-alternative">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-last-name">Nim</label>
                                        <input type="text" name="NIM" value="{{old('NIM') ?? $users->user_details->NIM}}" class="form-control form-control-alternative">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
										<label for="inputState">Gender</label>
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
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-last-name">Address</label>
                                        <textarea type="text" class="form-control" name="address">{{$users->user_details->address}}</textarea>
                                    </div>

                                </div>
                                {{-- <p> --}}
                                    <button type="submit" class="btn_home_align mt-2 btn_1 rounded">
                                        Save
                                    </button>
                                    {{-- <a class="btn_1 rounded"> --}}
                                    {{-- </a> --}}
                                {{-- </p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>



@endsection
