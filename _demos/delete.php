<?
//REQUIRE SITE VARS
require("db_config.php");


//REQUIRE MAIN CLASS FILE
require($sa_classpath."mysql/mysql.php");

//DELETE EXAMPLE
$sql=new mysql_delete();
$sql->table('page');
$sql->where('pid=28');
$sql->run();

$sql->status(); //function to display sql feedback (the var $sql->status is also set to TRUE/FALSE)
?>
