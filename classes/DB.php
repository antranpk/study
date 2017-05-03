<?php

class DB
{

	//bien ket noi db
	private $hostname = 'localhost',
			$username = 'root',
			$password = 'root',
			$dbname   = 'note';

	//bien ket noi toan cuc
	public $conn = NULL;


	//ham het noi
	
	public function connect_sql()
	{
		$this->conn = mysqli_connect($this->hostname, $this->username, $this->password, $this->dbname) or die ('ket noi that bai');
	}

	public function close()
	{
		if ($this->conn) {
			mysqli_close($this->conn);
		}
	}

	//ham truy van
	public function query($sql = null)
	{
		if ($this->conn) {
			mysqli_query($this->conn, $sql);
		}
	}

	public function num_rows($sql = null)
	{
		if ($this->conn) {
			$query = mysqli_query($this->conn, $sql);
			$row = mysqli_num_rows($query);
			return $row;
		}
	}

	public function fetch_assoc($sql = null, $type)
	{
		if ($this->conn) {
			$query = mysqli_query($this->conn, $sql);
			if ($type == 0) {
				while ($row = mysqli_fetch_assoc($query)) {
					$data[] = $row;
				}

				return $data;
			} 
			else if ($type == 1) {
				$data = mysqli_fetch_assoc($query);

				return $data;
			}
		}
	}

	// ham xu ly chuoi du lieu truy van
	public function real_escape_string($string)
	{
		if ($this->conn) {
			//xu ly chuoi du lieu truy van
			$string = mysqli_real_escape_string($this->conn, $string);
		} else {
			$string = $string;
		}

		return $string;
	}

	//ham lay id vua insert
	public function insert_id()
	{
		if ($this->conn) {
			return mysqli_insert_id($this->conn);
		}
	}
}

?>