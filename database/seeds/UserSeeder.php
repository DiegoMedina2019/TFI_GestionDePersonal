<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $diego_Admin = User::create([
            'name'=>'Diego',
            'email'=>'xecnon@gmail.com',
            'password'=>Hash::make('1234')// '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);
        //asigno rol
        $diego_Admin->assignRole('Administrador');
    }
}
