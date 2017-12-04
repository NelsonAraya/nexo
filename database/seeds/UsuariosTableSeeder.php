<?php

use Illuminate\Database\Seeder;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usu = new App\Usuario;
        $usu->rol=1967;
        $usu->nombres='Nelson Antonio';
        $usu->apellidop='Araya';
        $usu->apellidom='Vacca';
        $usu->password= bcrypt('nelson1967');
        $usu->save();

        $usu = new App\Usuario;
        $usu->rol=1944;
        $usu->nombres='Alvaro Javier';
        $usu->apellidop='Rojas';
        $usu->apellidom='Vidal';
        $usu->password= bcrypt('papita');
        $usu->save();
    }
}
