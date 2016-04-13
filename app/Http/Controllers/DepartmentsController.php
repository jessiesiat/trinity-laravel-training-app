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

    public function edit(Department $dept, Request $request) 
    {
    	return view('departments.edit')->with('dept', $dept);
    }

    public function update(Department $dept, Request $request) 
    {
    	$validator = Validator::make($request->all(), [
            'name' => 'required|unique:departments,name,'.$dept->name,
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $dept->name = $request->name;
        $dept->desription = $request->desription;
        $dept->save();

        return redirect()->route('departments.index');
    }

    public function destroy(Department $dept) 
    {
    	$dept->delete();

    	return redirect()->back();
    }
}
