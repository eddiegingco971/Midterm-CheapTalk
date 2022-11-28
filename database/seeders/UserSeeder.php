<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(20)->create();
        $default_user_value = [
            'email_verified_at' => Carbon::now(),
            'remember_token' => Str::random(10),
        ];

        $admin = User::create(array_merge([
            'name' => 'Eddie Gingco',
            'gender' =>  'male',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'), // password

        ],$default_user_value));

        $writer = User::create(array_merge([
            'name' => 'Eds Gins',
            'gender' =>  'female',
            'email' => 'writer@gmail.com',
            'password' => bcrypt('writer123'), // password

        ], $default_user_value));

        $role_as_admin= Role::create(['name' => 'admin']);
        $role_as_writer = Role::create(['name' => 'writer']);

        $permission = Permission::create(['name'=> 'create posts']);
        $permission = Permission::create(['name'=> 'update posts']);
        $permission = Permission::create(['name'=> 'edit posts']);
        $permission = Permission::create(['name'=> 'delete posts']);

        $admin->assignRole('admin');
        $writer->assignRole('writer');
    }
}
