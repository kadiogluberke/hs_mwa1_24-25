<?php

use App\Models\Education;
use App\Models\Skill;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Carbon\Carbon;

uses(RefreshDatabase::class);

it('can list all educations', function () {
    // Create 3 education records
    Education::factory()->count(3)->create();

    $response = $this->getJson(route('api.educations.index'));

    $response->assertStatus(200)
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'details',
                    'institution_name',
                    'programme',
                ],
            ],
        ]);
});

it('can retrieve a single education entry', function () {
    // Create education with related skills
    $education = Education::factory()->create();
    $skills = Skill::factory()->count(2)->create();
    $education->skills()->attach($skills);

    $response = $this->getJson(route('api.educations.show', $education->id));

    $response->assertStatus(200)
        ->assertJson(fn (AssertableJson $json) =>
            $json->where('data.url', route('educations.show', $education->id))
                 ->where('data.institution_name', $education->institution_name)
                 ->where('data.programme', $education->programme)
                 ->where('data.location', $education->location)
                 ->where('data.started_at', 
                 $education->started_at = Carbon::parse($education->started_at)->format('M - Y'))
                 ->where('data.finished_at', 
                 Carbon::parse($education->finished_at)->format('M - Y'))
                 ->where('data.description', $education->description)
                 ->where('data.grade', $education->grade)
        );
});

it('returns 404 if an education entry does not exist', function () {
    $response = $this->getJson(route('api.educations.show', 999));

    $response->assertStatus(404);
});
