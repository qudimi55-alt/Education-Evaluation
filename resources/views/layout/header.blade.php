<!DOCTYPE html>
<html lang="en">
<head>
    {{-- alert delet --}}
<script src="{{asset('assets/js/sweetalert.min.js')}}"></script>
    {{-- alert delet --}}
    @include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{-- sweetalert cdn link --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{-- sweetalert cdn link --}}


    {{-- @extends('layout.heder') --}}
<meta charset="UTF-8">
<meta name="viewport" content="{{ csrf_token() }}">
<title>@yield('title')</title>
<link rel="stylesheet" href="{{ asset('assets/css/forms.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('assets/css/jquery.dataTables.min.css') }}"> --}}
{{-- <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}"> --}}
{{-- <link rel="stylesheet" href="{{ asset('assets/css/sb-admin-2.min.css') }}"> --}}
<script src="{{ asset('assets/js/jQuery-3.7.1.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('assets/js/all.min.js') }}"></script>
<script src="{{ asset('assets/js/Chart.js') }}"></script>
<script src="{{asset('assets/js/delet.js')}}"></script>
<script>
        function clicked(){
            var aside_2=document.querySelector(".pheader");
            aside_2.style.display=aside_2.style.display==="block"?"none":"block";
        }
    </script>


</head>
<body>
    <header style="position: fixed;width: 100%;margin-bottom: 20px">
    <nav>
        <div class="left_header">
            {{-- <select name="#" id="#" style="border: none;margin: 30px 0px 5px 10px;color: ">
                <option value="#" selected><i class="fa fa-user mr-3"></i> admin </option>
                <a href="/" >   <option value="#">حسابي<i class="fa fa-user mr-3"></i></option></a>
                <option value="#"><a href="#">خروج<i class="fa fa-sign-out-alt mr-3"></i></a></option>
            </select> --}}
            {{-- <div id="btn-id" ><i class="fa fa-user mr-3"></i> admin </div> --}}
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   {{ Session::get('name'); }}  <i class="fa fa-user mr-3"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="/user">حسابي<i class="fa fa-user mr-3"></i></a>
                  <a class="dropdown-item" href="{{route('login.index')}}">خروج<i class="fa fa-sign-out-alt mr-3"></i></a>
                </div>
              </div>
        </div>
        {{-- <div class="pheader" style="display: none;">
            <ul>
                <li><a href="#">حسابي<i class="fa fa-user mr-3"></i></a></li>
                <li><a href="#">خروج<i class="fa fa-sign-out-alt mr-3"></i></a></li>
            </ul>
        </div> --}}
        <div class="center">
            {{-- <h1> @yield('addres')   </h1> --}}
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="" href="#"><h3> @yield('addres') </h3>
                </a>
              </li>
            </ul>
        </div>
        <div class="right_header">
            {{-- <h1>نظــام تقـييم اعضـاء هيئـة الـتدريس</h1> --}}
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="" href="#"><h1>نظــام تقـييم اعضـاء هيئـة الـتدريس</h1>
                  </a>
                </li>
              </ul>
        </div>
    </nav>
   </header>
   @php
   use App\Models\User;

   $use=User::findorfail(Session::get('coll_id'));
   $u=$use->role_admin;
@endphp
<div style="margin-right: 280px;width: 80%;margin-left: 0px; margin-top: 10px; ">
    @yield('cont')

</div>
<script>
   $(document).ready(function(){
       $('#btn-id').click(function(){
           $('.pheader').show();
        });
        $(window).scroll(function(){
           $('.pheader').hide();
        });
        if({{ $u==2 }}){
            $('#c').hide();
            $('#c3').hide();
            $('#c4').hide();
            $('#c5').hide();
            $('#c6').hide();
            $('#c2').hide();
            $('#c7').hide();
            $('#c8').hide();
            $('#c9').hide();
        }
    });
</script>




</body>
</html>
