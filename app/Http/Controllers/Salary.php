<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class Salary extends Controller
{
    public function index (Request $request){
        
        $list=DB::table('salary')->get();
    	return view('Admin.salary',compact('list'));

}

public function add_salary (Request $request){
        
   
    return view('Admin.add_salary');

}

public function insert_salary (Request $req){
        
    $validatedData = $req->validate([
        'name' => 'required',
        'email' => 'required',
        'salary' => 'required',
        
        ]);

        $data=array();
        $data['name']=$req->name;
        $data['email']=$req->email;
        $data['salary']=$req->salary;
        $user=DB::table('salary')->insert($data);
           
           
        if($user){
            $notification=array(
                'messege'=>'Successfully Inserted ',
                'alert-type'=>'success'
                 );
    
            
            return redirect()->back()->with($notification);
        }

        else{
            echo "Operation failed";
        }

    return redirect()->route('salary');

}

}
