<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
      $gender = $faker->randomElement(['male', 'female']);
      foreach(range(1,5) as $index){
        Db::table('employees')->insert([
          'first_name' => $faker->firstName($gender),
          'last_name' => $faker->lastName,
          'emp_email' => $faker->email,
          'phone' => $faker->e164PhoneNumber,
          'password' => Hash::make('12341234'),
          'company_id' => $index
        ]);
      }
    }
}
