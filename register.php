<html>
    <head>
        <title>Registrar</title>
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
    </head>

    <body>
        <div class="col-md-12 text-center" style="color:white; background-color:royalblue; padding-top: 6px">
            <h1><b>VOXUS</b><img src="resources/images/dragon-voxus.png" width="128" height="128"></h1>
        </div>

        <a href="index.php">Home</a> <br />
        <?php
        include("connection.php");

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $user = $_POST['username'];
            $pass = $_POST['password'];

            if ($user == "" || $pass == "" || $name == "" || $email == "") {
                echo "Todos os campos precisam ser preenchidos";
                echo "<br/>";
                echo "<a href='register.php'>Voltar</a>";
            } else {
                mysqli_query($mysqli, "INSERT INTO login(name, email, username, password) VALUES('$name', '$email', '$user', md5('$pass'))")
                        or die("Could not execute the insert query.");

                echo "Registrado com sucesso!";
                echo "<br/>";
                echo "<a href='login.php'>Login</a>";
            }
        } else {
            ?>
            <div class="col-md-12 text-center">
                <p><h2 style="padding-bottom: 1cm">Registrar</h2></p>
            <form align="center" class="col-md-12" name="form1" method="post" action="">
                <table align="center" width="75%" border="0">
                    <tr> 
                        <td style="padding-right: 10px" align="right" width="50%"><h5>Nome completo</h5></td>
                        <td><input type="text" name="name"></td>
                    </tr>
                    <tr> 
                        <td style="padding-right: 108px" align="right"><h5>Email</h5></td>
                        <td><input type="text" name="email"></td>
                    </tr>            
                    <tr> 
                        <td style="padding-right: 88px" align="right"><h5>Usuário</h5></td>
                        <td><input type="text" name="username"></td>
                    </tr>
                    <tr> 
                        <td style="padding-right: 101px" align="right"><h5>Senha</h5></td>
                        <td><input type="password" name="password"></td>
                    </tr>
                    <tr> 
                        <td>&nbsp;</td>
                        <td><input type="submit" name="submit" value="Registrar"></td>
                    </tr>
                </table>
            </form>
        </div>
        <?php
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