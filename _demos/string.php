<?
//REQUIRE SITE VARS
require("db_config.php");


//REQUIRE MAIN CLASS FILE
require($sa_classpath."mysql/mysql.php");


//STRING EXAMPLE - query is set by a string so more complex queries can be executed (left joins). Other properties as the same as "select".
$sql=new mysql_string();

$sql->query('select * from page');
$sql->set('pname=name');
$sql->run();

echo $sql->numrows; //returns total rows

foreach($sql->rows as $row){
	
	$sql->get($row);

	echo $sql->name;
	echo "<br/>";
}


?>