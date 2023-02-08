<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles= [
            [
            'role_name'=>'User'
            ], 
            [
            'role_name'=>'Admin'
            ], 

            ];

            foreach ($roles as $key => $value) {
                Role::create($value);
            }
    }
}
