
<?php
include_once "dbconfig.php";
/*
if (!isset($_GET['consultaM'])) {
  header("Location: busca.php");
  exit;
}

$busca = mysql_real_escape_string($_GET['consultaM']);
$sql = "SELECT modulo.*, item_pedido.* FROM modulo INNER JOIN item_pedido ON PEDIDO_MODULO_idMODULO = idMODULO";
//  WHERE ((MODULO_idMODULO LIKE '%".$busca."%') AND FINALIZADO='F')";
//SELECT pedidos.*, vendedores.* FROM pedidos INNER JOIN vendedores ON pedidos.vendedor_id = vendedores.id
$query = mysql_query($sql);
$count = mysql_num_rows($query);
// conta quantos registros encontrados com a nossa especificação
if ($count == 0) {
  ?>
  <script type="text/javascript">
  alert('NENHUM REGISTRO ENCONTRADO!');
  window.location.href='relatorioCompras.php';
  </script>
  <?php
} else {
*/?>

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
          <label id="titulo">RELATÓRIO DE COMPRAS POR MÓDULO</label>
        </div>
      </div>
      <div id="body">
        <div id="content">
          <table align="center">
            <tr>
              <th>ID</th>
              <th>CÓDIGO DO MÓDULO</th>
              <th>STATUS</th>
              <th>ID</th>
              <th>PEDIDO</th>
              <th>MÓDULO</th>
              <th>PRODUTO ESTOQUE</th>
              <th>QUANTIDADE</th>
            </tr>
            <?php
            $sql = "SELECT modulo.*, item_pedido.* FROM modulo INNER JOIN item_pedido ON id_Modulo = id_Modulo";
            $query = mysql_query($sql);
            while ($resultado = mysql_fetch_row($query)) {
              ?>
              <tr>
                <td><?php echo $resultado[0]; ?></td>
                <td><?php echo $resultado[1]; ?></td>
                <td><?php echo $resultado[2]; ?></td>
                <td><?php echo $resultado[3]; ?></td>
                <td><?php echo $resultado[4]; ?></td>
                <td><?php echo $resultado[5]; ?></td>
                <td><?php echo $resultado[6]; ?></td>
                <td><?php echo $resultado[7]; ?></td>
              </tr>
              <?php
            }
            ?>
            <tr>
              <th colspan=""><th colspan="4"><a href="pagRel.php">VOLTAR</a></th>
            </tr>
          </table>
        </div>
      </div>
    </center>
  </body>
  </html>
