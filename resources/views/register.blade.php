<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="{{ url('css/style-index.css') }}">
</head>
<body>
    <main class="container">
        <section class="direita">
            <div class="areaCadastro">
                <div class="titulo"><h1>Cadastro</h1></div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="inputarea">
                        <label for="name">NOME</label>
                        <input type="text" name="name" id="name" placeholder="Seu nome" value="{{ old('name') }}" required>
                    </div>

                    <div class="inputarea">
                        <label for="email">EMAIL</label>
                        <input type="email" name="email" id="email" placeholder="exemplo@email.com" value="{{ old('email') }}" required>
                    </div>

                    <div class="inputarea">
                        <label for="password">SENHA</label>
                        <input type="password" name="password" id="password" placeholder="Crie sua senha" required>
                    </div>

                    <div class="inputarea">
                        <label for="password_confirmation">CONFIRMAR SENHA</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repita sua senha" required>
                    </div>

                    <div class="btosLines">
                        <button type="submit">CADASTRAR</button>
                    </div>
                </form>

                <div class="btosLines">
                    <a href="{{ route('login.form') }}">Já tenho conta</a>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
