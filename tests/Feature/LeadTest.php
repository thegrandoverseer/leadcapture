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
    
    public $json_headers = ['HTTP_X-Requested-With' => 'XMLHttpRequest'];

    public function test_it_can_submit_form_without_ajax() {
        $lead = factory(Lead::class)->make();
        $response = $this->followingRedirects()
            ->put('/updateOrCreateLead', $lead->toArray());
        $response->assertStatus(200);
        $response->assertViewIs('lead.create');
        $response->assertSee('Thanks');
    }
    
    public function test_it_can_insert_then_update_lead()
    {
        $lead = ['id' => Uuid::generate()->string,  'first_name' => $this->faker->firstName];
        $response = $this->withHeaders($this->json_headers)
            ->json('PUT', '/updateOrCreateLead', $lead);
        $response->assertStatus(200);
        $response->assertJson(['id'=>$lead['id'], 'first_name'=>$lead['first_name']]);
        

        $updateLead = ['id' => $lead['id'], 'last_name'=> $this->faker->lastName];
        $response2 = $this->withHeaders($this->json_headers)
            ->json('PUT', '/updateOrCreateLead', $updateLead);
        $response2->assertStatus(200);
        $response2->assertJson(['id'=>$lead['id'], 'last_name' => $updateLead['last_name'] ]);
    }

    public function test_it_can_insert_lead()
    {
        $lead = factory(Lead::class)->create();
        $payloadArr = $lead->toArray();
        $response = $this->withHeaders($this->json_headers)
            ->json('PUT', '/updateOrCreateLead', $payloadArr );
        $response->assertStatus(200);
        $response->assertJson(['id'=>$payloadArr['id']]);
    }

    public function test_it_can_load_landing_page()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Free Comparitive Market Analysis');
    }
}
