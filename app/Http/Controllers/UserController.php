<?php

namespace App\Http\Controllers;

use App\Models\MoodleUser;
use Illuminate\Http\Request;

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
                $q->where('username', 'like', "%{$search}%")
                    ->orWhere('firstname', 'like', "%{$search}%")
                    ->orWhere('lastname', 'like', "%{$search}%");
            });
        }

        $users = $query->orderBy($sort, $direction)
            ->paginate(20)
            ->withQueryString();

        return view('user.index', compact('users', 'search', 'sort', 'direction'));
    }
}
