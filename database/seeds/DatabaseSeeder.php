<?php

use Illuminate\Database\Seeder;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        User::create([             
            'name' => 'admin',             
            'email' => 'admin@gmail.com',             
            'password' => Hash::make('admin@gmail.com'),
            'alamat' => 'Jombang',
           'is_level'=> '1',
          ]); 
          User::create([             
            'name' => 'dokter',             
            'email' => 'dokter@gmail.com',             
            'password' => Hash::make('dokter@gmail.com'),
            'alamat' => 'Jombang',
           'is_level'=> '2',     
          ]); 

          
    }
}
