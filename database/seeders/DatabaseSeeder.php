<?php

namespace Database\Seeders;

use App\Models\AdminUser;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Role::create([
            'name'              => 'admin',
            'slug'              =>'admin',
            'permission'        =>json_encode([]),
        ]);

        AdminUser::create([
            'role_id'                            => 1,
            'name'                              =>  'Super Admin',
            'email'                              =>  'admin@admin.com',
            'cell'                                  =>  '01748890748',
            'username'                      =>  'peovider',
            'password'                      =>  Hash::make('123456789'),
        ]);




    }
}
