<?php

namespace App\Http\Controllers\Reviews;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\School;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    protected function schoolExist(int $id): bool
    {
        return School::where('id', '=', $id)->exists();
    }
    protected function getSchool(int $id): string
    {
        return School::where('id', '=', $id)
            ->get(['id', 'name', 'establishment_year'])
            ->first();
    }

    public function index(int $id): View|RedirectResponse
    {
        if (!$this->schoolExist($id)) {
            return redirect(route('review.school'));
        }

        return view('review.create', [
            'school' => $this->getSchool($id),
        ]);
    }





    protected function validateReview(Request $request): array
    {
        return $request->validate([
            'description' => 'required|string',
            'degree' => 'required|string',
            'course' => 'required|string',
            'graduation_year' => 'required|numeric',
            'rating' => 'required|numeric',
        ]);
    }

    public function create(Request $request)
    {
        $validatedData = $this->validateReview($request);
        $review = array_merge($validatedData, ['moderation_status' => 0]);

        Review::create($review);

        return response()->json([
            'statusCode' => 1,
            'message' => 'Your review has been submitted succesfully!'
        ]);
    }
}
