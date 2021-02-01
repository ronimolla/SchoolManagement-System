<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\SchoolAdmin;
use Session;
use App\School;

class UsersController extends Controller
{
    //
	public function userLoginRegister(){
		$countries = School::get();
        return view('login_register')->with(compact('countries'));   
    } 
	
	public function register(Request $request){
		if($request->isMethod('post')){
			 $data = $request->all();
			 //echo "<pre>"; print_r($data); die;
			 // Check if User already exists
			// Check if User already exists
			$usersCount = User::where('email',$data['email'])->count();
			 //echo $usersCount ; die;
			if($usersCount>0){
				return redirect()->back()->with('flash_message_error','Email already exists!');
			}
			else{
				$student = new User;
                $student->school_code = $data['school_code'];
				$student->email= $data['email'];
                $student->password = $data['password'];
                $student->save();
				return redirect()->back()->with('flash_message_success','succesfully register wait for the activation');
			}
			 
		}
		return redirect()->back();
	}
	
	public function login(Request $request){
		
		 if($request->isMethod('post')){
            $data = $request->input();
			
			//echo "<pre>"; print_r($data); die;
			$studentCount = User::where(['email'=> $data['email'],'password' => $data['password'],'status'=>1])->count(); 
			 
             if ($studentCount>0 )
				{
                //echo "Success"; die;
                Session::put('frontSession',$data['email']);
				Session::put('userEmail',$data['email']);
                return redirect('/index');
            }else{
               
                return redirect('/login-register')->with('flash_message_error','Invalid Username or Password or wationg for activate');
            }
        }
		
	}
	
	public function logout(){
		Session::flush();
		return redirect('/login-register')->with('flash_message_success','Logout Successfully');
	}
	
	
	
	
	
}
