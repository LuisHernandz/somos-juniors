<?php

namespace Database\Seeders;

use App\Models\Curso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CursoSeeder extends Seeder
{
    public function run(): void
    {
        $curso = new Curso();

        $curso->nombre = "Laravel";
        $curso->descripcion = "El mejor Framework de PHP";

        $curso->save();
    }
}

