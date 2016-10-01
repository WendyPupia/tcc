<?php
include_once 'dbconfig.php';

if (isset($_POST['btn-save'])) {
	// variables for input data
	$CodigoModulo = $_POST['CodigoModulo']; //Ip do módulo

	if (($CodigoModulo == '')) {
		?>
		<script type="text/javascript">
			alert('Você não informou o módulo, preencha novamente!');
			window.location.href = 'add_modulo.php';
		</script>

		<?php
	} else {
		try {
			$sql_query = "INSERT INTO Modulo (Ip_Modulo,Status_Modulo)VALUES('$CodigoModulo', 'Inativo')";
			$prepStm = $connection->prepare($sql_query);
			$rowsAffected = $prepStm->execute();
			if ($rowsAffected < 0) {
				echo "
					<script type=\"text/javascript\">
						alert('Ocorreu um erro ao salvar. Fale com o administrador do sistema!');
						window.location.href = 'add_modulo.php';
					</script>
				";
			}
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
}

if (isset($_POST['btn-cancel1'])) {
	header("Location: modulos.php");
}
?>

<!DOCTYPE html>
<html xmlns="">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title></title>
	<link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
<center>

	<div id="header">
		<div id="content">
			<label id="titulo">ADICIONAR NOVO MÓDULO</label>
		</div>
	</div>
	<div id="body">
		<div id="content">
			<form method="post">
				<table align="center">
					<tr>
						<td><input type="text" name="CodigoModulo" placeholder="Informe o IP ou Código do módulo"/></td>
					</tr>
					<tr>
						<td>
							<button type="submit" name="btn-save"><strong>Salvar</strong></button>
							<button type="submit" name="btn-cancel1">Voltar</button>
						</td><!--<tr><td align="center"><a href="index.php">Voltar</a></td></tr> -->
					</tr>
				</table>
			</form>
		</div>
	</div>
</center>
</body>
