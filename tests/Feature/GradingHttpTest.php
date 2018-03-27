<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\Traits\TestTrait;
use App\Models\Examinations\Grading;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GradingHttpTest extends TestCase
{
	use TestTrait;
	use RefreshDatabase;

	public function dummy()
	{
		return Grading::first();
	}

    public function test_index_can_be_viewed()
    {
    	$this->actAsDirector();
    	$this->get('/gradings')
    		 ->assertStatus(200)
    	     ->assertSee('Grading')
    	     ->assertSee('New Scheme');
    }

    // public function test_dos_can_create()
    // {
    // }

    // public function test_dos_can_edit()
    // {
    	
    // }

    // public function test_dos_can_delete()
    // {	
    // }

    // public function test_unauthorized_cannot_see()
    // {    	
    // }
}
