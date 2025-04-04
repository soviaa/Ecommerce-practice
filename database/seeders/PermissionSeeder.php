<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            [
                'name' => 'View Users',
                'slug' => 'view-users',
                'description' => 'Can view user list',
                'status' => true,
                'model' => 'User',
            ],
            [
                'name' => 'Edit Users',
                'slug' => 'edit-users',
                'description' => 'Can edit user data',
                'status' => true,
                'model' => 'User',
            ],
            [
                'name' => 'Delete Users',
                'slug' => 'delete-users',
                'description' => 'Can delete users',
                'status' => true,
                'model' => 'User',
            ],
            [
                'name' => 'Manage Roles',
                'slug' => 'manage-roles',
                'description' => 'Can assign roles',
                'status' => true,
                'model' => 'Role',
            ],
        ];

        foreach ($permissions as $permission) {
            DB::table('permissions')->insert([
                'name' => $permission['name'],
                'slug' => $permission['slug'],
                'description' => $permission['description'],
                'status' => $permission['status'],
                'model' => $permission['model'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
