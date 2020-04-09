@extends('Admin.sidebar')
@section('content')

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h4 class="page-title">Add Course</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <form method="POST" action="{{ url('course') }}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Course Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                           
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Course Descrription <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="desc">
                            </div>
                        </div>

                        <div class="col-sm-6">
                           
                        </div>
                       
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Department</label>
                                <div class="">
                                    <input type="text" class="form-control" name="department">
                                </div>
                            </div>
                        </div>
                       
                        
                        
                        

                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="form-group">
                                <label>Status</label>
                                
                                <select class="form-control" name="status">
                                  
                                    <option value="Active">Active</option>
                                    <option value="Deactive">Deactive</option>
                                   
                                </select>
                                
                               
                            </div>
                        </div>
                        
                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary submit-btn">Create Course</button>
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