<?php
include_once 'config/connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Home</title>
</head>
<body>
    <header>
        <!--conteudo referente ao cabecalho-->
        <nav class="navbar navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">ACADEMIA</a>
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link" href="#portfolio">INICIO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">SOBRE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#portfolio">PROFESSORES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#portfolio">PORTIFÓLIO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">LOGIN</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <footer>
         <!--conteudo referente ao rodapé-->
         <a href="cadStudent.php">cadastro de estudante</a>
    </footer>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>