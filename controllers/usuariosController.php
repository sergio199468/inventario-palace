<?php
/**
	 * Archivo de clase de acciones CRUD en PDO
	 *
	 * Clase que permite acciones CRUD de la seccion usuarios
	 */
class usuariosController extends AppController
{
	public function __construct(){
		parent::__construct();//inicialisamos el controlador padre
	}

	public function index(){
		$this->_view->titulo = "Pagina principal";
		$this->_view->usuarios = $this->usuarios->find("usuarios", "all", NULL);
		$this->_view->renderizar("index");
	}

     /**
	 * Metodo de crear nuevo usuario, parte del controlador 
	 */
	public function add(){
		if ($_POST) {
			$pass = new Password();
			$_POST["password"] = $pass->getPassword($_POST["password"]);
			if ($this->usuarios->save("usuarios", $_POST)) {
				$this->redirect(array("controller" =>"usuarios"));
			}else{
				$this->redirect(array("controller" => "usuarios", "action" => "add"));
			}
		}else{
			$this->_view->titulo = "Agregar usuarios";
		}
		$this->_view->renderizar("add");
	}

	/**
	 * Metodo de actualizar el usuario, parte del controlador 
	 */
	public function edit($id = NULL){
		if ($_POST) {

			if (!empty($_POST["pass"])) {
				$pass = new Password();
				$_POST["password"] = $pass->getPassword($_POST["pass"]);
			}

			if ($this->usuarios->update("usuarios", $_POST)) {
					$this->redirect(array("controller" => "usuarios", "action" => "index"));
				}else{
					$this->redirect(array("controller" => "usuarios", "action" => "edit/".$_POST["id"]));
				}	
		}else{
			$this->_view->titulo = "Editar usuario";
			$this->_view->usuario = $this->usuarios->find("usuarios", "first", array("conditions" => "id=".$id));
			$this->_view->renderizar("edit");
		}
	}

	/**
	 * Metodo de elminarel usuario, parte del controlador 
	 */
	public function delete($id = NULL){
		$conditions = "id=".$id;
		if ($this->usuarios->delete("usuarios", $conditions)) {
			$this->redirect(array("controller" => "usuarios", "action" => "index"));
		}
	}
	/**
	*Metodo de los usuarios cuando inicien en la aplicacion
	*/
	public function login(){
		$this->_view->setLayout("login");
		if ($_POST) {
			$pass = new Password();
			$filter = new Validations();//sanear lo que se reciba en el formaulario
			$auth = new Authorization();

			$username = $filter->sanitizeText($_POST["username"]);//sanea cajas 
			$password = $filter->sanitizeText($_POST["password"]);

			$options = array("conditions" => "username = '$username'");
			$usuario = $this->usuarios->find("usuarios", "first", $options);

			if ($pass->isValid($password, $usuario["password"])) {
				$auth->login($usuario);
				$this->redirect(array("controller" => "tareas"));
			}else{
				echo "Usuario invalido";
			}
		}
		//$this->_view->renderizar("login");
	}

	/**
	*Metodo para destruir las sesiones activas
	*/
	public function logout(){
		$auth = new Authorization();
		$auth->logout();
	}
}