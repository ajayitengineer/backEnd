<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Http\Repositories\StudentRepository;

class StudentController extends Controller
{
    protected $model;

    public function __construct(Student $student)
    {
       $this->model = new StudentRepository($student);
    }


    public function store(Request $request){
        
        $validatedData = $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required',
        'age' => 'required',
        'password' => 'required',
        'city' => 'required',
        'state' => 'required',
        'zip_code' => 'required',
        'country' => 'required',
        'pocket_money' => 'required'
    ]);
        
        $save = $this->model->create($request->only($this->model->getModel()->fillable));
    	if($save){
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
        
        $students = $this->model->list();
    	return response()->json([
    		'payload' => $students,
    		'message' => 'student list successfully fetched'
    	]);
    }

    public function secondLargest(){
        
       $allStudents = $this->model->secondLargest();
       return response()->json([
            'payload' => $allStudents,
            'message' => 'Student fetched successfully'
        ]);
    }
}
