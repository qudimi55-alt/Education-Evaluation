@extends('layout.nav_index')
@section('title')
head edit
@endsection
@section('addres')
تعديل  رئيس القسم
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
@php
use App\Models\Departement;
$depar=Departement::all();
@endphp
@section('cont')
        <form action="{{ route('heads.update',$head->id) }}" class="form"  id="forms" method="post" autocomplete="on" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <fieldset class="college">
                <div class="top_form"><h3>تعديل هيئة  التدرييس</h3></div>
                <div class="row">
                    <div class="colum">
                        <div class="selet_coll">
                             <label for="col_name"> اختار اسم القسم</label>
        @csrf
        @if (isset($depar))
     <select name="departement_id" id="coll_name">
         @foreach ($depar as $d )
         <option name="departement_id" value="{{ $d->id }}" {{$head->departement_id == $d->id ? 'selected' : ''}}>{{ $d->depart_name }}</option>
         @endforeach
     </select>
     @endif
                        </div>
                <div class="div_college">
                    <div class="input_coll">
                        <label for="coll_num">رقم بطاقة الجامعة</label>
                        <input type="number" value="{{ $head->number_head }}" name="number_head" required placeholder="رقم "  id="sec_num">
                    </div>
                    <div class="input_coll">
                        <label for="coll_name">ادخل رئيس القسم</label>
                        <input type="text" value="{{ $head->name_head }}" name="name_head" required placeholder="ادخل  اسم" id="sec_name">
                    </div>
                    <div class="input_coll">
                        <label for="coll_num">رقم الهاتف</label>
                        <input type="tel"name="phone_head" value="{{ $head->phone_head }}" required  placeholder="رقم الهاتف"  id="phone_num">
                    </div>
                    <div class="input_coll">
                        <label for="coll_name"> كلمة المرور </label>
                        <input type="text"name="password" value="{{ $head->password }}" required placeholder="كلمة المرور" id="password">
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
