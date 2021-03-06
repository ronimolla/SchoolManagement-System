
@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
	<div id="content-header">
	  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Readings</a>  </div>
	  <h1>Read By Student</h1>
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
                  <th>Student Name</th>
				  <th>School Code</th>
				  <th>Title</th>
                  <th>DOI</th>
                  <th>Year</th>
                  <th>Type</th>
                 
                </tr>
              </thead>
              <tbody>
             @foreach($readings as $reading)
                <tr class="gradeX">
                  <td>{{ $reading->student_name }}</td>
				  <td>{{ $reading->school_code }}</td>
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

  </div>
		  
</div>
<!--end-main-container-part--> 
@endsection