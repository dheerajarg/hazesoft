@extends('layouts.app')

@section('content')

<div class="container">
    @role('admin')
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center mt-5">Create Employee</h1>
                <hr>
                <div class="container justify-content-center mt-2 mb-5">

                    {!! Form::open(['route'=>'employee.store','method'=>'POST','class'=>'form-horizontal','role'=>'form']) !!}
                        @csrf
            
                        <div class="form-group m-2 p-2">
                            <label for="employee_title">Name</label>
                            <input class="form-control" type="text" name="name" placeholder="Employee Title" required>
                        </div>

                        <div class="form-group m-2 p-2">
                            <label for="employee_number">Employee Number</label>
                            <input class="form-control" type="text" name="employee_number" placeholder="Employee Number">
                        </div>

                        <div class="form-group m-2 p-2">
                            <label for="employee_email">Email</label>
                            <input class="form-control" type="text" name="email" placeholder="Employee Email" required>
                        </div>
            
                        <div class="form-group m-2 p-2">
                            <label for="employee_contact">Contact Number</label>
                            {!! Form::number('contact', $value = null, ['id'=>'contact', 'placeholder'=>'Enter contact','class'=>'form-control']) !!}
                        </div>

                        <div class="form-group m-2 p-2">
                            <label for="">Select Department</label>
                            {!! Form::select('department',$departments, $value = null, ['id'=>'type','placeholder'=>'Select Option','class'=>'form-control selectOption', ]) !!}
                        </div>
                        <button class="btn btn-success" type="submit" value="submit">Add Employee</button>
            
                    {!! Form::close() !!}
            
                </div>
            </div>
        </div>
    @else
        <p class="text-center">
            You don't have permission to add or view companies.
        </p>
    @endrole
</div>
    
@endsection