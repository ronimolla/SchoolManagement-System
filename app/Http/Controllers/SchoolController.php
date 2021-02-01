<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;

class SchoolController extends Controller
{
    //
	 public function addSchool(Request $request){
		if($request->isMethod('post')){
			$data = $request->input();
			//echo "<pre>"; print_r($data); die;
			if(empty($data['status'])){
				$status ='0';
			
			}else{
				$status = '1';
			}
			$school = new School;
			$school->name = $data['name'];
			$school->code = $data['code'];
			$school->address = $data['address'];
			$school->status = $status ;
			$school->save();
			
			return redirect('/admin/view-school')->with('flash_message_success','School Updated successfully'); 
		}
		return view('admin.schools.add_school');
	 }
	 
	public function viewSchool(){
		$school = School::get();	
		return view('admin.schools.view_school')->with(compact('school'));
    }
	
	public function editSchool(Request $request,$id= null){
			
		if($request->isMethod('post')){
			$data = $request->all();
			//echo "<pre>"; print_r($data); die;
				if(empty($data['status'])){
				$status =0;
			
			}else{
				$status = 1;
			}
			School::where(['id'=>$id])->update(['name'=>$data['name'],'code'=>$data['code'],'address'=>$data['address'],'status'=>$status]);			
			return redirect('/admin/view-school')->with('flash_message_success','School Updated successfully'); 
			
		}
		$schooldetails = School::where(['id'=>$id])->first();
		
		return view('admin.schools.edit_school')->with(compact('schooldetails'));	  
    }
	
	public function deleteSchool($id= null){
				
		School::where(['id'=>$id])->delete();
		return redirect()->back()->with('flash_message_success','School delete Successfully'); 	  
	}
	
	
	
}
