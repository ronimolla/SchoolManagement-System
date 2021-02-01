@extends('layouts.adminLayout.admin_design')
@section('content')


<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">students</a> </div>
    <h1>Students</h1> 
    
  </div>
  <div class="container-fluid">
    <hr>
		@if($message = Session::get('flash_message_error'))
		<div class="alert alert-error alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button>	
			<strong>{{ $message }}</strong>
		</div>
		@endif
		@if($message = Session::get('flash_message_success'))
		<div class="alert alert-error alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button>	
			<strong>{{ $message }}</strong>
		</div>
		@endif
    <div class="row-fluid">
      <div class="span12">
 
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Inactive Students</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Student name</th>
				  <th>email</th>
                  <th>school Code</th>
                  <th>Statue</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
			  @foreach($studentCount as $student)
                <tr class="gradeX">
                  <td>{{$student->name}}</td>
				  <td>{{$student->email}}</td>
                  <td>{{$student->school_code}}</td>
                  <td>{{$student->status}}</td>
                  <td class="center"><a href="{{url('/active/'.$student->id)}}" class="btn btn-primary btn-mini">Active</a></div></td>
                </tr>
				@endforeach

              </tbody>
            </table>
          </div>
		   <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Active Students</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Student name</th>
				  <th>email</th>
                  <th>school Code</th>
                  <th>Statue</th>
                 
                </tr>
              </thead>
              <tbody>
			  @foreach($activestudent as $student)
                <tr class="gradeX">
                  <td>{{$student->name}}</td>
				  <td>{{$student->email}}</td>
                  <td>{{$student->school_code}}</td>
                  <td>{{$student->status}}</td>
                  
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

@endsection