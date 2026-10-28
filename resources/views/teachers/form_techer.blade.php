@extends('layout.nav_index')
@section('title')
techers
@endsection
@section('addres')
هيئة التدريس
@endsection
@section('cont')

<body>
    <main>
        <form action="{{ route('teachers.store') }}" class="form_col"  id="forms" method="post" autocomplete="on" enctype="multipart/form-data">
            @csrf
            <fieldset class="college">
                <div class="top_form"><h3>اضافة هيئة  التدرييس</h3></div>
                <div class="row-r">
                    <div class="colum">
                        {{-- <div class="selet_coll">
                            <label for="col_name"> اختار المقرر </label>
                            <select name="col_name" id="coll_name">
                                <option value="شبكات">شبكات</option>
                                <option value="محاسبة مالية">محاسبة مالية </option>
                                <option value="امن معلومات"> امن معلومات</option>
                                <option value="ويب">ويب </option>
                                <option value="تشريح الاسنان">تشريح الاسنان</option>
                            </select>
                        </div> --}}
                <div class="div_college">
                    <div class="input_coll">
                        <label for="coll_num">رقم بطاقة الجامعة</label>
                        <input type="number" name="teacher_number" required placeholder="رقم المدرس"  id="sec_num">
                    </div>
                    <div class="input_coll">
                        <label for="coll_name">ادخل اسم المدرس</label>
                        <input type="text" name="teacher_name" required placeholder="ادخل اسم المدرس" id="sec_name">
                    </div>
                    <div class="input_coll">
                        <label for="coll_num">رقم الهاتف</label>
                        <input type="number"name="teacher_phone" required  placeholder="رقم الهاتف"  id="phone_num">
                    </div>
                    <div class="input_coll">
                        <label for="coll_name"> كلمة المرور </label>
                        <input type="text"name="teacher_password" required placeholder="كلمة المرور" id="password">
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
                <button class="btn_show" id="coll_show" onclick="show()">  <i class="fa fa-plus"></i> إضافة مدرس   </button>
                <div class="row" dir="ltr">
                    <div class="card col-md-12">
                        <div class="card-body">
            <table border="1" id="teacher_table" class="table table-striped table-bordered" dir="rtl">
                <thead id="head">
                <tr>
                    <th><center>الرقم الوظيفي</center></th>
                    <th><center>اسم المدرس</center></th>
                    <th><center>رقم الهاتف</center></th>
                    {{-- <th><center>كلمة المرور</center></th> --}}
                    <th><center>إدارة</center></th>
                </tr>
                </thead>
                @foreach ($teacher as $te )
                <tr>
                    <td>{{ $te->teacher_number }}</td>
                    <td>{{ $te->teacher_name }}</td>
                    <td>{{ $te->teacher_phone }}</td>
                    {{-- <td>{{ $te->teacher_password }}</td> --}}
                    <td><center><a href="{{ route('teachers.edit',$te->id) }}"><button type="button" class="btn btn-sm btn-outline-primary btn-rounded waves-effec edit_student" data-id=" ">
                        <i class="fa fa-edit"></i></button></a>
                        <form action="{{ route('teachers.destroy',$te->id)}}" method="POST"  onsubmit="return submitForm(this);"  onclick="delet_button(event)" style="display: inline-block">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-danger btn-rounded waves-effec remove_student" data-id=" ">
                            <i class="fa fa-trash"></i></button></form></center></td>
                </tr>
                @endforeach
            </table>
        </div>
                    </div>
                </div>
        </div>
    </main>
    <script>
        new DataTable('#teacher_table');
    </script>
</body>
@endsection
