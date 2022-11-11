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


    

    <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h2 class="modal-title font-weight-bold">Bootstrap Modal Form</h2>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-5">
                    <i class="fa fa-user prefix grey-text"></i>
					<label data-error="wrong" data-success="right" for="fname">Full Name:</label>
                    <input type="text" id="fname" class="form-control validate">
                </div>
                <div class="md-form mb-5">
                    <i class="fa fa-envelope prefix grey-text"></i>
					<label data-error="wrong" data-success="right" for="email">e-Mail:</label>
                    <input type="email" id="email" class="form-control validate">
                 </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button id="send" class="btn btn-info">Submit <i class="fa fa-paper-plane-o ml-1"></i></button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<a href="" class="btn btn-success" data-toggle="modal" data-target="#modalContactForm">Launch Modal Contact Form</a>


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
                                echo ' <td valing="middle">' . $val['admin_Id'] . '</td>';
                                echo ' <td valing="middle">' . $val['admin_nome'] . '</td>';
                                echo ' <td valing="middle">' . $val['admin_email'] . '</td>';
                                echo ' <td valing="middle">' . $val['admin_pass'] . '</td>';
                                echo ' <td valing="middle">' . $val['admin_avatar'] . '</td>';
                                echo ' <td align="center">';
                                echo ' <a href="edit_categorias.php?editId=' . $val['admin_Id'] . '" class="text-primary"><i class="bi
                                bi-pencil"></i> Editar</a> | ';
                                echo ' <a href="delete_categorias.php?delId=' . $val['admin_Id'] . '" class="text-danger"><i class="bi
                                bi-trash"></i>Apagar</a>';
                                echo ' </td>';
                                echo '</tr>';
                            }
                        }
                        function get_admin_acc($sqldb)
                        {
							$sql = $sqldb->prepare("SELECT * FROM admin_accounts ORDER BY admin_Id");

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