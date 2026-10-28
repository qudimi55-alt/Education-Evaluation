@extends('layout.nav_index')
@section('title')
specialty edit
@endsection
@section('addres')
تعديل التخصصات
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


<form action="{{ route('specialtys.update',$spe->id) }}" class="form" id="forms" method="POST" autocomplete="on" enctype="multipart/form-data">
    @csrf
    @method('PUT')
  <fieldset class="college">

<div class="top_form"><h3>تعديل  التخصصات</h3></div>
<div class="row-r">
<div class="colum">
 <div class="heden">
     <input type="number" placeholder="رقم القسم" readonly>
 </div>
 <div class="selet_coll">
     <label for="col_name"> اختار اسم القسم</label>
        @csrf
        @if (isset($depar))
     <select name="departement_id" id="coll_name">
         @foreach ($depar as $d )
         <option name="departement_id" value="{{ $d->id }}" {{$spe->departement_id == $d->id ? 'selected' : ''}}>{{ $d->depart_name }}</option>
         @endforeach
     </select>
     @endif
 </div>
<div class="div_college">
<div class="input_coll" >
 <label for="coll_num" >رقم التخصص</label>
 <input type="number" placeholder="رقم التخصص" value="{{ $spe->id }}" readonly  id="col_num">
</div>
<div class="input_coll">
 <label for="coll_name">ادخل اسم التخصص</label>
 <input type="text"  name="specialty_name" value="{{ $spe->specialty_name }}" required placeholder="ادخل اسم التخصص" id="col_name">
</div>
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
