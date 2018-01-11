<?php session_start(); ?>

<?php
if (!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>

<html>
    <head>
        <title>Adicionar task</title>
    </head>

    <body>
        <?php
//including the database connection file
        include_once("connection.php");

        if (isset($_POST['Submit'])) {

            $file_name = $_FILES['myfile']['name'];
            $type = $_FILES['myfile']['type'];
            $data = file_get_contents($_FILES['myfile']['tmp_name']);

            $name = $_POST['name'];
            $codigo = $_POST['codigo'];
            $descricao = $_POST['descricao'];
            $loginId = $_SESSION['id'];




            $stmt = mysqli_prepare($mysqli, "INSERT INTO products VALUES ('sissssi',?,?,?,?,?,?,?)"); // 1- name, 2- codigo, 3- descricao, 4- file_name, 5- mime, 6- data, 7- login_id
            mysqli_stmt_bind_param($stmt, 'sisibbb', $name, $codigo, $descricao, $file_name, $type, $data, $loginId);

            mysqli_stmt_execute($stmt);

            // checking empty fields
            if (empty($name) || empty($codigo) || empty($descricao)) {
                if (empty($name)) {
                    echo "<font color='red'>O campo 'nome' precisa ser preenchido.</font><br/>";
                }

                if (empty($codigo)) {
                    echo "<font color='red'>O campo 'qauntidade' precisa ser preenchido.</font><br/>";
                }

                if (empty($descricao)) {
                    echo "<font color='red'>O campo 'descrição' precisa ser preenchido.</font><br/>";
                }

                //link to the previous page
                echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
            } else {
                // if all the fields are filled (not empty) 
                //insert data to database


                $result = mysqli_query($mysqli, "INSERT INTO products(name, codigo, descricao, file_name, mime, data, login_id) VALUES('$name','$codigo','$descricao','$file_name', '$type', '$data', '$loginId')");

                //display success message
                echo "<font color='green'>Dados adicionados com sucesso!";
                echo "<br/><a href='view.php'>Ver resultado</a>";
            }
        }
        ?>
    </body>
</html>