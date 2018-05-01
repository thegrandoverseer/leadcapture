<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Lead;
use App\Http\Controllers\LeadController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Webpatser\Uuid\Uuid;

class LeadTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    public function test_it_can_get_list_of_leads()
    {
        $res = $this->get('/leads');
        $res->assertViewHas('leads');
        
    }
    
    public function test_it_can_insert_then_update_lead()
    {
        $lead = ['id' => Uuid::generate()->string,  'first_name' => $this->faker->firstName];
        $res = $this->json('PUT', '/updateOrCreateLead', $lead);
        $res->assertJson(['id'=>$lead['id']]);
        $updateLead = ['id' => $lead['id'], 'last_name'=> $this->faker->lastName];
        $res2 = $this->json('PUT', '/updateOrCreateLead', $updateLead);
        $res2->assertJson(['id'=>$lead['id'], 'last_name' => $updateLead['last_name'] ]);
    }

    public function test_it_can_insert_lead()
    {
        $lead = factory(Lead::class)->create();
        $payloadArr = $lead->toArray();
        $res = $this->json('PUT', '/updateOrCreateLead', $payloadArr);
        $res->assertExactJson($payloadArr);
    }
}
