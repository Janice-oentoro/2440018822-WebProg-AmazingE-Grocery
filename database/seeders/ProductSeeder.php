<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products= [
            [
            'name'=>'Vegetable 1',
            'price'=> 50000,
            'description' => 'Limited Vegetable! High quality vegetable harvested fresh from the local farm. Good for heart and blood circulation.',
            'image' => 'images/1.png' 
            ], 

            [
                'name'=>'Vegetable 2',
                'price'=> 50000,
                'description' => 'Limited Vegetable! High quality vegetable harvested fresh from the local farm. Good for heart and blood circulation.',
                'image' => 'images/1.png' 
            ], 

            [
                'name'=>'Vegetable 3',
                'price'=> 50000,
                'description' => 'Limited Vegetable! High quality vegetable harvested fresh from the local farm. Good for heart and blood circulation.',
                'image' => 'images/1.png' 
            ], 

            [
                'name'=>'Vegetable 4',
                'price'=> 50000,
                'description' => 'Limited Vegetable! High quality vegetable harvested fresh from the local farm. Good for heart and blood circulation.',
                'image' => 'images/1.png' 
            ], 

            [
                'name'=>'Vegetable 5',
                'price'=> 50000,
                'description' => 'Limited Vegetable! High quality vegetable harvested fresh from the local farm. Good for heart and blood circulation.',
                'image' => 'images/1.png' 
            ], 

            [
                'name'=>'Vegetable 6',
                'price'=> 50000,
                'description' => 'Limited Vegetable! High quality vegetable harvested fresh from the local farm. Good for heart and blood circulation.',
                'image' => 'images/1.png' 
            ], 

            [
                'name'=>'Vegetable 7',
                'price'=> 50000,
                'description' => 'Limited Vegetable! High quality vegetable harvested fresh from the local farm. Good for heart and blood circulation.',
                'image' => 'images/1.png' 
            ], 

            [
                'name'=>'Vegetable 8',
                'price'=> 50000,
                'description' => 'Limited Vegetable! High quality vegetable harvested fresh from the local farm. Good for heart and blood circulation.',
                'image' => 'images/1.png' 
            ], 

            [
                'name'=>'Vegetable 9',
                'price'=> 50000,
                'description' => 'Limited Vegetable! High quality vegetable harvested fresh from the local farm. Good for heart and blood circulation.',
                'image' => 'images/1.png' 
            ], 

            [
                'name'=>'Vegetable 10',
                'price'=> 50000,
                'description' => 'Limited Vegetable! High quality vegetable harvested fresh from the local farm. Good for heart and blood circulation.',
                'image' => 'images/1.png' 
            ], 

            [
                'name'=>'Vegetable 11',
                'price'=> 35000,
                'description' => 'High quality vegetable harvested fresh from the local farm. Great cooking ingredient.',
                'image' => 'images/2.png' 
            ], 

            [
                'name'=>'Vegetable 12',
                'price'=> 35000,
                'description' => 'High quality vegetable harvested fresh from the local farm. Great cooking ingredient.',
                'image' => 'images/2.png' 
            ], 

            ];

            foreach ($products as $key => $value) {
                Product::create($value);
            }
    }
}
