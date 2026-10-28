<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user=User::all();
        return view('admin.form_admin',compact('user'));
        // return $user;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $bool=$request->active=="on"?1:0;
        User::create([
            'name' => $request->name,
            'number' => $request->number,
            'number_phone' => $request->phone,
            'password' => $request->password,
            'role_admin' => $request->role_admin,
            'active' => $bool,
            'college_id' => $request->college_id
        ]);
        Alert::success('تم الحفظ ', '');
        return redirect()->route('user.index');

        // return $request;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user= User::findorfail($id);

        return view('admin.admin_edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        // try {
            $users=User::findorfail($id);
            $users->update([
            'name' => $request->name,
            'number' => $request->number,
            'number_phone' => $request->phone,
            'password' => $request->password,
            'role_admin' => $request->role_admin,
            'status' => $request->status,
            'college_id' => $request->college_id
        ]);
        Alert::success('تم التعديل ', '');
        return redirect()->route('user.index');
        // } catch (\Throwable $th) {
        //     return $request;
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        Alert::success('تم الحذف  ', '');
        return redirect()->route('user.index');
    }
}
