<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

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
