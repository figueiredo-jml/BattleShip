<?php
    session_start();
    include("../Includes/db.php");
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Admin Accounts</title>
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body>
       <div class="btn-toolbar mb-2 mb-md-0">
            <a href="categorias_insert.php" class="float-right btn btn-danger btn-sm">Nova Conta de Admin</a>
        </div>
        <br>
        <div class="table-responsive">
            <table class="table table-sm">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome do Admin</th>
                        <th scope="col">Email do Admin</th>
                        <th scope="col">Palavra-passe do Admin</th>
                        <th scope="col">Avatar do Admin</th>
                        <th scope="col" style="text-align:center">Action</th>
                    </tr>
                    <tbody>
                        <?php
                        $sqldb = new PDO("mysql:host=localhost;dbname=battlechips","Filiper","qwerty");
                        if (!$sqldb)
                        die('Erro na ligação');
                        else
                        {

                            $userData = get_admin_acc($sqldb);

                            $s = '';
                            foreach($userData as $val){
                                echo '<tr>';
                                echo ' <td valing="middle">' . $val['ID'] . '</td>';
                                echo ' <td valing="middle">' . $val['admin_nome'] . '</td>';
                                echo ' <td valing="middle">' . $val['admin_email'] . '</td>';
                                echo ' <td valing="middle">' . $val['admin_pass'] . '</td>';
                                echo ' <td valing="middle">' . $val['admin_avatar'] . '</td>';
                                echo ' <td align="center">';
                                echo ' <a href="edit_categorias.php?editId=' . $val['ID'] . '" class="text-primary"><i class="bi
                                bi-pencil"></i> Editar</a> | ';
                                echo ' <a href="delete_categorias.php?delId=' . $val['ID'] . '" class="text-danger"><i class="bi
                                bi-trash"></i>Apagar</a>';
                                echo ' </td>';
                                echo '</tr>';
                            }
                        }
                        function get_admin_acc($sqldb)
                        {
							$sql = $sqldb->prepare("SELECT * FROM admin_accounts ORDER BY ID");

                            $sql->execute();

                            $rows = $sql->fetchAll(PDO::FETCH_ASSOC);
                            return $rows;
                        }

                        ?>
                    </tbody>
                </table>
            </div>
    </body>
</html>