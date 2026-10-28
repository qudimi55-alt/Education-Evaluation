<?php

namespace App\Http\Controllers;

use Dotenv\Util\Str;
use App\Models\Course;
use App\Models\Restriction;
use Illuminate\Http\Request;
use App\Models\Evaluation_list;
use Illuminate\Routing\Controller;
use RealRashid\SweetAlert\Facades\Alert;

use function PHPUnit\Framework\returnSelf;

class RestrictionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $eval=Evaluation_list::find($id);
    //    return view('evaluations.viw_evaluation');
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
        $eval=Evaluation_list::findorfail($request->evaluation_list_id);
        $cour=Course::findorfail($request->course_id);
        Restriction::create([
            'evaluation_list_id'=>$eval->id,
            'course_id'=>$cour->id
        ]);
        Alert::success('تمت الاضافة ', '');
       return redirect()->route('restrictions.show',$eval->id);
    // return $request;

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $eval=Evaluation_list::findorfail($id);
        $restr=Restriction::all();
        $course=Course::all();
        // foreach ($restr as $c) {
        //     foreach($course as $cou){
        //         if($cou->id != $c->course_id)
        //         return $c;
        //     else
        //     return response('dkjgfksdvhjdv');
        //     }
        // }
        return view('evaluations.viw_evaluation',compact('eval','course'));
        // return $course->id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $eval=Evaluation_list::findorfail($id);
        $ev=($eval->default)==0?1:0;
        $eva=($eval->default)==0?0:1;
$evalu=Evaluation_list::all();
foreach($evalu as $e){
    if($e->id==$id){
$e->update([
    'default'=>$ev,
]);
    }else{
        $e->update([
            'default'=>0,
        ]);
    }
}
return redirect()->route('evaluations.index');


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Restriction $restriction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $re=Restriction::where('course_id','=',$id)->first();
        Restriction::destroy($re->id);

        Alert::success('تم الحذف  ', '');
        return redirect()->route('restrictions.show',$re->evaluation_list_id);
        // return $re;
    }
}
