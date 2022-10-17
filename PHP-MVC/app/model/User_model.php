<?php

/**
 * 
 */
class User_model
{
	private $db;
	
	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAll()
	{
		$this->db->query("SELECT * FROM products");
		return $this->db->result();
	}

	public function insert($value)
	{
		$field = implode(',', array_keys($value));
		$key = implode("','", $value);
		$sql = "INSERT INTO products ($field) VALUES ('$key')";
		$this->db->query($sql);
		$this->db->execute();
	}

	public function update($id, $data=[])
	{
		$sql = "UPDATE products SET name = '".$data['name']."', price = '".$data['price']."', description = '".$data['description']."' WHERE product_id = '$id' ";
		$this->db->query($sql);
		$this->db->execute();
	}

	public function delete($id)
	{
		$sql = "DELETE FROM products WHERE product_id = '$id'";
		$this->db->query($sql);
		$this->db->execute();
	}

	public function getById($id)
	{
		$this->db->query("SELECT * FROM products WHERE product_id = '$id'");
		return $this->db->row();
	}

	public function getUser($id)
	{
		$this->db->query("SELECT * FROM user WHERE username = '$id'");
		return $this->db->row();
	}
}