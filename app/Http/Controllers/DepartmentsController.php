<?php

namespace App\Http\Controllers;

use Validator;
use App\Department;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    public function index() 
    {
    	$departments = Department::get();

    	return view('departments.index', array(
    		'departments' => $departments,
    	));
    }

    public function create() 
    {
    	return view('departments.create');
    }

    public function store(Request $request) 
    {
    	$validator = Validator::make($request->all(), [
            'name' => 'required|unique:departments',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $department = new Department;
        $department->name = $request->name;
        $department->description = $request->description;
        $department->save();

        return redirect()->route('departments.index');
    }

    public function edit($deptId, Request $request) 
    {
        $department = Department::find($deptId);

    	return view('departments.edit')->with('department', $department);
    }

    public function update($deptId, Request $request) 
    {
        $dept = Department::find($deptId);
        
    	$validator = Validator::make($request->all(), [
            'name' => 'required|unique:departments,name,'.$dept->name,
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $dept->name = $request->name;
        $dept->description = $request->description;
        $dept->save();

        return redirect()->route('departments.index');
    }

    public function destroy($deptId) 
    {
        $dept = Department::find($deptId);
    	$dept->delete();

    	return redirect()->back();
    }
}
