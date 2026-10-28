@extends('layout.nav_index')
@section('title')
departements
@endsection
@section('addres')
الاقسام
@endsection
@section('cont')
<body>
    <main>
        <form action="{{route('departements.store')}}" class="form_col" id="forms" method="POST" autocomplete="on" enctype="multipart/form-data">
            <fieldset class="college">
                @csrf
               {{-- { {!! csrf_field() !!}} --}}
                {{-- {{ csrf_token() }} --}}
                <div class="top_form"><h3>ادخال الاقسام</h3></div>
                <div class="row-r">
                    <div class="colum">
                        <div class="selet_coll">
                            <label for="col_name"> اختار اسم الكلية</label>
                            @csrf
                            @if (@isset($colleg))
                            <select name="college_id" id="coll_name">
                            @foreach ( $colleg  as $coll)
                                <option name="college_id" value="{{ $coll->id }}" {{old('college_id') == $coll->id ? 'selected' : ''}}>
                                    {{ $coll->name }} </option>
                                @endforeach
                            </select>
                                @endif
                        </div>
                <div class="div_college">
                    <div class="input_coll" style="display: none">
                        <label for="coll_num">رقم القسم</label>
                        <input type="number" name="id" placeholder="رقم القسم" readonly  id="sec_num">
                    </div>
                    <div class="input_coll">
                        <label for="coll_name">ادخل اسم القسم</label>
                        <input type="text" name="depart_name" required placeholder="ادخل اسم القسم" id="sec_name">
                    </div>
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
             <button class="btn_show" id="coll_show"  onclick="show()">  <i class="fa fa-plus"></i> إضافة قسم   </button>
             <div class="row" dir="ltr">
                <div class="card col-md-12">
                    <div class="card-body">
        <table border="1" id="depatement_table" class="table table-striped table-bordered" dir="rtl">
            <thead>
                <tr id="head">
                    <th style="width: 5%;height: 50px;">#</th>
                    <th><center>اسم القسم</center></th>
                    <th><center>اسم الكلية</center></th>
                    <th style="width: 25%;"><center>إدارة</center></th>
                </tr>
            </thead>
            @php
                $i=230;
            @endphp
                @if (isset($depar))
                    @foreach ($depar as $d)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $d->depart_name }}</td>
                    <td>{{ $d->college->name }}</td>
                    <td><center><a href="{{ route('departements.edit',$d->id) }}">
                        <button type="button" class="btn btn-sm btn-outline-primary btn-rounded waves-effec edit_student" >
                        <i class="fa fa-edit"></i></button></a>
                        <form action="{{ route('departements.destroy',$d->id) }}" method="POST" onsubmit="return submitForm(this);" style="display: inline-block">
                        @csrf
                        @method('delete')
                        <button type="submit"  class="btn btn-sm btn-outline-danger btn-rounded waves-effec remove_student" data-id=" ">
                            <i class="fa fa-trash"></i></button></form></center>
                    </td>
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
        new DataTable('#depatement_table');
    </script>
</body>
@endsection
