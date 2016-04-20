<?php
namespace App\Http\Controllers;

use App\Student;
use App\Department;
use App\Http\Requests;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class StudentsController extends Controller
{
    public function index(Request $request) 
    {
    	$query = new Student;

        if ($request->has('name')) {
            $query = $query->where('name', 'like', '%'.$request->name.'%');
        }

        $query = [
            'name' => $request->name,
        ];

        $students = $query->paginate(10);

        return view('students.index', compact('students', 'query'));
    }

    public function create() 
    {
        $departments = Department::get();

    	return view('students.create', compact('departments'));
    }

    public function store(Request $request) 
    {
    	$this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'contact_no' => 'required',
            'department_id' => 'required',
            'email' => 'email',
        ]);

        $dept = Department::findOrFail($request->department_id);

        $student = new Student;
        $student->name = $request->name;
        $student->address = $request->address;
        $student->contact_no = $request->contact_no;
        $student->email = $request->email;
        $student->degree = $request->degree;
        $student->enrolled = $request->enrolled;
        $student->remarks = $request->remarks;

        $student->department()->associate($dept);

        $student->save();

        if ($request->hasFile('photo')) {
            $this->uploadPhoto($student, $request->file('photo'));
        }

        return redirect()->route('students.index')
                    ->withSuccess("Successfully created student");
    }

    public function edit(Student $student) 
    {
        $departments = Department::get();

    	return view('students.edit', compact('student', 'departments'));
    }

    public function update(Student $student, Request $request) 
    {
    	$this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'contact_no' => 'required',
            'email' => 'email',
            'department_id' => 'required',
        ]);

        $dept = Department::findOrFail($request->department_id);

        $student->name = $request->name;
        $student->address = $request->address;
        $student->contact_no = $request->contact_no;
        $student->email = $request->email;
        $student->degree = $request->degree;
        $student->enrolled = $request->enrolled;
        $student->remarks = $request->remarks;

        $student->department()->associate($dept);

        $student->save();

        if ($request->hasFile('photo')) {
            $this->uploadPhoto($student, $request->file('photo'));
        }

        return redirect()->back()
                    ->withSuccess("Successfully updated student details");
    }

    public function destroy(Student $student)
    {
        $name = $student->name;

    	$student->delete();

        return redirect()->route('students.index')
                    ->withSuccess("Successfully deleted student {$name}");
    }

    // upload image
    public function uploadPhoto(Student $student, UploadedFile $image) 
    {
        if ($image->isValid()) {
            $fileName = time().'.'.$image->getClientOriginalExtension();
            $path = 'uploads';
            $image->move($path, $fileName);
            $student->photo = $path.'/'.$fileName;
            $student->save();
        }
    }
}
