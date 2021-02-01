<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\PersonalInfo;
use App\Reading;
use App\Country;
use App\User;
use App\Project;
use App\Student;
use Session;
use App\SchoolAdmin;
use Auth;

class InfoController extends Controller
{
    public function addInformation(Request $request){
    	if($request->isMethod('post')){
			$countries = Country::get();
    		$data = $request->all();
			//echo "<pre>"; print_r($data); die;
			$user_email = Session::get('userEmail');
			//PersonalInfo::where('email'=>$user_email);
			User::where(['email'=>$user_email])->update(['name'=>$data['name'],'gender'=>$data['gender'],'address'=>$data['address'],'country'=> $data['type'],'doe'=>$data['doe'],'phone'=>$data['phone']]);
    		
			return redirect()->back()->with('flash_message_success','Personal Info updated Successfully'); 	
    		
    	}


    	return view('index')->with(compact('countries','user_email'));
    }
	
	public function addReading(Request $request){
		
    	if($request->isMethod('post')){
    		$data = $request->all();
			//echo "<pre>"; print_r($data); die;
    		$user_email = Session::get('userEmail');
			//echo "<pre>"; print_r($user_email); die;
			$studentdetails=User::where(['email'=>$user_email])->get();
			//echo "<pre>"; print_r($studentdetails); die;
    		$reading = new Reading;
    		$reading->title = $data['title'];
            $reading->doe = $data['doe'];
    		$reading->year = $data['year'];
			$reading->type = $data['type'];
			$reading->student_name = $data['student_name'];
			$reading->school_code =$data['school_code'] ;
			$reading->email = $user_email;
    		
    		$reading->save(); 
			return redirect()->back()->with('flash_message_success','Reading added Successfully'); 	
    		
    	}
		$readings = Reading::get();

    	return view('reading')->with(compact('readings','studentdetails'));
    }
	
	public function addProject(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->all();
			//echo "<pre>"; print_r($data); die;
    		$user_email = Session::get('userEmail');
			$studentdetails=User::where(['email'=>$user_email])->get();
    		$project = new Project;
    		$project->title = $data['title'];
            $project->start_date = $data['start_date'];
    		$project->end_date = $data['end_date'];
			$project->status = $data['status'];
			$project->member = $data['member'];
			$project->filee = $data['file'];
			$project->email = $user_email ;
			$project->student_name = $data['student_name'];
			$project->school_code =$data['school_code'] ;

    		$project->save(); 
			return redirect()->back()->with('flash_message_success','Project added Successfully'); 	
    		
    	}
		$project = Project::get();

    	return view('project')->with(compact('project','studentdetails'));
    }
	
	 public function viewStudent(){
		 $user_email = Session::get('userEmail');
		 $admindetails=SchoolAdmin::where(['admin_name'=>$user_email])->first();
		 //echo "<pre>"; print_r($admindetails); die;
			$school_code= $admindetails->school_code;
			if($school_code=='SuperAdmin'){
				$studentCount = user::where(['status'=>0])->get();
				$activestudent = user::where(['status'=>1])->get();
				
			}else{
			//echo "<pre>"; print_r($school_code); die;
				$studentCount = user::where(['school_code'=>$school_code, 'status'=>0])->get();
				$activestudent = user::where(['school_code'=>$school_code, 'status'=>1])->get();
			}
		
		return view('admin.students.view_students')->with(compact('studentCount','activestudent'));
    }
	
	public function viewProject(){
		 $user_email = Session::get('userEmail');
		 $admindetails=SchoolAdmin::where(['admin_name'=>$user_email])->first();
		 //echo "<pre>"; print_r($admindetails); die;
			$school_code= $admindetails->school_code;
			if($school_code=='SuperAdmin'){
				$project = Project::get();
				
			}else{
			//echo "<pre>"; print_r($school_code); die;
				$project = Project::where(['school_code'=>$school_code])->get();
				//$activestudent = user::where(['school_code'=>$school_code, 'status'=>1])->get();
			}
		
		return view('admin.project')->with(compact('project'));
    }
	public function viewReading(){
		 $user_email = Session::get('userEmail');
		 $admindetails=SchoolAdmin::where(['admin_name'=>$user_email])->first();
		 //echo "<pre>"; print_r($admindetails); die;
			$school_code= $admindetails->school_code;
			if($school_code=='SuperAdmin'){
				$readings = Reading::get();
				
			}else{
			//echo "<pre>"; print_r($school_code); die;
				$readings = Reading::where(['school_code'=>$school_code])->get();
				//$activestudent = user::where(['school_code'=>$school_code, 'status'=>1])->get();
			}
		
		return view('admin.reading')->with(compact('readings'));
    }
	

	
	public function activestatus($id= null){
		User::where(['id'=>$id])->update(['status'=>1]);	
		return redirect('/admin/view-students')->with('flash_message_success','School Updated successfully'); 
		
    }
	
	
}
