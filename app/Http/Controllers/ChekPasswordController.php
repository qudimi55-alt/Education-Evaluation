<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ChekPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        alert()->question('Title','Lorem Lorem Lorem');



                return view('index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $var=Student::findorfail($id);
            // return view('chekpassword_student',compact('var'));
        } catch (\Throwable $th) {
            $th;
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       try {
        $student = Student::findorfail($id);
        $student->update([
            'student_password' => $request->student_password,
        ]);
        Alert::success('تم التعديل ', 'قم بتسجيل الدخول مجدداً');
        return view('login');
       } catch (\Throwable $th) {
        throw $th;
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
