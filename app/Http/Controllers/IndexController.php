<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\Reading;
use App\Project;
use App\user;
use Session;
class IndexController extends Controller
{
    
    public function index(){
		$user_email = Session::get('userEmail');
		$countries = Country::get();
		//echo "<pre>"; print_r($countries); die;
		
		return view('index')->with(compact('countries','user_email'));
		 
    }
	public function project(){
		
		$user_email = Session::get('userEmail');
		$studentdetails=User::where(['email'=>$user_email])->get();
		
		$project = Project::where(['email'=>$user_email])->get();
    	return view('project')->with(compact('project','studentdetails'));
		 
    }
	public function reading(){
		$user_email = Session::get('userEmail');
		$studentdetails=User::where(['email'=>$user_email])->get();
		//echo "<pre>"; print_r($studentdetails); die;
		
		$readings = Reading::where(['email'=>$user_email])->get();
		return view('reading')->with(compact('readings','studentdetails'));
		 
    }
}
