<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Specialty;
use App\Models\Student;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use function Pest\Laravel\json;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spec = Specialty::all();
        $level = Level::all();
        $student = Student::all();
        // if(request()->ajax()) {
        //     return datatables()->of(Student::select('*'))
        //     ->addColumn('action', 'student-action')
        //     ->rawColumns(['action'])
        //     ->addIndexColumn()
        //     ->make(true);
        // }
        // return view('blogs');
        return view('students.form_student', compact('student', 'spec', 'level'));
    }

    public function indexx()
    {

        // if(request()->ajax()) {
        //         return datatables()->of(Student::select('*'))
        //         ->addColumn('action', 'student-action')
        //         ->rawColumns(['action'])
        //         ->addIndexColumn()
        //         ->make(true);
        //     }
        //     return view('students.form_student');
        $students = Student::all();
        $data = array();
        // foreach($students->toArray() as $s){
        // $data=[
        //     {}
        // ];}
        //  return  redirect()->json_encode($data);
        return response()->json($students);
    }


    public function remove(Request $request)
    {
        $id = $request->input('id');

        try {
            $student = Student::find($id);

            if (!$student) {
                return response()->json(['message' => 'Student not found'], 404);
            }

            $student->delete();

            return response()->json(1); // Return success message
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred'], 500);
        }
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $s = Specialty::find($request->specialty_id);
        $l = Level::find($request->level_id);
        Student::create([
            'student_number' => $request->student_number,
            'student_name' => $request->student_name,
            'student_phone' => $request->student_phone,
            'student_password' => $request->student_password,
            'specialty_id' => $s->id,
            'level_id' => $l->id
        ]);
        // $student_id = $request->id;

        // $student   =   Student::updateOrCreate(
        // 	        [
        // 	            'id' => $student_id
        // 	        ],
        //             [
        //                 'student_number'=>$request->student_number,
        //                 'student_name'=>$request->student_name,
        //                 'student_phone'=>$request->student_phone,
        //                 'student_password'=>$request->student_password,
        //                 'specialty_id'=>$s->id,
        //                 'level_id'=>$l->id
        //             ]);

        // return Response()->json($student);
        Alert::success('تم الحفظ ', '');
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $spec = Specialty::all();
        $level = Level::all();
        $student = Student::findorfail($id);
        // $where = array('id' => $request->id);
        // $student  = Student::where($where)->first();

        // return Response()->json($student);
        return view(
            'students.student_edit',
            compact('student', 'spec', 'level')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $s = Specialty::find($request->specialty_id);
        $l = Level::find($request->level_id);
        $student = Student::findorfail($id);
        $student->update([
            'student_number' => $request->student_number,
            'student_name' => $request->student_name,
            'student_phone' => $request->student_phone,
            'student_password' => $request->student_password,
            'specialty_id' => $s->id,
            'level_id' => $l->id
        ]);
        Alert::success('تم التعديل ', '');
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Student::destroy($id);
        Alert::success('تم الحذف  ', '');
        return redirect()->route('students.index');

        
        // $student = Student::where('id',$request->id)->delete();

        // return Response()->json($student);
    }
}
