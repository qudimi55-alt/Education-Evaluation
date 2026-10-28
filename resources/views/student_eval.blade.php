@extends('layout.heder')
@section('title')
manegar quistion

@endsection
@section('addres')
الاسئلة
@endsection
@php
use App\Models\Category;
use App\Models\Course;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Evaluation_list;
@endphp
<form action="{{ route('chekpassword.update',$student->id) }}" class="form_col"  id="forms" method="post" autocomplete="on" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <fieldset class="college">
      <div class="top_form"><h3>تعديل كلمة المرور </h3></div>
          <div class="input_coll">
              <label for="coll_name"> كلمة المرور </label>
              <input type="password"name="student_password" required placeholder="كلمة المرور" id="password" value="{{$student->student_password}}">
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

     <!-- Collapse -->


      {{-- <a class="navbar-brand" href="/"><strong>Teachers Evaluation System</strong></a> --}}

      <!-- Links -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <div class="navbar-nav mr-auto"></div>
        <!-- Left -->
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="" href="#"><h1>نظــام تقـييم اعضـاء هيئـة الـتدريس</h1>
            </a>
          </li>
        </ul>

        <!-- Right -->
        <ul class="navbar-nav nav-flex-icons">
          <li class="nav-item">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-user btn-ronded"></span>  {{ $student->student_name }}  </a>
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="javascript:void(0)" onclick="show()" id="manage_myaccount">
              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
              تغيير كلمة المرور
             {{-- echo isset($_SESSION['login_user_type']) && $_SESSION['login_user_type'] ==1 ? "My Account" : "Change Password"  --}}
                {{-- {{ @isset($login_user_type) && $login_user_type ==1 ? "My Account" : "Change Password" ;     @endisset }} --}}


            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('login.index') }}" >
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              تسجيل الخروج
            </a>
          </div>
          </li>
        </ul>

    </div>
  </nav>

  <main class="pt-5" style="padding-left:unset">
    <div class="container-fluid mt-5">
    <div id="faculties">
        @php

                $course=$eval->courses->where('level_id','=',$student->level_id)
            ->where('specialty_id','=',$student->specialty_id);
        @endphp
        @if ($eval->default=='1')

        @foreach ($course as $co)
        @php
                    $an=Answer::all()->where('course_id','==',$co->id)->where('evaluation_list_id','==',$eval->id)
        ->where('student_id','==',$student->id)->first();
        @endphp
        @if (!empty($co) && empty($an))

        {{-- <form action="{{ route('courses.show',$co->id) }}" method="POST" style="display: inline-block">
            @csrf
            @method('get')
            <input type="hidden" value="{{ $student->id }}" name="student">
            <input type="hidden" value="{{ $eval->id }}" name="eval"> --}}
            <a href="{{ route('courses.students.show',[$co->id,$student->id]) }}" id="faculties" class="btn btn-primary {{ (request('fid') == $co->id && request('sid') == $co->teacher_id) || empty($fid) ? 'active' : '' }}" data-id='{{ $co->course_id }}' {{--   data-sid='{{ $co->teacher->id '}}--}}>
            {{ $co->course_name }} : {{ $co->teacher->teacher_name }}
        </a>
    {{-- </form> --}}

        @endif
@endforeach
        @isset($cou)
        @if(!empty($cou) && empty($ans))
    <form {{-- id="answer-frm" --}} action="{{ route('answers.store') }}" method="POST">
    @csrf
    <div class="card mb-4">
      <div class="card-body">
            <div class="col-lg-12">
              <div class="row">
                <div class="col-md-6">
                  <div class="row">
                    <div class="md-form col-sm-12">
                      <label for="name" class="control-label"> اسم الطالب </label>
                    <input type="text" class="form-control" name="other_details['name']" id="name" value=" {{ $student->student_name }}" readonly>

                    </div>
                  </div>
                  <div class="row">
                    <div class="md-form col-sm-12">
                      <label for="cid" class="control-label"> القسم:التخصص والمستوى </label>
                      <input type="text" class="form-control" name="other_details['cls']" id="cid" value="{{ $student->specialty->departement->depart_name }} : {{ $student->specialty->specialty_name }} : {{ $student->level->level_name }} " readonly>

                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                <div class="row">
                    <div class="md-form col-sm-12">
                      <label for="faculty" class="control-label">اسم المدرس</label>
                      <input type="text" class="form-control" name="other_details['faculty']" value="{{ $cou->teacher->teacher_name }}" id="faculty" readonly>

                    </div>
                    <div class="md-form col-sm-12">
                      <label for="subject" class="control-label"> اسم المقرر </label>
                      <input type="text" class="form-control" name="other_details['subject']" id="subject" value=" {{ $cou->course_name }}" readonly>

                    </div>
                  </div>
                </div>
              </div>
            </div>
      </div>
      <input type="hidden" name="student_id" value="{{ $student->id }}">
      <input type="hidden" name="course_id" value="{{ $cou->id }}">
      <input type="hidden" name="evaluation_list_id" value="{{ $eval->id }}">
    </div>

    <div class="card">
      <div class="card-body">
      <div class="text-center"><h1><b>الفصل  {{ $eval->semester_name }} - السنة الدراسية {{ $eval->evaluation_year }}</b></h1></div>
      <hr>

      <ul  id="evaluation-field">
