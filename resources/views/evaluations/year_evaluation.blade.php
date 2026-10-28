@extends('layout.nav_index')
@section('title')
evaluations
@endsection
@section('addres')
التقيمات
@endsection
@section('cont')
<body>
    <main>
        <form action="{{ route('evaluations.store') }}" class="form_col" method="post" id="forms" autocomplete="on" enctype="multipart/form-data">
            @csrf
            <fieldset class="college">
                <div class="top_form"><h3>اضافة  تقييم</h3></div>
                <div class="row">
                <div class="div_college">
                    <div class="input_coll" style="display: none">
                        <label for="coll_num">رقم التقييم</label>
                        <input type="number" placeholder="رقم المستوى" readonly id="sec_num">
                    </div>
                    <div class="input_coll">
                        <label for="coll_name">الفصل الدراسي  </label>
                        <input type="text" name="semester_name" required placeholder=" الفصل الدراسي " id="sec_name">
                    </div>
                    <div class="input_coll">
                        <label for="coll_num">السنة الدراسية </label>
                        <input type="text" name="evaluation_year" placeholder="السنة الدراسية مثل 2023-2024 "  id="col_date">
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
                <button class="btn_show" id="coll_show" onclick="show()">  <i class="fa fa-plus"></i> إضافة تقييم   </button>
                <div class="row" dir="ltr">
                    <div class="card col-md-12">
                        <div class="card-body">
            <table border="1" id="evaluation_table" class="table table-striped table-bordered" dir="rtl">
                <thead>
                <tr id="head">
                    <th>الفصل الدراسي </th>
                    <th>السنة الدراسية</th>
                    <th>الافتراضي</th>
                    <th>إدارة </th>
                </tr>
                </thead>
                @foreach ($eval as $e )
                <tr>
                    <td>{{ $e->semester_name }}</td>
                    <td>{{ $e->evaluation_year }}</td>
                    @if ($e->default==1)

                    <td> <center>
                        <a href="{{ route('restrictions.edit',$e->id) }}"><div class="badge badge-success">Yes</div></a>
                    </center></td>
                    @else
                    <th><center><a href="{{ route('restrictions.edit',$e->id) }}"><div class="badge badge-danger make_default" data-id = "'+resp[k].id+'">No</div></a></center></th>
                    @endif
                    <td><center><a href="{{ route('restrictions.show',$e->id) }}" class="btn btn-sm btn-outline-info btn-rounded waves-effec view_evaluation" data-id=" "><i class="fa fa-eye"></i></a>
                        <a href="{{ route('evaluations.edit',$e->id) }}"><button type="button" class="btn btn-sm btn-outline-primary btn-rounded waves-effec edit_student" data-id=" ">
                        <i class="fa fa-edit"></i></button></a>
                        <form action="{{ route('evaluations.destroy',$e->id) }}" method="POST" onsubmit="return submitForm(this);" style="display: inline-block">
                            @csrf
                            @method('delete')
                            <button type="submit"  class="btn btn-sm btn-outline-danger btn-rounded waves-effec remove_student" data-id=" ">
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
        new DataTable('#evaluation_table');
    </script>
</body>
@endsection
