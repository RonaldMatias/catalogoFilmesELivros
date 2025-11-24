document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("cadastrofilmes");
    const modal = document.getElementById("modalErro");
    const modalMensagem = document.getElementById("modalMensagem");
    const fecharBtn = document.getElementById("modalFecharBtn");
    const fecharX = document.getElementById("modalClose");
    const backdrop = document.getElementById("modalBackdrop");

    function abrirModal(msg) {
        modalMensagem.textContent = msg;
        modal.classList.remove("hidden");
        modal.classList.add("flex");
    }

    function fecharModal() {
        modal.classList.add("hidden");
        modal.classList.remove("flex");
    }

    // Fechar modal
    fecharBtn.addEventListener("click", fecharModal);
    fecharX.addEventListener("click", fecharModal);
    backdrop.addEventListener("click", fecharModal);

    // Validação do formulário
    form.addEventListener("submit", (e) => {
        const titulo = document.getElementById("tituloFilme").value.trim();
        const diretor = document.getElementById("diretor").value.trim();
        const genero = document.getElementById("generoFilme").value.trim();
        const data = document.getElementById("dataLancamentoFilme").value.trim();
        const sinopse = document.getElementById("sinopseFilme").value.trim();

        if (!titulo || !diretor || !genero || !data || !sinopse) {
            e.preventDefault();
            abrirModal("Preencha todos os campos antes de cadastrar o filme.");
            return;
        }
    });
});
