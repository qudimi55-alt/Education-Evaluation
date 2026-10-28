<?php

namespace App\Http\Controllers;
use function Laravel\Prompts\info;
use App\Models\College;
use Illuminate\Http\Request;
use function Laravel\Prompts\pause;
use function Laravel\Prompts\STDIN;
use function Laravel\Prompts\alert;
use RealRashid\SweetAlert\Facades\Alert;

class CollegeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colleg=College::all();
        return view('colleges.form_college',compact('colleg'));
    }
    // public function dep()
    // {
    //     $colleg=College::all();
    //     return view('departements.form_departements',compact('colleg'));
    // }

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
try {
    $request->validate([
        'name'=>'required'
    ]);
   $college=new College();
   $college->name=$request->name;
   $college->save();
Alert::success('تم الحفظ ', '');
   return redirect()->route('colleges.index');
} catch (\Throwable $th) {
    Alert::error('لم يتم الحفظ ');
    return view('./');
}
    }

    /**
     * Display the specified resource.
     */
    public function show(College $college)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $colleges=College::findorfail($id);
        return view('colleges.college_edit',compact('colleges'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $colleg=College::findorfail($id);
        $colleg->name=$request->name;
        $colleg->save();
        // $colleg->update([
        //     'name'=>$request->name
        // ]);
        Alert::success('تم التعديل ', '');
        return redirect()->route('colleges.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // College::findorfail($id)->delete();
        // pause('  هل تريد الحذف بالفعل .');

        College::destroy($id);
        return redirect()->route('colleges.index');
    }
}
