<?php

class Bootstrap
{

	/**
	 * Clase Boostrap 
	 * Controlador para ver si estan disponibles los controladores.
	 * 
	 * @author Sergio Olan <sergio199468@gmail.com>
	 */

	public static function run(Request $peticion){
		$controller = $peticion->getControlador()."Controller";
		$rutaControlador = ROOT."controllers".DS.$controller.".php";
		$metodo = $peticion->getMetodo();
		$args = $peticion->getArgs();

		if (is_readable($rutaControlador)) {
			require_once $rutaControlador;
			$controller = new $controller;

			if (is_callable(array($controller, $metodo))) {
				$metodo = $peticion->getMetodo();
			}else{
				$metodo = "index";
			}

			if ($metodo=="login") {
				
			}else{
				Authorization::logged();
			}

			if (isset($args)) {
				call_user_func_array(array($controller, $metodo), $args);
			}else{
				call_user_func(array($controller, $metodo));
			}
		}else{
			throw new Exception("Controlador no encontrado");
		}
	}
}
