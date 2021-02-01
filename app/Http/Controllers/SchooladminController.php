<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SchoolAdmin;
use App\School;

class SchooladminController extends Controller
{
    //
	public function addAdmin(Request $request){
		$schools = School::get();
		if($request->isMethod('post')){
			$data = $request->input();
			//echo "<pre>"; print_r($data); die;
			 if(empty($data['status'])){
				$status ='0';
			
			}else{
				$status = '1';
			}
			$schooladmin = new SchoolAdmin;
			$schooladmin->admin_name= $data['admin_name'];
			$schooladmin->school_code = $data['school_code'];
			$schooladmin->password = $data['password'];
			$schooladmin->status = $status ;
			$schooladmin->save();
			
			return redirect('/admin/view-schooladmin')->with('flash_message_success','Admin Added successfully'); 
		}
		return view('admin.schooladmins.add_schooladmin')->with(compact('schools')); ;
	 }
	 
	 public function viewAdmin(){
		$schooladmin = SchoolAdmin::get();	
		return view('admin.schooladmins.view_schooladmin')->with(compact('schooladmin'));
    }
	
	public function editAdmin(Request $request,$id= null){
			
		if($request->isMethod('post')){
			$data = $request->all();
			//echo "<pre>"; print_r($data); die;
				 if(empty($data['status'])){
				$status =0;
			
			}else{
				$status = 1;
			}
			SchoolAdmin::where(['id'=>$id])->update(['admin_name'=>$data['name'],'school_code'=>$data['code'],'status'=>$status]);			
			return redirect('/admin/view-schooladmin')->with('flash_message_success','Admin Updated successfully');  
			
		}
		$admindetails = SchoolAdmin::where(['id'=>$id])->first();
		
		return view('admin.schooladmins.edit_schooladmin')->with(compact('admindetails'));	  
    }
	
	public function deleteAdmin($id= null){
				
		SchoolAdmin::where(['id'=>$id])->delete();
		return redirect()->back()->with('flash_message_success','School delete Successfully'); 	  
	}	
	 
	 
}
