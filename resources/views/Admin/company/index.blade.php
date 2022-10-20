@extends('layouts.app')

@section('content')
@role('admin')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center mt-5">Company List</h1>
            <button class="btn btn-primary"><a class="add-btn" href="{{ route('company.create') }}"> Add Company </a></button>
            <div class="container justify-content-center mt-2 mb-5">

                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Company Name</th>
                        <th scope="col">Location</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Department</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($companies) > 0)
                            @foreach($companies as $key => $company)
                            @php                                
                                if(!empty($company->department_ids) && count(json_decode($company->department_ids)) > 1){
                                    foreach (json_decode($company->department_ids) as $dept_id) {
                                        $departments[] = App\Models\Department::where('id','=',$dept_id)->first()->name;
                                    }
                                    $departments = implode(', ', $departments);
                                }else if(empty($company->department_ids  && count(json_decode($company->department_ids)) == 1)){
                                    $departments = '';                                    
                                }else{
                                    $departments = App\Models\Department::where('id','=',json_decode($company->department_ids))->first()->name;
                                }     
                            @endphp
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->location }}</td>
                                <td>{{ $company->contact }}</td>
                                <td>{{  $departments ?? '' }}</td>
                            </tr>                 
                            @unset($departments)
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
                        <th scope="col">Company Name</th>
                        <th scope="col">Location</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Department</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($companies) > 0)
                        @foreach($companies as $key => $company)
                            @php                                
                                 if(!empty($company->department_ids) && count(json_decode($company->department_ids)) > 1){
                                    foreach (json_decode($company->department_ids) as $dept_id) {
                                        $departments[] = App\Models\Department::where('id','=',$dept_id)->first()->name;
                                    }
                                    $departments = implode(', ', $departments);
                                }else if(empty($company->department_ids  && count(json_decode($company->department_ids)) == 1)){
                                    $departments = '';                                    
                                }else{
                                    $departments = App\Models\Department::where('id','=',json_decode($company->department_ids))->first()->name;
                                }     
                            @endphp
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->location }}</td>
                            <td>{{ $company->contact }}</td>
                            <td>{{ $departments ?? '' }}</td>
                        </tr>             
                        @unset($departments)       
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