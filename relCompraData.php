<?php
include_once 'dbconfig.php';

$j = 30; //$_GET['consulta'];

if (!isset($j)) {
  header("Location: index.php");
  exit;
}

if (isset($j)){
  try{
    $sql_query = "SELECT * FROM compra WHERE Data_Compra = '%".$j."%' AND STATUS = 'F'";
    $prepStm = $connection->prepare($sql_query);
    $prepStm->execute();
    $row = $prepStm->fetch();
    //$count = $connection->mysql_num_rows($sql_query);
  } catch (PDOException $e){
    die($e->getMessage());
  }

    if ($row == 0) {
    ?>
    <script type="text/javascript">
    alert('NENHUM REGISTRO ENCONTRADO!');
    window.location.href='relatorioCompras.php';
    </script>
    <?php
  } else {

  ?>
  <!DOCTYPE html>
  <html xmlns="">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>RELATÓRIO DE COMPRAS</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
    <body>
      <center>
        <div id="header">
          <div id="content">
            <label id="titulo">RELATÓRIO DE COMPRAS POR DATA</label>
          </div>
        </div>
        <div id="body">
          <div id="content">
            <table align="center">
              <tr>
                <th>ID</th>
                <th>MÓDULO</th>
                <th>DATA</th>
                <th>VALOR DA COMPRA</th>
                <th>FINALIZADO?</th>
              </tr>
              <?php
              //while ($resultado = mysql_fetch_row($query)) {
              while ($resultado = $prepStm->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
                ?>
                <tr>
                  <td><?php echo $resultado[0]; ?></td>
                  <td><?php echo $resultado[1]; ?></td>
                  <td><?php echo $resultado[2]; ?></td>
                  <td><?php echo $resultado[3]; ?></td>
                  <td><?php echo $resultado[4]; ?></td>
                </tr>
                <?php
              }
              ?>
              <tr>
                <th colspan=""><th colspan="4"><a href="relatorioCompras.php">VOLTAR</a></th>
              </tr>
            </table>
          </div>
        </div>
      </center>
    </body>
    </html>
    <?php

}
} ?>
