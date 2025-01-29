<?php

use App\Models\User;
use App\Models\Education;
use App\Models\Skill;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;

uses(RefreshDatabase::class);

beforeEach(function () {
    // Create a user for authentication
    $this->user = User::factory()->create();
});

it('lists the educations', function () {
    Education::factory(3)->create();

    $response = $this->actingAs($this->user)->get(route('educations.index'));

    $response->assertStatus(200);
    $response->assertViewIs('educations.index');
    $response->assertViewHas('educations');
});

it('shows the create education form', function () {
    $response = $this->actingAs($this->user)->get(route('educations.create'));

    $response->assertStatus(200);
    $response->assertViewIs('educations.create');
});

it('stores a new education record', function () {
    $data = [
        'institution_name' => 'Harvard University',
        'programme' => 'Computer Science',
        'started_at' => now()->subYears(3)->format('Y-m-d'),
        'finished_at' => now()->format('Y-m-d'),
        'location' => 'USA',
        'description' => 'Great experience!',
        'grade' => 'A+',
    ];

    $response = $this->actingAs($this->user)->post(route('educations.store'), $data);

    $response->assertRedirect(route('educations.index'));
    $this->assertDatabaseHas('education', ['institution_name' => 'Harvard University']);
});

it('validates input when storing education', function () {
    $response = $this->actingAs($this->user)->post(route('educations.store'), []);

    $response->assertSessionHasErrors(['institution_name', 'programme', 'started_at']);
});

it('shows a single education record', function () {
    $education = Education::factory()->create();

    $response = $this->actingAs($this->user)->get(route('educations.show', $education));

    $response->assertStatus(200);
    $response->assertViewIs('educations.show');
    $response->assertViewHas('education', $education);
});

it('shows the edit form for an education record', function () {
    $education = Education::factory()->create();

    $response = $this->actingAs($this->user)->get(route('educations.edit', $education));

    $response->assertStatus(200);
    $response->assertViewIs('educations.edit');
    $response->assertViewHas('education', $education);
});

it('updates an existing education record', function () {
    $education = Education::factory()->create();

    $updatedData = [
        'institution_name' => 'Updated University',
        'programme' => 'Updated Programme',
        'started_at' => now()->subYears(2)->format('Y-m-d'),
        'finished_at' => now()->format('Y-m-d'),
        'location' => 'Updated Location',
        'description' => 'Updated Description',
        'grade' => 'B+',
    ];

    $response = $this->actingAs($this->user)->patch(route('educations.update', $education), $updatedData);

    $response->assertRedirect(route('educations.index'));
    $this->assertDatabaseHas('education', ['institution_name' => 'Updated University']);
});

it('deletes an education record', function () {
    $education = Education::factory()->create();

    $response = $this->actingAs($this->user)->delete(route('educations.destroy', $education));

    $response->assertRedirect(route('educations.index'));
    $this->assertDatabaseMissing('education', ['id' => $education->id]);
});

// it('prevents unauthenticated users from accessing education routes', function () {
//     $education = Education::factory()->create();

//     $this->get(route('educations.index'))->assertRedirect('/login');
//     $this->get(route('educations.create'))->assertRedirect('/login');
//     $this->post(route('educations.store'), [])->assertRedirect('/login');
//     $this->get(route('educations.edit', $education))->assertRedirect('/login');
//     $this->patch(route('educations.update', $education))->assertRedirect('/login');
//     $this->delete(route('educations.destroy', $education))->assertRedirect('/login');
// });

