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

    <!-- Fix para garantir que os links da navbar sejam visíveis -->
    <style>
        body {
            background-color: #F9F7D3 !important;
            background-image: none !important;
        }

        .navbar {
            background-color: rgba(122, 47, 31) !important;
        }

        .nav-link,
        .navbar-nav .nav-link,
        .navbar-options .nav-link,
        .nav-item a {
            color: #F9F7D3 !important;
            text-decoration: none !important;
            font-weight: 600 !important;
            display: inline-block !important;
            visibility: visible !important;
            opacity: 1 !important;
        }

        .navbar-nav {
            visibility: visible !important;
            align-items: center !important;
        }

        .navbar-options {
            align-items: center !important;
        }

        .navbar-options.active {
            display: block !important;
        }

        @media (min-width: 900px) {
            .navbar-options {
                display: flex !important;
                align-items: center !important;
            }

            .navbar-nav {
                display: flex !important;
                flex-direction: row !important;
                align-items: center !important;
            }
        }

        /* Botão Associe-se */
        .btn-associe {
            background-color: #F2EB85;
            color: #7a2f1f !important;
            padding: 8px 20px;
            border-radius: 20px;
            font-weight: 700 !important;
            transition: all 0.3s ease;
            border: 2px solid #F2EB85;
        }

        .btn-associe:hover {
            background-color: transparent;
            color: #F2EB85 !important;
            border-color: #F2EB85;
        }
    </style>

</head>
<body id="top" class="@yield('body_class')">

    <!-- Cabeçalho -->
    <header class="header">
        <nav class="navbar">
            <a class="navbar-logo" href="{{ route('home') }}">
                <img class="circle" src="{{ asset('imagens/artesanato_alunos/logo-artesaos.png') }}" alt="Associação dos Artesãos de Caxias">
                <img id="name" src="{{ asset('imagens/artesanato_alunos/artesaos.png') }}" alt="Associação dos Artesãos de Caxias">
            </a>

            <button class="navbar-toggler" type="button" aria-expanded="false" aria-label="Alternar navegação">☰</button>

            <div class="navbar-options" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}#sobre-section">Sobre nós</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('evento*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('evento') }}">Eventos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}#artesanatos-section">Artesanatos</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('produtos') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('produtos') }}">Produtos</a>
                    </li>
                    @auth
                        @if(auth()->user()->isAdmin())
                            <li class="nav-item {{ request()->routeIs('admin.*') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.dashboard') }}">Painel Admin</a>
                            </li>
                        @endif
                    @endauth
                    <li class="nav-item {{ request()->routeIs('contato') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('contato') }}">Contato</a>
                    </li>
                    @guest
                        <li class="nav-item {{ request()->routeIs('login.form') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('login.form') }}">Login</a>
                        </li>
                    @endguest
                    @auth
                        @if(auth()->user()->isAdmin())
                            <li class="nav-item {{ request()->routeIs('admin.*') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.dashboard') }}">Painel Admin</a>
                            </li>
                        @endif
                        <li class="nav-item nav-item-logout">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn-logout">Sair</button>
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </nav>
    </header>

    <!-- Conteúdo principal -->
    <main class="layout-main @yield('main_class')">
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

    <!-- Script de debug para navbar -->
    <script>
        // Debug: Force navbar visibility
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Navbar Debug: Checking elements...');
            
            const navbarOptions = document.getElementById('navbarNav');
            const navLinks = document.querySelectorAll('.nav-link');
            const navItems = document.querySelectorAll('.nav-item');
            
            console.log('navbarOptions:', navbarOptions);
            console.log('navLinks count:', navLinks.length);
            console.log('navItems count:', navItems.length);
            
            // Force visibility in desktop
            if (window.innerWidth >= 900) {
                if (navbarOptions) {
                    navbarOptions.style.display = 'flex';
                    navbarOptions.style.visibility = 'visible';
                    navbarOptions.style.opacity = '1';
                    console.log('Desktop: Navbar forced visible');
                }
            }
            
            // Force link colors
            navLinks.forEach((link, index) => {
                link.style.color = '#F9F7D3';
                link.style.display = 'inline-block';
                link.style.visibility = 'visible';
                link.style.opacity = '1';
                console.log(`Link ${index}:`, link.textContent, 'color:', getComputedStyle(link).color);
            });
        });
    </script>

    <!-- Script de interatividade -->
    <script src="{{ asset('js/ui.js') }}"></script>
    
    @if(request()->routeIs('home'))
        <script src="{{ asset('js/home.js') }}"></script>
    @endif
    
    <!-- Scripts específicos de cada página -->
    @yield('scripts')
</body>
</html>
