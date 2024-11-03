<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Chamando os seeders
        $this->call([
            CategoriaSeeder::class,
            TransacaoSeeder::class,
        ]);
    }
}
