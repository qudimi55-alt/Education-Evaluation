@extends('layout.nav_index')
@section('title')
evaluations edit
@endsection
@section('addres')
 تعديل التقيمات
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
        <form action="{{ route('evaluations.update',$eval->id) }}" class="form" method="post" id="forms" autocomplete="on" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <fieldset class="college">
                <div class="top_form"><h3>تعديل  تقييم </h3></div>
                <div class="row-r">
                <div class="div_college">
                    <div class="input_coll">
                        <label for="coll_num">رقم التقييم</label>
                        <input type="number" value="{{ $eval->id }}" placeholder="رقم المستوى" readonly id="sec_num">
                    </div>
                    <div class="input_coll">
                        <label for="coll_name">الفصل الدراسي  </label>
                        <input type="text" name="semester_name" value="{{ $eval->semester_name }}" required placeholder=" الفصل الدراسي " id="sec_name">
                    </div>
                    <div class="input_coll">
                        <label for="coll_num">السنة الدراسية </label>
                        <input type="text" name="evaluation_year" value="{{ $eval->evaluation_year }}" placeholder="السنة الدراسية مثل 2023-2024 "  id="col_date">
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
