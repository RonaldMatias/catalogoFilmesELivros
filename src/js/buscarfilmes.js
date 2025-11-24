document.getElementById("filmes").addEventListener("submit", function (event) {
    const campoFilmes = document.getElementById("buscarfilmes");

    if (campoFilmes.value.trim() === "") {
        event.preventDefault(); // impede envio
        abrirModal();
    }
});

// Funções do modal
function abrirModal() {
    document.getElementById("modalErro").classList.remove("hidden");
    document.getElementById("modalErro").classList.add("flex");
}

function fecharModal() {
    document.getElementById("modalErro").classList.add("hidden");
    document.getElementById("modalErro").classList.remove("flex");
}

document.getElementById("fecharModal").addEventListener("click", fecharModal);
document.getElementById("btnFecharModal").addEventListener("click", fecharModal);

// Fechar ao clicar no fundo escuro
document.getElementById("backdrop").addEventListener("click", fecharModal);