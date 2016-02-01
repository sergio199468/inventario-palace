<?php

class departamentosController extends AppController
{
	 /**
	  * Clase departamentos
	 * Archivo de clase de acciones CRUD en PDO
	 *
	 * Clase que permite acciones CRUD de la seccion departamentos
	 * @author Sergio Olan <sergio199468@gmail.com>
	 */
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		//echo "Hola desde el metodo index";
		//$tareas = $this->loadmodel("tarea");
		
		$this->_view->titulo = "Pagina principal";
		$this->_view->departamentos = $this->departamentos->find("departamentos", "all", NULL);
		$this->_view->renderizar("index");
		/*
		$this->_view->titulo = "Página principal";
		$this->_view->renderizar("index");
		*/
	}

	 /**
	 * Metodo de crear nueva departamento parte del controlador 
	 */
	public function add(){
		$this->_view->responsables = $this->departamentos->find('responsables', 'all', null);
		if ($_POST) {
			if ($this->departamentos->save("departamentos", $_POST)) {
				$this->redirect(array("controller" =>"departamentos"));
			}else{
				$this->redirect(array("controller" => "departamentos", "action" => "add"));
			}
		}else{
			$this->_view->titulo = "Agregar departamento";
		}
		$this->_view->renderizar("add");
	}

     /**
	 * Metodo de editar la departamento parte del controlador 
	 */
	public function edit($id = NULL){
		$this->_view->responsables = $this->departamentos->find('responsables', 'all', null);
		if ($_POST) {
			if ($this->departamentos->update("departamentos", $_POST)) {
					$this->redirect(array("controller" => "departamentos", "action" => "index"));
				}else{
					$this->redirect(array("controller" => "departamentos", "action" => "edit/".$_POST["id"]));
				}	
		}else{
			$this->_view->titulo = "Editar departamento";
			$this->_view->departamento = $this->departamentos->find("departamentos", "first", array("conditions" => "id=".$id));
			$this->_view->renderizar("edit");
		}
	}


	/**
	 * Metodo de eliminar la departamento parte del controlador 
	 */
	public function delete($id = NULL){
		$conditions = "id=".$id;
		if ($this->departamentos->delete("departamentos", $conditions)) {
			$this->redirect(array("controller" => "departamentos", "action" => "index"));
		}
	}
}
