function criar(){

    var login = document.getElementById('login').value;
    var senha = document.getElementById('senha').value;
    var email = document.getElementById('email').value;

    if(login == "daniel" && senha == "senhasupersecreta" && email == "dani@gmail.com"){
        alert('Sucesso');
        location.href = "index.html";
    }else{
        alert('Usuario, email ou senha incorretos');
    }
}

// a function criar é responsável por cadastrar um novo usuário, utilizando o email, nome de usuário e a sua senha.
// esta simples por que eu não tive tempo :(

function logar(){

    var login = document.getElementById('login').value;
    var senha = document.getElementById('senha').value;

    if(login == "daniel" && senha == "senhasupersecreta"){
        alert('Sucesso');
        location.href = "index.html";
    }else{
        alert('Usuario ou senha incorretos');
    }

}

// esta segunda function é responsável por logar o usuário que já possuiuma conta no site

// ainda vou fazer uma function que seja responsável por fazer as pesquisas do site, e também, aprimorar os que eu já fiz com o cadastramento do usuário!