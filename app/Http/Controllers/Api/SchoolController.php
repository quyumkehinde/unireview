<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    protected function schoolExist(string $schoolName): bool
    {
        return School::where('name', '=', $schoolName)->exists();
    }
    protected function getResponse(int $code, string $message): array
    {
        return [
            'statusCode' => $code,
            'message' => $message
        ];
    }
    protected function createSchool(string $name, int $state, int $status = 0): School
    {
        return School::create([
            'name' => $name,
            'state' => $state,
            'country' => 'Nigeria',
            'status' => $status
        ]);
    }
    public function create(Request $request): array
    {
        if($this->schoolExist($request->name)){
            return $this->getResponse(0, 'School already exist!');
        }

        $school = $this->createSchool($request->name, $request->state);
        return $school ? 
            $this->getResponse(1, 'School has been submitted for approval!') :
            $this->getResponse(0, 'Error occured! Please, try again.')
        ;
    }
}
