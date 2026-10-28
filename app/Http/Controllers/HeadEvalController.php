<?php

namespace App\Http\Controllers;

use App\Models\Head;
use App\Models\Answer;
use App\Models\Course;
use App\Models\Restriction;
use Illuminate\Http\Request;
use App\Models\Evaluation_list;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use phpDocumentor\Reflection\Types\Null_;

class HeadEvalController extends Controller
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
        $head=Head::findorfail($request->head_id);
        $cou=Course::findorfail($request->course_id);
        $eval=Evaluation_list::findorfail($request->evaluation_list_id);
        $res=Restriction::all()->where('evaluation_list_id','=',$eval->id)
        ->where('course_id','=',$cou->id)->first();


        foreach( $request->question as $q){
            if(!isset($request->rating[$q])){
                Alert::success(' يجب الاجابة علي جميع الاسئلة ','');
                return redirect()->route('courses.haed.show',[$cou->id,$head->id]);
            }}
        foreach( $request->question as $q){
            Answer::create([
                'restriction_id'=>$res->id,
                'course_id'=>$cou->id,
                'evaluation_list_id'=>$eval->id,
                'question_id'=>$q,
                'head_id'=>$head->id,
                'answer'=>$request->rating[$q]
            ]);}



        Alert::success('تم الحفظ ', '');
        return redirect()->route('courses.haed.show',[$cou->id,$head->id]);
        // return $head->id;
    }

    /**
     * Display the specified resource.
     */
    public function show($course_id,$haed_id)
    {
        $cou=Course::findorfail($course_id);

        $head=Head::findorfail($haed_id);
        // $eval=Evaluation_list::findorfail($request->eval);
        $eval=Evaluation_list::all()->where('default','=','1')->first();
        $ans=Answer::all()->where('course_id','==',$cou->id)->where('evaluation_list_id','==',$eval->id)
        ->where('head_id','==',$head->id)->first();
        $category=DB::table('questions')->distinct()->join('categories','categories.id', '=', 'questions.category_id','inner')

        ->where('questions.evaluation_list_id', '=', $eval->id)
        ->where('questions.question_for','=','1')

->select('categories.*')->orderBy('id','asc')
->get()->toArray();
        return view('headDepart_eval',compact('cou','head','eval','ans','category'));
        // return $ans;
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
