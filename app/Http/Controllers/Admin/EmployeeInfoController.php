<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmployeeInfo;
use App\Models\EducationalQualification;
use Illuminate\Http\Request;

class EmployeeInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $items = EmployeeInfo::with('education')->get();
       return $items;
        return view("admin.employeeinfo.index",compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view("admin.employeeinfo.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // return $request->all();
        $allData = new EmployeeInfo();
        $allData->employee_name = $request->employee_name;
        $allData->employee_email = $request->employee_email;
        $allData->employee_mobile_no = $request->employee_mobile_no;
        $allData->gender = $request->gender;
        $allData->save();
        $id = $allData->id;
        foreach ($request->educational_qualification as $key => $value) {
           $educationalData = new EducationalQualification();
           $educationalData->educational_qualification = $request->educational_qualification[$key];
           $educationalData->employee_id  = $id;
           $educationalData->save();
        }
        return redirect()->route('admin.employeeinfo.index')->with('success','Employee created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeeInfo  $employeeInfo
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeInfo $employeeInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeeInfo  $employeeInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeInfo $employeeInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmployeeInfo  $employeeInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeeInfo $employeeInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeInfo  $employeeInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeInfo $employeeInfo)
    {
        //
    }
}