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
      // return $items;
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
       $this->validate($request,[
        'employee_name'=> 'required',
        'employee_email'=> 'required|unique:employee_infos',
        'employee_mobile_no'=> 'required|unique:employee_infos',
        'gender'=> 'required',
     ]);
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
    public function edit( $employeeInfo)
    {
        $item = EmployeeInfo::with('education')->find($employeeInfo);
        // return $item;
        return view("admin.employeeinfo.edit",compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmployeeInfo  $employeeInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$employeeInfo)
    {
        $this->validate($request,[
        'employee_name'=> 'required',
        'employee_email'=> 'required|unique:employee_infos,employee_email,'.$employeeInfo,
        'employee_mobile_no'=> 'required|unique:employee_infos,employee_mobile_no,'.$employeeInfo,
        'gender'=> 'required',
     ]);
        $allData =  EmployeeInfo::find($employeeInfo);
        $allData->employee_name = $request->employee_name;
        $allData->employee_email = $request->employee_email;
        $allData->employee_mobile_no = $request->employee_mobile_no;
        $allData->gender = $request->gender;
        $allData->save();
        $id = $allData->id;
        foreach ($request->educational_qualification as $key => $value) {
           $educationalData =  EducationalQualification::find($request->employee_id[$key]);
           $educationalData->educational_qualification = $request->educational_qualification[$key];
           $educationalData->employee_id  = $id;
           $educationalData->save();
        }
        return redirect()->route('admin.employeeinfo.index')->with('info','Employee updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeInfo  $employeeInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy( $employeeInfo)
    {
        $data = EmployeeInfo::find($employeeInfo);
        $data->delete();
        return redirect()->route('admin.employeeinfo.index')->with('warning','EmployeeInfo Deleted successfully.');
    }
}

