// Mostra o botão ao descer a tela
window.onscroll = function() {
    const button = document.querySelector('.botao-topo');
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        button.classList.add('show');
    } else {
        button.classList.remove('show');
    }
};
