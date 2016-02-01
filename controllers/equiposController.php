<?php

class equiposController extends AppController
{
	 /**
	  * Clase equipos
	 * Archivo de clase de acciones CRUD en PDO
	 *
	 * Clase que permite acciones CRUD de la seccion equipos
	 * @author Sergio Olan <sergio199468@gmail.com>
	 */
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		//echo "Hola desde el metodo index";
		//$tareas = $this->loadmodel("tarea");
		
		$this->_view->titulo = "Pagina principal";
		$this->_view->equipos = $this->equipos->find("equipos", "all", NULL);
		$this->_view->renderizar("index");
		/*
		$this->_view->titulo = "Página principal";
		$this->_view->renderizar("index");
		*/
	}

	 /**
	 * Metodo de crear nueva equipo parte del controlador 
	 */
	public function add(){
		if ($_POST) {
			if ($this->equipos->save("equipos", $_POST)) {
				$this->redirect(array("controller" =>"equipos"));
			}else{
				$this->redirect(array("controller" => "equipos", "action" => "add"));
			}
		}else{
			$this->_view->titulo = "Agregar equipo";
		}
		$this->_view->renderizar("add");
	}

     /**
	 * Metodo de editar la equipo parte del controlador 
	 */
	public function edit($id = NULL){
		if ($_POST) {
			if ($this->equipos->update("equipos", $_POST)) {
					$this->redirect(array("controller" => "equipos", "action" => "index"));
				}else{
					$this->redirect(array("controller" => "equipos", "action" => "edit/".$_POST["id"]));
				}	
		}else{
			$this->_view->titulo = "Editar equipo";
			$this->_view->equipo = $this->equipos->find("equipos", "first", array("conditions" => "id=".$id));
			$this->_view->renderizar("edit");
		}
	}


	/**
	 * Metodo de eliminar la equipo parte del controlador 
	 */
	public function delete($id = NULL){
		$conditions = "id=".$id;
		if ($this->equipos->delete("equipos", $conditions)) {
			$this->redirect(array("controller" => "equipos", "action" => "index"));
		}
	}
}
