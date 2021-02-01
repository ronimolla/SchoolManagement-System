
@extends('layouts.frontLayout.front_design')
@section('content')


<div id="content">
	<div id="content-header">
	  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Form elements</a> <a href="#" class="current">Personal Information</a> </div>
	  <h1>Student Personal Information</h1>
	</div>

	<div class="container-fluid">
		<hr>
		@if(Session::has('flash_message_success'))
	            <div class="alert alert-success alert-block">
	                <button type="button" class="close" data-dismiss="alert">×</button> 
	                    <strong>{!! session('flash_message_success') !!}</strong>
	            </div>
	        @endif
	        @if(Session::has('flash_message_error'))
	            <div class="alert alert-error alert-block" style="background-color:#f4d2d2">
	                <button type="button" class="close" data-dismiss="alert">×</button> 
	                    <strong>{!! session('flash_message_error') !!}</strong>
	            </div>
    		@endif 
		<div class="row-fluid">
		@include('layouts.frontLayout.manue')
			<div class="widget-box">
				
			<div class="widget-content nopadding">
			  <form method="post" action="{{ url('/student/add-information') }}"class="form-horizontal"> {{ csrf_field() }}
				<div class="control-group">
				  <label class="control-label">Name :</label>
				  <div class="controls" style="width:280px;">
					<input type="text" id="name" name="name"class="span11" placeholder="First name" required />
				  </div>
				</div>
				
				<div class="control-group">
				  <label class="control-label">Gender:</label>
				  <div class="controls" >
						<input type="radio" id="male" name="gender" value="male" required>
						 &nbsp; Male
						<input type="radio" id="female" name="gender" value="female">
						 &nbsp; Female
				  </div>
				</div>
				
				  <label class="control-label">Address</label>
				  <div class="controls"  style="width:280px;">
					<input type="text"  class="span11" id="address" name="address" placeholder="Enter Password" required />
				  </div>
				
				<div class="control-group">
                <label class="control-label">Country:</label>
                <div class="controls">
                  <select name="type" id="type" style="width: 220px;" required>
				  <option value="">Select Country</option>
					@foreach($countries as $country)
					<option value="{{ $country->country_name }}">{{ $country->country_name }}</option>
					@endforeach
                  </select>
                </div>
              </div>
				<div class="control-group">
				  <label class="control-label">DOE:</label>
				  <div class="controls" style="width:280px;">
					<input type="text"  id="doe" name="doe" class="span11" required />
				   </div>
				</div>
				<div class="control-group">
				  <label class="control-label">Phone:</label>
				  <div class="controls" style="width:280px;">
					<input type="text" id="phone" name="phone" class="span11" required />
				   </div>
				</div>
				<div class="control-group">
				  <label class="control-label">Email:</label>
				  <div class="controls" style="width:280px;">
					<input type="text" id="email" name="email" value="{{ $user_email }}" class="span11" readonly />
				   </div>
				</div>
				
				<div class="form-actions">
				  <button type="submit" class="btn btn-success">Updata Info</button>
				</div>
			  </form>
			</div>
     
		</div>
	  </div>
	</div>
</div>

<!--end-main-container-part--> 
@endsection

