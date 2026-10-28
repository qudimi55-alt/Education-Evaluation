@extends('layout.nav_index')
@section('title')
users
@endsection
@section('addres')
المستخدمين
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

<form action="{{ route('user.update',$user->id) }}" class="form"  id="forms" method="post" autocomplete="on" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <fieldset class="college" >
        <div class="top_form"><h3> تعديل المستخدمين </h3></div>
        <div class="row-r">
            <div class="colum">
        <div class="div_college">
            <div class="input_coll">
                <label for="coll_num">اسم المستخدم </label>
                <input type="text" value="{{ $user->name }}" required name="name" placeholder=" اسم المستخدم" id="user_name">
            </div>
            <div class="input_coll">
                <label for="coll_num">الرقم الوظيفي </label>
                <input type="number" value="{{ $user->number }}" required name="number" placeholder="الرقم الوظيفي" id="user_num">
            </div>
            <div class="input_coll">
                <label for="coll_name">كلمة المرور</label>
                <input type="password" value="{{ $user->password }}" name="password" required minlength="7" placeholder="كلمة المرور " id="password">
            </div>
            <div class="input_coll">
                <label for="coll_name"> رقم الهاتف</label>
                <input type="text" value="{{ $user->phone }}" name="phone" required minlength="7" placeholder="رقم الهاتف " id="password">
            </div>
        </div>
            {{-- <div class="input_coll"> --}}
                <div class="selet_coll">
                    <label for="col_name"> اختار نوع الحساب</label>
                    <select name="role_admin" id="role_admin">
                        <option  value="2" {{2 ==  $user->role_admin ? 'selected' : ''}}>
                          Admin college  </option>
                           <option value="1" {{1 == $user->role_admin ? 'selected' : ''}}>
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
                        <option name="college_id" value="1" {{old('college_id') == $user->college_id ? 'selected' : ''}}>
                            جميع الكليات </option>
                    @foreach ( $colleg  as $coll)
                        <option name="college_id" value="{{ $coll->id }}" {{$coll->id ==  $user->college_id ? 'selected' : ''}}>
                            {{ $coll->name }} </option>
                        @endforeach
                    </select>
                        @endif
                </div>
            {{-- </div> --}}
            <div class="input_coll">
                <label for="coll_name"> حالة الحساب (نشط - غير نشط)</label>
                <input type="checkbox" {{ $user->status==1 ? 'checked':'' }}  value="{{ ($user->status) == 1 ? 1 : 0 }}" name="active" required minlength="7" id="active">
            </div>
        </div>
        </div>
            <div class="div_btn">
                 <input class="btn_c" id="submit" type="submit" value="تعديل">
                <a  class="reset" style="width: 80px;height: 30px; " id="reset" href="../">الغاء</a>
            </div>

    </fieldset>
</form>
@endsection
