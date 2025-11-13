@extends('layouts.main')

@section('titulo', 'Painel Administrativo')

@section('style')
<style>
    /* ==========================================
       ESTILOS COMPLETOS DO DASHBOARD
       FORÇANDO TODOS OS ESTILOS INLINE
       ========================================== */

    /* BOTÕES EDITAR E EXCLUIR - COM BOXES */
    .btn-action-edit,
    .btn-action-delete,
    a.btn-action-edit,
    button.btn-action-delete {
        display: inline-block !important;
        padding: 6px 16px !important;
        margin: 0 4px !important;
        border-radius: 6px !important;
        font-size: 13px !important;
        font-weight: 600 !important;
        text-decoration: none !important;
        text-align: center !important;
        cursor: pointer !important;
        transition: all 0.2s ease !important;
        border: 2px solid !important;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1) !important;
    }

    /* BOTÃO EDITAR - LARANJA */
    .btn-action-edit,
    a.btn-action-edit {
        background-color: #fff !important;
        border-color: #f0ad4e !important;
        color: #f0ad4e !important;
    }

    .btn-action-edit:hover,
    a.btn-action-edit:hover {
        background-color: #f0ad4e !important;
        border-color: #f0ad4e !important;
        color: #fff !important;
        transform: translateY(-1px) !important;
        box-shadow: 0 4px 8px rgba(240,173,78,0.3) !important;
    }

    /* BOTÃO EXCLUIR - VERMELHO */
    .btn-action-delete,
    button.btn-action-delete {
        background-color: #fff !important;
        border-color: #d9534f !important;
        color: #d9534f !important;
    }

    .btn-action-delete:hover,
    button.btn-action-delete:hover {
        background-color: #d9534f !important;
        border-color: #d9534f !important;
        color: #fff !important;
        transform: translateY(-1px) !important;
        box-shadow: 0 4px 8px rgba(217,83,79,0.3) !important;
    }

    /* CONTAINER DOS BOTÕES */
    .action-buttons {
        display: flex !important;
        gap: 8px !important;
        align-items: center !important;
        justify-content: flex-end !important;
    }

    /* CARDS E TABELAS */
    .data-table {
        background: #fff !important;
        border-radius: 12px !important;
        padding: 1.5rem !important;
        margin-bottom: 1.5rem !important;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08) !important;
    }

    .dashboard-card {
        background: #fff !important;
        border-radius: 12px !important;
        padding: 1.5rem !important;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08) !important;
        border: 1px solid rgba(0,0,0,0.05) !important;
    }

    /* BOTÕES PRINCIPAIS DO DASHBOARD */
    .btn-dashboard-primary {
        background-color: #5C3A2C !important;
        border: 2px solid #5C3A2C !important;
        color: #fff !important;
        padding: 10px 20px !important;
        border-radius: 8px !important;
        font-weight: 600 !important;
        transition: all 0.2s !important;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1) !important;
    }

    .btn-dashboard-primary:hover {
        background-color: #8C5E47 !important;
        border-color: #8C5E47 !important;
        transform: translateY(-1px) !important;
        box-shadow: 0 4px 8px rgba(0,0,0,0.15) !important;
    }

    .btn-dashboard-outline {
        background-color: #fff !important;
        border: 2px solid #8C5E47 !important;
        color: #8C5E47 !important;
        padding: 10px 20px !important;
        border-radius: 8px !important;
        font-weight: 600 !important;
        transition: all 0.2s !important;
    }

    .btn-dashboard-outline:hover {
        background-color: #8C5E47 !important;
        border-color: #8C5E47 !important;
        color: #fff !important;
        transform: translateY(-1px) !important;
    }

    /* RESPONSIVO MOBILE */
    @media (max-width: 767px) {
        .action-buttons {
            flex-direction: column !important;
            gap: 6px !important;
        }

        .btn-action-edit,
        .btn-action-delete {
            width: 100% !important;
            margin: 0 !important;
        }

        .data-table {
            padding: 1rem !important;
        }
    }
    .dashboard-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
    text-align: center;
}

.dashboard-card {
    background: #fff;
    border-radius: 12px;
    padding: 1.5rem;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    border: 1px solid rgba(0,0,0,0.05);
}

.dashboard-card h3 {
    font-size: 1rem;
    font-weight: 600;
    color: #444;
    margin-bottom: 0.5rem;
}

.dashboard-card strong {
    display: block;
    font-size: 1.8rem;
    color: #5C3A2C;
    font-weight: 700;
}
</style>
@endsection




