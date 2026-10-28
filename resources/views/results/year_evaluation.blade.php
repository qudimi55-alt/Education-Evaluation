@extends('layout.nav_index')
@section('title')
resulte yeay
@endsection
@section('addres')
قائمة التقييمات
@endsection
@section('cont')

<div class="div_table_sec">
    <div class="row" dir="ltr">
        <div class="card col-md-12">
            <div class="card-body">
<table border="1" id="evaluation_year" class="table table-striped table-bordered" dir="rtl">
    <thead>
        <tr>
            <th><center>الفصل الدراسي</center></th>
            <th><center>السنة الدراسية</center></th>
            <th><center>إدارة</center></th>
        </tr>
    </thead>
        @foreach ($eval as $e )
        <tr>
            <td>{{ $e->semester_name }}</td>
            <td>{{ $e->evaluation_year }}</td>
            <td><center><a href="{{ route('evaluations.show',$e->id) }}" class="btn btn-sm btn-outline-info btn-rounded waves-effec view_evaluation" data-id=" "><i class="fa fa-eye"></i></a>
                </center></td>
        </tr>
        @endforeach
    </table>
</div>
        </div>
    </div>
</div>
<script>
    new DataTable('#evaluation_year');
</script>
@endsection

