<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyN8nToken
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->header('X-N8N-SECRET-TOKEN');
        $expected = env('N8N_SECRET_TOKEN', 'SecretTokenTopExam2026');

        if (empty($token) || !hash_equals($expected, $token)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized: Token tidak valid.',
            ], 401);
        }

        return $next($request);
    }
}