@php
            $question=Question::all()->where('evaluation_list_id','==',$eval->id)
        ->where('question_for','==','2');
        // $category=Category::all();

@endphp


@foreach ($category as $cat )

<li class="criteria-item" data-id=" "><b style="font-size: 22px">{{ $cat->category_name }} </b>
    <div class="qf ui-sortable">
        @foreach ($question->where('category_id','==',$cat->id) as $que )

        <div class="question-item ">
<div class="question-item-row">
    <input type="hidden" name="question['{{ $que->id }}']" value="{{ $que->id }}">
<div class="question-ext" > <i class="fa fa-like"></i>  {{ $que->question_text }}  </div>
<div class="rating-fied">
<span class="opt-group">
    <span class="mx-2">
        <input type="radio" id="rating-1-4" name="rating[{{ $que->id }}]" value="1" readonly="" required>
        <label for="rating-1-4"> ضعيف</label>
    </span>
    <span class="mx-2">
        <input type="radio" id="rating-2-4" name="rating[{{ $que->id }}]" value="2" readonly="" required>
        <label for="rating-2-4"> مقبول</label>
    </span>
    <span class="mx-2">
        <input type="radio" id="rating-3-4" name="rating[{{ $que->id }}]" value="3" readonly="" required>
        <label for="rating-3-4"> جيد</label>
    </span>
    <span class="mx-2">
        <input type="radio" id="rating-4-4" name="rating[{{ $que->id }}]" value="4" readonly="" required>
        <label for="rating-4-4"> جيد جدا</label>
    </span>
    <span class="mx-2">
        <input type="radio" id="rating-5-4" name="rating[{{ $que->id }}]" value="5" readonly="" required>
        <label for="rating-5-4"> ممتاز</label>
    </span>
</span>

</div>
</div>
</div>
    @endforeach
    </div>
</li>
    @endforeach
    {{-- @endforeach --}}
</ul>
          <hr>
          {{-- <div class="form-group">
          <label for="" class="control-label">Comment</label>
          <textarea name="comment" id="comment" cols="30" rows="5" class="form-control"></textarea>
          </div> --}}
          <button type="submit" class="btn btn-primary btn-block">Submit</button>
      </div>
    </div>

  </form>

  @elseif(Empty($cou))
  <div class="container-fluid">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <center><h4><b> غير مضاف  مقررات للتقييم في تخصصك ومستواك </b></h4></center>

        </div>
      </div>
    </div>
  </div>
 @else
  <div class="container-fluid">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <center><h4><b>شكرا لك  لقد اكملت تقييم المقرر المطلوب </b></h4></center>

        </div>
      </div>
    </div>
  </div>
  @endif
@endisset



  </div>
</main>
{{-- <div id="rating_clone" style="display:none">
<div class="question-item mb-2">
  <div class=" question-item-row">
  <div class="col-md-12 question-text"><strong></strong></div>
      <div class="rating-field">
      <input type="hidden" name="qid[]">
      <input type="hidden" name="question[]">
      <input type="hidden" name="type[]">

          <span class="opt-group">
          </span>
      </div>
  </div>
</div>
</div> --}}
@endif
{{-- <div id="textare_clone" style="display:none">
<div class="question-item mb-2">
                  <div class=" question-item-row">

      <input type="hidden" name="qid[]">
      <input type="hidden" name="question[]">
      <input type="hidden" name="type[]">
                  <div class="col-md-12 question-text"><strong></strong></div>
                       <div class="textarea-field mt-3">
                           <div class="md-form" style="padding:1em">
                              <textarea id="question" class="md-textarea form-control bg-light" rows="4"  placeholder="Write your answer here."></textarea>
                          </div>
                      </div>
                  </div>
              </div>
</div> --}}
<script>
 $(document).ready(function(){
    $('#faculties').click();
  })
$('input').trigger('focus').trigger('blur')
$('#faculties button').click(function(){

  location.href ='/courses.show/''?fid='+$(this).attr('data-id')+'&sid='+$(this).attr('data-sid')
})
window.start_load = function(){

$('#load_modal').css({display:'flex'})

}
</script>

