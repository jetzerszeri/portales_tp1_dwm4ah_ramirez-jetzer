<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->insert([
            'name' => 'Limpieza post remodelación',
            'category_id' => 1,
            'description' => 'Nuestros servicios profesionales de limpieza posteriores a la renovación...',
            'img' => 'img/servicio1.webp',
        ]);
        DB::table('services')->insert([
            'name' => 'Limpieza profunda',
            'category_id' => 1,
            'description' => 'Tras finalizar una remodelación, es fundamental...',
            'img' => 'img/servicio2.webp',
        ]);
        DB::table('services')->insert([
            'name' => 'Limpieza semi profunda',
            'category_id' => 2,
            'description' => 'Tras efectuar reparaciones adicionales en su hogar...',
            'img' => 'img/servicio3.webp',
        ]);
        DB::table('services')->insert([
            'name' => 'Limpieza de retoque',
            'category_id' => 3,
            'description' => 'Sabemos que a pesar de haber realizado limpiezas exhaustivas...',
            'img' => 'img/servicio4.webp',
        ]);
    }
}
