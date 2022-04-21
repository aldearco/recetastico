<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias_recetas')->insert([
            'nombre' => 'Comida Mexicana',
            'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse dui neque, laoreet lacinia tellus et, pellentesque bibendum lorem.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('categorias_recetas')->insert([
            'nombre' => 'Comida Italiana',
            'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse dui neque, laoreet lacinia tellus et, pellentesque bibendum lorem.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('categorias_recetas')->insert([
            'nombre' => 'Comida Española',
            'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse dui neque, laoreet lacinia tellus et, pellentesque bibendum lorem.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('categorias_recetas')->insert([
            'nombre' => 'Comida Argentica',
            'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse dui neque, laoreet lacinia tellus et, pellentesque bibendum lorem.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('categorias_recetas')->insert([
            'nombre' => 'Postres',
            'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse dui neque, laoreet lacinia tellus et, pellentesque bibendum lorem.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('categorias_recetas')->insert([
            'nombre' => 'Ensaladas',
            'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse dui neque, laoreet lacinia tellus et, pellentesque bibendum lorem.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('categorias_recetas')->insert([
            'nombre' => 'Desayunos',
            'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse dui neque, laoreet lacinia tellus et, pellentesque bibendum lorem.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('categorias_recetas')->insert([
            'nombre' => 'Tapas',
            'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse dui neque, laoreet lacinia tellus et, pellentesque bibendum lorem.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
