<?php

spl_autoload_register(function($className){
	
	$ruta = str_replace('\\','/',$className.'.php');
	
	if (is_readable($ruta)) {
		
		include $ruta;
		
	}else{
		
		echo 'No existe ';
		
	}
	
});