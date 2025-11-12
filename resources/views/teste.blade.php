<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste das Funcionalidades</title>
    <link rel="stylesheet" href="{{ asset('css/style-index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-paginainicial.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard-fixes.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive-tables.css') }}">
    <style>
        .test-section {
            margin: 40px 0;
            padding: 20px;
            border: 2px solid #ddd;
            border-radius: 8px;
            background: white;
        }
        .test-title {
            color: #5C3A2C;
            font-weight: bold;
            margin-bottom: 20px;
            font-size: 1.5rem;
        }
        .mobile-test {
            max-width: 375px;
            margin: 20px auto;
            border: 1px solid #ccc;
            padding: 20px;
            background: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="container">
        
        <!-- TESTE 1: LOGIN MOBILE -->
        <div class="test-section">
            <h2 class="test-title">🔒 TESTE 1: LOGIN MOBILE (redimensione a janela para <767px)</h2>
            
            <div class="container" style="display: flex; height: 100vh; background: linear-gradient(135deg, #8B5A42 0%, #5C3A2C 100%);">
                <div class="foto" style="flex: 1; background: url('/imagens/fundo.png') center/cover; transition: all 0.5s ease;"></div>
                
                <div class="esquerda" style="flex: 1; display: flex; align-items: center; justify-content: center; padding: 20px;">
                    <div class="areaLogin" style="background: white; padding: 40px; border-radius: 15px; width: 100%; max-width: 400px;">
                        <div class="titulo"><h1>Login</h1></div>
                        <div class="inputarea" style="margin: 20px 0;">
                            <label for="email">EMAIL</label>
                            <input type="email" placeholder="exemplo@gmail.com" style="width: 100%; padding: 10px; margin: 5px 0; border: 1px solid #ddd; border-radius: 5px;">
                        </div>
                        <div class="inputarea" style="margin: 20px 0;">
                            <label for="password">SENHA</label>
                            <input type="password" placeholder="Digite sua senha" style="width: 100%; padding: 10px; margin: 5px 0; border: 1px solid #ddd; border-radius: 5px;">
                        </div>
                        <div class="btosLines" style="margin: 20px 0;">
                            <button id="btnLogin" style="width: 100%; padding: 12px; background: #5C3A2C; color: white; border: none; border-radius: 5px; cursor: pointer;">LOGIN</button>
                        </div>
                        <div class="btosLines">
                            <p id="LoginBtn" style="color: #5C3A2C; cursor: pointer; text-decoration: underline; text-align: center;">Registre-se agora</p>
                        </div>
                    </div>
                </div>
                
                <div class="direita" style="flex: 1; display: flex; align-items: center; justify-content: center; padding: 20px;">
                    <div class="areaCadastro" style="background: white; padding: 40px; border-radius: 15px; width: 100%; max-width: 400px;">
                        <div class="titulo"><h1>Cadastro</h1></div>
                        <div class="inputarea" style="margin: 15px 0;">
                            <label>NOME</label>
                            <input type="text" placeholder="Seu nome" style="width: 100%; padding: 10px; margin: 5px 0; border: 1px solid #ddd; border-radius: 5px;">
                        </div>
                        <div class="inputarea" style="margin: 15px 0;">
                            <label>EMAIL</label>
                            <input type="email" placeholder="exemplo@gmail.com" style="width: 100%; padding: 10px; margin: 5px 0; border: 1px solid #ddd; border-radius: 5px;">
                        </div>
                        <div class="inputarea" style="margin: 15px 0;">
                            <label>SENHA</label>
                            <input type="password" placeholder="Crie sua senha" style="width: 100%; padding: 10px; margin: 5px 0; border: 1px solid #ddd; border-radius: 5px;">
                        </div>
                        <div class="inputarea" style="margin: 15px 0;">
                            <label>CONFIRMAR SENHA</label>
                            <input type="password" placeholder="Repita sua senha" style="width: 100%; padding: 10px; margin: 5px 0; border: 1px solid #ddd; border-radius: 5px;">
                        </div>
                        <div class="btosLines" style="margin: 20px 0;">
                            <button style="width: 100%; padding: 12px; background: #5C3A2C; color: white; border: none; border-radius: 5px; cursor: pointer;">CADASTRAR</button>
                        </div>
                        <div class="btosLines">
                            <p id="RegistrarBtn" style="color: #5C3A2C; cursor: pointer; text-decoration: underline; text-align: center;">Já tenho uma conta</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- TESTE 2: CARROSSEL RESPONSIVO -->
        <div class="test-section">
            <h2 class="test-title">🎠 TESTE 2: CARROSSEL RESPONSIVO</h2>
            <p><strong>Desktop:</strong> Scroll horizontal | <strong>Mobile:</strong> Auto-slide com indicadores</p>
            
            <div id="site-carousel" style="max-width: 1000px; margin: 25px auto; border-radius: 12px; overflow: hidden; position: relative;">
                <img src="{{ asset('imagens/paginainicial/artesao.png') }}" alt="Artesãos de Caxias" class="carousel-image active">
                <img src="{{ asset('imagens/paginainicial/Produtos Artesanais.jpg') }}" alt="Produtos artesanais" class="carousel-image">
                <img src="{{ asset('imagens/paginainicial/Feira de artesanatos.jpg') }}" alt="Feira de artesanato" class="carousel-image">
                <img src="{{ asset('imagens/paginainicial/Oficina de artesao.jpg') }}" alt="Oficina de artesãos" class="carousel-image">
                <img src="{{ asset('imagens/paginainicial/Exposiçao de  arte local.jpg') }}" alt="Exposição de arte local" class="carousel-image">
                
                <!-- Indicadores do carrossel (apenas mobile) -->
                <div class="carousel-indicators">
                    <span class="carousel-dot active" data-slide="0"></span>
                    <span class="carousel-dot" data-slide="1"></span>
                    <span class="carousel-dot" data-slide="2"></span>
                    <span class="carousel-dot" data-slide="3"></span>
                    <span class="carousel-dot" data-slide="4"></span>
                </div>
            </div>
        </div>

        <!-- TESTE 3: DASHBOARD ADMINISTRATIVO -->
        <div class="test-section">
            <h2 class="test-title">📊 TESTE 3: DASHBOARD ADMINISTRATIVO (Botões com Boxes)</h2>
            
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
                                        <th class="text-end">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Vaso de Cerâmica</td>
                                        <td>Cerâmica</td>
                                        <td>01/11/2025</td>
                                        <td class="text-end">
                                            <div class="action-buttons">
                                                <a href="#" class="btn btn-sm btn-action-edit">
                                                    Editar
                                                </a>
                                                <button type="button" class="btn btn-sm btn-action-delete">
                                                    Excluir
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Cesta de Palha</td>
                                        <td>Palha</td>
                                        <td>31/10/2025</td>
                                        <td class="text-end">
                                            <div class="action-buttons">
                                                <a href="#" class="btn btn-sm btn-action-edit">
                                                    Editar
                                                </a>
                                                <button type="button" class="btn btn-sm btn-action-delete">
                                                    Excluir
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="{{ asset('js/script-index.js') }}"></script>
    <script>
        // Carrossel responsivo para mobile
        document.addEventListener('DOMContentLoaded', function() {
            if (window.innerWidth <= 767) {
                const images = document.querySelectorAll('.carousel-image');
                const dots = document.querySelectorAll('.carousel-dot');
                let currentSlide = 0;
                
                // Função para mostrar slide específico
                function showSlide(index) {
                    images.forEach((img, i) => {
                        img.classList.toggle('active', i === index);
                    });
                    dots.forEach((dot, i) => {
                        dot.classList.toggle('active', i === index);
                    });
                }
                
                // Auto-slide
                setInterval(() => {
                    currentSlide = (currentSlide + 1) % images.length;
                    showSlide(currentSlide);
                }, 3000);
                
                // Click nos dots
                dots.forEach((dot, index) => {
                    dot.addEventListener('click', () => {
                        currentSlide = index;
                        showSlide(currentSlide);
                    });
                });
            }
        });
    </script>
</body>
</html>