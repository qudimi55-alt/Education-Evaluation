<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $level = Level::all();
        return view('levels.form_level', compact('level'));
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
        Level::create([
            'level_name' => $request->level_name,
        ]);
        Alert::success('تم الحفظ ', '');

        return redirect()->route('levels.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Level $level)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $level = Level::findorfail($id);
        return view('levels.level_edit', compact('level'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $level = Level::findorfail($id);
        $level->update([
            'level_name' => $request->level_name
        ]);
        Alert::success('تم التعديل ', '');

        return redirect()->route('levels.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Level::destroy($id);
        return redirect()->route('levels.index');
    }
}
