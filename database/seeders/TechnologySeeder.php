<?php

namespace Database\Seeders;

use App\Models\Technology;
Use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0; $i<10; $i++){
            $newtechnology = new Technology;
            $newtechnology->name = $faker->text(10);
            $newtechnology->slug = Str::slug($newtechnology->name, '-');


            $newtechnology->save();

        }
    }
}
