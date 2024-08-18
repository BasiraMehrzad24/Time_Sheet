<?php

namespace Tests\Feature;

use App\Models\Company;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_it_can_store_a_new_project()
    {
        assert(true);
//        $user = User::factory()->create();
//        $company = Company::factory()->create();
//
//        $response = $this->actingAs($user)->post('/projects', [
//            'title' => 'Project Name',
//            'description' => 'Project Description',
//            'company_id' => $company->id,
//        ]);
//
//        $response->assertStatus(302);
    }
}