@section('content')
<div class="container py-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1">Painel Administrativo</h1>
            <p class="text-muted mb-0">Visão geral das principais métricas do sistema.</p>
        </div>
    </div>

    {{-- Mensagens de feedback --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Ops!</strong> Corrija os campos destacados abaixo.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
        </div>
    @endif

    {{-- Gerenciamento rápido --}}
    <div class="row g-4 mb-5">
        {{-- Produtos --}}
        <div class="col-12 col-lg-6">
            <div class="data-table">
                <h2 class="h5 mb-2">Gerenciar produtos</h2>
                <p class="text-muted mb-4">Crie, edite ou visualize produtos cadastrados no sistema.</p>
                <div class="d-flex gap-2 flex-wrap justify-content-center">
                    <a href="{{ route('produtos.create') }}" class="btn btn-dashboard-primary">
                    <i class="bi bi-plus-circle"></i> Adicionar novo produto
                </a>
                <a href="{{ route('produtos') }}" class="btn btn-dashboard-outline">
                    <i class="bi bi-box-seam"></i> Ver todos os produtos
                </a>

                </div>
            </div>
        </div>

        {{-- Eventos --}}
        <div class="col-12 col-lg-6">
            <div class="data-table">
                <h2 class="h5 mb-2">Gerenciar eventos</h2>
                <p class="text-muted mb-4">Cadastre, edite ou visualize eventos da associação.</p>
                <div class="d-flex gap-2 flex-wrap justify-content-center">
                    <a href="{{ route('eventos.create') }}" class="btn btn-dashboard-primary">
                    <i class="bi bi-calendar-plus"></i> Adicionar novo evento
                </a>
                <a href="{{ route('eventos.store') }}" class="btn btn-dashboard-outline">
                    <i class="bi bi-calendar-event"></i> Ver todos os eventos
                </a>

                </div>
            </div>
        </div>
    </div>

    {{-- Estatísticas principais --}}
    <section class="dashboard-grid mb-5">
        <article class="dashboard-card">
            <h3>Produtos cadastrados</h3>
            <strong>{{ $stats['produtos'] }}</strong>
        </article>
        <article class="dashboard-card">
            <h3>Eventos ativos</h3>
            <strong>{{ $stats['eventos'] }}</strong>
        </article>
        <article class="dashboard-card">
            <h3>Categorias de produtos</h3>
            <strong>{{ $stats['categorias'] }}</strong>
        </article>
        <article class="dashboard-card">
            <h3>Administradores</h3>
            <strong>{{ $stats['usuariosAdmin'] }}</strong>
        </article>
        <article class="dashboard-card">
            <h3>Usuários ativos</h3>
            <strong>{{ $stats['usuariosAtivos'] }}</strong>
        </article>
    </section>

    {{-- Últimos cadastros --}}
    <div class="row g-4">
        <div class="col-12 col-lg-6">
            <div class="data-table">
                <h2 class="h5 mb-3 border-bottom pb-2">Últimos produtos cadastrados</h2>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Categoria</th>
                                <th>Criado em</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($recentProdutos as $produto)
                                <tr>
                                    <td>{{ $produto->nome }}</td>
                                    <td>{{ optional($produto->categoria)->nome_categoria ?? '—' }}</td>
                                    <td>{{ optional($produto->created_at)->format('d/m/Y H:i') ?? '—' }}</td>
                                    <td class="text-end">
                                        <div class="action-buttons">
                                    <a href="{{ route('produtos.edit', $produto->id_produto) }}" class="btn btn-sm btn-action-edit">
                                         Editar
                                    </a>

                                    <form action="{{ route('produtos.destroy', $produto->id_produto) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-action-delete"
                                            onclick="return confirm('Tem certeza que deseja excluir este produto?')">
                                            <i class="bi bi-trash me-1"></i> Excluir
                                        </button>
                                    </form>
                                </div>
                                </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4">Nenhum produto cadastrado ainda.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="data-table">
                <h2 class="h5 mb-3 border-bottom pb-2">Próximos eventos</h2>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Início</th>
                                <th>Status</th>
                                <th class="text-end">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($recentEventos as $evento)
                                <tr>
                                    <td>{{ $evento->nome }}</td>
                                    <td>{{ optional($evento->data_inicio)->format('d/m/Y H:i') ?? '—' }}</td>
                                    <td>
                                        <span class="badge bg-secondary text-uppercase">{{ $evento->status }}</span>
                                    </td>
                                    <td class="text-end">
                                        <div class="action-buttons">
                                        <a href="{{ route('eventos.edit', $evento->id_evento) }}" class="btn btn-sm btn-action-edit">
                                            <i class="bi bi-pencil-square me-1"></i>
                                            Editar
                                        </a>
                                        <form action="{{ route('eventos.destroy', $evento->id_evento) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-action-delete"
                                                onclick="return confirm('Tem certeza que deseja excluir este evento?')">
                                                <i class="bi bi-trash me-1"></i>
                                                Excluir
                                            </button>
                                        </form>
                                    </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4">Nenhum evento cadastrado ainda.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
