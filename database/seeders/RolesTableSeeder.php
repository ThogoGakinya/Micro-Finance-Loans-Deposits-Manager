<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'title' => 'Administrator',
            ],
            [
                'id'    => 2,
                'title' => 'Treasurer',
            ],
            [
                'id'    => 3,
                'title' => 'Secretary',
            ],
            [
                'id'    => 4,
                'title' => 'Member',
            ],
        ];

        Role::insert($roles);
    }
}
