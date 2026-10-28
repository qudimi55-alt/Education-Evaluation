@extends('layout.nav_index')
@section('title')
resulte student
@endsection
@section('addres')
 النتائج
@endsection
@section('cont')

@php
use App\Models\Student;
use App\Models\Question;
use App\Models\Answer;
$student=Student::all()->where('level_id','=',$course->level->id)->where('specialty_id','=',$course->specialty->id);
$question=Question::all()->where('evaluation_list_id','=',$eval->id)->where('question_for','=','2');
// foreach($question as $row):
//         $criteria_q[$row->category_id][] = $row;
//                 endforeach;

                // foreach($answer as $row){
                //     if(!isset($ans[$row->student_id][$row->course_id]))
                //     $ans[$row->student_id][$row->course_id] = 0;
                //     $ans[$row->student_id][$row->course_id] += $row->answer;
                //     }
$i=1;
$tavg=0;
$z=0;
$cc=0;
@endphp
<div class="div_table_sec">
<div class="col-lg-12">
    <div class="card">


        <div class="card-header">
        <large><b>نتيجة تقييم الطلبة للمقرر </b></larger>
        <span class="float-right">
            <button class="btn btn-success btn-sm" id="print"><i class="fa fa-print"></i> طباعة </button>
        </span>
        </div>
        <div class="card-body">
        <h5><b>{{ $course->teacher->teacher_name }}</b></h5>
        <hr>
        <label for="" class="control-label"><b> المقرر الدراسي :   {{ $course->course_name }}</b></label>
            <div class="row">


                    <button class="btn  btn-sm class_btn" type="button" >{{ $course->course_name }} : {{ $course->specialty->specialty_name }}  : {{ $course->specialty->departement->depart_name }}  </button>

            </div>
        <hr>

                <label for="" class="control-label"><b> نتيجة التقييم</b></label>
                <div class="" style="width:auto;overflow:auto">
                    <table class="table table-striped table-bordered" style="max-width:auto;overflow:auto;min-width:calc(100%);width:inherit">
                        <thead>
                            <tr class="bg-primary text-white">
                                <th width="50px">الرقم الاكاديمي</th>
                                @foreach ($category as $cat )

                                <th width="150px"> {{ $cat->category_name }}       </th>
                                    <th width="100px">النسبة</th>
                                    @endforeach
                                    <th width="150px">مجموع النسب</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            foreach($student as $row):
                            $taverage = 0;
                            $c = 0;
                            $y = 0;
                            @endphp
                           <tr>
                                <td class="text-center"> @php
                                    echo $row->student_number
                                @endphp</td>

                                {{-- @foreach ($category as $cat )
                                @foreach ($question->where('category_id','=',$cat->id) as $que )
                                @foreach ($que->answer->where('student_id','=',$row->id) as $ans ) --}}
                                    @php
                                        foreach($category as $crow):
                                        // $cate=Category::withCount('questions')->get();
                                    $score = 0 ;
                                    $question=Question::all()->where('category_id','=',$crow->id)
                                    ->where('evaluation_list_id','=',$eval->id)
                                    ->where('question_for','=','2');
                                    $y++;
                                    $ccount =isset($question) ? $question->count(): 0;
                                    foreach ($question as $q) {
                                        $ans=Answer::all()->where('student_id','=',$row->id)->where('course_id','=',$course->id)
                                        ->where('evaluation_list_id','=',$eval->id)->where('question_id','=',$q->id)->first();
                                        $s=isset($ans)?$ans->answer:0;
                                        $score +=$s ;
                                    $c++;

                                    }
                                    $average = number_format($score/($ccount*5),2,'.','');
                                    $taverage += $average;
                                    if(!isset($ave[$crow->id]))
                                    $ave[$crow->id] = 0;
                                    $ave[$crow->id] += $average;
                                    if(!isset($avg[$crow->id]))
                                    $avg[$crow->id]=0;
                                    $avg[$crow->id]+=$score;
                                    @endphp


                                    <td class="text-center alert-warning text-danger"> @php
                                        // $s[]=$que->answer->where('student_id','=',$row->id);
                                        // $cou= !Empty($s)? count($que->answer->where('student_id','=',$row->id)):0;
                                        echo $score;
                                    @endphp   </td>
                                    <td class="text-center">  @php
                                        echo $average*100 . '%';
                                    @endphp </td>
                            @php

                            endforeach;
                        @endphp
                                    <td class="text-center">  @php
                                        $v;
                                  $y=($y)==0?1:$y;
                                        $v=$taverage/$y;
                                        echo number_format($taverage/$y,2,'.','')*100 .'%' ;
                                        $tavg+=$v;
                                        if ($v != 0) {
                                            $z++;
                                        }
                                    @endphp </td>
                            </tr>
                            @php

                                endforeach;
                            @endphp

                        </tbody>
                        <tfoot class="bg-primary text-white">
                            <tr>
                                <th> </th>
                                @foreach ($category as $cat )
                                        <th class="text-center">@php
                                           if (isset($avg[$cat->id])) {
                                            $avg[$cat->id]=$avg[$cat->id];
                                            }else {
                                            $avg[$cat->id]=0;
                                            }
                                            echo $avg[$cat->id];
                                            $cc++;
                                        @endphp </th>
                                        <th class="text-center">@php
                                            $z=($z)==0?1:$z;
                                            $ave[$cat->id]=isset($ave[$cat->id])?$ave[$cat->id]:0;
                                            $av[$cat->id]=number_format($ave[$cat->id]/$z,2,'.','')*100;
                                            echo $av[$cat->id] . '%';
                                        @endphp </th>
                                @endforeach
                                <th class="text-center"> @php
                                  $z=($z)==0?1:$z;
                                   $tav = number_format($tavg/$z,2,'.','')*100 ;
                                    echo   $tav .'%';
                                @endphp</th>
                            </tr>
                        </tfoot>
                    </table>
                    <hr>
                <label for="" class="control-label"><b>النتيجة العامة للتقييم</b></label>
                    <table  class="table table-bordered" id='criteria-list' style="font-size: 18px">
                        <thead>
                            <tr class="bg-primary text-white">
                                <th>معايير التقييم</th>
                                <th>نسبة التقييم</th>
                                <th>التقدير</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $cat)

                            <tr>
                                <td class="text-center alert-warning " style="color: rgb(0, 0, 0); font-size: 18px"> @php
                                    $cate[$cat->id]=isset($cat)?$cat->category_name:'';
                                    echo  $cat->category_name ;
                                @endphp   </td>
                                <td class="text-center">  @php
                                            echo $av[$cat->id] . '%';
                                @endphp </td>
                                <td class="text-center alert-warning"> @php
                                    if ( $av[$cat->id]>=90 && $av[$cat->id]<=100) {
                                        echo 'ممتاز';
                                    }
                                    elseif ( $av[$cat->id]>=75 && $av[$cat->id]<90) {
                                        echo 'جيد جدا ';
                                    }
                                    elseif ( $av[$cat->id]>=65 && $av[$cat->id]<75) {
                                        echo 'جيد ';
                                    }
                                    elseif ( $av[$cat->id]>=50 && $av[$cat->id]<65) {
                                        echo 'مقبول ';
                                    }
                                    else {
                                        echo 'ضعيف ';
                                    }


                                @endphp   </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="bg-primary text-white">
                                <th>النتيجة النهائية </th>
                                <th class="text-center" id="oa">@php
                                    echo $tav .'%';
                                @endphp</th>
                                <th class="text-center" id="interpretation">@php
                                    if ( $tav>=90 && $tav<=100) {
                                        echo 'ممتاز';
                                    }
                                    elseif ( $tav>=75 && $tav<90) {
                                        echo 'جيد جدا ';
                                    }
                                    elseif ( $tav>=65 && $tav<75) {
                                        echo 'جيد ';
                                    }
                                    elseif ( $tav>=50 && $tav<65) {
                                        echo 'مقبول ';
                                    }
                                    else {
                                        echo 'ضعيف ';
                                    }
                                @endphp</th>
                            </tr>
                        </tfoot>
                    </table>
                    <hr>
{{-- --------------------------------------- --}}
                    <div class="row wow fadeIn">

                        <!--Grid column-->
                        <div class="col-md-9 mb-4">

                          <!--Card-->
                          {{-- <div class="card"> --}}

                            <!--Card content-->
                            {{-- <div class="card-body"> --}}

                              <canvas id="myChart"></canvas>

                            </div>

                          {{-- </div> --}}
                          <!--/.Card-->

                        {{-- </div> --}}




            </div>
        </div>


    </div>
