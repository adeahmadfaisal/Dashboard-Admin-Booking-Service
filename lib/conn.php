<?php 
/**
 * 
 */
class Koneksi 
{
	
	private $host 		= 'localhost';
	private $user		= 'root';
	private $password	= '';
	private $db			= 'honda';

	protected $conn;

	function __construct()
	{
		if(!isset($this->conn))
		{
			$this->conn = new mysqli($this->host, $this->user, $this->password, $this->db);
		}

		if(!$this->conn)
		{
			echo "Error: Unable to connect to MySQL." . PHP_EOL;
        	echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        	echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        	exit;
		}

		return $this->conn;
	}
}
?>
