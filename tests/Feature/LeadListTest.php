<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Lead;
use App\Http\Controllers\LeadController;

class LeadListTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_get_list_of_leads()
    {
        $lead = factory(Lead::class)->create();
        $response = $this->get('/leads');
        $response->assertViewHas('leads');        
    }

    public function test_it_can_load_lead_list()
    {
        $response = $this->get('/leads');
        $response->assertStatus(200);
        $response->assertSee('Leads');
    }
}
