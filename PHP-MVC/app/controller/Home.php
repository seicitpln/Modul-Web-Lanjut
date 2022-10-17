<?php

/**
 * 
 */
class Home extends Controller
{

	public function __construct()
	{
		session_start();
		if (!isset($_SESSION['username'])) {
			header("Location:" . BASE_URL . "auth");
			exit;
		}
	}

	public function index()
	{
		$data['judul'] = 'Home';
		$data['produk'] = $this->model('user_model')->getAll();
		$this->view('partial/header', $data);
		$this->view('home/main', $data);
		$this->view('partial/footer');
	}

	public function tambah()
	{
		if (isset($_POST)) {
			$data = [
				'product_id' => base_convert(time(), 8, 16),
				'name' => $_POST['name'],
				'price' => $_POST['price'],
				'description' => $_POST['description']
			];
			$this->model('user_model')->insert($data);
		}

		header('Location:' . BASE_URL . 'home');
		exit;
	}

	public function hapus($id)
	{
		$this->model('user_model')->delete($id);

		header('Location:' . BASE_URL . 'home');
		exit;
	}

	public function edit($id)
	{
		if (isset($_POST)) {
			$data = [
				'name' => $_POST['name'],
				'price' => $_POST['price'],
				'description' => $_POST['description']
			];
			$this->model('user_model')->update($id, $data);
		}

		header('Location:' . BASE_URL . 'home');
		exit;
	}

	public function getId($id)
	{
		echo json_encode($this->model('user_model')->getById($id));
	}
}
