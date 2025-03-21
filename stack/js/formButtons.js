const formulario = document.getElementById("formulario_verbas")
const btnAdicionar = document.getElementById("adicionar")
const btnLimpar = document.getElementById("limpar")
const inputData = document.getElementById("data_prevista")

btnAdicionar.addEventListener("click", (event)=>{
    event.preventDefault()
    formDirect("Adicionar")
})

btnLimpar.addEventListener("click", (event)=>{
    event.preventDefault()
    formDirect("Limpar")
})

function formDirect(method){
    if(method === "Adicionar"){
        formulario.action = "../stack/php/methods/add.php"
        formulario.method = "POST"
        formulario.submit()

    }else if(method === "Limpar"){
        if(confirm("Deseja mesmo limpar a tabela?")){
            formulario.action = "../stack/php/methods/limpar.php"
            formulario.method = "POST"
            formulario.submit()
        }

    }else{
        console.log("erro")
    }
}


function formatDate(date) {
    let dia = date.getDate()
    let mes = date.getMonth() + 1
    let ano = date.getFullYear()

    if (dia < 10) dia = '0' + dia
    if (mes < 10) mes = '0' + mes

    return ano + '-' + mes + '-' + dia
}

const hoje = new Date()
const dezDiasDepois = new Date()
dezDiasDepois.setDate(hoje.getDate() + 10)

inputData.min = formatDate(dezDiasDepois)
