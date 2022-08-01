<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        //$storage = Storage::fake('app/public/images');
        //
        for ($i = 1; $i <= 12; $i++) {
            DB::table('companies')->insert([
                'uuid' => $faker->uuid(),
                'name' => $faker->company,
                'email' => $faker->email,
                //'logo' => $faker->image(storage_path($storage), 100, 100, null, false),
                'logo' =>$faker->image('storage/app/public/images', 400, 300, null, false),
                'website' => $faker->url,
                'created_at'=>$faker->dateTimeBetween($startDate = '-24 month',$endDate = 'now'),
                'updated_at'=>$faker->dateTimeBetween($startDate = '-3 day',$endDate = 'now')
                ]);
        }    
    }
}
