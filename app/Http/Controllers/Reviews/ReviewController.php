<?php

namespace App\Http\Controllers\Reviews;

use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ReviewController extends Controller
{
    protected function schoolExist(int $id): bool
    {
        return School::where('id', '=', $id)->exists();
    }
    protected function getSchool(int $id): string
    {
        return School::where('id', '=', $id)
            ->get(['name', 'establishment_year'])
            ->first();
    }
    public function index(int $id): View|RedirectResponse
    {
        if (!$this->schoolExist($id)) {
            return redirect(route('review.school'));
        }

        return view('review.create', [
            'school' => $this->getSchool($id)
        ]);
    }
}
