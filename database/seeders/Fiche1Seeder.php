<?php

namespace Database\Seeders;
use DB;

use Illuminate\Database\Seeder;

class Fiche1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("csp")->insert([
            'nom' => 'CSP0'
        ]);
        DB::table("csp")->insert([
            'nom' => 'CSP1'
        ]);
    }
}
