<?php

namespace Database\Seeders;

use App\Models\Volunteer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class VolunteerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $volunteer = Volunteer::create([
            'name' => 'admin@admin.com',
            'fathers_lastname' => 'admin@admin.com',
            'mothers_lastname' => 'admin@admin.com',
            'email' => 'admin@admin.com',
            'phone' => 'admin@admin.com',

            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'userable_id' => $administrator->id,
        ]);
    }
}
