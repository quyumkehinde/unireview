<?php

namespace App\Http\Middleware;

use App\Models\School;
use Closure;
use Illuminate\Http\Request;

class EnsureSchoolExist
{
    public function handle(Request $request, Closure $next)
    {
        $exist = School::where('id', '=', $request->school_id)->exists();
        if (!$exist) {
            return redirect(route('review.school'));
        }
        return $next($request);
    }
}
