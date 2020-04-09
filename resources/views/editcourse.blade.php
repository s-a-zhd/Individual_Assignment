@extends('Admin.sidebar')
@section('content')

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h4 class="page-title">Edit Course</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <form method="POST" action="{{ route('course.update',$course->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Course Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="name" value="{{ $course->c_name }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                           
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Course Descrription <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="desc" value="{{ $course->c_description }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                           
                        </div>
                       
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Department</label>
                                <div class="">
                                    <input type="text" class="form-control" name="department" value="{{ $course->c_dept }}">
                                </div>
                            </div>
                        </div>
                       
                        
                        
                        

                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="form-group">
                                <label>Status</label>
                                
                                <select class="form-control" name="status" value="{{ $course->status }}">
                                  
                                    <option value="Active">Active</option>
                                    <option value="Deactive">Deactive</option>
                                   
                                </select>
                                
                               
                            </div>
                        </div>
                        
                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary submit-btn" id="update">Update Course</button>
                        </div>
                   
                    </div>
                   
           
                    
                </form>

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
             @endif
            </div>
        </div>
    </div>
   
</div>
    
@endsection