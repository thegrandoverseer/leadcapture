<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Lead;
use App\Http\Controllers\LeadController;

class LeadDetailTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_it_requires_lead_id_to_load()
    { 
        $response = $this->get('/lead');
        $response->assertStatus(404);

    }
    
    public function test_it_can_load_lead()
    { 
        $lead = factory(Lead::class)->create();
        $response = $this->get('/lead/' . $lead->id);
        $response->assertStatus(200);
        $response->assertViewHas('lead');
        $response->assertSee('Lead Detail');
    }
}
