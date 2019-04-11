<?php

use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = new \App\User();
        $usuario->email = 'email@teste';
        $usuario->senha = \Illuminate\Support\Facades\Hash::make('senha');

        $usuario->save();
    }
}
