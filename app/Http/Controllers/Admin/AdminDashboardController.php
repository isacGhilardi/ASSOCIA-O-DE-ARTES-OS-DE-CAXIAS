<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoriasProdutos;
use App\Models\Eventos;
use App\Models\Instrutores;
use App\Models\Produto;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'produtos' => Produto::count(),
            'eventos' => Eventos::count(),
            'categorias' => CategoriasProdutos::count(),
            'usuariosAdmin' => User::where('role', 'admin')->count(),
            'usuariosAtivos' => User::where('is_active', true)->count(),
        ];

        $recentProdutos = Produto::latest('created_at')->limit(5)->get();
        $recentEventos = Eventos::latest('data_inicio')->limit(5)->get();

        $categorias = CategoriasProdutos::orderBy('nome_categoria')->get();
        $instrutores = Instrutores::orderBy('nome')->get();
        $tiposEvento = ['feira', 'exposicao', 'workshop', 'lancamento', 'palestra', 'outro'];
        $statusEvento = ['planejado', 'confirmado', 'em_andamento', 'concluido', 'cancelado'];

        return view('admin.dashboard', [
            'stats' => $stats,
            'recentProdutos' => $recentProdutos,
            'recentEventos' => $recentEventos,
            'categorias' => $categorias,
            'instrutores' => $instrutores,
            'tiposEvento' => $tiposEvento,
            'statusEvento' => $statusEvento,
        ]);
    }
}
