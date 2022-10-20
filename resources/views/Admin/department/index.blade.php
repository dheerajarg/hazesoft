@extends('layouts.app')

@section('content')
@role('admin')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center mt-5">Department List</h1>
            <button class="btn btn-primary"><a class="add-btn" href="{{ route('department.create') }}"> Add Department </a></button>
            <div class="container justify-content-center mt-2 mb-5">

                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Name</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($departments) > 0)
                            @foreach($departments as $key => $department)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $department->name }}</td>
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
        <h1 class="text-center mt-5">Department List</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Name</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($departments) > 0)
                        @foreach($departments as $key => $department)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $department->name }}</td>
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