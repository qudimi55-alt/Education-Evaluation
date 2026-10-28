@extends('layout.nav_index')
@section('title')
courses
@endsection
@section('addres')
المقررات
@endsection
@section('cont')


<body>
    <main>
        <form action="{{ route('courses.store') }}" class="form_col" id="forms" method="post" autocomplete="on" enctype="multipart/form-data">
            @csrf
            <fieldset class="college">
                <div class="top_form"><h3> ادخال المقررات الدراسية</h3></div>
                <div class="row-r">
                    <div class="colum">
                        <div class="selet_coll">
                            <label for="col_name"> اختار المستوئ الدراسي</label>
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
                            @if (isset($spec))
                            <select name="specialty_id" id="s_name">
                                @foreach ($spec as $s)
                                <option value="{{ $s->id }}">{{ $s->specialty_name }}</option>
                                @endforeach
                            </select>
                            @endif
                        </div>
                        <div class="selet_coll">
                            <label for="col_nam"> اختار اسم المدرس  </label>
                            @if (isset($teacher))
                            <select name="teacher_id" id="c_name">
                                @foreach ($teacher as $te )
                                <option value="{{ $te->id }}">{{ $te->teacher_name }}</option>
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
                        <input type="text" name="course_name" required placeholder="ادخل اسم المقرر" id="sec_name">
                    </div>
                    <div class="input_coll">
                        <label for="coll_name">ادخل سنة التدريس</label>
                        <input type="text" name="year_teach"  placeholder="   مثل 2020-2021" id="tch_name">
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
        <div class="div_table_sec">
                <button class="btn_show" id="coll_show" onclick="show()">  + إضافة مقرر   </button>
                <div class="row" dir="ltr">
                    <div class="card col-md-12">
                        <div class="card-body">
            <table border="1" id="course_table" class="table table-striped table-bordered" dir="rtl">
                <thead id="head">
                <tr>
                    <th>#</th>
                    <th><center>المقرر الدراسية</center></th>
                    <th><center>اسم  المدرس</center></th>
                    <th><center>التخصص</center></th>
                    <th><center>المستوى الدراسي</center></th>
                    <th><center>سنة التدريس</center></th>
                    <th><center>إدارة</center></th>
                </tr>
                </thead>
                @php
                    $i=1050;
                @endphp
                @foreach ($course as $c )
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $c->course_name }}</td>
                    <td>{{ $c->teacher->teacher_name }}</td>
                    <td>{{ $c->specialty->specialty_name }}</td>
                    <td>{{ $c->level->level_name}}</td>
                    <td>{{ $c->year_teach }}</td>
                    <td><center><a href="{{ route('courses.edit',$c->id) }}"><button type="button" class="btn btn-sm btn-outline-primary btn-rounded waves-effec edit_student" data-id=" ">
                        <i class="fa fa-edit"></i></button></a>
                        <form action="{{ route('courses.destroy',$c->id) }}" method="POST" onsubmit="return submitForm(this);" style="display: inline-block">
                            @csrf
                            @method('delete')
                            <button type="submit"  class="btn btn-sm btn-outline-danger btn-rounded waves-effec remove_student" data-id=" ">
                                <i class="fa fa-trash"></i></button></form></center>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        </div>
                </div>
        </div>
    </main>
    <script>
        new DataTable('#course_table');
    </script>
</body>
@endsection

