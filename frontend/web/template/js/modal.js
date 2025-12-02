document.addEventListener("DOMContentLoaded", function () {
    const openModalBtn = document.getElementById("openModalBtn");
    const closeModalBtn = document.getElementById("closeModalBtn");
    const modalOverlay = document.getElementById("modalOverlay");

    if (!openModalBtn || !closeModalBtn || !modalOverlay) {
        console.error("Elementos do modal não encontrados!");
        return;
    }

    // Abrir modal
    openModalBtn.onclick = () => {
        modalOverlay.style.display = "flex";
    };

    // Fechar modal
    closeModalBtn.onclick = () => {
        modalOverlay.style.display = "none";
    };

    // Fechar ao clicar fora
    modalOverlay.onclick = (event) => {
        if (event.target === modalOverlay) {
            modalOverlay.style.display = "none";
        }
    };
});
