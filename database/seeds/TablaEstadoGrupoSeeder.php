<?php

use Illuminate\Database\Seeder;

class TablaEstadoGrupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u = new App\EstadoGrupo();
        $u->nombre="Iniciado";
        $u->save();

        $u = new App\EstadoGrupo();
        $u->nombre="Activo";
        $u->save();

        $u = new App\EstadoGrupo();
        $u->nombre="Inactivo";
        $u->save();

        $u = new App\EstadoGrupo();
        $u->nombre="Disuelto";
        $u->save();
    }
}
