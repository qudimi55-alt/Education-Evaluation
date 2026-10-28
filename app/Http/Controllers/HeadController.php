<?php

namespace App\Http\Controllers;

use App\Models\Head;
use App\Models\Answer;
use App\Models\Course;
use App\Models\Departement;
use Illuminate\Http\Request;
use App\Models\Evaluation_list;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class HeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $head=Head::all();
        return view('headOfDepartment.form_headDep',compact('head'));
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
        Head::create([
            'name_head'=>$request->name_head,
            'number_head'=>$request->number_head,
            'phone_head'=>$request->phone_head,
            'password'=>$request->password,
            'departement_id'=>$request->depart_id,
        ]);
        Alert::success('تم الحفظ ', '');

        return redirect()->route('heads.index');
        // return $request;
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
                 ->where('questions.question_for','=','1')

        ->select('categories.*')->orderBy('id','asc')
        ->get()->toArray();

        $answer=Answer::all()->where('evaluation_list_id','=',$eval->id)
        ->where('course_id','=',$course->id)->where('head_id','!=','0');

// return $category;
        return view('results.result_HeadDepart',compact('eval','course','answer','category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $head=Head::findorfail($id);
        return view('headOfDepartment.headDep_edit',compact('head'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $head = Head::findorfail($id);
        $depar = Departement::find($request->departement_id);
        $head->update([
            'name_head'=>$request->name_head,
            'number_head'=>$request->number_head,
            'phone_head'=>$request->phone_head,
            'password'=>$request->password,
            'departement_id'=>$depar->id,
        ]);
        Alert::success('تم الحفظ ', '');

        return redirect()->route('heads.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        Head::destroy($id);
        Alert::success('تم الحذف  ', '');

        return redirect()->route('heads.index');
    }
}
