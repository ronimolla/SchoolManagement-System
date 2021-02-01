<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\SchoolAdmin;
use App\SuperAdmin;
use Session;
class AdminController extends Controller
{
    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
			//echo print_r($data); die;
			$admincount=SchoolAdmin::where(['admin_name'=> $data['email'],'password' => $data['password']])->count(); 
			//$superadmincount=SuperAdmin::where(['email'=> $data['email'],'password' => $data['password']])->count(); 
			//$studentCount = Student::where(['name_id'=> $data['name'],'password'=>$data['password'],'status'=>1])->count(); 
             if ($admincount>0 ) {
                //echo "Success"; die;
                Session::put('adminSession',$data['email']);
				Session::put('userEmail',$data['email']);
                return redirect('/admin/dashboard');
            }else{
                //echo "failed"; die;
                return redirect('/admin')->with('flash_message_error','Invalid Username or Password');
            }
        }
        return view('admin.admin_login');
    }
	
	 public function dashboard(){
        $user_email = Session::get('userEmail');
		 $admindetails=SchoolAdmin::where(['admin_name'=>$user_email])->first();
		 $school_code= $admindetails->school_code;
		 Session::put('admin',$school_code);
		 //echo print_r($school_code); die;
        return view('admin.dashboard');
    }
	
	public function logout(){
		Session::flush();
		return redirect('/admin')->with('flash_message_success','Logout Successfully');
	}
	

}
