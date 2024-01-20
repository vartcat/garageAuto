<?php

session_start();

use MyApp\Controller;
use MyApp\Database;

class LoginController extends Controller
{

    public function construct()
	{
		parent::__construct();
	}
	
    /**
     * Display the index page.
     */
    public function index()
    {
        $data['title'] = "Login";
        $this->template('header', $data);
        $this->view('login', $data);
        $this->template('footer');
    }

	public function authenticate()
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
		$_SESSION['error'] = '';
		try {
			$this->db->query("SELECT * FROM user WHERE email = :email");
			$this->db->bind(":email", $email);
			$user = $this->db->single();

			if(password_verify($password, $user['password'])) {
				session_start();
				$isAdmin = $user['role'] === 'admin';
                $_SESSION[$isAdmin ? 'admin' : 'user'] = true;
                $_SESSION['admin'] = true;
				$location = $isAdmin ? '/admin' : '/user';
				$this->redirect($location);
			} else {
				$_SESSION['error'] = 'Mots de passe ou email erroné';
				$this->redirect('/login');
			}
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	}
}
