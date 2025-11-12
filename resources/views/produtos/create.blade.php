@extends('layouts.main')

@section('title', 'Cadastrar Produto')

@section('content')
<style>
    .produto-container {
        max-width: 900px;
        margin: 40px auto;
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 6px 18px rgba(0,0,0,0.1);
        padding: 40px 50px;
    }

    .produto-container h1 {
        color: var(--brand-color, #5C3A2C);
        font-weight: 600;
        text-align: center;
        margin-bottom: 30px;
    }

    .form-label {
        font-weight: 600;
        color: var(--brand-color, #5C3A2C);
    }

    .form-control, .form-select {
        border-radius: 10px;
        padding: 12px;
        border: 1px solid #ccc;
        transition: 0.2s;
    }

    .form-control:focus, .form-select:focus {
        border-color: var(--highlight-color, #8C5E47);
        box-shadow: 0 0 4px rgba(140,94,71,0.3);
    }

    .btn-primary {
        background-color: var(--brand-color, #5C3A2C);
        border: none;
        font-weight: bold;
        padding: 12px 28px;
        border-radius: 10px;
        transition: 0.3s;
    }

    .btn-primary:hover {
        background-color: var(--highlight-color, #8C5E47);
        transform: translateY(-2px);
    }

    .btn-secondary {
        background-color: #bbb;
        border: none;
        color: #fff;
        font-weight: bold;
        padding: 12px 28px;
        border-radius: 10px;
        transition: 0.3s;
    }

    .btn-secondary:hover {
        background-color: #999;
        transform: translateY(-2px);
    }

    .alert-danger {
        background-color: #f8d7da;
        border: none;
        color: #842029;
        border-radius: 8px;
        padding: 15px 20px;
        margin-bottom: 25px;
    }

    .alert-danger ul {
        margin: 0;
        padding-left: 20px;
    }
</style>

<div class="produto-container">
    <h1>Cadastrar Novo Produto</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ops!</strong> Corrija os campos abaixo:
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ ucfirst($error) }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('produtos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Nome --}}
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Produto</label>
            <input type="text" class="form-control" id="nome" name="nome"
                   placeholder="Ex: Camisa Bege Casual" value="{{ old('nome') }}" required>
        </div>

        {{-- Descrição --}}
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao"
                      placeholder="Descreva brevemente o produto" rows="4">{{ old('descricao') }}</textarea>
        </div>

        {{-- Categoria / Preço / Quantidade --}}
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="id_categoria" class="form-label">Categoria</label>
                <select class="form-select" id="id_categoria" name="id_categoria" required>
                    <option value="">Selecione...</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id_categoria }}" {{ old('id_categoria') == $categoria->id_categoria ? 'selected' : '' }}>
                            {{ $categoria->nome_categoria }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label for="preco" class="form-label">Preço (R$)</label>
                <input type="number" step="0.01" class="form-control" id="preco" name="preco"
                       placeholder="0,00" value="{{ old('preco') }}" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="quantidade" class="form-label">Quantidade em Estoque</label>
                <input type="number" class="form-control" id="quantidade" name="quantidade"
                       placeholder="0" value="{{ old('quantidade') }}" required>
            </div>
        </div>

        {{-- Imagem --}}
        <div class="mb-4">
            <label for="imagem" class="form-label">Imagem do Produto</label>
            <input class="form-control" type="file" id="imagem" name="imagem" accept="image/*">
        </div>

        {{-- Botões --}}
        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ route('produtos') }}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Salvar Produto</button>
        </div>
    </form>
</div>
@endsection
