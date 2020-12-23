<?php 
	session_start();

	$usuario_autenticado = false;
	$usuario_id = null;
	$usuario_perfil_id = null;

	$perfis = array(1 => 'Adminstrativo' , 2 => 'Usuário');

	$usuarios_sistema = array(
		array('id' => 1, 'email' => 'adm@teste.net', 'senha' => '123456', 'pefil_id' => 1),
		array('id' => 2,'email' => 'maria@teste.net', 'senha' => '123456', 'pefil_id' => 2),
		array('id' => 3,'email' => 'João@teste.net', 'senha' => '123456', 'pefil_id' => 2),
		array('id' => 4,'email' => 'usuario@teste.net', 'senha' => '123456', 'pefil_id' => 1));
	foreach ($usuarios_sistema as $usuario) {
		if ($usuario['email'] == $_POST['email'] && $usuario['senha'] == $_POST['senha']) {
			$usuario_autenticado = true;
			$usuario_id = $usuario['id'];
			$usuario_perfil_id = $usuario['pefil_id'];
			break;
			} 
	}

	if ($usuario_autenticado) {
		echo "Usuario autenticado com sucesso";
		$_SESSION['AUTENTICADO'] = 'SIM';
		$_SESSION['id'] = $usuario_id;
		$_SESSION['pefil_id'] = $usuario_perfil_id;
		header('location: home.php');
	}else {
			header('location: index.php?login=autentication_erro');
			$_SESSION['AUTENTICADO'] = 'NAO';
		}



	/*echo "<pre>";
	print_r($usuarios_sistema);
	echo "</pre>";*/

 ?>