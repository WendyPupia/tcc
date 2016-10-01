<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script type="text/javascript">
function submeter(){
	document.coder.submit()
}
</script>
</head>

<body>

<?php if(isset($_POST['codigo']) && $_POST['codigo']!=''){
echo "<script>alert('".$_POST['codigo']."');</script>";
}
else
{
	?>
<form name="coder" action="" method="post">
<input type="text" name="codigo" onfocus="if(this.value.length==10){submeter()}" maxlength="10" onchange="if(this.value.length==10){submeter()}"  onkeyup="if(this.value.length==10){submeter()}" onblur="if(this.value.length==10){submeter()}" />
</form>
<?php
}
?>
</body>
</html>
