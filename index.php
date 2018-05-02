<?php 

session_start();


	class Controller {

		public $data = [];

		public $control;
		public static $model;

		public function __construct() {
			if (!isset($_SESSION['user'])) {$_SESSION['user'] = 'guest';}
			if ($_SESSION['user'] == 'guest') {
				self::$model = new Login;
				include_once $this->find_page() . '.php';
			} else {
				self::$model = new Admin;
				$this->admin_unos();
				$this->logout();
				include_once $this->find_page() . '.php';				
			}
			
		}

		public function find_page() {
			if (isset($_GET['c'])) {
				$this->control = $_GET['c'];
			} else {
				$this->control = 'homepage';
			}
			if (isset($_POST['login_check'])) {
				$l = new Login;
				if ($l->check_user_login() == true) {
					$this->control = 'admin';					
				} else {
					$this->data['msg'] = '!!! NEISPRAVNA ŠIFRA !!!';
				}
			}
			if ($this->control == 'login') {
				$_SESSION['user'] !== 'guest' ? $this->control = 'admin' : false;	
			}
			return $this->control;
		}

		private function admin_unos() {
			if (isset($_POST['unos'])) {
				self::$model->insert_rec();
			}
		}

		private function logout() {
			if (isset($_POST['logout'])) {
				$_SESSION['user'] = 'guest';
			}
		}


	}

	class Model {

		public $recept;
		public $list = [];

		public function get_text($broj_recepta) {
			return readfile(implode('', (glob('data/Recept' . $broj_recepta . '*.txt'))));
		}

		public function create_list() {			
			$l = glob('data/*.txt');
			foreach ($l as $key => $value) {
				$i = substr($value, 5, -4);			
				array_push($this->list, $i);
			}
			return $this->list;
		}

	}

	class Admin extends Model {

		protected $naziv;
		protected $tekst;

		public function insert_rec() {
			$this->naziv = $_POST['naziv'];
			$this->tekst = $_POST['tekst'];
			$num = count(glob('data/*'));
			fwrite(fopen('data/Recept' . ($num) . ' - ' . $this->naziv . '.txt', 'w'), $this->tekst);	
		}

	}
	class Login extends Model {

		protected $username;
		protected $password;

		public function check_user_login() {
			$this->username = $_POST['username'];
			$this->password = $_POST['password'];
			$login = $this->username . ', ' . $this->password;
			$file = fopen('data/users/users.txt', 'r');
			while (!feof($file)) {
				if (fgets($file) == $login) {
					fclose($file);
					$_SESSION['user'] = $this->username;
					return true;
					break; 	
				} else {
					return false;
					fclose($file);
				}
			}
		}

	}


	$c = new Controller();
	
	
	

 ?>