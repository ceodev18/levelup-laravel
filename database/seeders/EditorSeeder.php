<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EditorSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'editor',
            'label' => 'Editor',
        ]);
    }
}