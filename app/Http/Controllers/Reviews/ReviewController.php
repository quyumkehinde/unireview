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
    protected function getSchoolName(int $id): string
    {
        return School::where('id', '=', $id)
            ->get('name')
            ->first()
            ->name;
    }
    public function index(int $id): View|RedirectResponse
    {
        if (!$this->schoolExist($id)) {
            return redirect(route('review.school'));
        }

        return view('review.create', [
            'schoolName' => $this->getSchoolName($id)
        ]);
    }
}
