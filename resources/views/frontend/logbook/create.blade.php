@extends('frontend/layouts.template')

@section('content')

<section class="hero_in general">
    <div class="wrapper">
        <div class="container">
            <h1 class="fadeInUp"><span></span>LogBook</h1>
        </div>
    </div>
</section>
<main>
    <!--/hero_in-->
    <div class="container margin_80_55">
        <div class="content mx-3">
        </div>
        <div class="box_general padding_bottom">
            <div class="add-review">
                <h5>Add LogBook</h5>
                <form action="/my_logbooks/store/{{$id}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>Description</label>
                            <textarea name="description" class="form-control"
                                style="height:130px;"></textarea>
                        </div>
                        <div class="form-group col-md-12 add_top_20">
                            <input type="submit" value="Save" class="btn_1" id="">
                        </div>
                    </div>
                </form>
            </div>
            <!-- /pagination -->
        </div>
    </div>



</main>




@endsection
