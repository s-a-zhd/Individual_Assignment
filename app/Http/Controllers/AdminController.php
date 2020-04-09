<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class AdminController extends Controller
{
    public function index (Request $req){
        return view ('Admin.dashboard');
    }
    public function registration(Request $req){
        return view('Admin.registration');
    }

    public function user_reg (Request $req){
        $validatedData = $req->validate([
            'name' => 'required',
            'email' => 'required|unique:registration',
            'password' => 'required',
            'gender' => 'required',
            'address'=> 'required',
            'phone' => 'required',
            'role' => 'required',
            ]);

            $data=array();
            $data['name']=$req->name;
            $data['email']=$req->email;
            $data['password']=$req->password;
            $data['gender']=$req->gender;
            $data['address']=$req->address;
            $data['phone']=$req->phone;
            $data['role']=$req->role;
            
            $user=DB::table('registration')->insert($data);
           
            if($user){
                return Redirect()->back();
            }

            else{
                echo "Operation failed";
            }
    }

    public function userlist (Request $request){
        $list=DB::table('registration')->get();
    	return view('Admin.userlist',compact('list'));

    }

    public function deleteUser ($id){
        
        $user=DB::table('registration')->where('id',$id)->delete();
       
        return redirect()->route('userlist');
        

    //   $user=DB::table('registration')->where('id',$id)->first();
    //   return view('Admin.deleteUser',compact('user'));
    }

    public function userUpdate($id){
        $user=DB::table('registration')->where('id',$id)->first();
        return view('Admin.editUser',compact('user'));
    }

    public function userEdit (Request $req,$id){

        $validatedData = $req->validate([
            'name' => 'required',
           // 'email' => 'unique:registration',
            
            'gender' => 'required',
            'address'=> 'required',
            'phone' => 'required',
            'role' => 'required',
            ]);

            $data=array();
            $data['name']=$req->name;
            $data['email']=$req->email;
           
            $data['gender']=$req->gender;
            $data['address']=$req->address;
            $data['phone']=$req->phone;
            $data['role']=$req->role;

            $user=DB::table('registration')->where('id',$id)->update($data);

            if($user){
                return redirect()->route('userlist');
            }

       
    }

}
