@extends('layouts.main')

@section('title', 'Cadastrar Evento')

@section('content')
<style>
    /* ==== Estilo visual do formulário ==== */
    .evento-container {
        max-width: 900px;
        margin: 40px auto;
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 6px 18px rgba(0,0,0,0.1);
        padding: 40px 50px;
    }

    .evento-container h1 {
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
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 12px;
        transition: 0.2s;
    }

    .form-control:focus, .form-select:focus {
        border-color: var(--highlight-color, #8C5E47);
        box-shadow: 0 0 4px rgba(140,94,71,0.3);
    }

    textarea {
        resize: vertical;
        min-height: 100px;
    }

    .btn-primary {
        background-color: var(--brand-color, #5C3A2C);
        border: none;
        font-weight: bold;
        transition: 0.3s;
        padding: 12px 28px;
        border-radius: 10px;
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

    select.form-select,
    select.form-select option {
        color: #333 !important;
        background-color: #fff !important;
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

<div class="evento-container">
    <h1>Cadastrar Novo Evento</h1>

    {{-- Exibe erros de validação --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ops!</strong> Verifique os campos abaixo:
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ ucfirst($error) }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulário --}}
    <form action="{{ route('eventos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Nome --}}
        <div class="mb-3">
            <label for="nome_evento" class="form-label">Nome do Evento</label>
            <input type="text" class="form-control" id="nome_evento" name="nome_evento"
                   placeholder="Digite o nome do evento" value="{{ old('nome_evento') }}" required>
        </div>

        {{-- Descrição --}}
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao" placeholder="Descreva o evento" rows="4">{{ old('descricao') }}</textarea>
        </div>

        {{-- Linha com Data / Horário / Vagas --}}
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="data_evento" class="form-label">Data</label>
                <input type="date" class="form-control" id="data_evento" name="data_evento"
                       value="{{ old('data_evento') }}" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="horario_evento" class="form-label">Horário</label>
                <input type="time" class="form-control" id="horario_evento" name="horario_evento"
                       value="{{ old('horario_evento') }}" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="vagas_disponiveis" class="form-label">Vagas Disponíveis</label>
                <input type="number" min="1" class="form-control" id="vagas_disponiveis" name="vagas_disponiveis"
                       value="{{ old('vagas_disponiveis') }}" required>
            </div>
        </div>

        {{-- Local --}}
        <div class="mb-3">
            <label for="local_evento" class="form-label">Local</label>
            <input type="text" class="form-control" id="local_evento" name="local_evento"
                   placeholder="Ex: Auditório Central" value="{{ old('local_evento') }}" required>
        </div>

        {{-- Instrutor --}}
        <div class="mb-3">
            <label for="id_instrutor" class="form-label">Instrutor Responsável</label>
            <select class="form-select" id="id_instrutor" name="id_instrutor" required>
                <option value="">Selecione um instrutor...</option>
                @foreach ($instrutores as $instrutor)
                    <option value="{{ $instrutor->id_instrutor }}" {{ old('id_instrutor') == $instrutor->id_instrutor ? 'selected' : '' }}>
                        {{ $instrutor->nome_instrutor }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Imagem --}}
        <div class="mb-4">
            <label for="imagem" class="form-label">Imagem do Evento</label>
            <input class="form-control" type="file" id="imagem" name="imagem" accept="image/*">
        </div>

        {{-- Botões --}}
        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ route('evento') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Cancelar
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-check-circle"></i> Salvar Evento
            </button>
        </div>
    </form>
</div>
@endsection
