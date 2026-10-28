@extends('layout.nav_index')
@section('title')
level edit
@endsection
@section('addres')
تعديل المستويات
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
        <form action="{{ route('levels.update',$level->id) }}" class="form" id="forms" method="POST" autocomplete="on" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <fieldset class="college">
                <div class="top_form"><h3>  تعديل المستويات  </h3></div>
                <div class="row">
                <div class="div_college">
                    <div class="input_coll">
                        <label for="coll_num">رقم المستوى</label>
                        <input type="number" value="{{ $level->id }}" placeholder="رقم المستوى" readonly id="sec_num">
                    </div>
                    <div class="input_coll">
                        <label for="coll_name">ادخل اسم المستوى</label>
                        <input type="text" value="{{ $level->level_name }}" name="level_name" required placeholder="ادخل اسم المستوى" id="sec_name">
                    </div>
                </div>
                </div>
                    <div class="div_btn">
                         <input class="btn_c" id="submit" type="submit" value="حفظ">
                         <a  class="reset" style="width: 80px;height: 30px; " id="reset" href="../">الغاء</a>
                    </div>

            </fieldset>
        </form>
@endsection
