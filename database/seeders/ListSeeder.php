<?php

namespace Database\Seeders;

use App\Models\ListUp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = ListUp::create([
            'user_id'=>'2',
            'nama_list'=>'belajar tailwind',
        ]);
        $user = ListUp::create([
            'user_id'=>'2',
            'nama_list'=>'belajar membuat laravel',
        ]);
        $user = ListUp::create([
            'user_id'=>'2',
            'nama_list'=>'belajar membuat project realtime',
        ]);
        $user = ListUp::create([
            'user_id'=>'2',
            'nama_list'=>'belajar filament',
        ]);
    }
}
