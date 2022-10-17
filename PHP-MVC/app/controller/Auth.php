<?php

/**
 * 
 */
class Auth extends Controller
{
	public function __construct()
	{
		session_start();
	}

	public function index()
	{
		$data['judul'] = 'Login';
		$data['produk'] = $this->model('user_model')->getAll();
		$this->view('partial/header', $data);
		$this->view('auth/login');
		$this->view('partial/footer');
	}

	public function login()
	{
		$user = $this->model('user_model')->getUser($_POST['username']);
		if ($user) {
			if (md5($_POST['password']) === $user['password']) {
				$_SESSION['username'] = $user['username'];
				header("Location:" . BASE_URL);
				exit;
			} else {
				unset($_SESSION['message']);
				$_SESSION['message'] = "Password Salah!";
				header("Location:" . BASE_URL . "auth");
				exit;
			}
		} else {
			$_SESSION['message'] = "Username tidak terdaftar!";
			header("Location:" . BASE_URL . "auth");
			exit;
		}
	}
}
