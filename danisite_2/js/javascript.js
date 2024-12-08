// O evento "onscroll" é acionado sempre que o usuário rolar a página
window.onscroll = function() {
    // Seleciona o elemento com a classe "botao-topo" na página
    const button = document.querySelector('.botao-topo');
    
    // Verifica a quantidade de deslocamento vertical da página
    // "document.body.scrollTop" retorna o deslocamento vertical para navegadores mais antigos
    // "document.documentElement.scrollTop" retorna o deslocamento vertical para navegadores modernos
    // A condição verifica se o deslocamento ultrapassou 100 pixels
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        // Adiciona a classe "show" ao botão, geralmente para exibi-lo (dependendo do CSS aplicado)
        button.classList.add('show');
    } else {
        // Remove a classe "show" do botão, geralmente para escondê-lo
        button.classList.remove('show');
    }
};
