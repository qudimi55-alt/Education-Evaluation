@extends('layout.nav_index')
@section('title')
departements edit
@endsection
@section('addres')
تعديل الاقسام
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
 use App\Models\College;
 $colleg= College::all();
@endphp
@section('cont')

<form action="{{ route('departements.update',$depar->id) }}" class="form"  method="post" autocomplete="on" enctype="multipart/form-data">
    <fieldset class="college">
        @csrf
        {{-- {{ csrf_token() }} --}}
        @method('PUT')
        <div class="top_form"><h3>ادخال الاقسام</h3></div>
        <div class="row-r">
            <div class="colum">
                <div class="heden">
                    <input type="number" placeholder="رقم الكلية" readonly>
                </div>
                <div class="selet_coll">
                    <label for="col_name"> اختار اسم الكلية</label>
        @csrf
                        @if (isset($colleg))
                    <select name="college_id" id="coll_name">
                             @foreach ( $colleg  as $coll)
                        <option value="{{ $coll->id }}" {{$coll->id == $depar->college_id ? 'selected' : ''}}> {{ $coll->name }} </option>

                        @endforeach
                    </select>
                        @endif
                </div>
        <div class="div_college">
            <div class="input_coll">
                <label for="coll_num">رقم القسم</label>
                <input type="number" value="{{ $depar->id }}" name="id" placeholder="رقم القسم" readonly  id="sec_num">
            </div>
            <div class="input_coll">
                <label for="coll_name">ادخل اسم القسم</label>
                <input type="text" name="depart_name" value="{{ $depar->depart_name }}" required placeholder="ادخل اسم القسم" id="sec_name">
            </div>
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
