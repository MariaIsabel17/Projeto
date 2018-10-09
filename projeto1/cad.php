<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
</head>
<?php 
error_reporting(0);
$nomep = $_POST['nomep'];
$quant = $_POST['quant'];
$valoru = $_POST['valoru'];
$descri = $_POST['descri'];
$categ = $_POST['cate'];

$dir = "img/";

$sql = "INSERT INTO produtos VALUES(default, '$nomep', '$quant','$valoru','$desci', '$categ', '0')";
$res = mysqli_query($conexao, $sql);

$sqlPG = "SELECT LAST_INSET_ID()";
$queryPG = mysqli_query($conexao, $sqlPG);

if($queryPg){

	$codPgIndice = mysqli_fetch_row($queryPG);
	$salva = $codPgIndice[0];

	if ($res) {
		$imagem = $_POST['img'];
 if(isset($_FILES['img'])) && isset($_FILES['img2']) && isset($_FILES['img3'])){
	$nome1 = microtime();
	$nome2 = md5(microtime());
	$nome3 = base64_encode(microtime());

	$ext =  strtolower(substr($_FILES['img']['name'], -4));
	$novo_nome = $nome1.$ext;
 
 	$ext2 =  strtolower(substr($_FILES['img2']['name'], -4));
 	$novo_nome2 = $nome1.$ext;

 	$ext3 =  strtolower(substr($_FILES['img3']['name'], -4));
 	$novo_nome3 = $nome1.$ext;

 	$sal = move_uploaded_file($_FILES['img']['tmp_name'], $dir.$novo_nome);
 	$sal2 =  move_uploaded_file($_FILES['img2']['tmp_name'], $dir.$novo_nome2); 
 	$sal3 =  move_uploaded_file($_FILES['img3']['tmp_name'], $dir.$novo_nome3);

 	if($sal & $sal2 & $sal3){

 		echo "<script type='text/javascript'> alert('imagem')</script>";
 	}

 	$sql_img = "INSERT INTO imagem (id, id_produto, imagem) VALUES(default, '".
 	$salva."', $novo_nome')";
 	$queryImg = mysqli_query($conexao, $sql_img);

 	$sql_img2 = "INSERT INTO imagem (id, id_produto, imagem) VALUES(default, '".
 	$salva."', $novo_nome')";
 	$queryImg2 = mysqli_query($conexao, $sql_img2);

 	$sql_img3 = "INSERT INTO imagem (id, id_produto, imagem) VALUES(default, '".
 	$salva."', $novo_nome')";
 	$queryImg3 = mysqli_query($conexao, $sql_img3);

if ($queryImg) {
	echo "DeuCERTO";
}
 echo "<script>alert('Cadastrado!!')</script>";
}else{
	echo "<script>alert('Erro!')</script>";
}


}
}

 ?>
<body>
<br>
<div class="container" style="margin-left: 50px;">
<div class="row">
<div class="col-md-6">
<legend>CADASTRAR PRODUTO TABELA</legend>
<form method="_POST" enctype="multipart/form-data">
<div class="form-group">
	<label>Valor Produto</label>
	<input placeholder="Nome por produto" class="form-control" type="text" name="nomep" style="width: 2000px;">
</div>
<div class="form-group">
<label>Valor unitario</label>
<div class="input-group col-md-4">
<input placeholder="Valor unitario" class="form-control" type="number" name="valoru" style="width:2000px"></div>
<div class="form-group">
<label>Quantidade</label>
<div class="input-group col-md-4">
<input placeholder="Quantidade" class="form-control" type="number" name="quant" style="width: 2000px">
</div></div>
<textarea name="descri"></textarea>
<div class="form-group">
<label>Foto</label>
<input type="file" name="img">
<label>Foto 2</label>
<input type="file" name="img2">
<label>Foto 3</label>
<input type="file" name="img3">
</div>
<div class="form-group">
<label>Categoria: </label><br>
<select name="cate" style="width: 2000px;;  height: 30px;">
<?php
$sqlCatMostra = "SELECT * FROM categoria;";
$queryCatMostra =  mysqli_query($conexao, $sqlCatMostra);
while ($cat = mysqli_fetch_assoc($queryCatMostra)) {
echo "<option value='".$cat['categoria']."'>".$cat['categoria']."</option>";

?>
	

</select><br>

<input class="btn btn-sucess" value="Cadastrar" type="submit" name="submit" style="width: 500px; margin-left: 150px;">
</div>
</div>
</form>
</div>
</body>
</html>