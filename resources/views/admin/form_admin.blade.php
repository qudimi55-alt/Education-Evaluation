
@extends('layout.nav_index')
@section('title')
users
@endsection
@section('addres')
المستخدمين
@endsection

@section('cont')

<body>
    <main>
        <form action="{{ route('user.store') }}" class="form_col"  id="forms" method="post" autocomplete="on" enctype="multipart/form-data">
            @csrf
            {{-- @method('PUT') --}}
            <fieldset class="college" >
                <div class="top_form"><h3> اضافة المستخدمين </h3></div>
                <div class="row-r">
                    <div class="colum">
                <div class="div_college">
                    <div class="input_coll">
                        <label for="coll_num">اسم المستخدم </label>
                        <input type="text" required name="name" placeholder=" اسم المستخدم" id="user_name">
                    </div>
                    <div class="input_coll">
                        <label for="coll_num">الرقم الوظيفي </label>
                        <input type="number" required name="number" placeholder="الرقم الوظيفي" id="user_num">
                    </div>
                    <div class="input_coll">
                        <label for="coll_name">كلمة المرور</label>
                        <input type="password" name="password" required minlength="7" placeholder="كلمة المرور " id="password">
                    </div>
                    <div class="input_coll">
                        <label for="coll_name"> رقم الهاتف</label>
                        <input type="text" name="phone" required minlength="7" placeholder="رقم الهاتف " id="password">
                    </div>
                </div>
                    {{-- <div class="input_coll"> --}}
                        <div class="selet_coll">
                            <label for="col_name"> اختار نوع الحساب</label>
                            <select name="role_admin" id="role_admin">
                                <option  value="2" {{old('college_id') == 2 ? 'selected' : ''}}>
                                  Admin college  </option>
                                   <option value="1" {{old('college_id') == 1 ? 'selected' : ''}}>
                                    Admin </option>
                            </select>
                        </div>
                        <div class="selet_coll">
                            <label for="col_name"> اختار اسم الكلية</label>
                           @php
use App\Models\College;
                               $colleg=College::all();
                           @endphp
                            @if (@isset($colleg))
                            <select name="college_id" id="coll_name">
                                <option name="college_id" value="1" {{old('college_id') == 1 ? 'selected' : ''}}>
                                    جميع الكليات </option>
                            @foreach ( $colleg  as $coll)
                                <option name="college_id" value="{{ $coll->id }}" {{old('college_id') == $coll->id ? 'selected' : ''}}>
                                    {{ $coll->name }} </option>
                                @endforeach
                            </select>
                                @endif
                        </div>
                    {{-- </div> --}}
                    <div class="input_coll">
                        <label for="coll_name"> حالة الحساب (نشط - غير نشط)</label>
                        <input type="checkbox" checked  name="active"  minlength="7" id="active">
                    </div>
                </div>
                </div>
                    <div class="div_btn">
                         <input class="btn_c" id="submit" type="submit" value="حفظ">
                        <input class="btn_c" id="reset" type="reset" value="الغاء" onclick="hide()">
                    </div>

            </fieldset>
        </form>
        <div class="div_table_sec" >
             <button class="btn_show" id="coll_show" onclick="show()">  <i class="fa fa-plus"></i> إضافة مستخدم   </button>
             {{-- <input type="search" placeholder="بحث"> --}}
                {{-- <div class="col-md-12 mt1 mb1"> --}}
                    <div class="row" dir="ltr">

                        <div class="card col-md-12">
                            <div class="card-body">
            <table border="1" class="table table-striped table-bordered" width="100%" id="student-field" dir="rtl">
                <thead id="head">
                <tr>
                    <th>#</th>
                    <th><center>اسم المستخدم</center></th>
                    <th><center>الرقم الوظيفي</center></th>
                    <th><center>كلمة المرور</center> </th>
                    <th><center>ادارة</center></th>
                </tr>
            </thead>
                @foreach ($user as $ad )
                <tr>
                    <td>{{ $ad->id }}</td>
                    <td>{{ $ad->name }}</td>
                    <td>{{ $ad->number }}</td>
                    <td>{{ $ad->password }}</td>


                    <td ><center><a href="{{ route('user.edit',$ad->id) }}" style="display: inline-block"><button type="button" class="btn btn-sm btn-outline-primary btn-rounded waves-effec edit_student" data-id=" ">
                        <i class="fa fa-edit"></i></button></a>
                        <form action="{{ route('user.destroy',$ad->id) }}" method="POST" onsubmit="return submitForm(this);" style="display: inline-block" class="student_delete">
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

$(document).ready(function(){

new DataTable('#student-field');

});

    </script>
</body>
@endsection
