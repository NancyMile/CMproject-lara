<?php

use Illuminate\Database\Seeder;
use App\Models\Company;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;


class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 1; $i <=12; $i++) {
            DB::table('employees')->insert([
                'uuid' => $faker->uuid(),
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'company_id' => Company::all()->random()->id,
                'email' => $faker->email,
                'phone' => $faker->numerify('#########'),
                'created_at'=>$faker->dateTimeBetween($startDate = '-24 month',$endDate = 'now'),
                'updated_at'=>$faker->dateTimeBetween($startDate = '-3 day',$endDate = 'now')
            ]);
        }  
    }
}
