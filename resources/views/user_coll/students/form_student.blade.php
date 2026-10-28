
@extends('layout.nav_index')
@section('title')
student
@endsection
@section('addres')
الطلاب
@endsection

@section('cont')

<body>
    <main>
        <form action="{{ route('students.store') }}" class="form_col"  id="forms" method="post" autocomplete="on" enctype="multipart/form-data">
            @csrf
            <fieldset class="college" >
                <div class="top_form"><h3> اضافة الطلاب </h3></div>
                <div class="row-r">
                    <div class="colum">
                        <div class="selet_coll">
                            <label for="col_name"> اختار المستوى الدراسي</label>
                            @if (isset($level))
                            <select name="level_id" id="c_name">
                                @foreach ($level as $l )
                                <option value="{{ $l->id }}">{{ $l->level_name }}</option>
                                @endforeach
                            </select>
                            @endif
                        </div>
                        <div class="selet_coll">
                            <label for="col_name"> اختار  التخصص</label>
                            @php
use App\Models\College;
                            $coll=College::all()->where('id','==',Session::get('coll_id'))->first();
                            @endphp
                            @if (isset($spec))
                            <select name="specialty_id" id="s_name">
                                @foreach ($spec as $s )
                                <option value="{{ $s->id }}" >{{ $s->specialty_name }}</option>
                                @endforeach
                            </select>
                            @endif
                        </div>
                <div class="div_college">
                    <div class="input_coll">
                        <label for="coll_num">رقم بطاقة الطالب</label>
                        <input type="number" required name="student_number" placeholder="رقم البطاقة" id="stu_num">
                    </div>
                    <div class="input_coll">
                        <label for="coll_name">ادخل اسم الطالب</label>
                        <input type="text" name="student_name" required placeholder="اسم الطالب" id="stu_name">
                    </div>
                    <div class="input_coll">
                        <label for="coll_name">ادخل رقم الهاتف </label>
                        <input type="phone" name="student_phone" required placeholder="رقم الهاتف" id="phone">
                    </div>
                    <div class="input_coll">
                        <label for="coll_name">ادخل كلمة المرور</label>
                        <input type="password" name="student_password" required minlength="7" placeholder="كلمة المرور " id="password">
                    </div>
                </div>
                </div>
                </div>
                    <div class="div_btn">
                         <input class="btn_c" id="submit" type="submit" value="حفظ" onclick="">
                        <input class="btn_c" id="reset" type="reset" value="الغاء" onclick="hide()">
                    </div>

            </fieldset>
        </form>
        <div class="div_table_sec" >
             <button class="btn_show" id="coll_show" onclick="show()">  <i class="fa fa-plus"></i> إضافة طالب   </button>
             {{-- <input type="search" placeholder="بحث"> --}}
                {{-- <div class="col-md-12 mt1 mb1"> --}}
                    <div class="row" dir="ltr">

                        <div class="card col-md-12">
                            <div class="card-body">
            <table border="1" class="table table-striped table-bordered" width="100%" id="student-field" dir="rtl">
                <thead id="head">
                <tr>
                    <th><center>الرقم الاكاديمي</center></th>
                    <th><center>اسم الطالب</center></th>
                    <th><center>رقم الهاتف</center></th>
                    <th><center>كلمة المرور</center> </th>
                    <th><center>التخصص</center></th>
                    <th><center>المستوى الدراسي</center></th>

                    <th>ادارة</th>
                </tr>

            </thead>
                @foreach ($student as $st )
                <tr>
                    <td>{{ $st->student_number }}</td>
                    <td>{{ $st->student_name }}</td>
                    <td>{{ $st->student_phone }}</td>
                    <td>{{ $st->student_password }}</td>
                    <td>{{ $st->specialty->specialty_name }}</td>
                    <td>{{ $st->level->level_name}}</td>

                    <td ><center><a href="{{ route('students.edit',$st->id) }}" style="display: inline-block"><button type="button" class="btn btn-sm btn-outline-primary btn-rounded waves-effec edit_student" data-id=" ">
                        <i class="fa fa-edit"></i></button></a>
                        <form action="{{ route('students.destroy',$st->id) }}" method="POST" onsubmit="return submitForm(this);" style="display: inline-block" class="student_delete" onclick="delet_button(event)">
                            @csrf
                            @method('delete')
                            <button type="submit"  class="btn btn-sm btn-outline-danger btn-rounded waves-effec remove_student" data-id=" ">
                                <i class="fa fa-trash"></i></button></form>

                            </center>
                    </td>
                </tr>
                @endforeach

                {{-- <tbody></tbody> --}}
            </table>
        </div>
    {{-- </div> --}}

</div>
        </div>
        </div>
    </main>
    <script>
        new DataTable('#student-field');
    </script>
</body>
@endsection

