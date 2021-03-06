@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Schools</a> <a href="#" class="current">Edit School</a> </div>
    <h1>Edit School</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Edit School</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{url('/admin/edit-school/'.$schooldetails->id)}}" name="edit_school" id="edit_sechool" novalidate="novalidate">{{csrf_field()}}
              <div class="control-group">
                <label class="control-label">School Name</label>
                <div class="controls">
                  <input type="text" name="name" id="name" value="{{$schooldetails->name}}">
                </div>
              </div> 
			  <div class="control-group">
                <label class="control-label">Unique code</label>
                <div class="controls">
                  <input type="text" name="code" id="code" value="{{$schooldetails->code}}">
                </div>
              </div>
			  <div class="control-group">
                <label class="control-label">School Address</label>
                <div class="controls">
                  <input type="text" name="address" id="address" value="{{$schooldetails->address}}">
                </div>
              </div>
			  
			  <div class="control-group">
                <label class="control-label">Enable</label>
                <div class="controls">
                  <input type="checkbox" name="status" id="status" @if($schooldetails->status=="1") checked @endif value="1">
                </div>
              </div>
			  
              <div class="form-actions">
                <input type="submit" value="Edit Category" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

@endsection