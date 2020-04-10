<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list=DB::table('course')->get();
    	return view('allcourse',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addcourse');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $validatedData = $req->validate([
            'name' => 'required',
            'desc' => 'required',
            'department' => 'required',
            'status' => 'required',
            
            ]);

            $data=array();
            $data['c_name']=$req->name;
            $data['c_description']=$req->desc;
            $data['c_dept']=$req->department;
            $data['status']=$req->status;
            
            
            $course=DB::table('course')->insert($data);
            $notification=array(
                'messege'=>'Successfully Course Inserted',
                'alert-type'=>'success'
                 );
           
            if($course){
                return redirect('/course')->with($notification);
            }

            else{
                echo "Operation failed";
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course=DB::table('course')->where('id',$id)->first();
        return view('editcourse',compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $validatedData = $req->validate([
            'name' => 'required',
            'desc' => 'required',
            'department' => 'required',
            'status' => 'required',
            
            ]);

            $data=array();
            $data['c_name']=$req->name;
            $data['c_description']=$req->desc;
            $data['c_dept']=$req->department;
            $data['status']=$req->status;

            $course=DB::table('course')->where('id',$id)->update($data);
            $notification=array(
                'messege'=>'Successfully Course Updated',
                'alert-type'=>'success'
                 );

            if($course){
                return redirect('/course')->with($notification);
            }

            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course=DB::table('course')->where('id',$id)->delete();
       
        return view('allcourse');
    }
}
