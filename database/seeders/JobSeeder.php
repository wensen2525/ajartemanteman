<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('jobs')->insert([
            ['name' =>'police'],
            ['name' =>'teacher'],
            ['name' =>'president'],
            ['name' =>'OB'],
            ['name' =>'Ojek']
        ]);
    }
}
