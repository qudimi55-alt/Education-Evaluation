@extends('layout.heder')
@section('title')
home
@endsection
@section('addres')
الصفحة الرئيسية
@endsection


    <style>
        a{
            text-decoration: none;
            font-size: 22px;
            font-weight: bold;
        }

    </style>
  </head>
  <body dir="rtl">
@extends('user_coll.headered')

@section('co')
<main>
        <div class="img_trans" style="padding-right: 0;">
            <div style="width: 22%" class="img_icon"><a href="/teachers"><img src="{{asset('assets/images/images/img6.png') }}" alt=""><p>عرض الدكاترة</p></a></div>
            <div style="width: 22%" style="width: 22%" class="img_icon"><a href="/students"><img src="{{asset('assets/images/images/img7.png') }}" alt=""><p>عرض الطلاب</p></a></div>
            <div style="width: 22%" class="img_icon"><a href="/result_list"><img src="{{asset('assets/images/images/img8.png') }}" alt=""><p>نماذج التقييم</p></a></div>
            <div style="width: 22%" class="img_icon"><a href="#" ><img src="{{asset('assets/images/images/img8.png') }}" alt=""><p>نماذج التقييم</p></a></div>
        </div>
    </main>
@endsection


