// Interatividade dos itens do menu
document.querySelectorAll('.menu-item').forEach(item => {
    item.addEventListener('click', function(e) {
        // Remove ativo dos outros
        document.querySelectorAll('.menu-item').forEach(i => i.classList.remove('active'));
        this.classList.add('active');
    });
});

// Marcar automaticamente o ativo com base na página atual
document.addEventListener('DOMContentLoaded', function () {
    const currentUrl = window.location.pathname;

    document.querySelectorAll('.menu-item').forEach(item => {
        if (item.getAttribute("href") === currentUrl) {
            item.classList.add('active');
        }
    });
});
