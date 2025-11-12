<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <title>@yield('titulo', 'Associação dos Artesãos de Caxias')</title>

    <!-- CSS principal -->
    <link rel="stylesheet" href="{{ asset('css/style-layout.css') }}">
    
    <!-- CSS Responsivo -->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    <!-- Ícones do Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos adicionais por página -->
    @yield('style')

    <style>
        /* Botão logout no menu */
        .btn-logout {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            font-size: 1rem;
            padding: 0;
            text-decoration: none;
            font-family: inherit;
        }

        .btn-logout:hover {
            color: #f0a500; /* mesmo hover dos links */
            text-decoration: underline;
        }
        
        /* Menu hamburger para mobile */
        .menu-toggle {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            padding: 5px;
        }
        
        @media (max-width: 767px) {
            .menu-toggle {
                display: block;
            }
            
            nav {
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: #7A2E1D;
                transform: translateY(-100%);
                opacity: 0;
                visibility: hidden;
                transition: all 0.3s ease;
                z-index: 1000;
            }
            
            nav.active {
                transform: translateY(0);
                opacity: 1;
                visibility: visible;
            }
            
            nav ul {
                flex-direction: column;
                padding: 20px;
            }
        }
    </style>
</head>
<body id="top">

    <!-- Cabeçalho -->
    <header>
        <div class="logo">
            <a href="{{ route('paginainicial') }}">
                <img src="{{ asset('imagens/logo.png') }}" alt="Associação dos Artesãos de Caxias">
                <h1 style="color:white;">Associação dos Artesãos de Caxias</h1>
            </a>
        </div>

        <button class="menu-toggle" id="menuToggle" aria-label="Abrir menu">
            <i class="fas fa-bars"></i>
        </button>

        <nav id="navMenu">
            <ul>
                <li><a href="{{ route('sobrenos') }}">Sobre</a></li>
                <li><a href="{{route('produtos')}}">Produtos</a></li>
                <li><a href="{{route('evento')}}">Eventos</a></li>
                <li><a href="{{ route('contato') }}">Contato</a></li>
                @auth
                    @if(auth()->user()->isAdmin())
                        <li><a href="{{ route('admin.dashboard') }}">Painel Admin</a></li>
                    @endif
                @endauth
                <li><a href="#associe" class="btn-cta">Associe-se</a></li>

                <!-- Logout estilizado -->
                @auth
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn-logout">Sair</button>
                    </form>
                </li>
                @endauth
            </ul>
        </nav>
    </header>

    <!-- Conteúdo principal -->
    <main class="p-2">
        @yield('content')
    </main>

    <!-- Rodapé -->
    <footer>
        <div class="footer-container text-center">
            <div class="row">
                <div class="col">
                    <h3>Sobre Nós</h3>
                    <p>Promovemos o artesanato de Caxias, incentivando cultura, tradição e renda local.</p>
                    <div class="copyright">
                        &copy; 2025 Associação dos Artesãos de Caxias. <br> Todos os direitos reservados.
                    </div>
                </div>
                <div class="col">
                    <h3>Links</h3>
                    <a href="{{ route('sobrenos') }}">Sobre</a><br>
                    <a href="{{route('produtos')}}">Produtos</a><br>
                    <a href="{{route('evento')}}">Eventos</a><br>
                    <a href="{{ route('contato') }}">Contato</a>
                </div>
                <div class="col">
                    <h3 class="">Redes Sociais</h3>
                    <div class="socials d-flex align-items-center justify-content-center">
                        <a href="https://www.facebook.com/p/Associação-dos-Artesãos-de-Caxias-100076232955626/?_rdr" 
                        target="_blank" aria-label="Facebook">
                            <i class="fab fa-facebook-f"></i><span>Facebook</span>
                        </a>

                        <a href="https://www.instagram.com/artesaosdecaxias_ma" 
                        target="_blank" aria-label="Instagram">
                            <i class="fab fa-instagram"></i><span>Instagram</span>
                        </a>

                        <a href="https://wa.me/" 
                        target="_blank" aria-label="WhatsApp">
                            <i class="fab fa-whatsapp"></i><span>WhatsApp</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script de interatividade -->
    <script src="{{ asset('js/ui.js') }}"></script>
    
    <!-- Script do menu responsivo -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.getElementById('menuToggle');
            const navMenu = document.getElementById('navMenu');
            const menuIcon = menuToggle.querySelector('i');

            menuToggle.addEventListener('click', function() {
                navMenu.classList.toggle('active');
                
                // Trocar ícone entre hambúrguer e X
                if (navMenu.classList.contains('active')) {
                    menuIcon.classList.remove('fa-bars');
                    menuIcon.classList.add('fa-times');
                    menuToggle.setAttribute('aria-label', 'Fechar menu');
                } else {
                    menuIcon.classList.remove('fa-times');
                    menuIcon.classList.add('fa-bars');
                    menuToggle.setAttribute('aria-label', 'Abrir menu');
                }
            });

            // Fechar menu quando clicar em um link
            navMenu.addEventListener('click', function(e) {
                if (e.target.tagName === 'A' || e.target.tagName === 'BUTTON') {
                    navMenu.classList.remove('active');
                    menuIcon.classList.remove('fa-times');
                    menuIcon.classList.add('fa-bars');
                    menuToggle.setAttribute('aria-label', 'Abrir menu');
                }
            });

            // Fechar menu quando redimensionar para desktop
            window.addEventListener('resize', function() {
                if (window.innerWidth > 767) {
                    navMenu.classList.remove('active');
                    menuIcon.classList.remove('fa-times');
                    menuIcon.classList.add('fa-bars');
                    menuToggle.setAttribute('aria-label', 'Abrir menu');
                }
            });
        });
    </script>

    <!-- Scripts específicos de cada página -->
    @yield('scripts')
</body>
</html>
