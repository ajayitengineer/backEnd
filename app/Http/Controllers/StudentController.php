<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    public function store(Request $request){
        
        $validatedData = $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required',
        'age' => 'required',
        'password' => 'required',
        'city' => 'required',
        'state' => 'required',
        'zip' => 'required',
        'country' => 'required',
        'pocket_money' => 'required'
    ]);
        
    	$student = new Student();
    	$student->first_name = $request->first_name;
    	$student->last_name = $request->last_name;
    	$student->email = $request->email;
    	$student->password = bcrypt($request->password);
    	$student->age = $request->age;
    	$student->city = $request->city;
    	$student->state = $request->state;
    	$student->zip_code = $request->zip;
    	$student->country = $request->country;
    	$student->pocket_money = $request->pocket_money;

    	if($student->save()){
    		return response()->json([
    		'message' => 'added successfully' 
    	]);
    	}else {
    		return response()->json([
              'message' => 'Internal server error'
    		]);
    	}
    	
    }

    public function list(){
        
        $students = Student::get(['first_name','id','last_name','email','pocket_money','city','state','country','age','zip_code']);
    	return response()->json([
    		'payload' => $students,
    		'message' => 'student list successfully fetched'
    	]);
    }

    public function secondLargest(){
        
        $students = Student::get();
        if(count($students) > 1){
    	$student = Student::OrderBy('pocket_money','desc')->offset(1)->limit(1)->get();

    	return response()->json([
    		'payload' => $student,
    		'message' => 'Student fetched successfully'
    	]);
    }else {
        return response()->json([
            'payload' => $students,
            'message' => 'Student fetched successfully'
        ]);
    }
    }
}
