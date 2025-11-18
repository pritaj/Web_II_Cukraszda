<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TartalomSeeder extends Seeder
{
    public function run(): void
    {
        $tartalmak = [
            ['id' => 1, 'suti_id' => 26, 'mentes' => 'G'],
            ['id' => 2, 'suti_id' => 37, 'mentes' => 'L'],
            ['id' => 3, 'suti_id' => 83, 'mentes' => 'HC'],
            ['id' => 4, 'suti_id' => 91, 'mentes' => 'G'],
            ['id' => 5, 'suti_id' => 137, 'mentes' => 'G'],
            ['id' => 6, 'suti_id' => 60, 'mentes' => 'Te'],
            ['id' => 7, 'suti_id' => 129, 'mentes' => 'HC'],
            ['id' => 8, 'suti_id' => 122, 'mentes' => 'To'],
            ['id' => 9, 'suti_id' => 90, 'mentes' => 'G'],
            ['id' => 10, 'suti_id' => 26, 'mentes' => 'To'],
            ['id' => 11, 'suti_id' => 94, 'mentes' => 'L'],
            ['id' => 12, 'suti_id' => 46, 'mentes' => 'É'],
            ['id' => 13, 'suti_id' => 72, 'mentes' => 'HC'],
            ['id' => 14, 'suti_id' => 114, 'mentes' => 'Te'],
            ['id' => 15, 'suti_id' => 63, 'mentes' => 'To'],
            ['id' => 16, 'suti_id' => 12, 'mentes' => 'Te'],
            ['id' => 17, 'suti_id' => 128, 'mentes' => 'É'],
            ['id' => 18, 'suti_id' => 51, 'mentes' => 'É'],
            ['id' => 19, 'suti_id' => 109, 'mentes' => 'To'],
            ['id' => 20, 'suti_id' => 109, 'mentes' => 'G'],
            ['id' => 21, 'suti_id' => 97, 'mentes' => 'G'],
            ['id' => 22, 'suti_id' => 97, 'mentes' => 'To'],
            ['id' => 23, 'suti_id' => 24, 'mentes' => 'L'],
            ['id' => 24, 'suti_id' => 91, 'mentes' => 'To'],
            ['id' => 25, 'suti_id' => 137, 'mentes' => 'L'],
            ['id' => 26, 'suti_id' => 84, 'mentes' => 'G'],
            ['id' => 27, 'suti_id' => 30, 'mentes' => 'HC'],
            ['id' => 28, 'suti_id' => 108, 'mentes' => 'Te'],
            ['id' => 29, 'suti_id' => 84, 'mentes' => 'To'],
            ['id' => 30, 'suti_id' => 6, 'mentes' => 'L'],
            ['id' => 31, 'suti_id' => 108, 'mentes' => 'L'],
            ['id' => 32, 'suti_id' => 12, 'mentes' => 'L'],
            ['id' => 33, 'suti_id' => 79, 'mentes' => 'É'],
            ['id' => 34, 'suti_id' => 72, 'mentes' => 'G'],
            ['id' => 35, 'suti_id' => 118, 'mentes' => 'L'],
            ['id' => 36, 'suti_id' => 60, 'mentes' => 'L'],
            ['id' => 37, 'suti_id' => 52, 'mentes' => 'É'],
            ['id' => 38, 'suti_id' => 137, 'mentes' => 'HC'],
            ['id' => 39, 'suti_id' => 114, 'mentes' => 'L'],
            ['id' => 40, 'suti_id' => 90, 'mentes' => 'To'],
            ['id' => 41, 'suti_id' => 20, 'mentes' => 'HC'],
            ['id' => 42, 'suti_id' => 63, 'mentes' => 'G'],
            ['id' => 43, 'suti_id' => 129, 'mentes' => 'G'],
            ['id' => 44, 'suti_id' => 129, 'mentes' => 'L'],
            ['id' => 45, 'suti_id' => 15, 'mentes' => 'É'],
        ];

        DB::table('tartalom')->insert($tartalmak);
    }
}
