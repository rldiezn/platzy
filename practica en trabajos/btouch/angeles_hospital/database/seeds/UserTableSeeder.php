<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        factory(angelesHospital\User::class)->create([
            'name' => 'Samuel',
            'email' => 'admin@angeles.net',
            'role' => 'admin',
            'password' => bcrypt('admin')
        ]);
       factory(angelesHospital\User::class, 20)->create();

    }
}
