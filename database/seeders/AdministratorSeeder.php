<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $administrator = Administrator::create([
            'name' => 'Pedrito Sola'
        ]);

        $user = User::create([
            'email' => 'admin@admin.com',
            'password' => 'password',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'userable_id' => $administrator->id,
            'userable_type' => 'Administrator'
        ]);
    }
}
