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
                        <img src="{{$user->user_details->profile_photo ?? "https://res.cloudinary.com/djbbzawzs/image/upload/v1669355293/picture_assets_frontend/avatar_twx4zp.jpg"}}"
                            alt="Admin" class="rounded-circle" width="150">
                        <div class="mt-3">
                            <h4>{{$user->name}}</h4>
                            <p class="text-secondary mb-1">{{$user->courses->name}}</p>
                            <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form>
                        <h6 class="heading-small text-muted mb-4">User information</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-username">Name</label>
                                        <input disabled value="{{$user->name}}" type="text" id="input-username"
                                            class="form-control form-control-alternative">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">Course</label>
                                        <input disabled value="{{$user->courses->name ?? ""}}" type="email"
                                            id="input-email" class="form-control form-control-alternative">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-first-name">Email</label>
                                        <input disabled value="{{$user->email}}" type="text" id="input-first-name"
                                            class="form-control form-control-alternative">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-last-name">Phone</label>
                                        <input disabled value="{{$user->user_details->phone_numbers ?? ""}}" type="text"
                                            id="input-last-name" class="form-control form-control-alternative">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-first-name">Campus</label>
                                        <input disabled value="{{$user->user_details->campus ?? ""}}" type="text"
                                            id="input-first-name" class="form-control form-control-alternative">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-last-name">Nim</label>
                                        <input disabled value="{{$user->user_details->NIM ?? ""}}" type="text"
                                            id="input-last-name" class="form-control form-control-alternative">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-last-name">Alamat</label>
                                        <textarea type="text" class="form-control" disabled>{{$user->user_details->address ?? ""}}</textarea>
                                        {{-- <input disabled value="{{$user->user_details->address ?? ""}}" type="text"
                                            id="input-last-name" class="form-control form-control-alternative"> --}}
                                    </div>
                                </div>
                                @if ($user->user_details()->exists())
                                    <p class="btn_home_align mt-2"><a href="{{url(route('MyProfile.edit', $user->slug))}}"
                                            class="btn_1 rounded">Edit</a></p>
                                @else
                                    <p class="btn_home_align mt-2"><a href="{{url(route('MyProfile.create'))}}"
                                            class="btn_1 rounded">Complete
                                            profile</a></p>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
