<?php

include_once 'dbconfig.php';


?>


<!DOCTYPE html>
<html xmlns="">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>RELATÓRIO DE COMPRAS DO ESTABELECIMENTO</title>                            <!-- //NOME PÁGINA-->
	<link rel="stylesheet" href="style.css" type="text/css"/>
	<!--<script type="text/javascript"-->
	<script type="text/javascript">

		function edit_id(data) {
			window.location.href = 'relatData.php?edit_id=' + data;
		}

	</script>

</head>
<body>
<center>

	<div id="header">
		<div id="content">
			<label id="titulo">RELATÓRIO DE COMPRAS DO ESTABELECIMENTO</label>
		</div>
	</div>

	<div id="body">
		<div id="content">
			<form method="post">


				<table align="center">

					<tr>
						<td colspan="1"><input type="text" name="Data" placeholder="Informe a data para a pesquisa"
											   required/></td>
						<td align="center"><a href="javascript:edt_id('<?php $_POST['Data']; ?>')">PESQUISAR</a></td>


					</tr>
				</table>
				<table align="center">
					<tr>
						<th>ID</th>
						<th>MÓDULO</th>
						<th>DATA</th>
						<th>VALOR DA COMPRA</th>
						<th>FINALIZADO?</th>
					</tr>
					<?php
					//$Compra = 0;
					$sql_query = "SELECT * FROM pedido";
					$result_set = mysql_query($sql_query);
					while ($row = mysql_fetch_row($result_set)) {
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
					?>

					<tr>
						<th colspan="5"><a href="pagIni.php">VOLTAR</a></th>
					</tr>
				</table>
		</div>
	</div>

</center>
</body>
</html>
