document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("cadastrolivro");
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
        const titulo = document.getElementById("titulo").value.trim();
        const autor = document.getElementById("autor").value.trim();
        const editora = document.getElementById("editora").value.trim();
        const sinopse = document.getElementById("sinopse").value.trim();
        const data = document.getElementById("dataLancamento").value.trim();
        const categoria = document.getElementById("categoria").value.trim();

        if (!titulo || !autor || !sinopse || !data || !categoria || !editora) {
            e.preventDefault();
            abrirModal("Preencha todos os campos antes de cadastrar o livro.");
            return;
        }
    });
});
