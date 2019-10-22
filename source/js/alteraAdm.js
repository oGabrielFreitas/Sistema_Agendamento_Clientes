
//Documento

const post = (path, params, method='post') => {
    // Exemple: post('/contact/', {name: 'Johnny Bravo'});
    const form = document.createElement('form');
    form.method = method;
    form.action = path;
    for (const key in params) {
        if (params.hasOwnProperty(key)) {
            const hiddenField = document.createElement('input');
            hiddenField.type = 'hidden';
            hiddenField.name = key;
            hiddenField.value = params[key];
            form.appendChild(hiddenField);
        }
    }
    document.body.appendChild(form);
    form.submit();
};

const getData = (rowID) => {
    //console.log("getting data: '" + rowID + "'");
    const linha = document.getElementsByClassName("data"+rowID);
    const id = linha[0].innerHTML;
    const tipo = linha[1].value;
    const valor = linha[2].value;
    const descricao = linha[3].value;
    const imagem = linha[4].value;
    //console.log(id,tipo,valor,descricao,imagem);
    return [id,tipo,valor,descricao,imagem];
};

const confirmation = (pergunta, resposta_pra_sim, resposta_pra_nao) => {
    const resposta = confirm(pergunta);
    if (resposta == true) {
        alert(resposta_pra_sim);
    }
    else {
        alert(resposta_pra_nao);
    }
    return resposta
}

const deleteBtn = (rowID) => {
    post_data = getData(rowID);
    console.log("\"DELETE: 'id_eletronico' = "+post_data[0]+"\"");
    if (confirmation("Tem certeza que deseja deletar produto 'id = "+post_data[0]+"'?","produto 'id = "+post_data[0]+"' deletado","produto 'id = "+post_data[0]+"' não deletado")) {
        post ("./delete.php",{id: post_data[0]});
    }
};

const updateBtn = (rowID) => {
    post_data = getData(rowID);
    console.log("\"UPDATE: 'id_eletronico' = "+post_data[0]+"\"");
    if (confirmation("Tem certeza que deseja alterar produto 'id = "+post_data[0]+"'?","produto 'id = "+post_data[0]+"' alterado","produto 'id = "+post_data[0]+"' não alterado")) {
        post ("./update.php",{id: post_data[0],tipo: post_data[1],valor: post_data[2],descricao: post_data[3],imagem: post_data[4]});
    }
};