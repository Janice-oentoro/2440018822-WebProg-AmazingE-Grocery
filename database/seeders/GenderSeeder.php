<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genders= [
            [
            'gender_desc'=>'Male'
            ], 
            [
            'gender_desc'=>'Female'
            ], 

            ];

            foreach ($genders as $key => $value) {
                Gender::create($value);
            }
    }
    }

