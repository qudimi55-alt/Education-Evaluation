@extends('layout.nav_index')
@section('title')
categories
@endsection
@section('addres')
فئات الاسئلة
@endsection
@section('cont')

<body>
    <main>
        <form action="{{ route('categories.store') }}" class="form_col" id="forms" method="post" autocomplete="on" enctype="multipart/form-data">
            @csrf
            <fieldset class="college">
                <div class="top_form"><h3>فئات الاسئلة </h3></div>
                <div class="row-r">
                <div class="div_college">
                    <div class="input_coll" style="display: none">
                        <label for="coll_num">رقم الفئة</label>
                        <input type="number" placeholder="رقم الفئة" readonly  id="col_num">
                    </div>
                    <div class="input_coll">
                        <label for="coll_name">ادخل الفئة </label>
                        <input type="text" name="category_name" required placeholder="ادخل  الفئة" id="col_name">
                    </div>
                </div>
                </div>
                    <div class="div_btn" style="display:flex">
                         <input class="btn_c" id="submit" type="submit" value="حفظ">
                        <input class="btn_c" id="reset" type="reset" value="الغاء" onclick="hide()" >
                    </div>

            </fieldset>
        </form>
        <div class="div_table_sec">
                <button class="btn_show" id="coll_show" onclick="show()">  <i class="fa fa-plus"></i> إضافة فئة   </button>
                <div class="row" dir="ltr">

                    <div class="card col-md-12">
                        <div class="card-body">
            <table border="1" id="category_table" class="table table-striped table-bordered" dir="rtl">
                <thead>
                <tr>
                    <th> # </th>
                    <th><center> الفئة</center> </th>
                    <th><center> إدارة</center></th>
                </tr>
            </thead>
                @foreach ($cate as $ca )
                <tr>
                    <td>{{ $ca->id }}</td>
                    <td> {{ $ca->category_name }}</td>
                    <td><center><a href="{{ route('categories.edit',$ca->id) }}"><button type="button" class="btn btn-sm btn-outline-primary btn-rounded waves-effec edit_student" data-id=" ">
                        <i class="fa fa-edit"></i></button></a>
                        <form action="{{ route('categories.destroy',$ca->id)}}" method="POST" onsubmit="return submitForm(this);" style="display: inline-block">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-danger btn-rounded waves-effec remove_student" data-id=" ">
                            <i class="fa fa-trash"></i></button></form></center></td>
                </tr>
                @endforeach
            </table>
                        </div>
                    </div>
                </div>
        </div>
    </main>
    <script>
        $(document).ready(function(){
            new DataTable('#category_table');
        });
    </script>
</body>
@endsection
