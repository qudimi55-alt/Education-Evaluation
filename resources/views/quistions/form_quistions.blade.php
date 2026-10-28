@extends('layout.nav_index')
@section('title')
manegar quistion

@endsection
@section('addres')
الاسئلة
@endsection
@section('cont')

<body>
    <form action="{{ route('evaluations.questions.store',$eval->id) }}" class="form_col" id="forms" method="post" autocomplete="on" enctype="multipart/form-data">
        @csrf
        <fieldset class="college">
            <div class="top_form"><h3>ادخال  الاسئلة </h3></div>
            <div class="row-r">
                <div class="colum">
                    <div class="selet_coll">
                        <label for="col_name"> اختار الفئة </label>
                        @if (isset($category))
                        <select name="category_id" id="coll_name">
                            @foreach ( $category as $cat )
                            <option value="{{ $cat->id }}" {{old('category_id') == $cat->id ? 'selected' : ''}} > {{ $cat->category_name }}</option>
                            @endforeach
                        </select>
                        @endif
                    </div>
            <div class="div_college">
                <div class="input_coll">
                    <input type="hidden" name="evaluation_list_id" value="{{ $eval->id }}">
                    <input type="hidden" name="question_for" value="{{ $questions }}">
                    <label for="coll_name">ادخل السؤال  </label>
                    <input type="text" name="question_text" required placeholder="ادخل السؤال  " id="col_name">
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
    <div class="card1">
    <div class="view view-cascade gradient-card-header blue-gradient">
        <h2 class="card-header-title text-center text-light h2"><strong>سنة التقييم : {{ $eval->evaluation_year }} الفصل الدراسي  : {{ $eval->semester_name }} </strong></h2>
        <center>
        <button class="btn btn-floating btn-primary waves-effect waves-light" onclick="show()" id="new_question"><i class="fa fa-plus"></i> إضافة سؤال  </button>
        <button class="btn btn-floating btn-primary waves-effect waves-light" onclick="$('#questionaire-frm').submit()"><i class="fa fa-save"></i>  حفظ </button>
        </center>
    </div>
    <div class="card-body">
        <form id="questionaire-frm" class="form_qus">
            <ul  id="evaluation-field">
                {{-- @foreach ($question as $qu ) --}}

                @foreach ($category as $cat )

            <li class="criteria-item"  data-id="1"><b style="font-size: 22px">{{ $cat->category_name }} </b>
                <div class="qf ui-sortable">
                    @foreach ($cat->questions->where('evaluation_list_id','==',$eval->id)
                    ->where('question_for','==',$questions) as $que )
                    <div class="question-item ">
                        <form action="{{ route('evaluations.questions.destroy',[$eval->id,$que->id]) }}" method="POST">
                            @csrf
                            @method('delete')
                            <input type="hidden" value="{{ $que->question_for }}" name="question_for">
                            <button type="submit" class="remove-fied" ><i class="fa fa-trash"></i></button></form>
    <div class="question-item-row">

    <div class="question-text"> <i class="fa fa-like"></i> <b></b> {{ $que->question_text }}  </div>
        <div class="rating-field">
            <span class="opt-group">
                <span class="mx-2">
                    <input type="radio" id="rating-1-4" name="rating[4][]" value="1" readonly="">
                    <label for="rating-1-4"> ضعيف</label>
                </span>
                <span class="mx-2">
                    <input type="radio" id="rating-2-4" name="rating[4][]" value="2" readonly="">
                    <label for="rating-2-4"> مقبول</label>
                </span>
                <span class="mx-2">
                    <input type="radio" id="rating-3-4" name="rating[4][]" value="3" readonly="">
                    <label for="rating-3-4"> جيد</label>
                </span>
                <span class="mx-2">
                    <input type="radio" id="rating-4-4" name="rating[4][]" value="4" readonly="">
                    <label for="rating-4-4"> جيد جدا</label>
                </span>
                <span class="mx-2">
                    <input type="radio" id="rating-5-4" name="rating[4][]" value="5" readonly="">
                    <label for="rating-5-4"> ممتاز</label>
                </span>

            </span>

        </div>
    </div>

</div>
                @endforeach
                </div>
            </li>
                @endforeach
                {{-- @endforeach --}}
            </ul>
       </form>
    </div>
</div>
</body>
@endsection

