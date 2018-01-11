<?php session_start(); ?>

<?php
if (!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("connection.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM products WHERE login_id=" . $_SESSION['id'] . " ORDER BY id DESC");
?>

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

        <a href="index.php">Página inicial</a> | <a href="add.html">Adicionar nova task</a> | <a href="logout.php">Logout</a>
        <br/><br/>

        <table class="table" width='100%' border=0>
            <tr bgcolor='#CCCCCC'>
                <td width="25%">Nome</td>
                <td>Código</td>
                <td>Descrição</td>
                <td>Arquivo</td>
                <td>Atualizar</td>
            </tr>

            <?php
            while ($res = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $res['name'] . "</td>";
                echo "<td>" . $res['codigo'] . "</td>";
                echo "<td>" . $res['descricao'] . "</td>";
                echo "<td>" . $res['file_name'] . "</td>";
                echo "<td><a href=\"edit.php?id=$res[id]\">Editar</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Quer mesmo excluir a task?')\">Deletar</a></td>";
            }
            ?>

        </table>

        <div class="col-md-12" style="position: fixed; bottom: 0; width:98%; text-align: left; background-color: royalblue">
            <a style="color: white; padding-left: 4px" href='https://www.linkedin.com/in/rodrigo-tresinari-525195104/' target='_blank'>Rodrigo Tresinari &copy; 2018</a>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script>
    </body>
</html>