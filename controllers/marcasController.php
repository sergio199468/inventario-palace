<?php

class marcasController extends AppController
{
	 /**
	  * Clase marcas
	 * Archivo de clase de acciones CRUD en PDO
	 *
	 * Clase que permite acciones CRUD de la seccion marcas
	 * @author Sergio Olan <sergio199468@gmail.com>
	 */
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		//echo "Hola desde el metodo index";
		//$tareas = $this->loadmodel("tarea");
		
		$this->_view->titulo = "Pagina principal";
		$this->_view->marcas = $this->marcas->find("marcas", "all", NULL);
		$this->_view->renderizar("index");
		/*
		$this->_view->titulo = "Página principal";
		$this->_view->renderizar("index");
		*/
	}

	 /**
	 * Metodo de crear nueva marca parte del controlador 
	 */
	public function add(){
		if ($_POST) {
			if ($this->marcas->save("marcas", $_POST)) {
				$this->redirect(array("controller" =>"marcas"));
			}else{
				$this->redirect(array("controller" => "marcas", "action" => "add"));
			}
		}else{
			$this->_view->titulo = "Agregar marca";
		}
		$this->_view->renderizar("add");
	}

     /**
	 * Metodo de editar la marca parte del controlador 
	 */
	public function edit($id = NULL){
		if ($_POST) {
			if ($this->marcas->update("marcas", $_POST)) {
					$this->redirect(array("controller" => "marcas", "action" => "index"));
				}else{
					$this->redirect(array("controller" => "marcas", "action" => "edit/".$_POST["id"]));
				}	
		}else{
			$this->_view->titulo = "Editar marca";
			$this->_view->marca = $this->marcas->find("marcas", "first", array("conditions" => "id=".$id));
			$this->_view->renderizar("edit");
		}
	}


	/**
	 * Metodo de eliminar la marca parte del controlador 
	 */
	public function delete($id = NULL){
		$conditions = "id=".$id;
		if ($this->marcas->delete("marcas", $conditions)) {
			$this->redirect(array("controller" => "marcas", "action" => "index"));
		}
	}
}
