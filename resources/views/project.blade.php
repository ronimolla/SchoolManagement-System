
@extends('layouts.frontLayout.front_design')
@section('content')


<div id="content">
	<div id="content-header">
	  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Projects</a>  </div>
	  <h1>My Projects</h1>
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
            <h4>View Projects</h4>
          </div>
          <div class="widget-content nopadding">
		   <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Start date</th>
                  <th>End Date</th>
                  <th>Status</th>
                 
                </tr>
              </thead>
              <tbody>
             
                @foreach($project as $project)
                <tr class="gradeX">
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

    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h4>Add Projects</h4>
          </div>
          <div class="widget-content nopadding">
		  <form method="post" action="{{ url('/student/add-project') }}"class="form-horizontal"> {{ csrf_field() }}
		  
		  @foreach($studentdetails as $studentdetail)
				
					<input type="hidden" id="student_name" name="student_name" value="{{ $studentdetail->name }}">				
					 <input type="hidden" id="school_code" name="school_code" value="{{ $studentdetail->school_code }}">
				 
					@endforeach
				<div class="control-group">
				  <label class="control-label">Title :</label>
				  <div class="controls" style="width:280px;">
					<input type="text" id="title" name="title"class="span11" placeholder="First name" required />
				  </div>
				</div>
				
				<div class="control-group">
					<label class="control-label">Start Date</label>
					<div class="controls"  style="width:280px;">
						<input type="text"  class="span11" id="start_date" name="start_date" placeholder="Enter Password" required />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">End Date</label>
					<div class="controls"  style="width:280px;">
						<input type="text"  class="span11" id="end_date" name="end_date" placeholder="Enter Password" required />
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">Statuse:</label>
					<div class="controls">
					  <select name="status" id="status" style="width: 220px;">
						<option value="Completed">Completed</option>
						<option value="In Progress">In Progress</option>
					  </select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">file:</label>
					<div class="controls" style="width:280px;">
						<div id="uniform-undefined"><input name="file" id="file" type="file" required ></div>
					</div>
				</div>
				<div class="control-group">
				  <label class="control-label">Members:</label>
				  <div class="controls" style="width:280px;">
					<input type="text" id="member" name="member" class="span11" required />
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