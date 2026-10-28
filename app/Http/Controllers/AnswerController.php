<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Course;
use App\Models\Category;
use App\Models\Question;
use GuzzleHttp\Psr7\Query;
use Illuminate\Http\Request;
use App\Models\Evaluation_list;
use App\Models\Restriction;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\select;
use Illuminate\Database\Query\JoinClause;
use phpDocumentor\Reflection\PseudoTypes\IntegerValue;
use Ramsey\Uuid\Type\Integer;
use RealRashid\SweetAlert\Facades\Alert;


class AnswerController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $student=Student::findorfail($request->student_id);
        $cou=Course::findorfail($request->course_id);
        $eval=Evaluation_list::findorfail($request->evaluation_list_id);
        $res=Restriction::all()->where('evaluation_list_id','=',$eval->id)
        ->where('course_id','=',$cou->id)->first();

//         $question=Question::all()->where('evaluation_list_id','==',$eval->id)
//         ->where('question_for','==','2');

//         $ans=Answer::all()->where('course_id','==',$cou->id)->where('evaluation_list_id','==',$eval->id)
//         ->where('student_id','==',$student->id)->first();

//         $category=DB::table('questions')->distinct()
//         ->join('categories','categories.id', '=', 'questions.category_id','inner')
//         ->where('questions.evaluation_list_id', '=', $eval->id)
//         ->where('questions.question_for','=','2')
// ->select('categories.*')->orderBy('id','asc')
// ->get()->toArray();
foreach( $request->question as $q){
    if(!isset($request->rating[$q])){
        Alert::success(' يجب الاجابة علي جميع الاسئلة ','');
        return redirect()->route('courses.haed.show',[$cou->id,$student->id]);
    }}
        foreach( $request->question as $q){
            Answer::create([
                'restriction_id'=>$res->id,
                'student_id'=>$student->id,
                'course_id'=>$cou->id,
                'evaluation_list_id'=>$eval->id,
                'question_id'=>$q,
                'answer'=>$request->rating[$q]
            ]);
        }

        // return response('تم اضافة البيانات');
        // return view('student_eval',compact('cou','student','eval','ans','category'));
        Alert::success('تم الحفظ ', '');
        return redirect()->route('courses.students.show',[$cou->id,$student->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show($eval_id,$course_id)
    {
        $eval=Evaluation_list::findorfail($eval_id);
        $course=Course::findorfail($course_id);
        $category=DB::table('questions')->distinct()->join('categories','categories.id', '=', 'questions.category_id','inner')

                 ->where('questions.evaluation_list_id', '=', $eval->id)
                 ->where('questions.question_for','=','2')

        ->select('categories.*')->orderBy('id','asc')
        ->get()->toArray();

        $answer=Answer::all()->where('evaluation_list_id','=',$eval->id)
        ->where('course_id','=',$course->id)->where('student_id','!=','0');

// return $category;
        return view('results.result_student',compact('eval','course','answer','category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Answer $answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Answer $answer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Answer $answer)
    {
        //
    }
}
