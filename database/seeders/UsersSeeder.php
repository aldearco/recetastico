<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::create([
            'name' => 'Alberto',
            'surname' => 'del Arco',
            'username' => 'alberto_delarco',
            'email' => 'albertodelarcogarcia@gmail.com',
            'password' => Hash::make('123456789')
        ]);
        // $user->perfil()->create(); // No hace falta


        $user2 = User::create([
            'name' => 'Lidia',
            'surname' => 'Cozar',
            'username' => 'l.cozar',
            'email' => 'cozar.lidia@gmail.com',
            'password' => Hash::make('123456789')
        ]);
        // $user2->perfil()->create(); // No hace falta

    }
}
