<?php 
	session_start();

	/* Essa função abre um determinado arquivo para ser editado pala linguagem, a extenção pode ser personalizada e a fonção juntamente com o caminho do arquivo deve ser armazenada em uma variável que é uma variável que irá referenciar o arquivo*/
	

	$titulo = str_replace('#', '-', $_POST['titulo']);
	$categoria = str_replace('#', '-', $_POST['categoria']);
	$descricao = str_replace('#', '-', $_POST['descricao']);
	
	$texto = $_SESSION['id'] . '#' . $_POST['titulo'] . '#' . $_POST['categoria'] . '#' . $_POST['descricao'] . PHP_EOL;
	
	$arquivo = fopen('../../app_help_desk/arquivo.txt', 'a'); 

	/* Essa função é responsável por editar um arquivo passando como parametro a variável referencia do arquivo e a variável da string que se quer colocar no arquivo.*/

	fwrite($arquivo, $texto);

	fclose($arquivo);

	//echo $texto;

	header('location: abrir_chamado.php?chamado=sucesso');
 ?>