<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Department;
use App\Models\Employee;
use App\Models\EmployeeRelation;

class AdminCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['companies'] = Company::all();
        // dd($data['companies']);
        return view('Admin.company.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['departments'] = Department::pluck('name','id');  
        return view('Admin.company.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'location' => 'required',
            'contact' => 'required'
        ]);
        $company = new Company;
        $company->name = $request->name;
        $company->location = $request->location;
        $company->contact = $request->contact;
        $company->department_ids = json_encode($request->department_ids);
        $company->save();

        return redirect()->route('company.index');
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
    # Return the Department list as per company id on api.
    public function showDepartment($id)
    {
        $items = EmployeeRelation::where('id' , '=', $id)->pluck('department_ids');
        if(count($items) > 0){
            if(count(json_decode($items[0])) > 1){
                foreach (json_decode( $items[0]) as $dept_id) {
                        $departments[] = [$dept_id => Department::where('id','=',$dept_id)->first()->name];
                    }
            }else{
                $departments =[ json_decode($items[0])[0] => Department::where('id','=',json_decode($items[0]))->first()->name];
            }
            return json_encode($departments);
           
        }else{
            return json_encode('No Data found');
        }        
    }
    # Return the Employee list as per company id on api.
    public function showEmployee($id)
    {
        $items = EmployeeRelation::where('company_id' , '=', $id)->pluck('employee_ids');
        if(count($items) > 0){
            if(count(json_decode($items[0])) > 1){
                foreach (json_decode( $items[0]) as $dept_id) {
                        $departments[] = [$dept_id => Employee::where('id','=',$dept_id)->first()->name];
                    }
            }else{
                $departments =[ json_decode($items[0])[0] => Employee::where('id','=',json_decode($items[0]))->first()->name];
            }
            return json_encode($departments);
           
        }else{
            return json_encode('No Data found');
        }        
    }

    # Return the Employee list as per company id on api.
    public function showEmployeeAsPerDepartment($id)
    {
        $items = Employee::where('department' , '=', $id)->get();
        // dd(count($items));
        if(count($items) > 0){
           
                foreach ($items as $item) {
                        $employee[] = $item;
                    }
            return json_encode($employee);
           
        }else{
            return json_encode('No Data found');
        }        
    }

    # Return the Employee Details as per company & Department id on api.
    public function showEmployeeDetails(Request $request)
    {
        $items = EmployeeRelation::where('company_id' , '=', $request->com_id)->whereRaw('json_contains(department_ids, \'["' . $request->dep_id . '"]\')')->pluck('employee_ids');;
        if(count($items) > 0){
            if(count(json_decode($items[0])) > 1){
                foreach (json_decode( $items[0]) as $dept_id) {
                        $employee[] = [Employee::where('department','=',$dept_id)->first()];
                    }
            }else{
                $employee =[ json_decode($items[0])[0] => Employee::where('department','=',json_decode($items[0]))->first()];
            }
            return json_encode($employee);
           
        }else{
            return json_encode('No Data found');
        }        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
