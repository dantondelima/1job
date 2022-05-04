<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $path = __DIR__ . '/../estados.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info('Estado table seeded!');
    }
}
