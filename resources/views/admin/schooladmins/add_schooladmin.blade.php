@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">School Admin</a> <a href="#" class="current">Add School-Admin</a> </div>
    <h1>Add School-Admin</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h4>Add School-Admin</h4>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{url('/admin/add-schooladmin')}}" name="add_school" id="add_school" novalidate="novalidate">{{csrf_field()}}
              <div class="control-group">
                <label class="control-label">School code</label>
                <div class="controls">
				<select name="school_code" id="school_code" >
								<option value="">Select School</option>
								@foreach($schools as $country)
									<option value="{{ $country->code }}">{{ $country->code }}</option>
								@endforeach
							</select>
                  
                </div>
              </div>
           
              <div class="control-group">
                <label class="control-label">Admin name</label>
                <div class="controls">
                  <input type="text" name="admin_name" id="admin_name">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Password</label>
                <div class="controls">
                  <input type="password" name="password" id="password">
                </div>
              </div>


			  
			  <div class="control-group">
                <label class="control-label">Enable</label>
                <div class="controls">
                  <input type="checkbox" name="status" id="status" value="1">
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Add_Admin" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

@endsection