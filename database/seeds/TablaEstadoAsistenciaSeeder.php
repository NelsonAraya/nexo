<?php

use Illuminate\Database\Seeder;

class TablaEstadoAsistenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u = new App\EstadoAsistencia();
        $u->nombre="Disponible";
        $u->save();
		
		$u = new App\EstadoAsistencia();
        $u->nombre="Ocupado";
        $u->save();

        $u = new App\EstadoAsistencia();
        $u->nombre="Lesionado";
        $u->save();

        $u = new App\EstadoAsistencia();
        $u->nombre="Retirado";
        $u->save();
    }
}