</div>

<table  width="100%" class='noborder justify-content-center' id="comments" >
    <tr>
        <td>
            <p>
                <br>
                <br><br><br>
            </p>
        </td>
    </tr>
    <tr>
    <td width="50%">
    <p><b> مركز التطوير وضمان الجودة:د/ عبد الله الاصبحي</b></p>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <p>التوقيع</p>
    </td>
    <td width="20%">

    </td>
    <td width="33%">
    <p><b>نائب رئيس الجامعة:د/ صادق اليوسفي </b></p>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<p>التوقيع</p>
    </td>
    </tr>
    </table>
<div id="print-header" >
<div class="row justify-content-center">
        <div><img src="{{ asset('assets/images/images/AA.jpg') }}" width="65px" height="65px" alt=""></div>
        <div class="text-center">
            <p>الجمهورية اليمنية </p>
            <p><b>وزارة التعليم العالي والبحث العلمي</b></p>
            <p>جامعة الجزيرة</p>
            <p>مركز التطوير وضمان الجودة</p>

            <p><b> كلية : {{ $course->specialty->departement->college->name }}</b></p>

          تخصص : {{ $course->specialty->specialty_name }} : قسم {{ $course->specialty->departement->depart_name }}



        </div>

        <!-- <div><img src="  " width="65px" height="65px" alt=""></div> -->

