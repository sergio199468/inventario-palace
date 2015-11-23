<?php

class View
{
	/**
	  * Clase Vista
	 * 
	 * @author Sergio Olan <sergio199468@gmail.com>
	 */
	
	private $_controlador;
	private $_metodo;
	private $_layout = DEFAULT_LAYOUT;
	private $_view;

	public function __construct(Request $peticion){
		$this->_controlador = $peticion->getControlador();
		$this->_metodo = $peticion->getMetodo();//necitamos ver si necesitamos cambiar el layout
		$this->_view = $this->_metodo;
	}

	public function setLayout($layout){
		$this->_layout = $layout;
	}

	/**
	 * metodo para modificar la vista y asi no toma la vista que referencia al metodo
	 */
	public function setView($view){
		$this->_view = $view;
	}

	/**
	 * Metodo renderizar()
	 * Metodo para cargar los Archivos css, js y img de la pagina
	 *Asignar los header y footer por defecto
	 */
	public function renderizar($vista, $item = false){
		$_layoutParams = array(
		'ruta_css' => APP_URL . "views/layouts/" . $this->_layout . "/css/",
		'ruta_img' => APP_URL . "views/layouts/" . $this->_layout . "/img/",
		'ruta_js' => APP_URL . "views/layouts/" . $this->_layout . "/js/"
		);


		$rutaView = ROOT . "views" . DS . $this->_controlador .DS. $vista . ".phtml";
		/*
		if ($this->_metodo=="login") {
			$layout = "login";
		}else{
			$layout = DEFAULT_LAYOUT;
		}
		*/
		if (is_readable($rutaView)){
			//require_once ROOT . "views" . DS . "layouts" . DS . DEFAULT_LAYOUT . DS . "header.php";
			require_once ROOT . "views" . DS . "layouts" . DS . $this->_layout . DS . "header.php";
			require_once $rutaView;
			require_once ROOT . "views" . DS . "layouts" . DS . $this->_layout . DS . "footer.php";
		}else{
			throw new Exception("Error de vista");
		}

	}
	/**
	 * sirve para localizar el layout que se utiliza en la instanciacion de la clase
	 * es el ultimo metodo que se ejecuta en la intanciacion.
	 */
	public function __destruct(){
		$this->renderizar($this->_view);
	}
}