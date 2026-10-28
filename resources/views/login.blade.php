@extends('layout.heder')
<section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-10">
          <div class="card rounded-3 text-black">
            <div class="row g-0">
              <div class="col-lg-6">
                <div class="card-body p-md-5 mx-md-4">

                  <div class="text-center">
                    <img src="{{asset('assets/images/images/p.png')}}"
                      style="width: 120px;" alt="logo">
                    <h4 class="mt-1 mb-5 pb-1">نظام التقييم الاكاديمي  </h4>
                  </div>

                  <form action="{{ route('login.store') }}" method="POST">
                    @csrf
                    {{-- <p>قم بتسجيل الدخول للوصول الى حسابك </p> --}}

                    <div data-mdb-input-init class="form-outline mb-4">
                      <label class="form-label" for="form2Example11">الرقم الاكاديمي </label>
                      <input type="text" name="number" id="form2Example11" class="form-control"
                        placeholder="الرقم الاكاديمي " />
                    </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                      <label class="form-label" for="form2Example22">كلمة المرور </label>
                      <input type="password" name="password"  id="form2Example22" class="form-control" placeholder="كلمة المرور "/>
                    </div>
                    <p>اختر طريقة الدخول </p>
                    <select  name="select" style="width: 100% ;height: 40px;margin: 0px 0px 20px 0px">
                      {{-- class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" --}}
                        <option value="1">طالب</option>
                        <option value="3">رئيس قسم </option>
                        <option value="2">مسؤول </option>
                      </select>

                    <div class="form-select form-select-lg mb-3" style="width: 100%">
                      <button type="submit"  data-mdb-button-init data-mdb-ripple-init class="btn  fa-lg gradient-custom-2 " style="width: 95%;">دخول
                        </button>
                    </div>


                  </form>

                </div>
              </div>
              <div class="col-lg-6 d-flex align-items-center gradient-custom-2" style="">
                <img src="{{asset('assets/images/images/123.png')}}" alt="" style="width: 100%"><br>

                <div class="text-white px-3 py-4 p-md-5 mx-md-4">

                  <h4 class="mb-4"></h4>
                  <p class="small mb-0"></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
