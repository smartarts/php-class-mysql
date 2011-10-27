<?
//REQUIRE SITE VARS
require("db_config.php");


//REQUIRE MAIN CLASS FILE
require($sa_classpath."mysql/mysql.php");

//INSERT EXAMPLE
$sql=new mysql_insert();
$sql->table('page');
$sql->values("NULL,'string','string','string','string',1,'string','string','string'");
$sql->run();

echo $sql->insertid;
$sql->status(); //function to display sql feedback (the var $sql->status is also set to TRUE/FALSE)
?>