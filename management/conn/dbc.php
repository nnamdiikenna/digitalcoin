<?php 

class MySQL {

	var $host;
	var $dbUser;
	var $dbPass;
	var $dbName;
	var $dbConn;
	var $connectError;

	function __construct($host, $dbUser, $dbPass, $dbName)
	{
		$this->host = $host;
		$this->dbUser = $dbUser;
		$this->dbPass = $dbPass;
		$this->dbName = $dbName;
		$this->connectToDb();
	}

	function connectToDb()
	{
		$this->dbConn = mysqli_connect($this->host, $this->dbUser, $this->dbPass, $this->dbName);


	}

	function query($sql){
		$res = mysqli_query($this->dbConn, $sql) or die (mysqli_error($this->dbConn));
		return new MySQLResult($this, $res);	
	}

	function tym(){
		return $tym= mktime(date("h"), date("i"), date("s"), date("m"), date("d"), date("Y"));
	}

	function get_ID(){
		$d = md5(date(his). rand(23444,99994));
		$ID = strtoupper($d);
		return $ID;
	}


	



}
class MySQLResult {
	var $mysqli;

	var $query;

	function __construct($mysqli, $query)
	{
		$this->mysqli = $mysqli;
		$this->query = $query;

	}

	function size()
	{
		$size =  mysqli_num_rows($this->query);
		return $size;
	}

	function fetch()

	{

		$row = mysqli_fetch_array($this->query);
		return $row;

/*if ($row = mysqli_fetch_array($this->query, MYSQL_ASSOC)) {

} else if ( $this->size() > 0 ) {
mysqli_data_seek($this->query, 0);
return false;
} else {
return false;
}*/
}
}

?>