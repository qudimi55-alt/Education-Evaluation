<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Evaluation_list;
use App\Models\Question;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;
use RealRashid\SweetAlert\Facades\Alert;

class QuestionController extends Controller
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
    public function store($evaluations,Request $request)
    {
        $eval=Evaluation_list::findorfail($evaluations);
        $cat=Category::findorfail($request->category_id);
        Question::create([
            'question_text'=>$request->question_text,
            'question_for'=>$request->question_for,
            'evaluation_list_id'=>$eval->id,
            'category_id'=>$cat->id
        ]);
        Alert::success('تم الحفظ ', '');

        return redirect()->route('evaluations.questions.show',[$eval->id,$request->question_for]);
        // return $evaluations;
    }

    /**
     * Display the specified resource.
     */
    public function showall($id,$quest_id){
        return $quest_id;
    }
    public function show($evaluations,$questions)
    {
        $eval=Evaluation_list::findorfail($evaluations);
        $question=Question::all()->where('evaluation_list_id','==',$evaluations)
        ->where('question_for','==',$questions);
         $category=Category::all();
        return view('quistions.form_quistions',compact('question','category','eval','questions'));
        // return $question;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($eval_id,$quest_id,Request $request)
    {
        Question::destroy($quest_id);
        Alert::success('تم الحذف  ', '');
        return redirect()->route('evaluations.questions.show',[$eval_id,$request->question_for]);
    }
}
