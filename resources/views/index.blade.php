@extends('layout.nav_index')
@section('title')
home
@endsection
@section('addres')
الصفحة الرئيسية
@endsection
@section('user')
المسؤول
@endsection
@section('cont')
    <style>
        a{
            text-decoration: none;
            font-size: 22px;
            font-weight: bold;
        }
    </style>
  </head>
  <body dir="rtl">
    @php
use App\Models\Evaluation_list;
        $eval=Evaluation_list::all()->where('default','=',1)->first();
    @endphp
    <main>
        <div class="img_trans">
            <div class="img_icon"><a href="/teachers"><img src="{{asset('assets/images/images/img6.png') }}" alt=""><p>هيئة التدريس </p></a></div>
            <div class="img_icon"><a href="/students"><img src="{{asset('assets/images/images/img7.png') }}" alt=""><p>عرض الطلاب</p></a></div>
            @if (isset($eval))

            <div class="img_icon"><a href="{{ route('restrictions.show',$eval->id) }}"><img src="{{asset('assets/images/images/img8.png') }}" alt=""><p>اضافة المقررات للتقييم</p></a></div>
            @else
            <div class="img_icon"><a href="#"><img src="{{asset('assets/images/images/img8.png') }}" alt=""><p>نماذج التقييم</p></a></div>

            @endif

            {{-- <div class="img_icon"><a href="{{route('chekpassword.create')}}" onclick="delet(var)"><img src="{{asset('assets/images/images/img8.png') }}" alt=""><p>نماذج التقييم</p></a></div> --}}
        </div>
    </main>
    @endsection


