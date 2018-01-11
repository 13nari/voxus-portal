<?php session_start(); ?>
<html>
    <head>
        <title>Homepage</title>
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
    </head>

    <body>



        <div class="col-md-12 text-center" style="color:white; background-color:royalblue; padding-top: 6px">
            <h1><b>VOXUS</b><img src="resources/images/dragon-voxus.png" width="128" height="128"></h1>
        </div>
        <?php
        if (isset($_SESSION['valid'])) {
            include("connection.php");
            $result = mysqli_query($mysqli, "SELECT * FROM login");
            ?>                
            <div class="container text-center">
                <h4>Bem-vindo <?php echo $_SESSION['name'] ?> ! <a href='logout.php'>Logout</a></h4><br/>
            </div>
            <br/>



            <div class="col-md-4">
                <a href='view.php'><h4><li>Ver e adicionar tasks</li></h4></a>
            </div>

            <br/><br/>
            <?php
        } else {
            echo "<a href='login.php'>Login</a> | <a href='register.php'>Registrar</a><br><br>";
            echo "<h4>Você precisa estar logado para ter acesso aos recursos da ferramenta.</h4><br/><br/>";
            
        }
        ?>

        <div class="col-md-12" style="position: fixed; bottom: 0; width:98%; text-align: left; background-color: royalblue">
            <a style="color: white; padding-left: 4px" href='https://www.linkedin.com/in/rodrigo-tresinari-525195104/' target='_blank'>Rodrigo Tresinari &copy; 2018</a>
        </div>



        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script>
    </body>
</html>