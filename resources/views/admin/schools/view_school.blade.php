@extends('layouts.adminLayout.admin_design')
@section('content')


<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Schools</a> <a href="#" class="current">View Schools</a> </div>
    <h1>Schools</h1> 
    
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
            <h4>View Schools</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>School name</th>
                  <th>Unique Code</th>
				  <th>School Address</th>
                  <th>School Statue</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
			  @foreach($school as $school)
                <tr class="gradeX">
                  <td>{{$school->name}}</td>
                  <td>{{$school->code}}</td>
				  <td>{{$school->address}}</td>
                  <td>@if($school->status=1)Active @else Inactive @endif</td>
                  <td class="center"><a href="{{url('/admin/edit-school/'.$school->id)}}" class="btn btn-primary btn-mini">Edit</a> <a id = "delcat" href="{{url('/admin/delete-school/'.$school->id)}}" class="btn btn-danger btn-mini">Delete</a></div></td>
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