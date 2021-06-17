<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PaperformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('paperforms')->insert([
            'pavadinimas' => 'Pirma Bandomoji forma',
            'url' => 'bandomiji-forma',
            'paperform_code' => 'bandomoji-forma145',
            'puslapis' => '{{ submission_id }}',
            'vardas' => '{{ 9pp4f }}',
            'tel' => '{{ 67vle }}',
            'el_pastas' => '{{ 8emuv }}',
            'uzklausa' => '{{ 687lo }}, {{ aidn2 }}, {{ 33dd2 }}',


        ]);
    }
}
