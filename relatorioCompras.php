<?php include_once 'dbconfig.php'; ?>
<!DOCTYPE html>
<html xmlns="">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>RELATÓRIO DE COMPRAS</title>                            <!-- //NOME PÁGINA-->
  <link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
  <center>
    <div id="header">
      <div id="content">
        <label id="titulo">RELATÓRIO GERAL DE COMPRAS</label>
      </div>
    </div>
    <div id="body">
      <div id="content">
        <form method="GET" action="relCompraData.php">
          <table align="center">
            <tr>
              <td>
                <h5 margin-top=10px >Informe a data desejada para a pesquisa</h5>
                <input type="text" id="consulta" name="consulta" placeholder="ex: AAAA-MM-DD"maxlength="255" /></td><td> <input type="submit" value="PESQUISAR" /> </td> </tr>
              </table>
            </form>
            <form method="GET" action="relCompraModulo.php">
              <table align="center">
                <tr>
                  <td>
                    <h5 margin-top=10px >Informe o módulo que deseja pesquisar</h5>
                    <input type="text" id="consultaM" name="consultaM" placeholder="ex: IP/ID" maxlength="255" /></td><td> <input type="submit" value="PESQUISAR" /> </td> </tr>
                  </table>
                </form>
            <form method="post">
              <table align="center">
                <tr>
                  <th>ID</th>
                  <th>MÓDULO</th>
                  <th>DATA</th>
                  <th>VALOR DA COMPRA</th>
                  <th>FINALIZADO?</th>
                </tr>
                <?php

                $sql_query="SELECT * FROM Compra";
                $prepStm = $connection->query($sql_query);
                if ($prepStm == "") {
                  ?>
                  <tr>
                    
                  </tr>
                  <?php
                } else {
                while($row = $prepStm->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT))
                {
                  ?>
                  <tr>
                    <td><?php echo $row[0]; ?></td>
                    <td><?php echo $row[1]; ?></td>
                    <td><?php echo $row[2]; ?></td>
                    <td><?php echo $row[3]; ?></td>
                    <td><?php echo $row[4]; ?></td>
                  </tr>
                  <?php
                }
              }
                ?>
                <tr>
                  <th colspan="5"><a href="pagRel.php">VOLTAR</a></th>
                </tr>
              </table>
            </div>
          </div>
        </center>
      </body>
      </html>
