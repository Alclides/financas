<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Criação de categorias de exemplo
        Categoria::firstOrCreate(['nome' => 'Aluguel']);
        Categoria::firstOrCreate(['nome' => 'Pagamento']);
        Categoria::firstOrCreate(['nome' => 'Prolabore']);
        Categoria::firstOrCreate(['nome' => 'Compras']);
        Categoria::firstOrCreate(['nome' => 'Lazer']);
    }
    
}
