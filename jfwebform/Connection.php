<?php
class Connection
{
	public $hostName;
	public $userName;
	public $password;
	public $dbName;
	public $myConnection;
	function __construct()
	{
		$this->hostName = "localhost";
		$this->userName = "joinfilm_joinusr";
		$this->password = "vt*r1U$23_m8";
		$this->dbName   = "joinfilm_dru-final";
		}
	//Create connection
	public function connect_db()
	{
		$this->myConnection = mysql_connect($this->hostName, $this->userName, $this->password);
		if(!$this->myConnection)
		{
			die('Could not connect'.mysql_error());
			}
		else
		{
			mysql_select_db($this->dbName, $this->myConnection);
			}
		}
	}
	
?>