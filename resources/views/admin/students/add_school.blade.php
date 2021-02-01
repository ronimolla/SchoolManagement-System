@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Schools</a> <a href="#" class="current">Add School</a> </div>
    <h1>Form Of add-School</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add School</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{url('/admin/add-school')}}" name="add_school" id="add_school" novalidate="novalidate">{{csrf_field()}}
              <div class="control-group">
                <label class="control-label">School Name</label>
                <div class="controls">
                  <input type="text" name="name" id="name">
                </div>
              </div>
           
              <div class="control-group">
                <label class="control-label">Unick Code</label>
                <div class="controls">
                  <input type="text" name="code" id="code">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Address</label>
                <div class="controls">
                  <input type="text" name="address" id="address">
                </div>
              </div>


			  
			  <div class="control-group">
                <label class="control-label">Enable</label>
                <div class="controls">
                  <input type="checkbox" name="status" id="status" value="1">
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Add_School" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

@endsection