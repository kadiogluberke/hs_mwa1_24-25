<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EducationShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'url' => route('educations.show', $this->id),
            'institution_name' => $this->institution_name,
            'programme' => $this->programme,
            'skills' => [
                SkillResource::collection($this->skills),
                'total' => $this->skills->count(),
            ],
            'location' => $this->location,
            'started_at' => $this->started_at,
            'finished_at' => $this->finished_at,
            'description' => $this->description,
            'grade' => $this->grade,
        ];
    }
}
