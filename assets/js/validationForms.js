// var sim = document.getElementById("sim")
// var nao = document.getElementById("nao")
var comorbidity = document.getElementById("comorbidity")
var description_comorbidity = document.getElementById("description_comorbidity")

function displayInput(valor){
    if(valor == "SIM"){
        description_comorbidity.style.display = "block"
    }else{
        description_comorbidity.style.display = "none"
    }

}

