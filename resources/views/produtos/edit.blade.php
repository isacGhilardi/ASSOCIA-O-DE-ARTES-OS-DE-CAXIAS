@extends('layouts.main')

@section('title', 'Editar Produto')

@section('content')
<style>
    /* Mesmo estilo do create */
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

    .img-preview {
        display: block;
        max-width: 200px;
        border-radius: 8px;
        margin-top: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
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
</style>

<div class="produto-container">
    <h1>Editar Produto</h1>

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

    <form action="{{ route('produtos.update', $produto->id_produto) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Nome --}}
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Produto</label>
            <input type="text" class="form-control" id="nome" name="nome"
                   value="{{ old('nome', $produto->nome) }}" required>
        </div>

        {{-- Descrição --}}
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="4" required>{{ old('descricao', $produto->descricao) }}</textarea>
        </div>

        {{-- Categoria / Preço / Quantidade --}}
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="id_categoria" class="form-label">Categoria</label>
                <select class="form-select" id="id_categoria" name="id_categoria" required>
                    <option value="">Selecione...</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id_categoria }}" {{ old('id_categoria', $produto->id_categoria) == $categoria->id_categoria ? 'selected' : '' }}>
                            {{ $categoria->nome_categoria }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label for="preco" class="form-label">Preço (R$)</label>
                <input type="number" step="0.01" class="form-control" id="preco" name="preco"
                       value="{{ old('preco', $produto->preco) }}" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="quantidade" class="form-label">Quantidade em Estoque</label>
                <input type="number" class="form-control" id="quantidade" name="quantidade"
                       value="{{ old('quantidade', $produto->estoque->quantidade ?? 0) }}" required>
            </div>
        </div>

        {{-- Imagem --}}
        <div class="mb-4">
            <label for="imagem" class="form-label">Imagem do Produto</label>
            <input class="form-control" type="file" id="imagem" name="imagem" accept="image/*">

            @if ($produto->imagem)
                <small class="text-muted d-block mt-2">Imagem atual:</small>
                <img src="{{ asset('storage/' . $produto->imagem) }}" alt="Imagem atual do produto" class="img-preview">
            @endif
        </div>

        {{-- Botões --}}
        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ route('produtos') }}" class="btn btn-secondary">Voltar</a>
            <button type="submit" class="btn btn-primary">Atualizar Produto</button>
        </div>
    </form>
</div>
@endsection
