@extends('layouts.app')

@section('content')

<div class="container">
    @role('admin')
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center mt-5">Create Department</h1>
                <hr>
                <div class="container justify-content-center mt-2 mb-5">

                    <form action="{{route('department.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
            
                        <div class="form-group m-2 p-2">
                            <label for="department_title">Department Name</label>
                            <input class="form-control" type="text" name="name" placeholder="Department Title" required>
                        </div>
            
                        <button class="btn btn-success" type="submit" value="submit">Add Department</button>
            
                    </form>
            
                </div>
            </div>
        </div>
    @else
        <p class="text-center">
            You don't have permission to add or view departments.
        </p>
    @endrole
</div>
    
@endsection