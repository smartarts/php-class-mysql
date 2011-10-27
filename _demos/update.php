<?
//REQUIRE SITE VARS
require("db_config.php");


//REQUIRE MAIN CLASS FILE
require($sa_classpath."mysql/mysql.php");

//UPDATE EXAMPLE
$sql=new mysql_update();
$sql->table('page');
$sql->values("pname='aaaaa',pdesc='bbbbb'");
$sql->where('pid=27');
$sql->run();

$sql->status(); //function to display sql feedback (the var $sql->status is also set to TRUE/FALSE)
?>