</div>
<h4 class="text-center"><b>نظام تقييم اعضاء هيئة التدريس </b></h4>
<table width="100%" class='noborder'>
<tr>
<td width="50%">
<p>اسم المدرس: <b>{{ $course->teacher->teacher_name }}</b></p>
<p>اسم المقرر: <b>{{  $course->course_name  }}</b></p>
</td>
<td width="50%">
<p>الفصل الدراسي: <b>{{ $eval->semester_name }}</b></p>
<p>السنة الدراسية: <b>{{  $eval->evaluation_year  }}</b></p>
</td>
</tr>
</table>
</div>
</div>
<style>
#print-header{
    display:none
}
</style>
<noscript>
<style>
 p {
    /* display:none */
    margin:unset
}
#print-header img{
    /* margin:.5em */
}
.text-center{
    text-align:center
}
.text-right{
    text-align:right
}
table{
    width:100%;
    border-collapse:collapse;
}
table tr,table td,table th{
    border: 1px solid
}
table.noborder tr,table.noborder td,table.noborder th{
    border: unset
}
.row {
    display: flex;
    flex-wrap: wrap;

}
.justify-content-center {
    -ms-flex-pack: center!important;
    justify-content: center!important;
}
table{
    direction: rtl;
}
img{
    display: block;
}
</style>
</noscript>

<script>

// var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
// var yValues = [55, 49, 44, 24, 15];
// var barColors = ["red", "green","blue","orange","brown"];

// new Chart("myChart", {
//   type: "bar",
//   data: {
//     labels: xValues,
//     datasets: [{
//       backgroundColor: barColors,
//       data: yValues
//     }]
//   },
//   options: {...}
// });
//     new WOW().init();


 document.getElementById("myChart").getContext('2d');
    var myChart = new Chart("myChart", {
      type: 'bar',
    //   type: 'doughnut',
      data: {
        // labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        labels: [
            @foreach ($category as $cat)
            '{{ $cat->category_name }}',
            @endforeach
            ],

        datasets: [{
          label: 'نسبة التقييم الكلية :%{{ $tav }} ',
        //   data: [12, 19, 3, 5, 2, 3],
          data: [
            @foreach ($category as $cat)
            {{ $av[$cat->id] }},
            @endforeach],
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });


$('#print').click(function(){
    var ns = $('noscript').clone()
    var _header = $('#print-header').clone()
    var table = $('#criteria-list').clone()
    // var imge = $('#imge').clone()
    var table2 = $('#comments').clone()
    var _div = $('<div></div')
    _div.append(table)
    // _header.append(imge)
    _div.append('<br>')
    _div.append(table2)
    var nw = window.open("","_blank","width=900,height=700");
    nw.document.write(ns.html())
    nw.document.write(_header.html())
    nw.document.write(_div.html())
    nw.document.close()
    nw.print()
    setTimeout(() => {
    nw.close()
    }, 500);
})


</script>
{{-- <script src="{{ asset('assets/js/graphjs.js') }}"></script> --}}
@endsection
