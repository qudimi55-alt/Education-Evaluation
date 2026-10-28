@extends('layout.nav_index')
@section('title')
courses
@endsection
@section('addres')
المقررات
@endsection
<style>
    .reset{
    background-color: rgb(200, 227, 245);color: red;
    padding: 5px 15px;
border-radius: 3px;
margin-left: 20px;
margin-top: 10px;
margin-right: 20px;
font-size: 22px;
font-weight: bold;
text-decoration: none
}
.form{
    position: absolute;
    top: 25%;
    /* left: 5%; */
    /* right: 10%; */
    width: 80%;
}
</style>
@section('cont')


<body>
    <main>
        <form action="{{ route('courses.update',$course->id) }}" class="form" id="forms" method="POST" autocomplete="on" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <fieldset class="college">
                <div class="top_form"><h3> تعديل المقررات الدراسية</h3></div>
                <div class="row-r">
                    <div class="colum">
                        <div class="selet_coll">
                            <label for="col_name"> اختار المستوئ الدراسي</label>
                            @if (isset($level))
                            <select name="level_id" id="c_name">
                                @foreach ($level as $l )
                                <option value="{{ $l->id }}"{{ $course->level_id == $l->id ? 'selected' : '' }}>{{$l->level_name}}</option>
                                @endforeach
                            </select>
                            @endif
                        </div>
                        <div class="selet_coll">
                            <label for="col_name"> اختار  التخصص</label>
                            @if (isset($spec))
                            <select name="specialty_id" id="s_name">
                                @foreach ($spec as $s)
                                <option value="{{$s->id}}"{{ $course->specialty_id == $s->id ? 'selected' : ''}}>{{$s->specialty_name}}</option>
                                @endforeach
                            </select>
                            @endif
                        </div>
                        <div class="selet_coll">
                            <label for="col_nam"> اختار اسم المدرس </label>
                            @if (isset($teacher))
                            <select name="teacher_id" id="c_name">
                                @foreach ($teacher as $te )
                                <option value="{{ $te->id }}"{{ $course->teacher_id == $te->id ? 'selected' : ''}}>{{$te->teacher_name}}</option>
                                @endforeach
                            </select>
                            @endif
                        </div>
                <div class="div_college">
                    <div class="input_coll" style="display: none">
                        <label for="coll_num">رقم المقرر</label>
                        <input type="number"  placeholder="رقم المقرر" readonly id="sec_num">
                    </div>
                    <div class="input_coll">
                        <label for="coll_name">ادخل اسم المقرر الدراسي</label>
                        <input type="text" name="course_name" required placeholder="ادخل اسم المقرر" id="sec_name" value="{{ $course->course_name }}">
                    </div>
                    <div class="input_coll">
                        <label for="coll_name">ادخل سنة التدريس</label>
                        <input type="text" name="year_teach"  placeholder="   مثل 2020-2021" id="tch_name" value="{{$course->year_teach}}">
                    </div>
                </div>
                </div>
                </div>
                    <div class="div_btn">
                         <input class="btn_c" id="submit" type="submit" value="تعديل ">
                         <a  class="reset" style="width: 80px;height: 30px; " id="reset" href="../">الغاء</a>
                    </div>
            </fieldset>
        </form>
        @endsection
