<!--sidebar-menu-->
<?php $url = url()->current(); ?>
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i>Dashboard</a>
  <ul>
    <li  <?php if (preg_match("/dashboard/i", $url)){ ?> class="active" <?php } ?> ><a href="{{url('/admin/dashboard')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
@if(Session::get('admin')=="SuperAdmin")
	<li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>School</span> <span class="label label-important">2</span></a>
		<ul <?php if (preg_match("/school/i", $url)){ ?> style="display: block;" <?php } ?>>
		  <li <?php if (preg_match("/add-schol/i", $url)){ ?> class="active" <?php } ?> ><a href="{{url('/admin/add-school')}}">Add school</a></li>
		  <li <?php if (preg_match("/view-schol/i", $url)){ ?> class="active" <?php } ?>><a href="{{url('/admin/view-school')}}">View School</a></li>
		</ul>
    </li>
	<li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>School-Admin</span> <span class="label label-important">2</span></a>
		<ul <?php if (preg_match("/schooladmin/i", $url)){ ?> style="display: block;" <?php } ?>>
		  <li <?php if (preg_match("/add-schooladmin/i", $url)){ ?> class="active" <?php } ?>><a href="{{url('/admin/add-schooladmin')}}">Add Admin</a></li>
		  <li <?php if (preg_match("/view-schooladmin/i", $url)){ ?> class="active" <?php } ?>><a href="{{url('/admin/view-schooladmin')}}">View Admins</a></li>

		</ul>
    </li>
@endif
	<li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Materials</span> <span class="label label-important">2</span></a>
		<ul <?php if (preg_match("/view/i", $url)){ ?> style="display: block;" <?php } ?>>
		  <li <?php if (preg_match("/view-project'/i", $url)){ ?> class="active" <?php } ?>><a href="{{url('/admin/view-projects')}}">Projects</a></li>
		  <li <?php if (preg_match("/view-readings/i", $url)){ ?> class="active" <?php } ?>><a href="{{url('/admin/view-readings')}}">Readings</a></li>

		</ul>
    </li> 

	<li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>students</span> <span class="label label-important">1</span></a>
      <ul <?php if (preg_match("/students/i", $url)){ ?> style="display: block;" <?php } ?>>
        <li <?php if (preg_match("/view-students/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/view-students')}}">View Students</a></li>
      </ul>
    </li>	



    <li class="content"> <span>Monthly Bandwidth Transfer</span>
      <div class="progress progress-mini progress-danger active progress-striped">
        <div style="width: 77%;" class="bar"></div>
      </div>
      <span class="percent">77%</span>
      <div class="stat">21419.94 / 14000 MB</div>
    </li>
    <li class="content"> <span>Disk Space Usage</span>
      <div class="progress progress-mini active progress-striped">
        <div style="width: 87%;" class="bar"></div>
      </div>
      <span class="percent">87%</span>
      <div class="stat">604.44 / 4000 MB</div>
    </li>
  </ul>
</div>
<!--sidebar-menu-->