<?php

use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\YearLevelController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\TeacherDashboardController;
use App\Http\Controllers\TeacherStudentController;
use App\Http\Controllers\TeacherSubjectController;

use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Xml\Report;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // auth()->logout();
    return view('auth.login');
});


Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        $role = auth()->user()->getRoleNames()->first();
        if ($role == 'admin') {
            return redirect()->route('admin.dashboard.index');
        } else if ($role == 'teacher') {
            return redirect()->route('teacher.dashboard.index');
        } else if ($role == 'student') {
            return redirect()->route('student.dashboard.index');
        }
    })->name('home');
});





Route::prefix('/admin/')->as('admin.')->middleware('role:admin')->group(function () {
    Route::get('/get-sections/year-level/{year_level_id}', [SectionController::class, 'getWhereYearLevel'])->name('get-section.year-level');
    Route::resource('/teacher-subject', TeacherSubjectController::class)->names('teacher-subject');
    Route::resource('/teacher', TeacherController::class)->names('teacher');
    Route::resource('/student', StudentController::class)->names('student');
    Route::resource('/section', SectionController::class)->names('section');
    Route::resource('/year-level', YearLevelController::class)->names('year-level');
    Route::resource('/subject', SubjectController::class)->names('subject');
    Route::resource('/report', Report::class)->names('report');
    Route::resource('/dashboard', AdminDashboardController::class)->names('dashboard');
});


Route::prefix('/teacher/')->as('teacher.')->middleware('role:teacher')->group(function () {
    Route::get('/teacher-student/subject/{subject_id}', [TeacherStudentController::class, 'viewStudentOfSubject'])->name('teacher-student.subject');
    Route::post('/set-grade/student/{student_id}/subject/{subject_id}', [GradeController::class, 'setGradeStudentSubject'])->name('set-grade.student.subject');
    Route::resource('/teacher-student', TeacherStudentController::class)->names('teacher-student');
    Route::resource('/dashboard', TeacherDashboardController::class)->names('dashboard');
});

Route::prefix('/student/')->as('student.')->middleware('role:student')->group(function () {

    Route::get(
        '/view-grade/year_level/{year_level_id}/section/{section_id}/subject/{subject_id}/{student_id}',
        [GradeController::class, 'viewGrade']
    )->name('view-grade.year.section.subject');
    Route::resource('/dashboard', StudentDashboardController::class)->names('dashboard');
});
