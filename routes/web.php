<?php

use App\Models\Head;
use App\Models\Answer;
use App\Models\HeadDep;
use App\Models\Teacher;
use App\Models\Category;
use App\Models\Restriction;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeadController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Pest\Arch\Support\UserDefinedFunctions;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HeadEvalController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\EvalutionController;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\RestrictionController;
use App\Http\Controllers\ChekPasswordController;
use App\Http\Controllers\EvaluationListController;

// Route::middleware(['isAdmin'])->group(function () {
//     Route::get('/dashboard', function () {
//         return 'Dashboard';
//     });
// });
Route::get('/', function () {
    return view('login');
});
// Route::get('/', function () {
//     return view('index');
// });
Route::get('/colleges', function () {
    return view('colleges.form_college');
});

Route::get('/departements/cr', function () {
    return view('departements.create_departement');
});
Route::get('/specialtys', function () {
    return view('specialtys.form_specialty');
});
Route::get('/levels', function () {
    return view('levels.form_level');
});
Route::get('/courses', function () {
    return view('courses.form_courses');
});
Route::get('/students', function () {
    return view('students.form_student');
});
Route::get('/teachers', function () {
    return view('teachers.form_techer');
});
Route::get('/categories', function () {
    return view('categories.form_categories');
});
Route::get('/evaluations', function () {
    return view('evaluations.year_evaluation');
});
Route::get('/student_eval', function () {
    return view('student_eval');
});
Route::get('/users', function () {
    return view('users.form_users');
});
Route::get('/admins', function () {
    return view('admin.form_admin');
});
Route::get('/home_user', function () {
    return view('user_coll.home_user');
});
Route::get('/heads', function () {
    return view('headOfDepartment.form_headDep');
});
// Route::get('/wellcome',function(){
//     return view('wellcome_login');
// });
Route::get('result_list', [EvaluationListController::class, 'showResult']);
// Route::get('indexx',[StudentController::class,'indexx'])->name('indexx');
// Route::get('result/{id}',[EvaluationListController::class,'viewResult']);

// Route::resource('result_list', EvaluationListController::class)->only([
//     'showResult', 'viewResult'
// ]);
// routes/web.php

// Route::post('/students/indexx', 'StudentController@indexx')->name('students.indexx');
// Route::post('/student/remove', 'StudentController@remove')->name('student.remove');



Route::resources([
    'colleges' => CollegeController::class,
    'departements' => DepartementController::class,
    'specialtys' => SpecialtyController::class,
    'levels' => LevelController::class,
    'students' => StudentController::class,
    'courses' => CourseController::class,
    'categories' => CategoryController::class,
    'teachers' => TeacherController::class,
    'evaluations' => EvaluationListController::class,
    'restrictions' => RestrictionController::class,
    'evaluations.questions' => QuestionController::class,
    'login' => LoginController::class,
    'answers' => AnswerController::class,
    'courses.students' => CourseController::class,
    'evaluation.answers' => AnswerController::class,
    'headEval.answers' => HeadController::class,
    'heads' => HeadController::class,
    'courses.haed' => HeadEvalController::class,
    'haedEval' => HeadEvalController::class,
    'user' => UserController::class,
    // 'admin' => AdminController::class,
    'chekpassword' => ChekPasswordController::class,
]);
// Route::get('questions/{id?}/{quest_for?}', QuestionController::class,showall);
