<?php

namespace App\Http\Controllers;

use App\Models\Eventos;

class PaginaController extends Controller
{
    public function home()
    {
        // Buscar próximos eventos (não cancelados e futuros)
        $eventos = Eventos::where('status', '!=', 'cancelado')
            ->where('data_inicio', '>=', now())
            ->orderBy('data_inicio', 'asc')
            ->limit(6)
            ->get();

        return view('home', compact('eventos'));
    }
    
    public function index()
    {
        return redirect()->route('home');
    }

    public function sobre()
    {
        return view('sobrenos');
    }

    public function contato()
    {
        return view('contato');
    }
}
