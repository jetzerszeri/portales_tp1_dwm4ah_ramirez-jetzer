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
            'category' => 1,
            'description' => 'Nuestros servicios profesionales de limpieza posteriores a la renovación o construcción de una casa ofrecen una limpieza completa, detallada y meticulosa de su espacio nuevo o renovado. Este servicio incluye eliminar el polvo, la suciedad y los arañazos de todas las superficies, Aspirar y desempolvar madera, zócalos, puertas, accesorios y electrodomésticos y eliminación de pegatinas y etiquetas de cualquier instalación, entre otros.',
            'img' => 'img/servicio1.webp',
        ]);
        DB::table('services')->insert([
            'name' => 'Limpieza profunda',
            'category' => 1,
            'description' => 'Tras finalizar una remodelación, es fundamental garantizar que cada rincón de su hogar reluzca y se sienta fresco. Nuestro servicio de limpieza profunda va más allá de la limpieza convencional post remodelación. Nos enfocamos en los detalles más minuciosos que a menudo se pasan por alto. Este servicio abarca una limpieza exhaustiva de electrodomésticos, asegurándonos de que estén libres de polvo y residuos. Además, limpiamos a profundidad ventiladores, luces, gabinetes y baños, garantizando que cada espacio se sienta tan renovado como se ve. Esta limpieza se centra en devolverle a su hogar ese brillo y frescura que merece, cuidando cada detalle para que usted pueda disfrutar plenamente de su espacio renovado',
            'img' => 'img/servicio2.webp',
        ]);
        DB::table('services')->insert([
            'name' => 'Limpieza semi profunda',
            'category' => 2,
            'description' => 'Tras haber realizado una limpieza profunda y efectuar reparaciones adicionales en su hogar, es esencial asegurarse de que todas las áreas intervenidas recuperen su esplendor. Nuestro servicio de limpieza semi-profunda se centra en esas zonas que, tras las reparaciones, pueden haber acumulado polvo o residuos. Aunque no es tan exhaustivo como la limpieza profunda, este servicio garantiza que todas las áreas afectadas por las reparaciones queden impecables y listas para ser disfrutadas nuevamente. Es la opción ideal para esos toques finales que garantizan que su hogar se mantiene limpio y pulcro, incluso después de las mejoras adicionales.',
            'img' => 'img/servicio3.webp',
        ]);
        DB::table('services')->insert([
            'name' => 'Limpieza de retoque',
            'category' => 3,
            'description' => 'Sabemos que a pesar de haber realizado limpiezas exhaustivas, a veces pueden surgir imprevistos que deslucen ese acabado impecable que tanto deseamos. Ya sea por pequeños trabajos adicionales, traslados de muebles, o simplemente el ajetreo diario, ciertas áreas de su hogar pueden requerir un toque final. Nuestro servicio de limpieza de retoque está diseñado para esos momentos: para refinar, para perfeccionar, para asegurarnos de que cada rincón de su casa brille con la frescura inicial. Es una intervención rápida pero detallada, enfocada en devolverle a su espacio esa sensación de limpieza profunda y completa.',
            'img' => 'img/servicio4.webp',
        ]);
    }
}
