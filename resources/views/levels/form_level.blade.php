@extends('layout.nav_index')
@section('title')
level
@endsection
@section('addres')
المستويات
@endsection
@section('cont')
<body>
    <main>
        <form action="{{ route('levels.store') }}" class="form_col" id="forms" method="post" autocomplete="on" enctype="multipart/form-data">
            @csrf
            <fieldset class="college">
                <div class="top_form"><h3>  المستويات  </h3></div>
                <div class="row">
                <div class="div_college">
                    <div class="input_coll" style="display: none">
                        <label for="coll_num">رقم المستوى</label>
                        <input type="number" placeholder="رقم المستوى" readonly id="sec_num">
                    </div>
                    <div class="input_coll">
                        <label for="coll_name">ادخل اسم المستوى</label>
                        <input type="text" name="level_name" required placeholder="ادخل اسم المستوى" id="sec_name">
                    </div>
                </div>
                </div>
                    <div class="div_btn">
                         <input class="btn_c" id="submit" type="submit" value="حفظ">
                        <input class="btn_c" id="reset" type="reset" value="الغاء" onclick="hide()">
                    </div>

            </fieldset>
        </form>
        <div class="div_table_sec">
                <button class="btn_show" id="coll_show" onclick="show()">  <i class="fa fa-plus"></i> إضافة مستوئ   </button>
                <div class="row" dir="ltr">
                    <div class="card col-md-12">
                        <div class="card-body">
            <table border="1" id="level_table" class="table table-striped table-bordered" dir="rtl">
                <thead>
                    <tr id="head">
                        <th><center> المستوى</center></th>
                        <th style="width: 25%;"><center> إدارة</center></th>
                    </tr>
                </thead>
                    @if (@isset($level))
                    @foreach ($level as $l )

                    <tr>
                        <td><center>{{$l->level_name}}</center></td>
                        <td width='20%'><center><a href="{{ route('levels.edit',$l->id) }}"><button type="button" class="btn btn-sm btn-outline-primary btn-rounded waves-effec edit_student" data-id=" ">
                            <i class="fa fa-edit"></i></button></a>
                            <form action="{{ route('levels.destroy',$l->id)}}" method="POST" onsubmit="return submitForm(this);" style="display: inline-block">
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
        new DataTable('#level_table');
    </script>
</body>
@endsection
