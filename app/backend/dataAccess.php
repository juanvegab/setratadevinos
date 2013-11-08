<?PHP 
	$hostname = "localhost";
	$database = "setratad_wineSite";
	$username = "root";
	$password = "root";
	
	//mysql_connect('localhost', 'root', 'root');
	
	$mysqli = new mysqli($hostname, $username, $password, $database);
	
	$conn = mysql_pconnect($hostname, $username, $password) or trigger_error(mysql_error(),E_USER_ERROR); 
	mysql_select_db($database, $conn)or die('No se puede conectar con '.$database);

	/* check connection */
	if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}
?>