<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\EducationIndexResource;
use App\Http\Resources\EducationShowResource;
use App\Models\Education;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EducationController extends Controller
{
    public function index()
    {

        $educations = Education::all()->map(function ($education) {
            $education->started_at = Carbon::parse($education->started_at)->format('M - Y');
            if ($education->finished_at !== null) {
                $education->finished_at = Carbon::parse($education->finished_at)->format('M - Y');
            }

            return $education;
        });
        $educations->load('skills');
        return EducationIndexResource::collection($educations);
    }
    public function show(string $id)
    {
        $education = Education::findOrFail($id);
        $education->started_at = Carbon::parse($education->started_at)->format('M - Y');
        if ($education->finished_at !== null) {
            $education->finished_at = Carbon::parse($education->finished_at)->format('M - Y');
        }

        $education->load('skills');
        return new EducationShowResource($education);
    }
}