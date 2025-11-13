<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artesãos de Caxias - Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        /* RESET E BASE */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            position: relative;
            background-color: #F9F7D3;
            font-family: 'Montserrat', sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        body::after {
            content: "";
            position: fixed;
            bottom: -200px;
            right: -250px;
            width: 800px;
            height: 800px;
            background: url('{{ asset('imagens/artesanato_alunos/back-logo.png') }}') no-repeat center/contain;
            opacity: 0.1;
            pointer-events: none;
            z-index: -1;   
        }

        a {
            text-decoration: none;
            color: #7a2f1f;
            font-weight: 600;
        }

        /* === HEADER E NAVBAR ORIGINAL DOS ALUNOS === */
        .header {
            position: sticky;
            top: 0;
            z-index: 1000;
            width: 100%;
        }

        .navbar {
            background-color: rgba(122, 47, 31);
            -webkit-backdrop-filter: blur(10px);
            backdrop-filter: blur(10px);
            border-radius: 0 0 18px 18px;
            padding: 10px 1;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            position: center;
            width: 95%;
            max-width: 1200px;
            margin: 0 auto;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .navbar-logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .navbar-logo .circle {
            height: 60px;
            width: 60px;
        }

        .navbar-logo #name {
            height: 30px;
            width: auto;
        }

        .navbar-toggler {
            display: block;
            background: none;
            border: none;
            color: #F9F7D3;
            font-size: 2rem;
            cursor: pointer;
            padding: 0 10px;
        }

        .navbar-options {
            display: none;
            width: 100%;
            background-color: rgba(122, 47, 31);
            border-radius: 0 0 18px 18px;
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 10;
        }

        .navbar-options.active {
            display: block;
        }

        .navbar-nav {
            list-style: none;
            display: flex;
            flex-direction: column;
            margin: 0;
            padding: 10px 0;
            align-items: center;
            gap: 10px;
            position: relative;
        }

        .nav-item {
            padding: 10px 15px;
            border-radius: 10px;
            white-space: nowrap;
            transition: box-shadow 0.3s ease;
            width: 90%;
            text-align: center;
        }

        .nav-item:hover {
            background-color: rgba(242, 235, 133, 0.5);
            cursor: pointer;
        }

        .nav-item.active {
            background-color: rgba(242, 235, 133, 0.9);
            font-weight: 700;
        }

        .nav-link {
            color: #F9F7D3;
            font-weight: 600;
        }

        .active-line {
            display: none;
        }

        /* Botão Associe-se */
        .btn-associe {
            background-color: #F2EB85;
            color: #7a2f1f !important;
            padding: 8px 20px;
            border-radius: 20px;
            font-weight: 700;
            transition: all 0.3s ease;
            border: 2px solid #F2EB85;
        }

        .btn-associe:hover {
            background-color: transparent;
            color: #F2EB85 !important;
            border-color: #F2EB85;
        }

        /* Botão Logout */
        .btn-logout {
            background: none;
            border: none;
            color: #F9F7D3;
            font: inherit;
            cursor: pointer;
            font-weight: 600;
            padding: 0;
        }

        .btn-logout:hover {
            opacity: 0.8;
        }

        /* DESKTOP NAVBAR */
        @media (min-width: 900px) {
            .navbar {
                flex-wrap: nowrap;
                padding: 10px 1.5rem;
            }

            .navbar-logo .circle {
                height: 70px;
                width: 70px;
            }

            .navbar-logo #name {
                height: 35px;
            }

            .navbar-toggler {
                display: none;
            }

            .navbar-options {
                display: flex;
                position: static;
                width: auto;
                background-color: transparent;
                border-radius: 0;
            }

            .navbar-nav {
                flex-direction: row;
                gap: 35px;
                padding: 0;
            }

            .nav-item {
                width: auto;
                background-color: transparent;
                box-shadow: none;
                padding: 10px 0;
            }

            .nav-item:hover {
                background-color: transparent;
            }

            .nav-item.active {
                background-color: transparent;
                font-weight: 700;
            }

            .active-line {
                display: block;
                position: absolute;
                bottom: -5px;
                height: 3px;
                background-color: #F2EB85;
                transition: width 0.3s ease, left 0.3s ease;
                opacity: 0;
                border-radius: 2px;
            }
        }

        /* === SEÇÕES DE CONTEÚDO === */
        .content-section {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 80px 20px;
            box-sizing: border-box;
            color: #7a2f1f;
        }

        #home-section {
            min-height: 100vh;
            text-align: center;
            background-color: #F9F7D3;
        }

        .hero-content h1 {
            font-size: 2.5rem;
            font-weight: 700;
            line-height: 1.3;
            color: #7a2f1f;
        }

        .hero-content p {
            font-size: 1.1rem;
            margin-top: 20px;
            color: #333;
        }

        #sobre-section {
            background-color: #f0eecf;
        }

        #eventos-section {
            background-color: #F9F7D3;
        }

        #artesanatos-section {
            background-color: #f0eecf;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            width: 100%;
        }

        .text-center {
            text-align: center;
        }

        /* TIPOGRAFIA */
        .content-section h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .content-section h2 {
            font-size: 2rem;
            margin-top: 30px;
            margin-bottom: 15px;
            border-bottom: 2px solid rgba(89, 37, 7, 0.2);
            padding-bottom: 5px;
        }

        .content-section p,
        .content-section ul,
        .content-section li {
            font-size: 1.1rem;
            line-height: 1.7;
            margin-bottom: 10px;
        }

        .content-section ul {
            list-style-position: inside;
            padding-left: 10px;
        }

        /* LAYOUT SOBRE */
        .sobre-content-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 30px;
        }

        .sobre-text {
            flex: 1;
        }

        .sobre-image {
            flex: 1;
            text-align: center;
        }

        /* GALERIA */
        .artesanatos-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 20px;
            padding: 20px 0;
        }

        .gallery-item {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            padding: 15px;
            text-align: center;
            cursor: pointer;
            transition: transform 0.2s ease-in-out;
        }

        .gallery-item:hover {
            transform: translateY(-5px);
        }

        .gallery-item img {
            max-width: 100%;
            height: 120px;
            object-fit: cover;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .gallery-item h3 {
            font-size: 1.1rem;
            color: #7a2f1f;
            margin: 0;
        }

        /* MODAL */
        .gallery-modal {
            display: none;
            position: fixed;
            z-index: 2000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.7);
            padding-top: 60px;
        }

        .modal-content {
            margin: 5% auto;
            background-color: #fefefe;
            padding: 20px;
            border-radius: 10px;
            width: 80%;
            max-width: 600px;
            text-align: center;
            position: relative;
        }

        .modal-content img {
            max-width: 90%;
            height: auto;
            max-height: 400px;
            object-fit: contain;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .modal-content h3 {
            color: #7a2f1f;
            font-size: 1.8rem;
            margin-bottom: 10px;
        }

        .modal-content p {
            color: #333;
            font-size: 1rem;
            line-height: 1.5;
        }

        .close-button {
            color: #aaa;
            position: absolute;
            top: 10px;
            right: 25px;
            font-size: 35px;
            font-weight: bold;
            cursor: pointer;
        }

        .close-button:hover,
        .close-button:focus {
            color: #7a2f1f;
            text-decoration: none;
            cursor: pointer;
        }

        /* === EVENTOS GRID === */
        .eventos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
            margin: 40px 0;
        }

        .evento-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
        }

        .evento-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .evento-imagem {
            width: 100%;
            height: 200px;
            overflow: hidden;
            background-color: #f5f5f5;
        }

        .evento-imagem img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .evento-conteudo {
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 15px;
            flex: 1;
        }

        .evento-titulo {
            font-size: 1.4rem;
            color: #7a2f1f;
            margin: 0;
            font-weight: 700;
        }

        .evento-info {
            display: flex;
            flex-direction: column;
            gap: 8px;
            color: #666;
            font-size: 0.95rem;
        }

        .evento-data,
        .evento-local,
        .evento-preco {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .evento-status {
            margin-top: 5px;
        }

        .badge-status {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .badge-ativo {
            background-color: #28a745;
            color: white;
        }

        .badge-encerrado {
            background-color: #6c757d;
            color: white;
        }

        .badge-cancelado {
            background-color: #dc3545;
            color: white;
        }

        .evento-descricao {
            color: #555;
            line-height: 1.6;
            font-size: 0.95rem;
            margin: 0;
        }

        .evento-acoes {
            margin-top: auto;
            padding-top: 15px;
        }

        .btn-evento {
            display: inline-block;
            width: 100%;
            padding: 12px 20px;
            background-color: #7a2f1f;
            color: #F9F7D3;
            text-align: center;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn-evento:hover {
            background-color: #7a2f1f;
            color: #F9F7D3;
        }

        /* FOOTER */
        footer {
            width: 100%;
            background-color: rgba(122, 47, 31, 1);
            color: #F9F7D3;
            padding: 10px;
            font-size: 14px;
            font-weight: 600;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 4px;
            flex-wrap: wrap;
            margin-top: auto;
        }

        footer a {
            color: #F9F7D3;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }

        /* === RESPONSIVO DESKTOP === */
        @media (min-width: 900px) {
            .content-section {
                padding: 100px 40px;
            }

            .hero-content h1 {
                font-size: 3.5rem;
                max-width: 800px;
                margin: 0 auto 20px auto;
            }

            .sobre-content-wrapper {
                flex-direction: row;
                text-align: left;
                align-items: flex-start;
            }

            .sobre-image {
                text-align: right;
            }

            .eventos-grid {
                grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            }

            footer {
                flex-direction: row;
                justify-content: center;
                font-size: 16px;
                gap: 8px;
                padding: 15px;
            }

            .artesanatos-gallery {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            }
        }

        /* === RESPONSIVO MOBILE === */
        @media (max-width: 767px) {
            .content-section {
                padding: 60px 15px;
            }

            .hero-content h1 {
                font-size: 2rem;
            }

            .content-section h1 {
                font-size: 2rem;
            }

            .content-section h2 {
                font-size: 1.5rem;
            }

            .eventos-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            footer {
                font-size: 0.8rem;
            }
        }
    </style>
</head>
<body>
    <!-- HEADER E NAVBAR ORIGINAL DOS ALUNOS -->
    <header class="header">
        <nav class="navbar">
            <a class="navbar-logo" href="{{ route('home') }}">
                <img class="circle" src="{{ asset('imagens/artesanato_alunos/logo-artesaos.png') }}" alt="Associação dos Artesãos de Caxias">
                <img id="name" src="{{ asset('imagens/artesanato_alunos/artesaos.png') }}" alt="Associação dos Artesãos de Caxias">
            </a>

            <button class="navbar-toggler" type="button" aria-expanded="false" aria-label="Alternar navegação">☰</button>

            <div class="navbar-options" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#home-section">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sobre-section">Sobre nós</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#eventos-section">Eventos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#artesanatos-section">Artesanatos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('produtos') }}">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contato') }}">Contato</a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login.form') }}">Login</a>
                        </li>
                    @endguest
                    @auth
                        @if(auth()->user()->isAdmin())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.dashboard') }}">Painel Admin</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn-logout nav-link">Sair</button>
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </nav>
    </header>

    <!-- CONTEÚDO PRINCIPAL -->
    <!-- CONTEÚDO PRINCIPAL -->
    <section id="home-section" class="content-section">
        <div class="container text-center hero-content">
            <h1>Aqui, o simples ganha forma, o barro respira, a palha canta e as mãos viram poesia.</h1>
            <p>Bem-vindo ao Artesãos de Caxias MA, um espaço onde a arte popular se encontra com o empreendedorismo criativo. Nosso propósito é conectar quem cria com quem valoriza o feito à mão.</p>
            
            <div style="margin-top: 30px;">
                <a href="#sobre-section" style="background-color: #7a2f1f; color: #F9F7D3; padding: 12px 24px; border: none; border-radius: 8px; font-weight: 600; text-decoration: none; margin: 10px; display: inline-block;">Conhecer a Associação</a>
                <a href="{{ route('produtos') }}" style="background-color: transparent; border: 2px solid #7a2f1f; color: #7a2f1f; padding: 12px 24px; border-radius: 8px; font-weight: 600; text-decoration: none; margin: 10px; display: inline-block;">Ver Produtos</a>
            </div>
        </div>
    </section>

    <section id="sobre-section" class="content-section">
        <div class="container">
            <div class="sobre-content-wrapper">
                <div class="sobre-text">
                    <h2>Quem somos</h2>
                    <p>A Associação dos Artesãos de Caxias MA é formada por artistas, empreendedores e sonhadores que acreditam na força do trabalho manual. Nascemos do desejo de valorizar o talento caxiense, promover o desenvolvimento econômico local e manter viva a tradição que atravessa gerações.</p>
                    <p>Caxias é conhecida como Terra de Gonçalves Dias, mas também é terra de mulheres e homens que transformam fibras, sementes, barro e madeira em obras de arte. Cada produto carrega a essência da região, o perfume da mata, o ritmo das quebradeiras de coco e o brilho da criatividade maranhense.</p>
                    
                    <h2>Nossa missão</h2>
                    <p>Promover o artesanato como forma de expressão cultural e fonte de renda sustentável, oferecendo capacitação, apoio e visibilidade aos artesãos de Caxias e região. Queremos que cada associado possa crescer profissionalmente, viver da sua arte e ser reconhecido pelo que faz.</p>
                    
                    <h2>Nossa visão</h2>
                    <p>Ser referência em artesanato sustentável no Maranhão, ampliando oportunidades de mercado e tornando Caxias um polo reconhecido de arte popular e economia criativa.</p>
                    
                    <h2>Nossos valores</h2>
                    <ul>
                        <li>Tradição: manter viva a sabedoria passada de geração em geração.</li>
                        <li>Cooperação: o crescimento de um artesão é o crescimento de todos.</li>
                        <li>Sustentabilidade: respeitar o meio ambiente em cada etapa do processo criativo.</li>
                        <li>Empreendedorismo: transformar talento em negócio e sonho em sustento.</li>
                        <li>Autenticidade: cada peça é única, feita com alma e verdade.</li>
                    </ul>
                    
                    <h2>O que fazemos</h2>
                    <p>Além de divulgar o trabalho dos nossos associados, promovemos cursos, oficinas, feiras e exposições que unem arte e aprendizado. Com apoio do Sebrae e das Secretarias Municipais de Cultura e Indústria e Comércio, realizamos capacitações sobre precificação, marketing e gestão, ajudando nossos artesãos a crescerem com solidez e estratégia.</p>
                    <p>Também estamos sempre presentes em festivais culturais e feiras regionais, como o Festival da Economia Criativa, o Festival do Babaçu e o Dia Municipal do Artesão, levando nossa arte para além das fronteiras de Caxias.</p>
                    <p>Nosso perfil no Instagram <a target="_blank" href="https://www.instagram.com/artesaosdecaxias_ma">@artesaosdecaxias_ma</a> é o ponto de encontro virtual da comunidade. Lá mostramos bastidores, produtos e histórias inspiradoras que nascem do talento e da força do povo caxiense.</p>
                </div>
                <div class="sobre-image">
                    <img src="{{ asset('imagens/artesanato_alunos/logo-artesaos.png') }}" alt="Logo da Associação" style="width: 100%; max-width: 300px; border-radius: 10px; margin-top: 40px;">
                </div>
            </div>
        </div>
    </section>

    <section id="eventos-section" class="content-section">
        <div class="container">
            <h1 class="text-center" style="margin-bottom: 30px;">Eventos e Atividades</h1>
            <p class="text-center">Os Artesãos de Caxias MA participam ativamente de eventos culturais e econômicos, que fortalecem a visibilidade e o reconhecimento do trabalho artesanal.</p>
            <p class="text-center" style="margin-bottom: 40px;">Confira nossos próximos eventos:</p>
            
            @if($eventos->isEmpty())
                <div class="text-center">
                    <p class="text-muted" style="font-size: 1.2rem; margin: 40px 0;">Nenhum evento futuro cadastrado no momento. Volte em breve!</p>
                </div>
            @else
                <div class="eventos-grid">
                    @foreach($eventos as $evento)
                        <div class="evento-card">
                            @if($evento->imagem)
                                <div class="evento-imagem">
                                    <img src="{{ asset('storage/' . $evento->imagem) }}" alt="{{ $evento->nome }}">
                                </div>
                            @endif
                            <div class="evento-conteudo">
                                <h3 class="evento-titulo">{{ $evento->nome }}</h3>
                                
                                <div class="evento-info">
                                    <div class="evento-data">
                                        <i>📅</i>
                                        <span>{{ $evento->data_inicio ? $evento->data_inicio->format('d/m/Y H:i') : 'Data a definir' }}</span>
                                    </div>
                                    
                                    @if($evento->local)
                                        <div class="evento-local">
                                            <i>📍</i>
                                            <span>{{ $evento->local }}</span>
                                        </div>
                                    @endif
                                    
                                    <div class="evento-preco">
                                        <i>💰</i>
                                        <span>
                                            @if($evento->isGratuito())
                                                <strong>Gratuito</strong>
                                            @else
                                                R$ {{ number_format($evento->valor_inscricao, 2, ',', '.') }}
                                            @endif
                                        </span>
                                    </div>
                                    
                                    <div class="evento-status">
                                        <span class="badge-status badge-{{ strtolower($evento->status) }}">
                                            {{ ucfirst($evento->status) }}
                                        </span>
                                    </div>
                                </div>
                                
                                @if($evento->descricao)
                                    <p class="evento-descricao">{{ Str::limit($evento->descricao, 150) }}</p>
                                @endif
                                
                                <div class="evento-acoes">
                                    <a href="{{ route('eventos.show', $evento->id_evento) }}" class="btn-evento">
                                        Ver Detalhes
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            
            <div class="text-center" style="margin-top: 50px;">
                <a href="{{ route('evento') }}" style="background-color: #7a2f1f; color: #F9F7D3; padding: 12px 24px; border: none; border-radius: 8px; font-weight: 600; text-decoration: none; display: inline-block;">Ver Todos os Eventos</a>
            </div>
        </div>
    </section>

    <section id="artesanatos-section" class="content-section">
        <div class="container">
            <h1 class="text-center">Nossos Artesanatos</h1>
            <p class="text-center">
               Nossa loja colaborativa é uma vitrine do talento de Caxias. 
               Aqui você encontra uma variedade de produtos únicos, feitos à mão por nossos artistas associados.
            </p>

            <div class="artesanatos-gallery" id="artesanatos-gallery">
                <!-- Galeria será populada via JavaScript -->
            </div>

            <div class="text-center" style="margin-top: 40px;">
                <a href="{{ route('produtos') }}" style="background-color: #7a2f1f; color: #F9F7D3; padding: 12px 24px; border: none; border-radius: 8px; font-weight: 600; text-decoration: none; display: inline-block;">Ver Todos os Produtos</a>
            </div>
        </div>
    </section>

    <!-- MODAL DA GALERIA -->
    <div id="galleryModal" class="gallery-modal">
        <div class="modal-content">
            <span class="close-button">×</span>
            <img id="modalImage" src="" alt="Imagem do Artesanato">
            <h3 id="modalTitle">Título do Artesanato</h3>
            <p id="modalDescription">Descrição detalhada do artesanato.</p>
        </div>
    </div>

    <!-- FOOTER -->
    <footer>
        <div>
            &copy; 2025 Associação dos Artesãos de Caxias. Todos os direitos reservados.
        </div>
        <div>
            Siga-nos no <a href="https://www.instagram.com/artesaosdecaxias_ma" target="_blank">Instagram</a>
        </div>
    </footer>

    <!-- JAVASCRIPT ORIGINAL DOS ALUNOS -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const navbarToggler = document.querySelector('.navbar-toggler');
            const navMenu = document.getElementById('navbarNav');
            const navLinks = document.querySelectorAll('.navbar-nav .nav-item a');
            const navbarNav = document.querySelector('.navbar-nav');

            const activeLine = document.createElement('span');
            activeLine.classList.add('active-line');
            if (navbarNav) {
                navbarNav.appendChild(activeLine);
            }

            function positionActiveLine() {
                if (!navbarNav) {
                    return;
                }

                const activeItem = navbarNav.querySelector('.nav-item.active');
                if (activeItem && window.innerWidth >= 900) {
                    const activeLink = activeItem.querySelector('a');
                    if (activeLink) {
                        activeLine.style.width = activeLink.offsetWidth + 'px';
                        activeLine.style.left = activeLink.offsetLeft + 'px';
                        activeLine.style.opacity = '1';
                    }
                } else {
                    activeLine.style.opacity = '0'; 
                }
            }

            if (navbarToggler && navMenu) {
                const toggleMenu = () => {
                    const isExpanded = navMenu.classList.toggle('active');
                    navbarToggler.setAttribute('aria-expanded', isExpanded);
                    navbarToggler.innerHTML = isExpanded ? '×' : '☰';
                };

                navbarToggler.addEventListener('click', toggleMenu);

                navLinks.forEach(link => {
                    link.addEventListener('click', () => {
                        if (window.innerWidth < 900 && navMenu.classList.contains('active')) {
                            toggleMenu(); 
                        }
                    });
                });
            }

            const sections = Array.from(document.querySelectorAll('section[id]'));

            function clearActive() {
                navLinks.forEach(link => link.closest('.nav-item')?.classList.remove('active'));
            }

            function markActiveBySectionId(id) {
                clearActive();
                navLinks.forEach(link => {
                    const hrefId = link.getAttribute('href') ? link.getAttribute('href').replace('#','') : '';
                    if (hrefId === id) {
                        link.closest('.nav-item').classList.add('active');
                    }
                });
                positionActiveLine();
            }

            function getCurrentSectionByViewport() {
                const refY = window.innerHeight * 0.45;
                let best = null;
                let bestDist = Infinity;

                sections.forEach(sec => {
                    const rect = sec.getBoundingClientRect();
                    if (rect.top <= refY && rect.bottom >= refY) {
                        best = sec;
                        bestDist = 0;
                        return;
                    }
                    const secCenter = rect.top + rect.height / 2;
                    const dist = Math.abs(secCenter - refY);
                    if (dist < bestDist) {
                        bestDist = dist;
                        best = sec;
                    }
                });
                return best ? best.id : null;
            }

            let ticking = false;
            function onScrollOrResize() {
                if (ticking) return;
                ticking = true;
                requestAnimationFrame(() => {
                    const id = getCurrentSectionByViewport();
                    if (id) markActiveBySectionId(id);
                    ticking = false;
                });
            }

            window.addEventListener('scroll', onScrollOrResize, { passive: true });
            window.addEventListener('resize', onScrollOrResize);
            onScrollOrResize();

            const homeLink = document.querySelector('.navbar-nav .nav-item a[href="#home-section"]');
            if (homeLink) {
                homeLink.closest('.nav-item').classList.add('active');
                positionActiveLine();
            }

            window.addEventListener('resize', () => {
                positionActiveLine();
                if (window.innerWidth >= 900 && navMenu && navMenu.classList.contains('active')) {
                    navMenu.classList.remove('active');
                    navbarToggler.setAttribute('aria-expanded', false);
                    navbarToggler.innerHTML = '☰';
                }
            });

            // Galeria de artesanatos com imagens do projeto dos alunos
            const galleryItems = [
                { 
                    src: '{{ asset('imagens/artesanato_alunos/artesanato1.jpg') }}', 
                    alt: 'Cesta de palha artesanal', 
                    title: 'Cesta de Palha', 
                    description: 'Cesta tecida à mão com fibras naturais, ideal para decoração ou uso diário.' 
                },
                { 
                    src: '{{ asset('imagens/artesanato_alunos/artesanato2.jpg') }}', 
                    alt: 'Escultura de madeira rústica', 
                    title: 'Escultura em Madeira', 
                    description: 'Obra de arte entalhada em madeira rústica, representando a fauna local.' 
                },
                { 
                    src: '{{ asset('imagens/artesanato_alunos/artesanato3.jpg') }}', 
                    alt: 'Cerâmica pintada à mão', 
                    title: 'Vaso de Cerâmica', 
                    description: 'Vaso de cerâmica com pintura manual, um toque de arte para seu lar.' 
                },
                { 
                    src: '{{ asset('imagens/artesanato_alunos/artesanato4.jpg') }}', 
                    alt: 'Bolsa de tecido bordada', 
                    title: 'Bolsa Artesanal', 
                    description: 'Bolsa exclusiva com bordados feitos à mão, unindo tradição e estilo.' 
                }
            ];

            const galleryContainer = document.getElementById('artesanatos-gallery');
            const modal = document.getElementById('galleryModal');
            const modalImg = document.getElementById('modalImage');
            const modalTitle = document.getElementById('modalTitle');
            const modalDescription = document.getElementById('modalDescription');
            const closeModal = document.querySelector('.close-button');

            if (galleryContainer) {
                galleryItems.forEach((item) => {
                    const galleryItemDiv = document.createElement('div');
                    galleryItemDiv.classList.add('gallery-item');
                    galleryItemDiv.innerHTML = `<img src="${item.src}" alt="${item.alt}"><h3>${item.title}</h3>`;
                    
                    galleryItemDiv.addEventListener('click', () => {
                        modal.style.display = 'block';
                        modalImg.src = item.src;
                        modalTitle.textContent = item.title;
                        modalDescription.textContent = item.description;
                    });
                    galleryContainer.appendChild(galleryItemDiv);
                });
            }

            if (closeModal) {
                closeModal.addEventListener('click', () => {
                    modal.style.display = 'none';
                });
            }

            window.addEventListener('click', (event) => {
                if (event.target == modal) {
                    modal.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>