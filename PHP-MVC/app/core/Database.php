<?php

/**
 * 
 */
class Database
{
	private $dbh;
	private $stmt;

	public function __construct()
	{
		$dsn = 'mysql:host=localhost;dbname=tokobuah';

		try {
			$this->dbh = new PDO($dsn, 'root', '');
		}catch(PDOException $e) {
			die($e->getMessage());
		}
	}

	public function query($sql="")
	{
		$this->stmt = $this->dbh->prepare($sql);
	}

	public function execute()
	{
		$this->stmt->execute();
	}

	public function result()
	{
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function row()
	{
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}
}