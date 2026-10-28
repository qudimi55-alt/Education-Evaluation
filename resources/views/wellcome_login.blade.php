@extends('layout.heder')
@section('title')
manegar quistion

@endsection
@php
use App\Models\Answer;
@endphp
<form action="{{ route('chekpassword.update',$student->id) }}" class="form_col"  id="forms" method="post" autocomplete="on" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <fieldset class="college" >
      <div class="top_form"><h3>تعديل كلمة المرور  </h3></div>
      <div class="row-r">
          <div class="colum">              
          <div class="div_college">
          <div class="input_coll">
              <label for="coll_name">ادخل كلمة المرورالجديدة</label>
              <input type="password" name="student_password" required minlength="7" placeholder=" كلمة المرورالجديدة  " id="password" value="{{$student->student_password}}">
          </div>
          </div>
          </div>
          </div>
          <div class="div_btn">
               <input class="btn_c" id="submit" type="submit" value="حفظ">
              <input class="btn_c" id="reset" type="reset" value="الغاء" onclick="hide()">
          </div>

  </fieldset>
</form>
<nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar" dir="ltr">
    <div class="container-fluid">

        <ul class="navbar-nav ml-5">
            <li class="nav-item active">
              <a class="" href="#"><h1>نظــام تقـييم اعضـاء هيئـة الـتدريس</h1>
              </a>
            </li>
          </ul>

<ul class="navbar-nav nav-flex-icons">
    <li class="nav-item">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-user btn-ronded mr-3"></span>  {{ $student->student_name }}  </a>
    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
      <a class="dropdown-item" href="#" id="manage_myaccount" onclick="show()">
        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
        تغيير كلمة المرور 
       {{-- echo isset($_SESSION['login_user_type']) && $_SESSION['login_user_type'] ==1 ? "My Account" : "Change Password"  --}}
          {{-- {{ @isset($login_user_type) && $login_user_type ==1 ? "My Account" : "Change Password" ;     @endisset }} --}}


      </a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="{{ route('login.index') }}" >
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
        خروخ
      </a>
    </div>
    </li>
  </ul>



    </div>
</nav>
<center>
<div class="container " style="margin: 10% 0 0 0 ">

    <div class="container-fluid">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <center><h4><b>مرجباً بك عزيزي الطالب : {{$student->student_name}} <br>نرجو منكم قراءة اسئلة التقييم بعناية والاجابة عليها بموضوعية، لأن تقييمكم يساعد قيادة الجامعة في اتخاذ 
                القرارات المناسبة لتطوير العملية التعليمية <br> مع تمنياتنا لكم بالتوفيق والنجاح </b></h4></center>

            </div>

            @php

            $cours=$eval->courses->where('level_id','=',$student->level_id)
            ->where('specialty_id','=',$student->specialty_id);
            @endphp
            @if ($eval->default=='1')

            @php
              foreach ($cours as $cou) {
                $an=Answer::all()->where('course_id','==',$cou->id)->where('evaluation_list_id','==',$eval->id)
        ->where('student_id','==',$student->id)->first();
            if ( empty($an) ) {
              $course=$cou;
              break;
            }

              }

            @endphp
            {{-- @if (!empty($co) && empty($an)) --}}

            <center>
                {{-- <form action="{{ route('courses.show',$course->id) }}" method="POST" style="display: inline-block">
            @csrf
            @method('get')
            <input type="hidden" value="{{ $student->id }}" name="student">
            <input type="hidden" value="{{ $eval->id }}" name="eval"> --}}
            <a href="{{ route('courses.students.show',[$course->id,$student->id]) }}" id="faculties" class="btn btn-primary " data-id='{{ $cou->course_id }}' {{--   data-sid='{{ $co->teacher->id '}}--}}>
                {{-- {{ $cou->course_name }} : {{ $cou->teacher->teacher_name }} --}}
               بدأ التقييم
            </a>
        {{-- </form> --}}
    </center>
            @endif
          </div>
        </div>
      </div>


</div>
</center>
