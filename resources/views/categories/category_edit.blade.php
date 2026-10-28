@extends('layout.nav_index')
@section('title')
categories edit
@endsection
@section('addres')
تعديل فئات الاسئلة
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

<body>
    <main>
        <form action="{{ route('categories.update',$cate->id) }}" class="form" id="forms" method="POST" autocomplete="on" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <fieldset class="college">
                <div class="top_form"><h3>تعديل فئات الاسئلة </h3></div>
                <div class="row-r">
                <div class="div_college">
                    <div class="input_coll">
                        <label for="coll_num">رقم الفئة</label>
                        <input type="number" value="{{ $cate->id }}" placeholder="رقم الفئة" readonly  id="col_num">
                    </div>
                    <div class="input_coll">
                        <label for="coll_name">ادخل الفئة </label>
                        <input type="text" name="category_name" value="{{ $cate->category_name }}" required placeholder="ادخل  الفئة" id="col_name">
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
