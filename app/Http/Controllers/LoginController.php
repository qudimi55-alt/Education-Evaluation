<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Answer;
use App\Models\Course;
use App\Models\Student;
use App\Models\Specialty;
use GuzzleHttp\Middleware;
use App\Models\Restriction;
use Illuminate\Http\Request;
use App\Models\Evaluation_list;
use App\Models\Head;

use function PHPUnit\Framework\isEmpty;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login');
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

        if ($request->select == '2') {

            // try {
                $u = User::all()->where('number', '==', $request->number)->where('password', '==', $request->password)->first();
            //     if (!$user) {

            //         Alert::error(' خطاء ', 'تأكد من الرقم الاكاديمي او من كلمة المرور ');
            //     return view('login');
            //     }

            //     return view('index',compact('user')
            //     );
            // } catch (\Throwable $th) {
            //     Alert::error(' خطاء ', 'تأكد من الرقم الاكاديمي او من كلمة المرور ');
            //     return view('login');
            // }
                if (!$u) {
                //    return response('غير موجود',403);
                return view('login');
                }else {
                   Session::put('name', $u->name);
                   Session::put('coll_id', $u->role_admin);
                   return view('index',compact('u'));
                }

        } elseif ($request->select == '1') {
            try {
                $student = Student::where('student_number', '=', $request->number)
                    ->where('student_password', '=', $request->password)->first();


                // $spec=Specialty::all()->where('id','=',$student->specialty_id->first());
                if (!$student) {
                    Alert::mistake(' خطاء ', 'تأكد من الرقم الاكاديمي او من كلمة المرور ');
                    return redirect()->route('login.index');
                } else {
                    $eval = Evaluation_list::where('default', '=', '1')->first();

                    $answer = Answer::all()->where('evaluation_list_id', '=', $eval->id)
                        ->where('student_id', '=', $student->id);

                    // $evaluated = DB::table('answers')
                    // ->select('restriction_id')
                    // ->distinct()
                    // ->where('evaluation_list_id', $eval->id)
                    // ->where('student_id', $student->id)
                    // ->get()
                    // ->pluck('restriction_id')
                    // ->toArray();

                    // $answer=array_column($ans['restriction_id'],'restriction_id','restriction_id');
                    $course = $eval->courses->where('level_id', '=', $student->level_id)
                        ->where('specialty_id', '=', $student->specialty_id)->first();
                    // $cc=Course::withoutEvents('answer')->where('level_id','=',$student->level_id)
                    // ->where('specialty_id','=',$student->specialty_id);


                    return   view('wellcome_login', compact('student', 'eval', 'course', 'answer'));
                    // return $course;
                }
            } catch (\Throwable $th) {
                Alert::error(' خطاء ', 'تأكد من الرقم الاكاديمي او من كلمة المرور ');
                throw $th;
            }
        }else{
            $head = Head::where('number_head', '=', $request->number)
                    ->where('password', '=', $request->password)->first();


                // $spec=Specialty::all()->where('id','=',$student->specialty_id->first());
                if (!$head) {
                    Alert::mistake(' خطاء ', 'تأكد من الرقم الاكاديمي او من كلمة المرور ');
                    return redirect()->route('login.index');
                } else {
                    $eval = Evaluation_list::where('default', '=', '1')->first();

                    $answer = Answer::all()->where('evaluation_list_id', '=', $eval->id)
                        ->where('head_id', '=', $head->id);

                    // $evaluated = DB::table('answers')
                    // ->select('restriction_id')
                    // ->distinct()
                    // ->where('evaluation_list_id', $eval->id)
                    // ->where('student_id', $student->id)
                    // ->get()
                    // ->pluck('restriction_id')
                    // ->toArray();

                    // $answer=array_column($ans['restriction_id'],'restriction_id','restriction_id');
                    foreach($head->departement->specialty as $he){

                    $course[] = $eval->courses->where('specialty_id', '=', $he->id)->first();
                    }
                    // $cc=Course::withoutEvents('answer')->where('level_id','=',$student->level_id)
                    // ->where('specialty_id','=',$student->specialty_id);

                    return   view('loginHead', compact('head', 'eval', 'course', 'answer'));
                    // return $course;
                }
                // return $u->departement->specialty;


        }
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
