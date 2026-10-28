@extends('layout.nav_index')
@section('title')
 edit college
@endsection
@section('addres')
تعديل الكلية
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


<form action="{{ route('colleges.update',$colleges->id) }}" class="form"  method="post" autocomplete="on" enctype="multipart/form-data">
    <fieldset class="college">
        @csrf
        @method('PUT')
        <div class="top_form"><h3>تعديل الكليات</h3></div>
        <div class="row-r">
        <div class="div_college">
            <div class="input_coll">
                <label for="coll_num">رقم الكلية</label>
                <input type="number" value="{{ $colleges->id }}"  placeholder="رقم الكلية" readonly  id="col_num">
            </div>
            <div class="input_coll">
                <label for="coll_name"> اسم الكلية</label>
                <input type="text" value="{{ $colleges->name }}"  name="name"  required placeholder=" اسم الكلية" id="col_name">
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
