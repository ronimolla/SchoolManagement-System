
@extends('layouts.frontLayout.front_design')
@section('content')


<div id="content">
	<div id="content-header">
	  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Readings</a>  </div>
	  <h1>My Readings</h1>
	</div>
     @if(Session::has('flash_message_error'))
        <div class="alert alert-error alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{!! session('flash_message_error') !!}</strong>
        </div>
    @endif   
    @if(Session::has('flash_message_success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{!! session('flash_message_success') !!}</strong>
        </div>
    @endif   
  
  <div class="container-fluid">
  
  
    <hr>
    <div class="row-fluid">
	@include('layouts.frontLayout.manue')
     
    </div>
	<div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h4>View Readings</h4>
          </div>
          <div class="widget-content nopadding">
		   <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>DOI</th>
                  <th>Year</th>
                  <th>Type</th>
                 
                </tr>
              </thead>
              <tbody>
             @foreach($readings as $reading)
                <tr class="gradeX">
                  <td>{{ $reading->title }}</td>
                  <td>{{ $reading->doe }}</td>
                  <td>{{ $reading->year }}</td>
                  <td>{{ $reading->type }}</td>
                 
                </tr>
			@endforeach
  
              </tbody>
            </table>
		  </div>
        </div>
		
      </div>
    </div>
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h4>Add Readings</h4>
          </div>
          <div class="widget-content nopadding">
		  <form method="post" action="{{ url('/student/add-reading') }}"class="form-horizontal"> {{ csrf_field() }}
				 
				  
				<div class="control-group">
				  <label class="control-label">Title :</label>
				  <div class="controls" style="width:280px;">
					<input type="text" id="title" name="title"class="span11" placeholder="First name" required />
				  </div>
				</div>
				 @foreach($studentdetails as $studentdetail)
				
					<input type="hidden" id="student_name" name="student_name" value="{{ $studentdetail->name }}" >
				 
				
				
					 <input type="hidden" id="school_code" name="school_code" value="{{ $studentdetail->school_code }}">
				 
					@endforeach
				<div class="control-group">
				  <label class="control-label">DOE:</label>
				  <div class="controls" style="width:280px;">
					<input type="text"  id="doe" name="doe" class="span11"required />
				   </div>
				</div>
				<div class="control-group">
				  <label class="control-label">Year:</label>
				  <div class="controls" style="width:280px;">
					<input type="text" id="year" name="year" class="span11" required />
				   </div>
				</div>
				<div class="control-group">
                <label class="control-label">Type:</label>
                <div class="controls">
                  <select name="type" id="type" style="width: 220px;">
                    <option value="book">Book</option>
                    <option value="magazine">Magazine</option>
                  </select>
                </div>
				</div>
				
				<div class="form-actions">
				  <button type="submit" class="btn btn-success">Save</button>
				</div>
			  </form>
		  </div>
        </div>
		
      </div>
    </div>
  </div>
		  
</div>
<!--end-main-container-part--> 
@endsection