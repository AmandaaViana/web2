function validar (){
    
    var titulo = document.querySelector("#titulo").value;
    var genero = document.getElementById("genero").value;
    var numPaginas = document.querySelector("#numPaginas").value;
    var autor = document.querySelector("#autor").value;

    var divErro = document.querySelector("#divErro");
    //console.log(titulo + " - " + genero);

    if(titulo.trim() == ''){
        divErro.innerHTML = ("informe o titulo!");
        return false;
    } else if (genero.trim() == ''){
        divErro.innerHTML = ("informe o genero!");
        return false;
    }else if (numPaginas.trim() == ''){
        divErro.innerHTML = ("informe o numero de paginas!");
        return false;
    }else if (autor.trim() == ''){
        divErro.innerHTML = ("informe o autor!");
        return false;
    }

    return true;
}