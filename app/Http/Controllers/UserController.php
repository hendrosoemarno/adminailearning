<?php

namespace App\Http\Controllers;

use App\Models\MoodleUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort', 'username');
        $direction = $request->input('direction', 'asc');

        // Validate allowed sort columns to prevent SQL injection or errors
        $allowedSorts = ['id', 'username', 'firstname', 'lastname', 'firstaccess'];
        if (!in_array($sort, $allowedSorts)) {
            $sort = 'username';
        }

        $query = MoodleUser::select('id', 'username', 'firstname', 'lastname', 'firstaccess');

        if ($search) {
            $query->where(function ($q) use ($search) {
                // Assuming $studentSearch is meant to be $search based on context and variable availability
                // and correcting the syntax error from the provided snippet.
                $q->where('firstname', 'like', "%{$search}%")
                    ->orWhere('lastname', 'like', "%{$search}%")
                    ->orWhere('username', 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', lastname)"), 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(lastname, ' ', firstname)"), 'like', "%{$search}%");
            });
        }

        $users = $query->orderBy($sort, $direction)
            ->paginate(20)
            ->withQueryString();

        return view('user.index', compact('users', 'search', 'sort', 'direction'));
    }
}
