<?php

namespace App\Http\Controllers\Reviews;

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
    protected function getResponse(int $code, string $message): JsonResponse
    {
        return response()->json([
            'statusCode' => $code,
            'message' => $message
        ]);
    }
    protected function createSchool(string $name, string $state, int $status = 0): School
    {
        return School::create([
            'name' => $name,
            'state' => $state,
            'country' => 'Nigeria',
            'status' => $status,
            'establishment_year' => 1980
        ]);
    }


    public function create(Request $request): JsonResponse
    {

        if($this->schoolExist($request->name)){
            return $this->getResponse(0, 'School already exist!');
        }

        $school = $this->createSchool($request->name, $request->state);
        return $school ? 
            $this->getResponse(1, 'School has been submitted for approval!') :
            $this->getResponse(0, 'An error occure! Please, try again.')
        ;
    }

    public function index(){
        $schools = School::where('status', '=', 0)->get(['id', 'name']);
        return view('review.school', [
            'schools' => json_encode($schools)
        ]);
    }
}
