@extends('layout.nav_index')
@section('title')
eavluation
@endsection
@section('addres')
قائمة التقييمات
@endsection
@section('cont')
@php
use App\Models\Course;
$val=''
@endphp
<body>
    <main>
    <form action="{{route('restrictions.store')}}" class="form_col" id="forms" method="POST" autocomplete="on" enctype="multipart/form-data">
        <fieldset class="college" style="width: 800px">
            @csrf
            <div class="top_form"><h3>ادخال مقررات التقييم </h3></div>
                <div class="row-r">
                    <div class="selet_coll">
                        <label for="col_name"> اختار  مقرر التقييم</label>
                        @csrf
                        @if (@isset($course))
                        <select name="course_id" id="coll_name" style="width:750px">
                            @foreach ( $course->where('year_teach','=',$eval->evaluation_year) as $c )
                                    <option  value="{{ $c->id }}" {{old('course_id') == $c->id ? 'selected' : ''}}>
                                    {{ $c->course_name }} : {{ $c->teacher->teacher_name }} : {{ $c->specialty->departement->depart_name }} : {{ $c->specialty->specialty_name }} : {{ $c->level->level_name }} : {{ $c->year_teach }} </option>
                            @endforeach
                        </select>
                            @endif
                    </div>
                    <input type="hidden" name="evaluation_list_id" value="{{ $eval->id }}">
            </div>
                <div class="div_btn">
                    <input class="btn_c" id="submit" type="submit" value="إضافة">
                    <input class="btn_c" id="reset" type="reset" value="الغاء" onclick="hide()">
                </div>
        </fieldset>
    </form>
    <div class="card1">
        <h2 class="h2-eval">السنة الدراسية   : {{ $eval->evaluation_year }}   الفصل  : {{ $eval->semester_name }} </h2>
        <hr>
        <div class="eval-btn">
            <center>
            <button class="btn btn-floating btn-primary" id="c9"><a href="{{ route('evaluations.questions.show',[$eval->id,2]) }}"> <i class="fa fa-list"> </i>   معاينة نموذج الطالب  </a></button>
            <button  class="btn btn-floating btn-primary" id="question_teacher"><a href="{{ route('evaluations.questions.show',[$eval->id,1]) }}">  <i class="fa fa-list"> </i>  معاينة نموذج رئيس القسم </a> </button>
            <button onclick="show()" class="btn btn-floating  btn-a"> <i class="fa fa-list"> </i>  إضافة مقرر للتقييم </button>
            </center>
        </div>
        <hr>
        <div class="input-group">
            <input type="text" id="filter" class="form-con"  placeholder="ابحث هنا">
            <div class="input-group-append">
                <i class="fa fa-search"></i>
            </div>
        </div>
        <div class="row-teach">
            @foreach ($eval->courses as $cou )
            <div class="div_eval_teach">
                <h3> <i class="fa fa-user-tie mr-3"> </i> {{ $cou->teacher->teacher_name }} </h3>
                <hr>
                <h3> المقرر : {{ $cou->course_name }}</h3>
                <br> <h3> المستوى : {{ $cou->level->level_name }} </h3>
                <div class="roww">
                    <h3> التخصص : {{ $cou->specialty->specialty_name }} </h3>

                {{-- <form action="{{ route('restrictions.destroy',$cou->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="remove-eva-teach"><i class="fa fa-trash"></i></button></form> --}}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>
</body>
@endsection

