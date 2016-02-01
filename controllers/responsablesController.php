<?php

class responsablesController extends AppController
{
	 /**
	  * Clase responsables
	 * Archivo de clase de acciones CRUD en PDO
	 *
	 * Clase que permite acciones CRUD de la seccion responsables
	 * @author Sergio Olan <sergio199468@gmail.com>
	 */
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		//echo "Hola desde el metodo index";
		//$tareas = $this->loadmodel("tarea");
		
		$this->_view->titulo = "Pagina principal";
		$this->_view->responsables = $this->responsables->find("responsables", "all", NULL);
		$this->_view->renderizar("index");
		/*
		$this->_view->titulo = "Página principal";
		$this->_view->renderizar("index");
		*/
	}

	 /**
	 * Metodo de crear nueva responsable parte del controlador 
	 */
	public function add(){
		if ($_POST) {
			if ($this->responsables->save("responsables", $_POST)) {
				$this->redirect(array("controller" =>"responsables"));
			}else{
				$this->redirect(array("controller" => "responsables", "action" => "add"));
			}
		}else{
			$this->_view->titulo = "Agregar responsable";
		}
		$this->_view->renderizar("add");
	}

     /**
	 * Metodo de editar la responsable parte del controlador 
	 */
	public function edit($id = NULL){
		if ($_POST) {
			if ($this->responsables->update("responsables", $_POST)) {
					$this->redirect(array("controller" => "responsables", "action" => "index"));
				}else{
					$this->redirect(array("controller" => "responsables", "action" => "edit/".$_POST["id"]));
				}	
		}else{
			$this->_view->titulo = "Editar responsable";
			$this->_view->responsable = $this->responsables->find("responsables", "first", array("conditions" => "id=".$id));
			$this->_view->renderizar("edit");
		}
	}


	/**
	 * Metodo de eliminar la responsable parte del controlador 
	 */
	public function delete($id = NULL){
		$conditions = "id=".$id;
		if ($this->responsables->delete("responsables", $conditions)) {
			$this->redirect(array("controller" => "responsables", "action" => "index"));
		}
	}
}
