<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|integer|max:11',
            'nationality' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'Course' => 'required|string|max:255',
            'Section' => 'required|string|max:255',
            'email' => 'required|email|unique:students',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:male,female,other'
        ]);

        Student::create($validated);

        return redirect()->route('dashboard')
            ->with('success', 'Student added successfully!');
    }

    public function getStudent(Request $request){

        Student::insert([
            'student_id'=> $request['student_id'],
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'Course' => $request['Course'],
            'Section' => $request['Section'],
            'nationality' => $request['nationality'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'address' => $request['address'],
            'date_of_birth' => $request['date_of_birth'],
            'gender' => $request['gender']
        ]);

        return redirect(route('dashboard'));
    }

    public function showStudent(){
        $students = Student::paginate(10);
        return view('students.index', compact('students'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'student_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'status' => 'required'
        ]);

        $student->update($validated);

        return redirect()->route('students.index')
            ->with('success', 'Student updated successfully');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Student deleted successfully');
    }
}

