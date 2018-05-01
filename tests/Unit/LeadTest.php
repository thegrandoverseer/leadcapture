<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use App\Lead;
use App\Http\Controllers\LeadController;

class LeadTest extends TestCase
{        
    public function test_it_can_create_lead()
    {
        $lead = factory(Lead::class)->make();
        $this->assertInstanceOf(Lead::class, $lead);
    }

}
