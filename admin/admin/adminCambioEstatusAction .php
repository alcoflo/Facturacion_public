<?php
//Versión 1.0 Oct-14
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	session_start();
	include_once '../config/dbCred.inc.php';
	foreach ($C as $name => $val){
		define($name,$val);
	}
	function __autoload($class)
	{
		$fileName = "../class/class." . strtolower($class) . ".inc.php";
		if(file_exists($fileName)){
			include_once $fileName;
		}
	}
	$actions = array('guardar' => array('object' => 'Usuario',
										'method' => 'cambioEstatusUsuario'));
	if(isset($actions[$_POST['acc']])){
		$useArray = $actions[$_POST['acc']];
		$obj = new $useArray['object'];
		$obj->setEstatus($_POST['estatus']);
		if(TRUE === $msg = $obj->$useArray['method']($_SESSION['usuario']['id'])){
			echo $obj->getRequestMsg();
		}else{
			echo $obj->getRequestMsg();
		}
	}else{
		echo 'Error al procesar la acción.';
	}
}else{
	echo 'Error al procesar la solicitud.';
}