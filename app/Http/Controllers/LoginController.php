<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }

    public function dashboard(Request $request)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $startDate = $request->input('start_date', date('Y-m-d'));
        $endDate = $request->input('end_date', date('Y-m-d'));
        $search = $request->input('search');
        $sort = $request->input('sort', 'timestart');
        $direction = $request->input('direction', 'desc');

        $allowedSorts = [
            'quizattid' => 'qa.id',
            'username' => 'u.username',
            'firstname' => 'u.firstname',
            'course' => 'c.fullname',
            'quizname' => 'q.name',
            'timestart' => 'qa.timestart',
            'timefinish' => 'qa.timefinish'
        ];

        $sortColumn = $allowedSorts[$sort] ?? 'qa.timestart';

        $query = \Illuminate\Support\Facades\DB::table('mdlu6_quiz_attempts as qa')
            ->join('mdlu6_user as u', 'qa.userid', '=', 'u.id')
            ->join('mdlu6_quiz as q', 'q.id', '=', 'qa.quiz')
            ->join('mdlu6_course as c', 'q.course', '=', 'c.id')
            ->select(
                'qa.id as quizattid',
                'qa.userid',
                'u.username',
                'u.firstname',
                'u.lastname',
                'q.id as quizid',
                'q.name as quizname',
                'c.id as courseid',
                'c.fullname as course',
                'q.sumgrades as jmlsoal',
                'qa.sumgrades as jmlbenar',
                \Illuminate\Support\Facades\DB::raw("FROM_UNIXTIME(qa.timestart, '%Y-%m-%d %H:%i:%s') as timestart"),
                \Illuminate\Support\Facades\DB::raw("FROM_UNIXTIME(qa.timefinish, '%Y-%m-%d %H:%i:%s') as timefinish")
            );

        // Apply Date Range Filter
        if ($startDate && $endDate) {
            $query->whereRaw("FROM_UNIXTIME(qa.timestart, '%Y-%m-%d') >= ?", [$startDate])
                ->whereRaw("FROM_UNIXTIME(qa.timestart, '%Y-%m-%d') <= ?", [$endDate]);
        } elseif ($startDate) {
            $query->whereRaw("FROM_UNIXTIME(qa.timestart, '%Y-%m-%d') >= ?", [$startDate]);
        }

        // Apply Search Filter
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('u.username', 'like', "%{$search}%")
                    ->orWhere('u.firstname', 'like', "%{$search}%")
                    ->orWhere('u.lastname', 'like', "%{$search}%")
                    ->orWhere('q.name', 'like', "%{$search}%")
                    ->orWhere('c.fullname', 'like', "%{$search}%");
            });
        }

        $results = $query->orderBy($sortColumn, $direction)->get();

        return view('dashboard', compact('results', 'startDate', 'endDate', 'search', 'sort', 'direction'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
