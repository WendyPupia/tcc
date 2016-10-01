<?php
include_once 'dbconfig.php';

if(isset($_POST['btn-update']))
{
  // variables for input data
  $CodigoProduto = $_POST['CodigoProduto'];

  $sql_query = "SELECT * FROM pedido WHERE DATA_2 =".$CodigoProduto;

  if(mysql_query($sql_query))
  {
    ?>
    <?php
  }
  else
  {
    ?>
    <?php
  }
  // sql query execution function
}
?>

<!DOCTYPE html>
<html xmlns="">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>TENTATIVA</title>
  <link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
  <center>

    <div id="header">
      <div id="content">
        <label id="titulo">TENTATIVA </label>
      </div>
    </div>

    <div id="body">
      <div id="content">
        <form method="post">
          <table align="center">
            
            <tr>
              <td><input type="text" name="CodigoProduto"  value="" placeholder="informe a data para pesquisa" required /></td>
            </tr>
            <tr>
              <td>
                <button type="submit" name="btn-update"><strong>Atualizar</strong></button>
              </td>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </center>
</body>
</html>
