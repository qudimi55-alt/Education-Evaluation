<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Models\Departement;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colleg = College::all();
        $depar = Departement::all();
        return view('departements.form_departements', compact('depar', 'colleg'));
        // return $depar->college;
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
        $colleg = College::find($request->college_id);

        // //    $colleg->departement()->create([
        // //         'depart_name' => 'قران كريم',
        // //     ]);

        // //    $depart=new Departement();
        // //    $depart->depart_name=$request->depart_name;
        // //    $depart->college_id=$request->college_id;
        // //    $depart->save();
        // // Departement::create($request->all());
        Departement::create([
            'depart_name' => $request->depart_name,
            'college_id' => $colleg->id
        ]);
        //     $depar = new Departement(['depart_name' => $request->depart_name]);

        // $col = College::find($request->college_id);

        // $col->departement()->save($depar);
        Alert::success('تم الحفظ ', '');

        return redirect()->route('departements.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Departement $departement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $depar = Departement::findorfail($id);
        return view('departements.departement_edit', compact('depar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $colleg = College::find($request->college_id);
        $depar = Departement::findorfail($id);
        $depar->update([
            'depart_name' => $request->depart_name,
            'college_id' => $colleg->id
        ]);
        Alert::success('تم التعديل ', '');
        return redirect()->route('departements.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Departement::destroy($id);
        return redirect()->route('departements.index');
    }
}
