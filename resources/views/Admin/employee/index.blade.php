@extends('layouts.app')

@section('content')
@role('admin')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center mt-5">Employee List</h1>
            <button class="btn btn-primary"><a class="add-btn" href="{{ route('employee.create') }}"> Add Employee </a></button>
            <div class="container justify-content-center mt-2 mb-5">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Employee Name</th>
                            <th scope="col">Employee Number</th>
                            <th scope="col">Email</th>
                            <th scope="col">Contact</th>
                            <th scope="col">Department</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($employees) > 0)
                            @foreach($employees as $key => $employee)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->employee_number }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->contact }}</td>
                                <td>{{ $employee->departmentName->name }}</td>
                            </tr>                    
                            @endforeach
                        @else
                            <tr>
                                <td>No Data Found!!</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@else
<div class="row justify-content-center">
    <div class="col-md-8">
        <h1 class="text-center mt-5">Company List</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Employee Name</th>
                        <th scope="col">Employee Number</th>
                        <th scope="col">Email</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Department</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($employees) > 0)
                        @foreach($employees as $key => $employee)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->employee_number }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->contact }}</td>
                            <td>{{ $employee->departmentName->name }}</td>
                        </tr>                    
                        @endforeach
                    @else
                        <tr>
                            <td>No Data Found!!</td>
                        </tr>
                    @endif
                </tbody>
            </table>

        </div>
    </div>
</div>
@endrole
<style>
    .add-btn{
        color: white;
    }
    .add-btn:hover{
        color: yellow;
    }
</style>
@endsection