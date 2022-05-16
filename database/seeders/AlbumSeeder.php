<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Album;

class AlbumSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $usuarios = User::all();
        $contador = 0;

        foreach ($usuarios as $usuario) {
            $cantidad = mt_rand(0,15);
            for ($i=0; $i < $cantidad; $i++) {
                $contador++;
                Album::create(
                    [
                        'album_nombre' => "Nombre Album $contador",
                        'album_descripcion' => "Descripcion album $contador",
                        'usuario_id' => $usuario->id,
                    ]
                );
            }
        }
    }
}
