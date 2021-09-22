<?php

namespace App\Http\Controllers\Reviews;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\School;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    protected function getSchool(int $id): string
    {
        return School::where('id', '=', $id)
            ->get(['id', 'name', 'establishment_year'])
            ->first();
    }

    public function create(Request $request): View|RedirectResponse
    {
        return view('review.create', [
            'school' => $this->getSchool($request->school_id),
        ]);
    }

    protected function validateReview(Request $request): array
    {
        return $request->validate([
            'school_id' => 'required|numeric',
            'description' => 'required|string',
            'degree' => 'required|string',
            'course' => 'required|string',
            'graduation_year' => 'required|numeric',
            'rating' => 'required|numeric',
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $validatedData = $this->validateReview($request);
        $review = array_merge($validatedData, ['moderation_status' => 0]);

        Review::create($review);

        return response()->json([
            'statusCode' => 1,
            'message' => 'Your review has been submitted succesfully!'
        ]);
    }
    public function show(Request $request){
        return view('review.index');
    }
}
