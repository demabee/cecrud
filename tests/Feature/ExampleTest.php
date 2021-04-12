<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function fetch_specific_employee_in_company(){
      
      $response = $this->get('/employeecontroller/fetch_specific_employee_in_company');

      $response->assertStatus(200);
    }
}
