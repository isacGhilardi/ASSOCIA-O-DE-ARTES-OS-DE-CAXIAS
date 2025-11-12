<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ url('css/style-index.css') }}">
    
    <style>
        /* ==========================================
           RESPONSIVIDADE DO LOGIN - MOBILE
           ========================================== */
        
        @media (max-width: 767px) {
            /* Container principal */
            .container {
                flex-direction: column !important;
                height: auto !important;
                background: linear-gradient(135deg, #e6d2c7ff 0%, #daccc6ff 100%) !important;
                min-height: 100vh;
                padding: 20px;
            }
            
            /* Áreas de login e cadastro */
            .esquerda, .direita {
                width: 100% !important;
                max-width: none !important;
                padding: 20px !important;
                background: transparent !important;
            }
            
            /* OCULTAR COMPLETAMENTE A IMAGEM DA VEIA NO MOBILE */
            .foto {
                display: none !important;
                visibility: hidden !important;
                opacity: 0 !important;
                width: 0 !important;
                height: 0 !important;
                background-image: none !important;
                position: absolute !important;
                z-index: -9999 !important;
            }
            
            /* Remover qualquer imagem de fundo do body */
            body {
                background-image: none !important;
                background: linear-gradient(135deg, #8B5A42 0%, #5C3A2C 100%) !important;
            }
            
            /* OCULTAR CADASTRO POR PADRÃO NO MOBILE */
            .direita {
                display: none !important;
            }
            
            /* Mostrar apenas quando classe 'show-register' for adicionada */
            .direita.show-register {
                display: block !important;
            }
            
            /* Ocultar login quando cadastro estiver ativo */
            .container.register-active .esquerda {
                display: none !important;
            }
            
            /* Formulários responsivos */
            .areaLogin, .areaCadastro {
                background: rgba(255, 255, 255, 0.95) !important;
                padding: 30px 20px !important;
                border-radius: 15px !important;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3) !important;
            }
            
            /* Inputs maiores para mobile */
            .inputarea input {
                font-size: 16px !important;
                padding: 12px !important;
                margin: 8px 0 !important;
            }
            
            /* Botões maiores para mobile */
            .btosLines button,
            .btosLines #btnLogin {
                font-size: 16px !important;
                padding: 14px !important;
                width: 100% !important;
                margin: 10px 0 !important;
            }
            
            /* Link de registrar */
            .btosLines p {
                font-size: 14px !important;
                margin-top: 15px !important;
                cursor: pointer !important;
            }
            
            /* Títulos */
            .titulo h1 {
                font-size: 1.8rem !important;
                margin-bottom: 20px !important;
            }
            
            /* Labels */
            .inputarea label {
                font-size: 14px !important;
                font-weight: 600 !important;
            }
        }
        
        /* Desktop - mantém tudo normal */
        @media (min-width: 768px) {
            .foto {
                display: block !important;
            }
            
            .container.register-active .esquerda,
            .direita.show-register {
                display: flex !important;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="foto">
            <!-- Pode deixar sua imagem de fundo aqui -->
        </div> 

        <!-- ================= LOGIN ================= -->
        <div class="esquerda">
            <div class="areaLogin">
                <div class="titulo"><h1>Login</h1></div>

                <!-- FORMULÁRIO DE LOGIN REAL -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="inputarea">
                        <label for="email">EMAIL</label>
                        <input type="email" name="email" placeholder="Exemplo@gmail.com" required autofocus>
                    </div>

                    <div class="inputarea">
                        <label for="password">SENHA</label>
                        <input type="password" name="password" placeholder="Digite sua senha" required>
                    </div>

                    <div class="btosLines">
                        <button type="submit" id="btnLogin">LOGIN</button>
                    </div>
                </form>

                <!-- Link para registro (opcional, só abre a tela de cadastro) -->
                <div class="btosLines">
                    <p id="LoginBtn">Registre-se agora</p>
                </div>

            </div>
        </div>

        <!-- ================= CADASTRO ================= -->
        <div class="direita">
            <div class="areaCadastro">
                <div class="titulo"><h1>Cadastro</h1></div>

                <!-- FORMULÁRIO DE REGISTRO REAL -->
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="inputarea">
                        <label for="name">NOME</label>
                        <input type="text" name="name" placeholder="Seu nome" value="{{ old('name') }}" required>
                    </div>

                    <div class="inputarea">
                        <label for="email">EMAIL</label>
                        <input type="email" name="email" placeholder="Exemplo@gmail.com" required>
                    </div>

                    <div class="inputarea">
                        <label for="password">SENHA</label>
                        <input type="password" name="password" placeholder="Crie sua senha" required>
                    </div>

                    <div class="inputarea">
                        <label for="password_confirmation">CONFIRMAR SENHA</label>
                        <input type="password" name="password_confirmation" placeholder="Repita sua senha" required>
                    </div>

                    <div class="btosLines">
                        <button type="submit">CADASTRAR</button>
                    </div>

                    <!-- Link para voltar ao login -->
                    <div class="btosLines">
                        <p id="RegistrarBtn">Já tenho uma conta</p>
                    </div>
                </form>

            </div>
        </div>

    </div>

    <script>
        // ==========================================
        // JAVASCRIPT RESPONSIVO PARA LOGIN/CADASTRO
        // ==========================================
        
        let caixaFoto = document.querySelector(".foto");
        let irLogin = document.getElementById("RegistrarBtn");
        let irRegister = document.getElementById("LoginBtn");
        let container = document.querySelector(".container");
        let direita = document.querySelector(".direita");

        // Função para detectar se é mobile
        function isMobile() {
            return window.innerWidth <= 767;
        }

        // Função para mostrar registro
        function showRegister() {
            if (isMobile()) {
                // Mobile: oculta login e mostra cadastro
                container.classList.add("register-active");
                direita.classList.add("show-register");
            } else {
                // Desktop: animação original
                if (caixaFoto) {
                    caixaFoto.style.right = "50vw";
                    setTimeout(() => {
                        caixaFoto.style.backgroundImage = "url(/imagens/banquin.png)";
                    }, 200);
                }
            }
        }

        // Função para mostrar login
        function showLogin() {
            if (isMobile()) {
                // Mobile: mostra login e oculta cadastro
                container.classList.remove("register-active");
                direita.classList.remove("show-register");
            } else {
                // Desktop: animação original
                if (caixaFoto) {
                    caixaFoto.style.right = "0";
                    setTimeout(() => {
                        caixaFoto.style.backgroundImage = "url(/imagens/fundo.png)";
                    }, 200);
                }
            }
        }

        // Event listeners
        if (irRegister) {
            irRegister.addEventListener("click", showRegister);
        }
        
        if (irLogin) {
            irLogin.addEventListener("click", showLogin);
        }

        // Escutar redimensionamento da janela
        window.addEventListener("resize", () => {
            if (!isMobile()) {
                // Se mudou para desktop, remover classes mobile
                container.classList.remove("register-active");
                direita.classList.remove("show-register");
            }
        });
    </script>
</body>
</html>
