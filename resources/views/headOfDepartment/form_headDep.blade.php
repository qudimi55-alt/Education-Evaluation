@extends('layout.nav_index')
@section('title')
headDepartment
@endsection
@section('addres')
رؤوساء الاقسام
@endsection
@section('cont')
@php
use App\Models\Departement;
$dep=Departement::all();
@endphp
<body>
    <main>
        <form action="{{ route('heads.store') }}" class="form_col"  id="forms" method="post" autocomplete="on" >
            @csrf
            <fieldset class="college">
                <div class="top_form"><h3>اضافة هيئة  التدرييس</h3></div>
                <div class="row-r">
                    <div class="colum">
                        <div class="selet_coll">
                            <label for="col_name"> اختار القسم </label>
                            @if (@isset($dep))
                            <select name="depart_id" >
                                @foreach ($dep as $d )

                                <option value="{{ $d->id }}">{{ $d->depart_name }}</option>
                                @endforeach
                            </select>
                            @endif
                        </div>
                <div class="div_college">
                    <div class="input_coll">
                        <label for="coll_num">رقم بطاقة الجامعة</label>
                        <input type="number" name="number_head" required placeholder="رقم "  id="sec_num">
                    </div>
                    <div class="input_coll">
                        <label for="coll_name">ادخل اسم رئيس القسم</label>
                        <input type="text" name="name_head" required placeholder="ادخل اسم رئيس القسم" id="sec_name">
                    </div>
                    <div class="input_coll">
                        <label for="coll_num">رقم الهاتف</label>
                        <input type="number"name="phone_head" required  placeholder="رقم الهاتف"  id="phone_num">
                    </div>
                    <div class="input_coll">
                        <label for="coll_name"> كلمة المرور </label>
                        <input type="text"name="password" required placeholder="كلمة المرور" id="password">
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
                <button class="btn_show" id="coll_show" onclick="show()">  <i class="fa fa-plus"></i> إضافة رئيس قسم   </button>
                <div class="row" dir="ltr">
                    <div class="card col-md-12">
                        <div class="card-body">
            <table border="1" id="teacher_table" class="table table-striped table-bordered" dir="rtl">
                <thead id="head">
                <tr>
                    <th><center>الرقم الوظيفي</center></th>
                    <th><center>اسم المدرس</center></th>
                    <th><center>رقم الهاتف</center></th>
                    <th><center>كلمة المرور</center></th>
                    <th><center>القسم</center></th>
                    <th><center>إدارة</center></th>
                </tr>
                </thead>
                @foreach ($head as $he )
                <tr>
                    <td>{{ $he->number_head }}</td>
                    <td>{{ $he->name_head }}</td>
                    <td>{{ $he->phone_head }}</td>
                    <td>{{ $he->password }}</td>
                    <td>{{ $he->departement->depart_name }}</td>
                    <td><center><a href="{{ route('heads.edit',$he->id) }}"><button type="button" class="btn btn-sm btn-outline-primary btn-rounded waves-effec edit_student" data-id=" ">
                        <i class="fa fa-edit"></i></button></a>
                        <form action="{{ route('heads.destroy',$he->id)}}" method="POST" onsubmit="return submitForm(this);"   onclick="delet_button(event)" style="display: inline-block">
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
