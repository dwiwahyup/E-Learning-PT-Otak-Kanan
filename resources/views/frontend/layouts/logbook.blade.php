@extends('frontend/layouts.template')

@section('content')

<main>
		<!--/hero_in-->
        <div class="container margin_80_55">
           <div class="content mx-3">
		</div>
		<div class="box_general padding_bottom">	
            <div class="add-review">
								<h5>Add LogBook</h5>
								<form action="{{route('my_logbooks.store')}}" method="POST">
									@csrf
									<div class="row mt-3">
                                        <div class="col-md-3">
											<div class="form-group">
												<label>Date</label>
												<input type="date" name="date" class="form-control datetimepicker" name="Appointment_time">
											</div>
                                    	</div>
                                        
										<div class="form-group col-md-12">
											<label>Description</label>
											<textarea name="description" class="form-control" style="height:130px;"></textarea>
										</div>
										<div class="form-group col-md-12 add_top_20">
                                            <button type="submit" class="btn_1">save</button>
											{{-- <p><button type="submit" class="btn btn-primary plus float-right">Save</button></p> --}}
										</div>
									</div>
								</form>
							</div>
					<!-- /pagination -->
				</div>
		</div>
		
        
        
	</main>




@endsection
