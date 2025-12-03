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
        document.querySelector(".custom-modal").classList.add("active");
    };

    // Fechar modal
    closeModalBtn.onclick = () => {
        document.querySelector(".custom-modal").classList.remove("active");
        modalOverlay.style.display = "none";
    };

    // Fechar ao clicar fora
    modalOverlay.onclick = (event) => {
        if (event.target === modalOverlay) {
            modalOverlay.style.display = "none";
        }
    };
});
