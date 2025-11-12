let caixaFoto = document.querySelector(".foto");
let irLogin = document.getElementById("RegistrarBtn");
let irRegister = document.getElementById("LoginBtn");
let container = document.querySelector(".container");
let direita = document.querySelector(".direita");

// ^ acima eu peguei os elementos que eu ia precisar do html com DOM, e guardei em variaveis.

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
        caixaFoto.style.right = "50vw";
        setTimeout(() => {
            caixaFoto.style.backgroundImage = "url(/imagens/banquin.png)";
        }, 200);
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
        caixaFoto.style.right = "0";
        setTimeout(() => {
            caixaFoto.style.backgroundImage = "url(/imagens/fundo.png)";
        }, 200);
    }
}
                         
irRegister.addEventListener("click", showRegister);
irLogin.addEventListener("click", showLogin);

// Escutar redimensionamento da janela
window.addEventListener("resize", () => {
    if (!isMobile()) {
        // Se mudou para desktop, remover classes mobile
        container.classList.remove("register-active");
        direita.classList.remove("show-register");
    }
});

// tudo isso para fazer a função de animação da pessoa que quer fazer cadatro ou login, ao clica nos textos sublinhados.