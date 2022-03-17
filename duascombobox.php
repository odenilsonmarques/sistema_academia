<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<?php include_once 'header.php' ?>

<div class="container">
    <div class="row">
        <div class="col-sm-12 text-center ">
            <h4 class="titulo mt-5"></h4>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 text-center">
            <div class="body-template">
                <div class="form-group">
                    <label for="" class="text-left">TENSÃO PRIMÁRIA</label>
                    <select class="form-select" name="tensao" id="tensaoPrimaria" onchange="exibeValorTensao()">                                                                            
                        <option value="">SELECIONE</option>
                        <option value="13,8">13,8</option>
                        <option value="34,5">34,5</option>
                    </select>
                </div><br>
            </div> 
        </div> 
        <div class="col-sm-6 text-center">
            <div class="body-template">
                <div class="form-group">
                <label for="" class="text-left">TENSÃO SECUNDÁRIA</label>
                    <select class="form-select" name="tensao" id="tensaoSecundaria" onchange="exibeValorTensao()">                                                                            
                        <option value="">SELECIONE</option>
                        <option value="380/220">380/220</option>
                        <option value="220/127">220/127</option>
                    </select>
                </div><br>
            </div> 
        </div>
    </div>  
</div>

<div  class="text-center" id="valor200">
    <h2>tensao 200</h2>
</div>

<div class="text-center" id="valor300">
    <h2>tensao 300</h2>
</div>


<script>
    function exibeValorTensao(){

        var tensaoP = document.getElementById('tensaoPrimaria')
        var tensaoS = document.getElementById('tensaoSecundaria')
       
        
        var valueTensaoP = tensaoP.options[tensaoP.selectedIndex].value
        var valueTensaoS = tensaoS.options[tensaoS.selectedIndex].value
       

        if(valueTensaoP == "13,8" && valueTensaoS == "380/220"){
            document.getElementById("valor200").style.display = "block";
            document.getElementById("valor300").style.display = "none";
            
        }else if(valueTensaoP == "34,5" && valueTensaoS == "220/127"){
            document.getElementById("valor200").style.display = "none";
            document.getElementById("valor300").style.display = "block";

        }else if(valueTensaoP == "" || valueTensaoS == "" ){
            document.getElementById("valor200").style.display = "none";
            document.getElementById("valor300").style.display = "none";

        }
    }
</script>


<style>
    #valor200, #valor300 {
        display: none;
    }
</style>



<script src="assets/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>