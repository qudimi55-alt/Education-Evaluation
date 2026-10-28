@extends('layout.nav_index')
@section('title')
specialty
@endsection
@section('addres')
التخصصات
@endsection
@php
use App\Models\Departement;
@endphp
@section('cont')
<body>
    <main>
        <form action="{{ route('specialtys.store') }}" class="form_col" id="forms" method="POST" autocomplete="on" enctype="multipart/form-data">
                           @csrf
                         <fieldset class="college">

                <div class="top_form"><h3>ادخال  التخصصات</h3></div>
                <div class="row-r">
                    <div class="colum">
                        <div class="heden">
                            <input type="number" placeholder="رقم القسم" readonly>
                        </div>
                        <div class="selet_coll">
                            <label for="col_name"> اختار اسم القسم</label>
                               @csrf
                               @if (isset($depar))
                            <select name="departement_id" id="coll_name">
                                @foreach ($depar as $d )
                                <option name="departement_id" value="{{ $d->id }}" {{old('departement_id') == $d->id ? 'selected' : ''}}>{{ $d->depart_name }}</option>
                                @endforeach
                            </select>
                            @endif
                        </div>
                <div class="div_college">
                    <div class="input_coll" style="display: none">
                        <label for="coll_num" >رقم التخصص</label>
                        <input type="number" placeholder="رقم التخصص" readonly  id="col_num">
                    </div>
                    <div class="input_coll">
                        <label for="coll_name">ادخل اسم التخصص</label>
                        <input type="text"  name="specialty_name" required placeholder="ادخل اسم التخصص" id="col_name">
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
                <button class="btn_show" id="coll_show" onclick="show()">  <i class="fa fa-plus"></i> إضافة تخصص   </button>
                <div class="row" dir="ltr">
                    <div class="card col-md-12">
                        <div class="card-body">
            <table border="1" id="specialty_table" class="table table-striped table-bordered" dir="rtl">
                <thead>
                <tr id="head">
                    <th><center>#</center></th>
                    <th><center>اسم التخصص</center></th>
                    <th><center>اسم القسم</center></th>
                    <th><center>إدارة</center></th>
                </tr>
                </thead>
                @php
                    $i=350;
                @endphp
                @foreach ($spec as $s )

                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $s->specialty_name }}</td>
                    <td>{{ $s->departement->depart_name}}</td>
                    <td><center><a href="{{ route('specialtys.edit',$s->id) }}"><button type="button" class="btn btn-sm btn-outline-primary btn-rounded waves-effec edit_student" data-id=" ">
                        <i class="fa fa-edit"></i></button></a>
                        <form action="{{ route('specialtys.destroy',$s->id) }}" method="POST" onsubmit="return submitForm(this);" style="display: inline-block">
                            @csrf
                            @method('delete')
                            <button type="submit"  class="btn btn-sm btn-outline-danger btn-rounded waves-effec remove_student" data-id=" ">
                                <i class="fa fa-trash"></i></button></form></center>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
                    </div>
                </div>
        </div>
    </main>
    <script>
        new DataTable('#specialty_table');
    </script>
</body>
@endsection
