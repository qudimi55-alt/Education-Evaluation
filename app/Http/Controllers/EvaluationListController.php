<?php

namespace App\Http\Controllers;

use App\Models\Evaluation_list;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class EvaluationListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eval=Evaluation_list::all();
        return view('evaluations.year_evaluation',compact('eval'));
    }
    public function showResult(){
        $eval=Evaluation_list::all();
        return view('results.year_evaluation',compact('eval'));
        // return $eval;
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
        Evaluation_list::create([
            'evaluation_year'=>$request->evaluation_year,
            'semester_name'=>$request->semester_name,
            'default'=>1
        ]);
        Alert::success('تم الحفظ ', '');

        return redirect()->route('evaluations.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $eval=Evaluation_list::findorfail($id);
        return view('results.resulte_list',compact('eval'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $eval=Evaluation_list::findorfail($id);
        return view('evaluations.evaluation_year_edit',compact('eval'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $eval=Evaluation_list::findorfail($id);
        $eval->update([
            'evaluation_year'=>$request->evaluation_year,
            'semester_name'=>$request->semester_name
        ]);
        Alert::success('تم التعديل ', '');

        return redirect()->route('evaluations.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Evaluation_list::destroy($id);
        return redirect()->route('evaluations.index');
    }
}
