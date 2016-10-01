<?php
include_once 'dbconfig.php';

if (isset($_POST['btn-save'])) {
	$CodigoProduto = $_POST['CodigoProduto'];
	$NomeProduto = $_POST['NomeProduto'];
	$DescricaoProduto = $_POST['DescricaoProduto'];
	$Quantidade = $_POST['Quantidade'];
	$Preco = $_POST['Preco'];

	if (($CodigoProduto == '' || $NomeProduto == '' || $DescricaoProduto == '' || $Quantidade == '' || $Preco == '')) {
		?>
		<script type="text/javascript">
			alert('Impossivel salvar dados em branco! Tente novamente!');
			window.location.href = 'add_data.php';
		</script>

		<?php
	} else {
		try {
			$sql_query = "INSERT INTO Estoque_Produto (Codigo_Produto,Nome_Produto,Descricao_Produto,Quantidade_Estoque,Preco) VALUES('$CodigoProduto','$NomeProduto','$DescricaoProduto','$Quantidade','$Preco')";
			$prepStm = $connection->prepare($sql_query);
			$rowsAffected = $prepStm->execute();
			if ($rowsAffected < 1) {
				echo "
					<script type=\"text/javascript\">
						alert('Ocorreu um erro ao salvar. Fale com o administrador do sistema!');
						window.location.href = 'add_data.php';
					</script>
				";
			}
		} catch (PDOException $e) {
			die($e->getMessage());
		}

	}
}

if (isset($_POST['btn-cancel1'])) {
	header("Location: index.php");
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
			<label id="titulo">ADICIONAR NOVO PRODUTO NA BASE DE DADOS</label>
		</div>
	</div>
	<div id="body">
		<div id="content">
			<form method="post" action="">
				<table align="center">

					<tr>
						<td><input type="text" name="CodigoProduto" placeholder="Código de barras" maxlength="10"/></td>
					</tr>
					<tr>
						<td><input type="text" name="NomeProduto" placeholder="Nome"/></td>
					</tr>
					<tr>
						<td><input type="text" name="DescricaoProduto" placeholder="Descrição"/></td>
					</tr>
					<tr>
						<td><input type="text" name="Quantidade" placeholder="Quantidade"/></td>
					</tr>
					<tr>
						<td><input type="text" name="Preco" placeholder="Preço"/></td>
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
