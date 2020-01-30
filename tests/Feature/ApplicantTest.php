<?php

namespace Tests\Feature;

use App\Models\Applicant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApplicantTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function requestNewApplicant()
    {
        $data = factory(Applicant::class)->raw();

        $response = $this->post('/api/applicants/create', $data);
        $response->assertStatus(201);
    }
}
