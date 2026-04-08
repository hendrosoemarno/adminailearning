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
                'q.sumgrades as total_grades',
                'qa.sumgrades as earned_grades',
                'qa.timefinish as quiz_date'
            )
            ->where('q.name', 'like', '%Next%')
            ->where('qa.state', 'finished')
            ->where('q.sumgrades', '>', 0)
            ->whereRaw('(qa.sumgrades / q.sumgrades) * 100 >= 90')
            ->orderBy('qa.timefinish', 'desc')
            ->get();

        // Calculate final grade for view
        foreach ($attempts as $attempt) {
            $attempt->grade = ($attempt->earned_grades / $attempt->total_grades) * 100;
        }

        return view('admin.next-level', compact('attempts'));
    }
}
