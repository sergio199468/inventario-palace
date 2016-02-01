<?php

class modelosController extends AppController
{
	 /**
	  * Clase modelos
	 * Archivo de clase de acciones CRUD en PDO
	 *
	 * Clase que permite acciones CRUD de la seccion modelos
	 * @author Sergio Olan <sergio199468@gmail.com>
	 */
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		//echo "Hola desde el metodo index";
		//$tareas = $this->loadmodel("tarea");
		
		$this->_view->titulo = "Pagina principal";
		$this->_view->modelos = $this->modelos->find("modelos", "all", NULL);
		$this->_view->renderizar("index");
		/*
		$this->_view->titulo = "Página principal";
		$this->_view->renderizar("index");
		*/
	}

	 /**
	 * Metodo de crear nueva modelo parte del controlador 
	 */
	public function add(){
		if ($_POST) {
			if ($this->modelos->save("modelos", $_POST)) {
				$this->redirect(array("controller" =>"modelos"));
			}else{
				$this->redirect(array("controller" => "modelos", "action" => "add"));
			}
		}else{
			$this->_view->titulo = "Agregar modelo";
		}
		$this->_view->renderizar("add");
	}

     /**
	 * Metodo de editar la modelo parte del controlador 
	 */
	public function edit($id = NULL){
		if ($_POST) {
			if ($this->modelos->update("modelos", $_POST)) {
					$this->redirect(array("controller" => "modelos", "action" => "index"));
				}else{
					$this->redirect(array("controller" => "modelos", "action" => "edit/".$_POST["id"]));
				}	
		}else{
			$this->_view->titulo = "Editar modelo";
			$this->_view->modelo = $this->modelos->find("modelos", "first", array("conditions" => "id=".$id));
			$this->_view->renderizar("edit");
		}
	}


	/**
	 * Metodo de eliminar la modelo parte del controlador 
	 */
	public function delete($id = NULL){
		$conditions = "id=".$id;
		if ($this->modelos->delete("modelos", $conditions)) {
			$this->redirect(array("controller" => "modelos", "action" => "index"));
		}
	}
}
