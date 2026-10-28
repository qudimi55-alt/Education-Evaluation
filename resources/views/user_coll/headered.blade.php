<style>
    a .dropdown-item:hover{
        color: black;
    }
</style>
<header style="width: 100%; margin-bottom: -70px">
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
                <a class="" href="/home_user"><h3> <i class="fa fa-home" aria-hidden="true"></i> @yield('addres') </h3>
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
<div style="width: 95%; margin-top: 1px; margin-right: 2.5%">
    @yield('co')

</div>
