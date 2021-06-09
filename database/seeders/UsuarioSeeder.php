<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Ariel',
            'email' => 'arielo774@hotmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('P@ssw0rd'),
        ]);
        User::create([
            'name' => 'Arielo',
            'email' => 'a.zambrano@sapalomera.cat',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('P@ssw0rd'),
        ]);
    }
}
