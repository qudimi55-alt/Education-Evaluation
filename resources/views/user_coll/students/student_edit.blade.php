@extends('layout.nav_index')
@section('title')
student
@endsection
@section('addres')
الطلاب
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

        <form action="{{ route('students.update',$student->id) }}" class="form"  id="forms" method="post" autocomplete="on" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <fieldset class="college">
                <div class="top_form"><h3> تعديل الطلاب </h3></div>
                <div class="row">
                    <div class="colum">
                        <div class="selet_coll">
                            <label for="col_name"> اختار المستوى الدراسي</label>
                            @if (isset($level))
                            <select name="level_id" id="c_name">
                                @foreach ($level as $l )
                                <option value="{{ $l->id }}" {{ $student->level_id == $l->id ? 'selected' : '' }}>{{ $l->level_name }}</option>
                                @endforeach
                            </select>
                            @endif
                        </div>
                        <div class="selet_coll">
                            <label for="col_name"> اختار  التخصص</label>
                            @if (isset($spec))
                            <select name="specialty_id" id="s_name">
                                @foreach ($spec as $s )
                                <option value="{{ $s->id }}" {{ $student->specialty_id == $s->id ? 'selected' : '' }}>{{ $s->specialty_name }}</option>
                                @endforeach
                            </select>
                            @endif
                        </div>
                <div class="div_college">
                    <div class="input_coll">
                        <label for="coll_num">رقم بطاقة الطالب</label>
                        <input type="number" value="{{ $student->student_number }}" required name="student_number" placeholder="رقم البطاقة" id="stu_num">
                    </div>
                    <div class="input_coll">
                        <label for="coll_name">ادخل اسم الطالب</label>
                        <input type="text" value="{{ $student->student_name }}"  name="student_name" required placeholder="اسم الطالب" id="stu_name">
                    </div>
                    <div class="input_coll">
                        <label for="coll_name">ادخل رقم الهاتف </label>
                        <input type="phone" value="{{ $student->student_phone }}"  name="student_phone" required placeholder="رقم الهاتف" id="phone">
                    </div>
                    <div class="input_coll">
                        <label for="coll_name">ادخل كلمة المرور</label>
                        <input type="password" value="{{ $student->student_password }}"  name="student_password" required minlength="7" placeholder="كلمة المرور " id="password">
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
