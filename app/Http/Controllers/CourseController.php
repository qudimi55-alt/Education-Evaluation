<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Answer;
use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Specialty;
use Illuminate\Http\Request;
use App\Models\Evaluation_list;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\LinesOfCode\Counter;
use RealRashid\SweetAlert\Facades\Alert;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $level=Level::all();
        $spec=Specialty::all();
        $teacher=Teacher::all();
        $course=Course::all();
       return view('courses.form_courses',compact(
        'course','level','spec','teacher'));
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
        $s=Specialty::find($request->specialty_id);
        $l=Level::find($request->level_id);
        $t=Teacher::find($request->teacher_id);
      Course::create([
        'course_name'=>$request->course_name,
        'year_teach'=>$request->year_teach,
        'specialty_id'=>$s->id,
        'level_id'=>$l->id,
        'teacher_id'=>$t->id
      ]);
      Alert::success('تم الحفظ ', '');

      return redirect()->route('courses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($course_id,$student_id)
    {
        $cou=Course::findorfail($course_id);

        $student=Student::findorfail($student_id);
        // $eval=Evaluation_list::findorfail($request->eval);
        $eval=Evaluation_list::all()->where('default','=','1')->first();
        $ans=Answer::all()->where('course_id','==',$cou->id)->where('evaluation_list_id','==',$eval->id)
        ->where('student_id','==',$student->id)->first();
        $category=DB::table('questions')->distinct()->join('categories','categories.id', '=', 'questions.category_id','inner')

        ->where('questions.evaluation_list_id', '=', $eval->id)
        ->where('questions.question_for','=','2')

->select('categories.*')->orderBy('id','asc')
->get()->toArray();
        return view('student_eval',compact('cou','student','eval','ans','category'));
        // return $cou;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $spec=Specialty::all();
        $level=Level::all();
        $teacher=Teacher::all();
        $course = Course::findorfail($course->id);
        return view('courses.course_edit',
        compact('spec','level','teacher','course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $level=Level::find($request->level_id);
        $spec=Specialty::find($request->Specialty_id);
        $teacher=Teacher::find($request->Teacher_id);
        $course=Course::findorfail($id);
        $course->update([
            'course_name'=>$request->course_name,
            'year_teach'=>$request->year_teach,
            'specialty_id'=>$request->specialty_id,
            'level_id'=>$request->level_id,
            'teacher_id'=>$request->teacher_id,
        ]);
        Alert::success('تم التعديل ', '');

        return redirect()->route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Course::destroy($id);
        Alert::warning('تم الحذف ', '');
        return redirect()->route('courses.index');
    }
}
