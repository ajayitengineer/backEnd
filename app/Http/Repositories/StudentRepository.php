<?php

namespace App\Http\Repositories;
use Illuminate\Database\Eloquent\Model;

class StudentRepository {

	protected $model;
	public function __construct(Model $model){

		$this->model = $model;
	}
    
    public function getModel()
    {
        return $this->model;
    }

    public function create(array $data){

    	return $this->model->create($data);
    }
	public function list(){
        
        $students = $this->model::get(['first_name','id','last_name','email','pocket_money','city','state','country','age','zip_code']);
    	
    	return $students;
    }

    public function secondLargest(){

    	 $students = $this->model::get();
        if(count($students) > 1){
    	$student = $this->model::OrderBy('pocket_money','desc')->offset(1)->limit(1)->get();
        $pocket_money = $student[0]->pocket_money;
        $allStudents = $this->model::where('pocket_money',$pocket_money)->get();
    	return $allStudents;
    	}else {
        return $students;
   		}
}
}