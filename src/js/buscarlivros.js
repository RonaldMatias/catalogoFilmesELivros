document.getElementById("livros").addEventListener("submit", function (event) {
    const campoFilmes = document.getElementById("buscar");

    if (campoFilmes.value.trim() === "") {
        event.preventDefault(); // impede envio
        abrirModalLivros();
    }
});

// Funções do modal
function abrirModalLivros() {
    document.getElementById("modalErroLivros").classList.remove("hidden");
    document.getElementById("modalErroLivros").classList.add("flex");
}

function fecharModal() {
    document.getElementById("modalErroLivros").classList.add("hidden");
    document.getElementById("modalErroLivros").classList.remove("flex");
}

document.getElementById("fecharModalLivros").addEventListener("click", fecharModal);
document.getElementById("btnFecharModal").addEventListener("click", fecharModal);

// Fechar ao clicar no fundo escuro
document.getElementById("backdrop").addEventListener("click", fecharModal);
