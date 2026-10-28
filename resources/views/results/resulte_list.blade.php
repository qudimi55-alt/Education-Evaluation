@extends('layout.nav_index')
@section('title')
resulte list
@endsection
@section('addres')
قائمة النتائج
@endsection
@section('cont')


<style>
    a{
        text-decoration: none;
        color: #fff
    }
</style>
<div class="div_table_sec">
    <div class="row" dir="ltr">
        <div class="card col-md-12">
            <div class="card-body">
<table border="1" id="result_list" class="table table-striped table-bordered" dir="rtl">
    <thead>
        <tr>
            <th><center> هيئة التدريس</center> </th>
            <th style="width: 30%"><center> إدارة</center></th>
        </tr>
    </thead>
        @foreach ($eval->courses as $c )
        <tr>
            <td style="font-size: 22px">{{ $c->teacher->teacher_name  }} : {{ $c->course_name }} : {{ $c->specialty->specialty_name }} :  {{ $c->level->level_name }} : {{ $c->specialty->departement->depart_name }}</td>
            <td>
                <center>
                    <button class="btn btn-floating btn-primary waves-effect waves-light" onclick="" id=""><i class=""></i><a href="{{ route('evaluation.answers.show',[$eval->id,$c->id]) }}"> عرض التقييم </a></button>
                    <button class="btn btn-floating btn-primary waves-effect waves-light" onclick=""><i class=""></i> <a href="{{ route('headEval.answers.show',[$eval->id,$c->id]) }}"> رؤساء الاقسام </a></button>
                    </center>
                </td>
        </tr>
        @endforeach
    </table>
</div>
</div>
    </div>
</div>
<script>
    new DataTable('#result_list');
</script>
@endsection
