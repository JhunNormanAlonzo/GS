<?php

namespace App\Http\Controllers;

use App\Mail\GradeCommentMail;
use App\Models\Teacher;
use App\Models\TeacherStudent;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class GradeCommentController extends Controller
{
    public function sendComment(Request $request)
    {
        $title = 'Grade Comment';
        $body = $request->comment;
        $teacher_student_id = $request->email;
        $teacher_student = TeacherStudent::where('id', $teacher_student_id)->first();
        $teacher = Teacher::where('id', $teacher_student->teacher_id)->first();
        $user = User::where('id', $teacher->user_id)->first();
        $email = $user->email;
        Mail::to($email)->send(new GradeCommentMail($title, $body));
        customAlert("Success", "Email Sent!", "success");
        return redirect()->back();
    }
}
