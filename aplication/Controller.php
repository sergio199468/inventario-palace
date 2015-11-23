<?php

abstract class AppController
{
	/**
	  * Clase abtracta AppController
	  * 
	  * @author Sergio Olan <sergio199468@gmail.com>
	 */


	protected $_view;

	/**
	 * Metodo para que cada que se intancie la clase obtendra el metodo.
	 */
	public function __construct(){
		$this->_view = new View(new Request);
		$controller = new Request();
		$controlador = $controller->getControlador();

		$this->$controlador = new ClassPDO();
	}

	abstract function index();

	protected function redirect($url = array()){
		$path = "";
		if ($url["controller"]) {
			$path .= $url["controller"];
		}
		if ($url["action"]) {
			$path .= "/".$url["action"];
		}
		header("LOCATION: ".APP_URL.$path);

	}
	/*

	protected function loadModel($modelo){
		$modelo = $modelo."Model";
		$rutaModelo = ROOT."models".DS.$modelo.".php";


		if (is_readable($rutaModelo)) {
		 	require_once($rutaModelo);
		 	$modelo = new $modelo;
		 	return $modelo;
		 }else{
		 	throw new Exception("Error al cargar el modelo");
		 }
	}
	*/
}
