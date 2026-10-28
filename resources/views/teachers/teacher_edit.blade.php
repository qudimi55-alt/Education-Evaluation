@extends('layout.nav_index')
@section('title')
techers edit
@endsection
@section('addres')
تعديل هيئة التدريس
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
        <form action="{{ route('teachers.update',$teacher->id) }}" class="form"  id="forms" method="post" autocomplete="on" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <fieldset class="college">
                <div class="top_form"><h3>تعديل هيئة  التدرييس</h3></div>
                <div class="row">
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
                        <input type="number" value="{{ $teacher->teacher_number }}" name="teacher_number" required placeholder="رقم المدرس"  id="sec_num">
                    </div>
                    <div class="input_coll">
                        <label for="coll_name">ادخل اسم المدرس</label>
                        <input type="text" value="{{ $teacher->teacher_name }}" name="teacher_name" required placeholder="ادخل اسم المدرس" id="sec_name">
                    </div>
                    <div class="input_coll">
                        <label for="coll_num">رقم الهاتف</label>
                        <input type="number"name="teacher_phone" value="{{ $teacher->teacher_phone }}" required  placeholder="رقم الهاتف"  id="phone_num">
                    </div>
                    <div class="input_coll">
                        <label for="coll_name"> كلمة المرور </label>
                        <input type="text"name="teacher_password" value="{{ $teacher->teacher_password }}" required placeholder="كلمة المرور" id="password">
                    </div>
                </div>
                </div>
                </div>
                <div class="div_btn">
                    <input class="btn_c" id="submit" type="submit" value="تعديل">
                    <a  class="reset"  style="width: 80px;height: 30px; " id="reset" href="../">الغاء</a>
               </div>

            </fieldset>
        </form>
        @endsection
