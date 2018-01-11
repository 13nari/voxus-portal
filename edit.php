<?php session_start(); ?>

<?php
if (!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>

<?php
// including the database connection file
include_once("connection.php");

if (isset($_POST['update'])) {
    $id = $_POST['id'];

    $name = $_POST['name'];
    $codigo = $_POST['codigo'];
    $descricao = $_POST['descricao'];

    // checking empty fields
    if (empty($name) || empty($codigo) || empty($descricao)) {
        if (empty($name)) {
            echo "<font color='red'>O campo 'nome' precisa ser preenchido.</font><br/>";
        }

        if (empty($codigo)) {
            echo "<font color='red'>O campo 'código' precisa ser preenchido.</font><br/>";
        }

        if (empty($descricao)) {
            echo "<font color='red'>O campo descrição precisa ser preenchido.</font><br/>";
        }
    } else {
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE products SET name='$name', codigo='$codigo', descricao='$descricao' WHERE id=$id");

        //redirectig to the display page. In our case, it is view.php
        header("Location: view.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM products WHERE id=$id");

while ($res = mysqli_fetch_array($result)) {
    $name = $res['name'];
    $codigo = $res['codigo'];
    $descricao = $res['descricao'];
}
?>
<html>
    <head>    
        <title>Editar task</title>
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
    </head>

    <body>
        <div class="col-md-12 text-center" style="color:white; background-color:royalblue; padding-top: 6px">
            <h1><b>VOXUS</b><img src="resources/images/dragon-voxus.png" width="128" height="128"></h1>
        </div>

        <a href="index.php">Página inicial</a> | <a href="view.php">Ver tasks</a> | <a href="logout.php">Logout</a>
        <br/><br/>

        <div align="center">
            <form name="form1" method="post" action="edit.php">
                <table border="0">
                    <tr> 
                        <td style="width: 50%; padding-right: 60px" align="right"><h5>Nome</h5></td>
                        <td><input type="text" name="name" value="<?php echo $name; ?>"></td>
                    </tr>
                    <tr> 
                        <td style="padding-right: 10px" align="right"><h5>Quantidade</h5></td>
                        <td><input type="text" name="codigo" value="<?php echo $codigo; ?>"></td>
                    </tr>
                    <tr> 
                        <td style="padding-right: 29px" align="right"><h5>Descrição</h5></td>
                        <td><input type="text" name="descricao" value="<?php echo $descricao; ?>"></td>
                    </tr>
                    <tr> 
                        <td style="padding-right: 44px" align="right"><h5>Arquivo</h5></td>
                        <td><input type="file" name="file_name" value="<?php echo $file_name; ?>"></td>
                    </tr>
                    <tr>
                        <td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
                        <td><input type="submit" name="update" value="Update"></td>
                    </tr>
                </table>
            </form>
        </div>


        <div class="col-md-12" style="position: fixed; bottom: 0; width:98%; text-align: left; background-color: royalblue">
            <a style="color: white; padding-left: 4px" href='https://www.linkedin.com/in/rodrigo-tresinari-525195104/' target='_blank'>Rodrigo Tresinari &copy; 2018</a>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script>
    </body>
</html>