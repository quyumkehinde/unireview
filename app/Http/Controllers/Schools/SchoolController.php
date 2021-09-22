<?php

namespace App\Http\Controllers\Schools;

use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    protected function schoolExist(string $schoolName): bool
    {
        return School::where('name', '=', $schoolName)->exists();
    }

    protected function getResponse(int $statusCode, string $message): JsonResponse
    {
        return response()->json([
            'statusCode' => $statusCode,
            'message' => $message
        ]);
    }
    public function create(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'state' => 'required|string',
        ]);

        if($this->schoolExist($validatedData['name'])){
            return $this->getResponse(0, 'School already exist!');
        }
        $school = array_merge(['country' => 'Nigeria', 'status' => 0], $validatedData);

        School::create($school);
        return $this->getResponse(1, 'School has been submitted for approval!');
    }

    public function index(){
        $schools = School::where('status', '=', 0)->get(['id', 'name']);
        return view('review.school', [
            'schools' => json_encode($schools)
        ]);
    }
}
