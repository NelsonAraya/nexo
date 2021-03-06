<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
         $this->call(UsuariosTableSeeder::class);
         $this->call(TablaEstadoAsistenciaSeeder::class);
         $this->call(TablaEstadoGrupoSeeder::class);
    }
}
