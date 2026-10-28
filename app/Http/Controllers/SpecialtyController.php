<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Specialty;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SpecialtyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $depar = Departement::all();
        $spec = Specialty::all();
        return view('specialtys.form_specialty', compact('spec', 'depar'));
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
        $dep = Departement::find($request->departement_id);

        Specialty::create([
            'specialty_name' => $request->specialty_name,
            'departement_id' => $dep->id
        ]);
        Alert::success('تم الحفظ ', '');
        return redirect()->route('specialtys.index');
        // return $request->departement_id;
    }

    /**
     * Display the specified resource.
     */
    public function show(Specialty $specialty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $spe = Specialty::findorfail($id);
        return view('specialtys.specialty_edit', compact('spe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $depar = Departement::find($request->departement_id);
        $spec = Specialty::findorfail($id);
        $spec->update([
            'specialty_name' => $request->specialty_name,
            'departement_id' => $depar->id
        ]);
        Alert::success('تم التعديل ', '');

        return redirect()->route('specialtys.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Specialty::destroy($id);
        Alert::success('تم الحذف  ', '');

        return redirect()->route('specialtys.index');
    }
}
