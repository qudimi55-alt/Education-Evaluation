
@extends('layout.nav_index')
@section('title')
college
@endsection
@section('addres')
الكليات
@endsection
@section('cont')

<body>
    <main>
        <form action="{{route('colleges.store')}}" class="form_col" id="forms" method="post" autocomplete="on" enctype="multipart/form-data">
            <fieldset class="college">
                 @csrf
                <div class="top_form"><h3>ادخال الكليات</h3></div>
                <div class="row-r">
                <div class="div_college">
                    <div class="input_coll" style="display: none">
                        <label for="coll_num">رقم الكلية</label>
                        <input type="number"  placeholder="رقم الكلية" readonly  id="col_num">
                    </div>
                    <div class="input_coll">
                        <label for="coll_name">ادخل اسم الكلية</label>
                        <input type="text" name="name"   placeholder="ادخل اسم الكلية" id="col_name">
                    </div>
                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                </div>
                </div>
                    <div class="div_btn">
                         <input class="btn_c" id="submit" type="submit" value="حفظ">
                        <input class="btn_c" id="reset" type="reset" value="الغاء" onclick="hide()">
                    </div>

            </fieldset>
        </form>

        <div class="div_table_sec">
                <button class="btn_show" id="coll_show" onclick="show()">  <i class="fa fa-plus"></i> إضافة كلية   </button>
                <div class="row" dir="ltr">

                    <div class="card col-md-12">
                        <div class="card-body">
            <table border="1" id="college_table" class="table table-striped table-bordered" dir="rtl">
                <thead>
                <tr >
                    <th>#</th>
                    <th><center>اسـم الكـليــــة</center></th>
                    <th style="width: 25%;"><center> إدارة</center></th>
                </tr>
            </thead>
            @php
                $i=100;
            @endphp
                @if (@isset($colleg))
                @foreach ($colleg as $coll )

                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$coll->name}}</td>
                    <td><center>  <a href="{{ route('colleges.edit',$coll->id) }}"><button type="button" class="btn btn-sm btn-outline-primary btn-rounded waves-effec edit_student" data-id=" ">
                        <i class="fa fa-edit"></i></button></a>
                        <form action="{{ route('colleges.destroy',$coll->id)}}" method="POST" onsubmit="return submitForm(this);" style="display: inline-block">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-danger btn-rounded waves-effec remove_student" data-id=" ">
                            <i class="fa fa-trash"></i></button></form></center></td>
                </tr>
                @endforeach
                @endif
            </table>
        </div>
        </div>
                </div>
        </div>
    </main>
    <script>
        new DataTable('#college_table');
    </script>
</body>

@endsection
