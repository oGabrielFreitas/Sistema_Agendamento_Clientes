
// MÉTODO PARA FAZER POST DE DADOS

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

// MÉTODO PARA RECEBER ITENS DA TABELA E SEREM EDITAVEIS

const getItem = (rowID) => {
    //console.log("getting data: '" + rowID + "'");
    const item = document.getElementsByClassName("data" + rowID);
    const id = item[0].innerHTML;
    const tipo = item[1];
    const valor = item[2];
    const descricao = item[3];
    const tamanho = item[4];
    const imagem = item[5];
    const botaoAlt = item[6];
    const botaoSal = item[7];
    const botaoDel = item[8];
    //console.log(id,tipo,valor,descricao,imagem);
    return [id,tipo,valor,descricao,tamanho,imagem,botaoAlt,botaoSal,botaoDel];
};

// MÉTODO PARA RECEBER APENAS VALORES DA TABELA QUE INTERESSAM;

const getData = (rowID) => {

    const item = document.getElementsByClassName("data" + rowID);

    // item[1].addEventListener('change', a, true);

    const id = item[0].innerHTML;
    const tipo = item[1].value;
    const valor = item[2].value;
    const descricao = item[3].value;
    const tamanho = item[4].value;
    const imagem = item[5].getAttribute('src');

    console.log(id,tipo,valor,descricao,tamanho,imagem);

    return [id,tipo,valor,descricao,tamanho,imagem];


}

// MÉTODO QUE DEFINE SE ITEM É EDITAVEL OU NÃO

const editable = (item,set) => {

    if(set === true){
        item.readOnly = false;
        item.style.border = "1px solid rgb(163, 163, 163)";
    }
    else if(set === false){
        item.readOnly = true;
        item.style.border = "none";
    }

}

// MÉTODO QUE IDENTIFICA SOLICITAÇÃO DE ALTERAR

const clicaAltera = (rowID) => {

    item = getItem(rowID);

    editable(item[1],true);
    editable(item[2],true);
    editable(item[3],true);
    editable(item[4],true);

    item[6].type = 'hidden';
    item[7].type = 'button';
    item[8].type = 'button';  

}

// MÉTODO QUE IDENTIFICA SOLICITAÇÃO DE SALVAR

const clicaSalvar = (rowID) => {

    item = getItem(rowID);
    data = getData(rowID);

    editable(item[1],false);
    editable(item[2],false);
    editable(item[3],false);
    editable(item[4],false);

    item[6].type = 'button';
    item[7].type = 'hidden';
    item[8].type = 'hidden';

     post ("./source/php/script/atualiza-produto.php",{id: data[0],tipo: data[1],valor: data[2],
         descricao: data[3],tamanho: data[4], imagem: data[5]});

}

const clicaDeletar = (rowID) => {

    data = getData(rowID);

    console.log("DELETAAAA");

    post ("./source/php/script/deleta-produto.php",{id: data[0]});
    
}

