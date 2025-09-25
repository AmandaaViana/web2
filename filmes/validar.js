function validar() {
    var titulo = document.querySelector("#titulo").value;
    var diretor = document.querySelector("#diretor").value;
    var duracao = document.querySelector("#duraçao").value;
    var genero = document.querySelector("#genero").value;
    var divErro = document.querySelector("#divErro");
    
    if (titulo.trim() == '') {
        divErro.innerHTML = "Informe o título!";
        return false;
    } else if (titulo.trim().length <= 3) {
        divErro.innerHTML = "O título deve ter mais de 3 caracteres!";
        return false;
    } else if (diretor.trim() == '') {
        divErro.innerHTML = "Informe o diretor!";
        return false;
    } else if (duracao.trim() == '') {
        divErro.innerHTML = "Informe a duração!";
        return false;
    } else if (isNaN(duracao) || duracao <= 0) {
        divErro.innerHTML = "A duração deve ser um número maior que 0!";
        return false;
    } else if (genero.trim() == '') {
        divErro.innerHTML = "Informe o gênero!";
        return false;
    }

    return true;
}
