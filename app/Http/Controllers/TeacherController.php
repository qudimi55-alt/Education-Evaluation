<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacher=Teacher::all();
        return view('teachers.form_techer',compact('teacher'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Teacher::create([
            'teacher_name'=>$request->teacher_name,
            'teacher_number'=>$request->teacher_number,
            'teacher_phone'=>$request->teacher_phone,
            'teacher_password'=>$request->teacher_password
        ]);
        return redirect()->route('teachers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $teacher=Teacher::findorfail($id);
        return view('teachers.teacher_edit',compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $teacher=Teacher::findorfail($id);
        $teacher->update([
            'teacher_name'=>$request->teacher_name,
            'teacher_number'=>$request->teacher_number,
            'teacher_phone'=>$request->teacher_phone,
            'teacher_password'=>$request->teacher_password
        ]);
        return redirect()->route('teachers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Teacher::destroy($id);
        return redirect()->route('teachers.index');
    }
}
