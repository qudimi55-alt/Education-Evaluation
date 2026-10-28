@extends('layout.header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" >
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/forms.css') }}">
    <script src="{{ asset('assets/js/all.min.js') }}"></script>
    <style>
        :::-webkit-scrollbar{
            width: 5px;

        }
        :::-webkit-scrollbar-thumb{
            background: #eee;
        }
        .sidebar-fixed{
            overflow: hidden;
            overflow-y: scroll;

        }
        .f{
            display: none;
        }
    </style>
            @php
            use App\Models\User;

                  $use=User::findorfail(Session::get('coll_id'));
                  $u=$use->role_admin;
            @endphp
</head>
<script>

    // if({{ $u }}=='2'){
        // document.getElementById('college').classList.add('f');
//   $('#departement').hide();
  col();
//    }

  </script>
<body>
    <div class="margin">
    <div class="sidebar-fixed">

        <center><a class="logo-wrapper">
          <img src="{{ asset('assets/images/images/img1.jpeg') }}" class="" alt=""  style=" height: 180px;">
        </a>
        </center>
        <div class="list-group">
                  <!-- ----------------------------------                                      --------------------->
        <a href="/" class="list-group-item">
                <i class="fas fa-tachometer-alt mr-3">  </i>الرئيسية
        </a>
                              <!-- -------  -------------------------- -->

        <a href="/colleges" id="c"  class=" {{ request()->routeIs('/colleges') ? 'active':'list-group-item'  }}">
                <i class="fas fa-building mr-3"></i>الكليات</a>
        <a href="/departements" id="c2" class="list-group-item ">
<!-- --------------------------------------    echo $department --------   -->
                <i class="fas fa-building mr-3"></i>الاقسام</a>
 <!-- --------------------------------------------------                               echo $result  -->
        <a href="/heads" id="c6" class="list-group-item">
        <i class="fas fa-user-tie mr-3"></i>رؤوساء الاقسام</a>
        {{-- -------------------------------------------------- --}}
        <a href="/specialtys" id="c3" class="list-group-item ">
                <i class="fas fa-graduation-cap mr-3"></i>التخصصات</a>
   <!-- ---------------------------------echo $level   -->
            <a href="/levels" id="c4" class="list-group-item">
                <i class="fas fa-graduation-cap mr-3"></i>المستويات</a>
                                  <!-- ------------------------------------------------------------                              echo $techer      -->
            <a href="/teachers" class="list-group-item">
              <i class="fas fa-user-tie mr-3"></i>هيئة التدريس</a>
                  <!-- ---------------------------------------------                            echo $course   -->
        <a href="/courses"  class="list-group-item  ">
                <i class="fas fa-scroll mr-3"></i>المقررات</a>
                         <!-- ----------------------------------------                                    echo $student   -->
        <a href="/students" class="list-group-item">
                <i class="fas fa-user mr-3"></i>الطلاب</a>
                      <!-- ----------------------------------------------                                   echo $criteria    -->
            <a href="/categories" id="c5" class="list-group-item ">
                <i class="fas fa-list mr-3"></i>فئات الاسئلة</a>
                          <!-- ------------------------------------------------------              echo $evaluation -->
            <a href="/evaluations" id="c8" class="list-group-item">
                <i class="fas fa-star mr-3"></i>نماذج التقييمات</a>
                      <!-- ------------------------------------------------                                 echo $users    -->
                <a href="/result_list" id="c6" class="list-group-item">
                    <i class="fas fa-list-alt mr-3"></i>النتائج</a>
                      <!-- ------------------------------------------------                                 echo $users    -->
            <a href="/user" id="c7" class="list-group-item ">
                <i class="fas fa-user-friends mr-3"></i>المستخدمين</a>
        </div>

      </div>
      <div style="margin-right: 280px; width: 80%">

      @yield('contt')
    </div>
    </div>
      </body>


      <style>
      #sidebar-list a{
        min-height:7vh
      }
      #sidebar-list{
        height: calc(100% - 10rem);
        overflow:auto
      }
      .list-group .active:active{
        background-color: rgb(60, 113, 247);
        color: #fff;
        transition: 0.5ms;
        transform: translate(1.5);
      }
      </style>
<script>
        document.getElementById('college').classList.add('f');
</script>
</html>
