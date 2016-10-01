<?php
include_once 'dbconfig.php';

// delete condition
if (isset($_GET['delete_id'])) {
	try {
		$sql_query = "DELETE FROM modulo WHERE id_Modulo=" . $_GET['delete_id'];
		$prepStm = $connection->prepare($sql_query);
		$prepStm->execute();
	} catch (PDOException $e) {
		echo "
		   <script>
		     alert('Houve um erro ao tentar deletar o produto');
		   </script>
		 ";
	}
	header("Location: $_SERVER[PHP_SELF]");
}
// delete condition
?>

<!DOCTYPE html>
<html xmlns="">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>CONTROLE DE ESTOQUE</title>
	<link rel="stylesheet" href="style.css" type="text/css"/>
	<script type="text/javascript">

		function edt_id(id) {
			if (confirm('Deseja mesmo editar  ?')) {
				window.location.href = 'edit_modulo.php?edit_id=' + id;
			}
		}

		function delete_id(id) {
			if (confirm('Esta entrada será deletada permanentemente. Deseja continuar ?')) {
				window.location.href = 'modulos.php?delete_id=' + id;
			}
		}
	</script>
</head>
<body>
<center>

	<div id="header">
		<div id="content">
			<label id="titulo">CONTROLE DE MÓDULOS</label>
		</div>
	</div>

	<div id="body">
		<div id="content">

			<table align="center">
				<tr>
					<th>ID</th>
					<th>CÓDIGO DO MÓDULO</th>
					<th>STATUS</th>
					<th colspan="2"></th>
				</tr>
				<?php
				$sql_query = "SELECT id_Modulo,Ip_Modulo,Status_Modulo FROM Modulo ORDER BY id_Modulo";
				//$sql_query="SELECT idMODULO,CODIGO_MODULO,STATUS_2 FROM modulo";
				$prepStm = $connection->query($sql_query);

				while ($row = $prepStm->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
					?>
					<tr>
						<td><?php echo $row[0]; ?></td>
						<td><?php echo $row[1]; ?></td>
						<td><?php echo $row[2]; ?></td>
						<td align="center"><a href="javascript:edt_id('<?php echo $row[0]; ?>')">Editar</a></td>
						<td align="center"><a href="javascript:delete_id('<?php echo $row[0]; ?>')">Excluir</a></td>
					</tr>

					<?php
				}
				?>
				<tr>
					<th colspan="3"><a href="add_modulo.php">ADICIONAR NOVO MÓDULO</a></th>
					<th colspan="3"><a href="pagIni.php">VOLTAR</a></th>

				</tr>
			</table>
		</div>
	</div>

</center>
</body>
</html>
