<?php

    include_once 'config.php';
    include_once 'model/Conexao.php';
    include_once 'model/Manager.php';
    // include_once 'public/helper.php';

    $manager = new Manager();

    date_default_timezone_set('America/Manaus');

    session_start();
    // print_r($_SESSION);
    if((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }
    $logado = $_SESSION['usuario'];

    $pagina = filter_input(INPUT_POST, 'pagina', FILTER_SANITIZE_NUMBER_INT);
    $qnt_result_pg = filter_input(INPUT_POST, 'qnt_result_pg', FILTER_SANITIZE_NUMBER_INT);
    
    //calcular o inicio visualização
    $inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;

    //consultar no banco de dados

    $result_usuario = "SELECT * FROM tb_checklistcarretabau ORDER BY id_checklistcarretabau DESC LIMIT $inicio, $qnt_result_pg";
    $resultado_usuario = mysqli_query($conexao, $result_usuario);


    //Verificar se encontrou resultado na tabela "usuarios"
    if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
        ?>
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Unidade</th>
                    <!-- <th>Motorista</th> -->
                    <th>Placa Carreta</th>
                    <th>Data / Hora</th>
                    <th colspan="3">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
                    ?>
                    <tr>
                        <th><?php echo $row_usuario['id_checklistcarretabau']; ?></th>
                        <th><?php echo $row_usuario['id_chekUnidadeBau']; ?></th>
                        <!-- <th><?php echo $row_usuario['tx_motorista']; ?></th> -->
                        <th><?php echo $row_usuario['cod_placacarreta']; ?></th>
                        <td><?php echo date('d/m/Y \à\s H:i' ,strtotime($row_usuario['cod_datahora'])); ?></td>
                        
                    <!--<td>
                        <form method="POST" action="views/page_update.php">
                            <input type="hidden" name="id" value="<?= $row_usuario['id']?>">
                                <button class="btn btn-warning btn-xs">
                                    <i class="fa fa-user-edit"></i>
                                </button>
                        </form>
                        </td> -->
                        <td>
                            <form method="POST" action="gerar-checklistbau.php" target="_blank">
                                <input type="hidden" name="id_printbau" value="<?= $row_usuario['id_checklistcarretabau']?>">
                                <button class="btn btn-warning btn-xs">
                                    <i class="far fa-file-pdf"></i>
                                </button>
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="controller/delete_checkcarreta.php" onclick="return confirm('Você deseja excluir esta informação?')">
                                <input type="hidden" name="id_deletacarreta" value="<?= $row_usuario['id_checklistcarretabau']?>">
                                <button class="btn btn-danger btn-xs">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php
                }?>
            </tbody>
        </table>
    <?php
    //Paginação - Somar a quantidade de usuários
    $result_pg = "SELECT COUNT(id_checklistcarretabau) AS num_result FROM tb_checklistcarretabau";
    $resultado_pg = mysqli_query($conexao, $result_pg);
    $row_pg = mysqli_fetch_assoc($resultado_pg);

    //Quantidade de pagina
    $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

    //Limitar os link antes depois
    $max_links = 2;

    echo "<a href='#' onclick='listar_usuario(1, $qnt_result_pg)'>Primeira</a> ";

    for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
        if($pag_ant >= 1){
            echo " <a href='#' onclick='listar_usuario($pag_ant, $qnt_result_pg)'>$pag_ant </a> ";
        }
    }

    echo " $pagina ";

    for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
        if($pag_dep <= $quantidade_pg){
            echo " <a href='#' onclick='listar_usuario($pag_dep, $qnt_result_pg)'>$pag_dep</a> ";
        }
    }

    echo " <a href='#' onclick='listar_usuario($quantidade_pg, $qnt_result_pg)'>Última</a>";
    }else{
        echo "<div class='alert alert-danger' role='alert'>Nenhum Check List encontrado!</div>";
    }


?>

<style>
    .flat-table {
  display: block;
  font-family: sans-serif;
  -webkit-font-smoothing: antialiased;
  font-size: 115%;
  overflow: auto;
  width: auto;
  
  th {
    background-color: rgb(112, 196, 105);
    color: white;
    font-weight: normal;
    padding: 20px 30px;
    text-align: center;
  }
  td {
    background-color: rgb(238, 238, 238);
    color: rgb(111, 111, 111);
    padding: 20px 30px;
  }
}
</style>