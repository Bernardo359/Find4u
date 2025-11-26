document.addEventListener("DOMContentLoaded", function () {
    const faqItems = document.querySelectorAll(".faq-item");

    faqItems.forEach(item => {
        const question = item.querySelector("h3");
        const answer = item.querySelector("p");

        // Criar seta
        const arrow = document.createElement("span");
        arrow.classList.add("faq-arrow");
        question.appendChild(arrow);

        // Esconder resposta inicialmente
        answer.style.display = "none";
        question.style.cursor = "pointer";

        question.addEventListener("click", () => {
            const isOpen = answer.style.display === "block";

            answer.style.display = isOpen ? "none" : "block";
            arrow.classList.toggle("open", !isOpen);
        });
    });
});
