
@extends('layouts.adminLayout.admin_design')
@section('content')


<div id="content">
	<div id="content-header">
	  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Projects</a>  </div>
	  <h1>Projects of Student</h1>
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
            <h4>View Projects</h4>
          </div>
          <div class="widget-content nopadding">
		   <table class="table table-bordered data-table">
              <thead>
                <tr>
				  <th>Studnt name</th>
				  <th>Email ID</th>
				  <th>School Code</th>
                  <th>Project Title</th>
                  <th>Start date</th>
                  <th>End Date</th>
                  <th>Status</th>
                 
                </tr>
              </thead>
              <tbody>
             
            
                @foreach($project as $project)
                <tr class="gradeX">
                  <td>{{ $project->student_name }}</td>
				  <td>{{ $project->email }}</td>
				  <td>{{ $project->school_code }}</td>
				  <td>{{ $project->title }}</td>
                  <td>{{ $project->start_date }}</td>
                  <td>{{ $project->end_date}}</td>
                  <td>{{ $project->status }}</td>
                 
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