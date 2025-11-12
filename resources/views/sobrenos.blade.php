@extends('layouts.main')

@section('titulo', 'Sobre Nós')

@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
<style>
    body {
        background-image: url('imagens/fundo.png');
        background-size: cover;
        background-position: center;
        margin: 0;
        padding: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    header, footer {
        background-color: #7A2E1D;
    }

    h1 {
        text-align: center;
        color: #fff;
        margin-bottom: 20px;
        font-size: 2.2rem;
        text-shadow: 1px 1px 5px rgba(0,0,0,0.7);
    }

    p {
        color: rgba(255, 255, 255, 0.9);
        font-weight: 500;
        font-size: 1.1rem;
        line-height: 1.6;
    }

    .linha {
    background: linear-gradient(135deg, rgba(122,46,29,0.9), rgba(0,0,0,0.7));
    border-radius: 15px;
    border: 1px solid rgba(255, 255, 255, 0.2);
    padding: 30px;
    margin-bottom: 30px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.3);
    transition: transform 0.3s;
}

    .linha:hover {
        transform: translateY(-5px);
    }

    main {
        max-width: 1000px;
        margin: 50px auto;
        padding: 0 15px;
    }

    @media (max-width: 768px) {
        main {
            padding: 0 10px;
        }
    }
</style>
@endsection

@section('content')
<main>
    <div class="container">
        <div class="linha text-center">
            <h1><i class="bi bi-people-fill"></i> SOBRE NÓS</h1>
            <p>
                A Associação dos Artesãos de Caxias tem como missão fortalecer, divulgar e valorizar o trabalho dos artesãos locais. Conectamos produtores, comunidade e novos públicos, promovendo o artesanato como expressão cultural e fonte de renda.
            </p>
        </div>

        <div class="linha text-center">
            <h1><i class="bi bi-journal-text"></i> NOSSA HISTÓRIA</h1>
            <p>
                Nascemos da união de artesãos e estudantes de Análise e Desenvolvimento de Sistemas da UniFacema, com o objetivo de criar uma plataforma digital que organize e divulgue as atividades artesanais. Desde então, trabalhamos para facilitar cadastro, gestão de produtos e comunicação entre os membros.
            </p>
        </div>

        <div class="linha text-center">
            <h1><i class="bi bi-people"></i> NOSSA EQUIPE</h1>
            <p>
                Nossa equipe é formada por artesãos locais, voluntários e estudantes dedicados à economia criativa de Caxias. Cada integrante contribui com talento único na produção artística, no desenvolvimento tecnológico ou na gestão do projeto.
            </p>
        </div>
    </div>
</main>
@endsection
