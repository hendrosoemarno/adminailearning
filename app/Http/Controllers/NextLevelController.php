<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NextLevelController extends Controller
{
    public function index()
    {
        $attempts = DB::table('mdlu6_quiz_attempts as qa')
            ->join('mdlu6_quiz as q', 'qa.quiz', '=', 'q.id')
            ->join('mdlu6_course as c', 'q.course', '=', 'c.id')
            ->join('mdlu6_user as u', 'qa.userid', '=', 'u.id')
            ->select(
                'u.username',
                'u.firstname',
                'u.lastname',
                'c.fullname as course_name',
                'q.name as quiz_name',
                'qa.sumgrades as grade',
                'qa.timefinish as quiz_date'
            )
            ->where('q.name', 'like', '%Next%')
            ->where('qa.state', 'finished')
            ->where('qa.sumgrades', '>=', 90)
            ->orderBy('qa.timefinish', 'desc')
            ->get();

        return view('admin.next-level', compact('attempts'));
    }
}
