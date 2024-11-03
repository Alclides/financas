<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Categoria;
use App\Models\Transacao;
use Illuminate\Database\Seeder;

class TransacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Criação de transações de exemplo
        Transacao::create([
            'valor' => 800.00, // O valor será ajustado no controller, se necessário
            'tipo' => 'despesa',
            'categoria_id' => Categoria::where('nome', 'Aluguel')->first()->id,
            'data' => Carbon::now()->subDays(2),
        ]);

        Transacao::create([
            'valor' => -800.00,
            'tipo' => 'despesa',
            'categoria_id' => Categoria::where('nome', 'Aluguel')->first()->id,
            'data' => Carbon::now()->subDays(2),
        ]);

        Transacao::create([
            'valor' => -200.00,
            'tipo' => 'despesa',
            'categoria_id' => Categoria::where('nome', 'Compras')->first()->id,
            'data' => Carbon::now()->subDays(3),
        ]);

        Transacao::create([
            'valor' => 300.00,
            'tipo' => 'receita',
            'categoria_id' => Categoria::where('nome', 'Lazer')->first()->id,
            'data' => Carbon::now()->subDays(4),
        ]);
    }
}
