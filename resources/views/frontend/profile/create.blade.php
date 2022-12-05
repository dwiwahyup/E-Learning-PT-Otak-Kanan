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
                        <img src="https://res.cloudinary.com/djbbzawzs/image/upload/v1669355293/picture_assets_frontend/avatar_twx4zp.jpg"
                            alt="Admin" class="rounded-circle" width="150">
                        <div class="mt-3">
                            <input type="file" class="form-control mt-5" name="filename" required>
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
                                <div class="col-lg-8">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-last-name">Phone Numbber</label>
                                        <input type="text" name="phone_number"
                                            class="form-control form-control-alternative">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-first-name">Campus</label>
                                        <input type="text" name="camppus" class="form-control form-control-alternative">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-last-name">Nim</label>
                                        <input type="text" name="NIM" class="form-control form-control-alternative">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-last-name">Address</label>
                                        <input type="text" name="address" class="form-control ">
                                    </div>

                                </div>
                                <p class="btn_home_align mt-2"><a href="{{url(route('MyProfile.create'))}}"
                                        class="btn_1 rounded">Complete
                                        profile</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
