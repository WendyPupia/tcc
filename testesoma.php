<?php
include_once 'dbconfig.php';

if (!isset($_GET['consultaM'])) {
  header("Location: index.php");
  exit;
}

$busca = mysql_real_escape_string($_GET['consultaM']);
$sql = "SELECT idPEDIDO, MODULO_idMODULO, SUM(VALOR_COMPRA) as VALOR_COMPRA, FINALIZADO FROM pedido WHERE ((MODULO_idMODULO LIKE '%".$busca."%') AND FINALIZADO='F')";

/*SELECT funcionario_id, data, SUM(avaliacao_postura) as avaliacao_postura
FROM equipe
GROUP BY funcionario_id, data*/

$query = mysql_query($sql);
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
          <label id="titulo">RELATÓRIO DE COMPRAS modulo</label>
        </div>
      </div>
      <div id="body">
        <div id="content">
          <table align="center">
            <tr>
              <th>ID</th>
              <th>MÓDULO</th>
            <!--  <th>DATA</th> -->
              <th>VALOR DA COMPRA</th>
              <th>FINALIZADO?</th>
            </tr>
            <?php
            while ($resultado = mysql_fetch_row($query)) {
              ?>
              <tr>
                <td><?php echo $resultado[0]; ?></td>
                <td><?php echo $resultado[1]; ?></td>
                <td><?php echo $resultado[2]; ?></td>
                <td><?php echo $resultado[3]; ?></td>
                <!--<td><?php echo $resultado[4]; ?></td> -->
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
