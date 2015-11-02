<?php

class categoriasController extends AppController
{
	 /**
	  * Clase categorias
	 * Archivo de clase de acciones CRUD en PDO
	 *
	 * Clase que permite acciones CRUD de la seccion categorias
	 * @author Sergio Olan <sergio199468@gmail.com>
	 */
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		//echo "Hola desde el metodo index";
		//$tareas = $this->loadmodel("tarea");
		
		$this->_view->titulo = "Pagina principal";
		$this->_view->categorias = $this->db->find("categorias", "all", NULL);
		$this->_view->renderizar("index");
		/*
		$this->_view->titulo = "Página principal";
		$this->_view->renderizar("index");
		*/
	}

	 /**
	 * Metodo de crear nueva categoria parte del controlador 
	 */
	public function add(){
		if ($_POST) {
			if ($this->db->save("categorias", $_POST)) {
				$this->redirect(array("controller" =>"categorias"));
			}else{
				$this->redirect(array("controller" => "categorias", "action" => "add"));
			}
		}else{
			$this->_view->titulo = "Agregar categoria";
		}
		$this->_view->renderizar("add");
	}

     /**
	 * Metodo de editar la categoria parte del controlador 
	 */
	public function edit($id = NULL){
		if ($_POST) {
			if ($this->db->update("categorias", $_POST)) {
					$this->redirect(array("controller" => "categorias", "action" => "index"));
				}else{
					$this->redirect(array("controller" => "categorias", "action" => "edit/".$_POST["id"]));
				}	
		}else{
			$this->_view->titulo = "Editar categoria";
			$this->_view->categoria = $this->db->find("categorias", "first", array("conditions" => "id=".$id));
			$this->_view->renderizar("edit");
		}
	}


	/**
	 * Metodo de eliminar la categoria parte del controlador 
	 */
	public function delete($id = NULL){
		$conditions = "id=".$id;
		if ($this->db->delete("categorias", $conditions)) {
			$this->redirect(array("controller" => "categorias", "action" => "index"));
		}
	}
}
