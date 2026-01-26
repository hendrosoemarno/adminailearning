<?php

namespace App\Http\Controllers;

use App\Models\MoodleUser;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = MoodleUser::select('id', 'username', 'firstname', 'lastname', 'firstaccess');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('username', 'like', "%{$search}%")
                    ->orWhere('firstname', 'like', "%{$search}%")
                    ->orWhere('lastname', 'like', "%{$search}%");
            });
        }

        $users = $query->orderBy('username')
            ->paginate(20)
            ->withQueryString();

        return view('user.index', compact('users', 'search'));
    }
}
