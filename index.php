<?php
#Iniciamos las sesiones
session_start();
ob_start();

#Configuramos los errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('log_errors',1);
ini_set('error_log',dirname(__FILE__).'/log.txt');
error_reporting(E_ALL);

#Cargamos los Namespaces del controlador
require_once 'autoload.php';

#Configuramos las urls por defecto
if (isset($_GET['controller'])) {
	
	$controller = $_GET['controller'].'Controller';
	
	$namespaceController = 'Controller\\'.$controller;
	
	if (class_exists($namespaceController)) {
		
		$objeto = new $namespaceController();
		
		if (isset($_GET['action']) and method_exists($objeto,$_GET['action'])) {
			
			$metodo = $_GET['action'];
			
			$objeto->$metodo();
			
		}else{
			
			header('Location: index.php?controller=Persona&action=saludar');
	
		}
		
	}else{
		
		header('Location: index.php?controller=Persona&action=saludar');
		
	}
	
}else{
	
	header('Location: index.php?controller=Persona&action=saludar');
	
}